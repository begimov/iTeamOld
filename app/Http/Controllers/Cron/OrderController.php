<?php namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;
#use App\Models\User;
use App\Models\Order;
use Mail;

class OrderController extends Controller {

	/**
	 *
     * @return Response
	 */
	public function index()
	{
		
		$affix = '<br><br>Удачи и хорошего настроения!<hr>С уважением,<br>Марина Ступакова<br>Консалтинговая компания iTeam<br>Тел. +7 (499) 110-26-84<br><a href="https://iteam.ru">iTeam.ru</a>';
		
		#Mail::send('emails.auth.template', ['text'=>'Крон сработал '.date('d.m.Y H:i:s') . $affix], function ($m) {
		#	$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Крон-письмо');
		#});
			
		$orders = Order::with(['learn','user'])->where('status','<',1)->where('status','>',-5)->whereDate('created_at', '>', date( 'Y-m-d', time()-60*60*24*6 ))->get();
		$s = [];
		foreach($orders AS $order) {
			
			#Mail::raw($order->id.' |now:'.date('d.m.Y H:i:s').' |created:'.$order->created_at.' |totime:'.strtotime($order->created_at), function ($m) {
			#	$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Крон-письмо');
			#});
			
			$otime = strtotime($order->created_at);
			$uname = $order->user->firstname ? $order->user->firstname : ($order->user->name ? $order->user->name : $order->user->username);
			
			// исправление ошибок
			if($order->name || $order->phone || ($order->email !== $order->user->email)){
				if($order->name) $order->name = $uname;
				if($order->phone) $order->phone = $order->user->phone;
				if($order->email !== $order->user->email) $order->email = $order->user->email;
				$order->save();
			}
			
			if($order->payment_type === "invoicing"){ // запрос счёта
				if($otime>(time()-60*60*24*1-60*60*2) && $otime<=(time()-60*60*24*1)){ // сутки-2 часа / сутки
					//$s[] = $order->payment_type . ' #' . $order->id . ' / ' . $order->created_at . ' (сутки)';
					
					$mail['title'] = $uname . ', здравствуйте!';
					$mail['text'] = 'Вчера Вы сделали заказ материалов на тему <b>«'.$order->learn->title.'»</b>.<br>
Спасибо Вам за это!<br><br>
На Ваш адрес электронной почты выслан счет на оплату.<br>
<b>Пожалуйста, напишите мне, если Вы не получили счет.</b><br>
'.$uname.', сообщите мне, пожалуйста, когда пройдет оплата, я оперативно открою Вам доступ к материалам.' . $affix;
					
					$send = Mail::send('emails.auth.template', $mail, function ($m) use ($order) {
						$m->to($order->user->email, $order->user->username)->subject('iTeam: Напоминание об оплате');
					});
					if(!$send) Mail::raw($order->id.' '.date('d.m.Y H:i:s'), function ($m) {
						$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Ошибка крон-письма!');
					});
					
				}
				if($otime>(time()-60*60*24*3-60*60*2) && $otime<=(time()-60*60*24*3)){ // 3ое суток-2 часа / 3ое суток
					//$s[] = $order->payment_type . ' #' . $order->id . ' / ' . $order->created_at . ' (3ое суток)';
					
					$mail['title'] = $uname . ', здравствуйте!';
					$mail['text'] = 'Несколько дней назад Вы сделали заказ материалов на тему <b>«'.$order->learn->title.'»</b>.<br>
Однако пока оплата по счету от Вашей компании не пришла.<br>
Обратите внимание, что счет действителен в течение 5 дней.<br>
'.$uname.', если Вы уже оплатили счет, напишите мне, я оперативно открою Вам доступ к материалам.' . $affix;
					
					$send = Mail::send('emails.auth.template', $mail, function ($m) use ($order) {
						$m->to($order->user->email, $order->user->username)->subject('iTeam: Напоминание об оплате');
					});
					if(!$send) Mail::raw($order->id.' '.date('d.m.Y H:i:s'), function ($m) {
						$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Ошибка крон-письма!');
					});
				}
				if($otime>(time()-60*60*24*5-60*60*2) && $otime<=(time()-60*60*24*5)){ // 5ро суток-2 часа / 5ро суток
					//$s[] = $order->payment_type . ' #' . $order->id . ' / ' . $order->created_at . ' (5ро суток)';
					
					$mail['title'] = $uname . ', здравствуйте!';
					$mail['text'] = 'Пять дней назад Вы сделали заказ материалов на тему <b>«'.$order->learn->title.'»</b>.<br>
На данный момент Ваш заказ не оплачен.<br>
Счет на оплату Вы можете повторно получить по ссылке <a href="https://iteam.ru/i/order/'.$order->id.'">https://iteam.ru/i/order/'.$order->id.'</a> (для входа в Личный кабинет укажите этот Email и Ваш пароль).<br>
'.$uname.', если Вы передумали покупать видеокурс, напишите мне, пожалуйста. Я аннулирую Ваш заказ и не буду беспокоить Вас звонками и письмами.' . $affix;
					
					$send = Mail::send('emails.auth.template', $mail, function ($m) use ($order) {
						$m->to($order->user->email, $order->user->username)->subject('iTeam: Напоминание об оплате');
					});
					if(!$send) Mail::raw($order->id.' '.date('d.m.Y H:i:s'), function ($m) {
						$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Ошибка крон-письма!');
					});
				}
			}
			else { // другие способы оплаты
				if($otime>(time()-60*60*4) && $otime<=(time()-60*60*2)){ // 4 часа / 2 часа
					//$s[] = $order->payment_type . ' #' . $order->id . ' / ' . $order->created_at . ' (4 часа / 2 часа)';
					
					$mail['title'] = $uname . ', здравствуйте!';
					$mail['text'] = 'Пару часов назад Вы сделали заказ материалов на тему <b>«'.$order->learn->title.'»</b>.<br>
Спасибо Вам за это!<br><br>
Однако Ваш заказ остался не оплачен.<br>
Чтобы завершить заказ, пройдите по ссылке <a href="https://iteam.ru/i/order/'.$order->id.'">https://iteam.ru/i/order/'.$order->id.'</a> (для входа в Личный кабинет укажите этот Email и Ваш пароль).<br>
'.$uname.', если у Вас возникли какие-то технические проблемы, напишите или позвоните мне, пожалуйста. Мы их обязательно решим.' . $affix;
						
					$send = Mail::send('emails.auth.template', $mail, function ($m) use ($order) {
						$m->to($order->user->email, $order->user->username)->subject('iTeam: Напоминание об оплате');
					});
					if(!$send) Mail::raw($order->id.' '.date('d.m.Y H:i:s'), function ($m) {
						$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Ошибка крон-письма!');
					});
				}
				if($otime>(time()-60*60*24*2-60*60*2) && $otime<=(time()-60*60*24*2)){ // 2ое суток-3 час / 2ое суток
					//$s[] = $order->payment_type . ' #' . $order->id . ' / ' . $order->created_at . ' (2ое суток)';
					
					$mail['title'] = $uname . ', здравствуйте!';
					$mail['text'] = 'Два дня назад Вы сделали заказ материалов на тему <b>«'.$order->learn->title.'»</b>.<br>
На данный момент Ваш заказ не оплачен.<br>
Чтобы завершить заказ, пройдите по ссылке <a href="https://iteam.ru/i/order/'.$order->id.'">https://iteam.ru/i/order/'.$order->id.'</a> (для входа в Личный кабинет укажите этот Email и Ваш пароль).<br>
'.$uname.', если Вы передумали покупать видеокурс, напишите мне, пожалуйста. Я аннулирую Ваш заказ и не буду беспокоить Вас звонками и письмами.' . $affix;
				
					$send = Mail::send('emails.auth.template', $mail, function ($m) use ($order) {
						$m->to($order->user->email, $order->user->username)->subject('iTeam: Напоминание об оплате');
					});
					if(!$send) Mail::raw($order->id.' '.date('d.m.Y H:i:s'), function ($m) {
						$m->to('che.pr@ya.ru', 'Админу iTeam')->subject('Ошибка крон-письма!');
					});
				}				
			}
			
		}
		#dd($s);
	}


}