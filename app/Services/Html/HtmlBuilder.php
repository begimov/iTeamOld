<?php namespace App\Services\Html;

use Illuminate\Support\Facades\Auth;

use App\Models\Learn;
use App\Models\Order;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\AuthorController;

class HtmlBuilder extends \Collective\Html\HtmlBuilder {

	private $_button = false;
	private $_learn;

	public function shortCode($text = null) {
//        dd($text);
		$link = $this->url->getRequest()->getPathInfo();

		$links = explode('/',trim($link,'/'));
		$wid = array_pop($links);
		$type = array_shift($links);

		#
		#
		#
		if($type === 'v2') {
			$type = array_shift($links);
		}
		#
		#
		#

		$path = implode('/',$links);
		$path = ($path) ? '/' . $path . '/' : '/';

		#if(Auth::user() && @Auth::user()->id===1) dd($link);
		#if($path === '/v2/learn/webinar/') $path = '/learn/webinar/';

		$learn_m = new Learn;
		$learn_table = $learn_m->getTable();

		$this->_learn = $learn_m
					->where($learn_table.'.wid','=',$wid)
					->where($learn_table.'.path','=',$path)
					->select($learn_table.'.id', $learn_table.'.author_id', $learn_table.'.old_price', $learn_table.'.price', $learn_table.'.currency', $learn_table.'.started_at', $learn_table.'.finished_at')
					//	->groupBy($learn_table.'.id')
					->first();

		$return = '';

		return $this->replacer($text);

	}

	private function replacer($text = ''){
		$regex = '#\{{([A-Za-z_-]+)(::([0-9A-Za-zАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя _\.,-]+))?\}}#';
		if (is_array($text)){
			$func = 'replace_'.$text[1];
			return (method_exists(get_class($this),$func)) ? $this->$func((isset($text[3]))?$text[3]:null) : $text[0];
		}
		return preg_replace_callback($regex, array($this, 'replacer'), $text);
	}

	private function replace_author($anchor = null){
		$ac = new AuthorController;
		$author = '';
		if($author_id = $this->_learn->author_id) {
			if($anchor) $author .= '<h3 class="text-center before-glyphicon glyphicon-education">'.$anchor.'</h3>';
			$author .= $ac->showByAuthorId($this->_learn->author_id);
		}
		return $author;
	}

	private function replace_responses($anchor = null){
		$rc = new ResponseController;
		$responses = '';
		if($anchor) $responses .= '<h3 class="text-center before-glyphicon glyphicon-comment">'.$anchor.'</h3>';
		$responses .= $rc->showByLearnId($this->_learn->id);
		return $responses;
	}

	private function replace_pay($anchor = null){

		if(!$anchor) $anchor = 'Купить';

		$learn = $this->_learn;
		$return = '';

		if(!$this->_button) {
			$this->_button = true;
			$return .= '<br class="temp-correct"><div class="thumbnail"><div class="caption">';
			#if(($user = Auth::user()) && @$user->id===1 && @$learn->started_at) {
			#	$return .= '<small title="'.$learn->started_at.'">'.$this->humanDateFormat($learn->started_at).'</small>';
			#}
			if(@$learn->price && @$learn->old_price && $learn->old_price>0 && $learn->old_price>$learn->price) {
				$return .= '<strike class="old_price">'.$this->priceFormatHtml($learn->old_price,$learn->currency).'</strike>';
			}
			if($learn->price>0) $return .= $this->priceFormatHtml($learn->price,$learn->currency);
		}
		else {
			$return .= '<div class="thumbnail"><div class="caption">';
		}

		$return .= '<p class="-text-center">';
		if($user = Auth::user()){

			$order_m = new Order;
			$order_table = $order_m->getTable();
			$order = $order_m
						//->with('learn') ??
						->where($order_table.'.product_id','=',$learn->id)
						->where($order_table.'.email','=',$user->email)
						->select($order_table.'.id', $order_table.'.status')
						->first();
			#
			#
			#
			$btn_class = $user->id===1 ? "btn-danger" : "btn-default";
			#
			#
			#

			if($order) {
				if($order->status>0) $return .= '<a href="/i/order/'.$order->id.'" class="btn '.$btn_class.' btn-lg" role="button">Перейти к материалам';
				elseif($order->status==0) $return .= '<a href="/i/order/'.$order->id.'" class="btn '.$btn_class.' btn-lg" role="button">Статус заказа';
				elseif($order->status==-2) $return .= '<a href="/i/order/'.$order->id.'" class="btn '.$btn_class.' btn-lg" role="button">Продолжить покупку';
				else $return .= '<a class="btn '.$btn_class.' btn-lg" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">'.$anchor;
			}
			else $return .= '<a class="btn '.$btn_class.' btn-lg" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">'.$anchor;
		}
		else $return .= '<a class="btn btn-default btn-lg" role="button" data-toggle="modal" data-target="#payModal" href="#payModal">'.$anchor;
		$return .= '</a>';
		$return .= '</p>';

		$return .= '</div></div>';

		return $return;

	}

	public function priceFormatHtml($price = 0, $currency="RUB"){

		$cu = ['RUB'=>1,'USD'=>-1];

		$currency = (isset($cu[$currency])) ? $currency : "RUB";
		$c = $cu[$currency];

		if(is_null($price)) $price = 0;
		//$p = $price>0 ? $price/PRICE_CORRECT: $price;
		$p = $price;
		$i = intval($p);
		$r = round(($p-$i)*100);
		$r = ($r>0) ? '<sup class="costprice"><sub class="costdot">.</sub>'.(($r<10) ? "0".$r : $r).'</sup>' : '<sup class="costprice"></sup>';
		#$sign = '<span class="currency_sign sign_pos'.$c['sign_pos'].'">'.$c['sign'].'</span>';
		$return = '<span class="price currency-'.$currency.'" data-price="'.$p.'" data-currency="'.$currency.'">';
		#if($c<0) $return .= $sign;
		$return .= '<span class="intprice">'.number_format($i,0,"."," ").'</span>';
		$return .= $r;
		#if($c>0) $return .= $sign;
		$return .= '</span>';
		return $return;
	}

	public function humanDateFormat($date = null, $hi = 'span', $todayasword = true, $showyear = false){
		$time = $date ? strtotime($date) : time();
		$mos = array('01'=>'января','02'=>'февраля','03'=>'марта','04'=>'апреля','05'=>'мая','06'=>'июня','07'=>'июля','08'=>'августа','09'=>'сентября','10'=>'октября','11'=>'ноября','12'=>'декабря');
		$day = 1*date('d',$time);
		$month = date('m',$time);
		$monthname = $mos[$month];
		$year = date('Y',$time);
		$date = ($todayasword && $year.$month.$day === date("Ymd")) ? 'сегодня' : $day.' '.$monthname;
		if($year !== date("Y") || $showyear) $date .= ' '.$year . (($showyear) ? ' года' : '');
		return (($hi) ? ((is_string($hi)) ? $date.' <'.$hi.'>в '.date("H:i",$time).'</'.$hi.'>' : $date.' в '.date("H:i",$time)) : $date);

	}

	public function orderStatusText($status = 0){
		$statuses = [-6=>"Удалён",-5=>"Отказ оплаты",-4=>"Не оплачен",-3=>"Счёт отправляется",-2=>"Попытка оплаты онлайн",-1=>"Ожидает ответа платежной системы",0=>"Ждёт оплаты",1=>"Оплачен",2=>"Подтверждён"];
		return isset($statuses[$status]) ? $statuses[$status] : 'Неизвестный статус';
	}

	public function paymentTypeText($payment_type = null){
        $types = ["paypal" => "PayPal", "ya_ac" => "Банковская карта", "invoicing" => "Запрос счета", "transfer" => "Перевод", "robokassa" => "Робокасса", "sberbank" => "Сбербанк", "ya_pc" => "Я.Деньги", "ya_ka" => "Я.Касса"];
		return ($payment_type && isset($types[$payment_type])) ? $types[$payment_type] : 'Неизвестный тип оплаты';
	}

	/**
	 * Склоняем словоформу
	 * @ author runcore
	 */
	public function Morph($n, $f1, $f2, $f5) {
		$n = abs(intval($n)) % 100;
		if ($n>10 && $n<20) return $f5;
		$n = $n % 10;
		if ($n>1 && $n<5) return $f2;
		if ($n==1) return $f1;
		return $f5;
	}

	public function Num2Str($num) {
		$nul = 'ноль';
		$ten = [
			['','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'],
			['','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'],
		];
		$a20 = ['десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать'];
		$tens = [2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто'];
		$hundred = ['','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот'];
		$unit = [
			['копейка','копейки','копеек',1],
			['рубль','рубля','рублей',0],
			['тысяча'  ,'тысячи','тысяч',1],
			['миллион','миллиона','миллионов',0],
			['миллиард','милиарда','миллиардов',0],
		];
		//
		list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
		$out = [];
		if (intval($rub)>0) {
			foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
				if (!intval($v)) continue;
				$uk = sizeof($unit)-$uk-1; // unit key
				$gender = $unit[$uk][3];
				list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
				// mega-logic
				$out[] = $hundred[$i1]; # 1xx-9xx
				if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
				else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
				// units without rub & kop
				if ($uk>1) $out[]= $this->Morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
			} //foreach
		}
		else $out[] = $nul;
		$out[] = $this->Morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
		$out[] = $kop.' '.$this->Morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
		return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
	}

	public function CaseNum2Str($num){
		$Num2Str = ucwords($this->Num2Str($num));
		$CaseNum2Str = mb_convert_case($Num2Str, MB_CASE_TITLE, "UTF-8");
		return $CaseNum2Str;
	}

}