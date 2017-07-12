<?php namespace App\Http\Controllers\Admin;

#use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\APIs\GetResponse AS GetResponse;

use App\Models\GetResponse\Campaign AS Campaign;
use App\Models\GetResponse\Contact AS Contact;
use App\Models\GetResponse\Form AS Form;

class GRController extends Controller {

	/**
	 *
     * @return Response
	 */
	public function index(Request $request)
	{
		/*
		//from-fields
		campaigns

		contacts
		webforms
		forms
		*/
		$out = [];
		$save = false;
		
		$out = GetResponse::route('campaigns/VjVkP/contacts?query[email]=irstarodubets@yandex.ru');
		dd($out);

		/*
		$campaigns = GetResponse::route('campaigns');

		foreach($campaigns AS $camp){
			$campaign = (array)$camp;
			unset($campaign['href']);
			$campaign['isDefault'] = ($campaign['isDefault']==="false") ? 0 : 1;
			$campaign['created_at'] = date('Y-m-d H:i:s',strtotime($campaign['createdOn']));
			$new = new Campaign;
			foreach($campaign AS $key=>$value){
				$new->$key = $value;
			}
			$save = $new->save();
			$out[] = $new->id . ' ' . $new->name . ' ' . $save;
		}
		*/
		
		/*
		$forms = GetResponse::route('forms');
		foreach($forms AS $f){
			$form = (array)$f;
			unset($form['href']);
			
			if(isset($form['campaign'])) {
				$form['campaignId'] = $form['campaign']->campaignId;
				unset($form['campaign']);
			}
			
			if(isset($form['statistics'])) {
				$statistics = (array)$form['statistics'];
				if(isset($statistics['visitors'])) $form['statistics_visitors'] = $statistics['visitors'];
				if(isset($statistics['uniqueVisitors'])) $form['statistics_uniqueVisitors'] = $statistics['uniqueVisitors'];
				if(isset($statistics['opened'])) $form['statistics_opened'] = $statistics['opened'];
				if(isset($statistics['subscribed'])) $form['statistics_subscribed'] = $statistics['subscribed'];
				unset($form['statistics']);
			}
			
			if(isset($form['hasVariants'])) $form['hasVariants'] = ($form['hasVariants']==="false") ? 0 : 1;
			if(isset($form['createdOn'])) $form['created_at'] = date('Y-m-d H:i:s',strtotime($form['createdOn']));
			if(isset($form['modifiedOn'])) {
				$form['createdOn'] = $form['modifiedOn'];
				$form['created_at'] = date('Y-m-d H:i:s',strtotime($form['modifiedOn']));
			}
			$new = new Form;
			foreach($form AS $key=>$value){
				$new->$key = $value;
			}
			$save = $new->save();
			$out[] = $new->id . ' ' . $new->name . ' ' . $save;
		}
		*/
		
		/*
		$page = $request->input('page') ? $request->input('page') : 1;

		$contacts = GetResponse::route('contacts',['perPage'=>100,'page'=>$page]);
		if($contacts){
			foreach($contacts AS $c){
				$contact = (array)$c;
				unset($contact['href']);
				unset($contact['activities']);
				if(is_null($contact['note'])) $contact['note'] = '';
				if(is_null($contact['dayOfCycle'])) unset($contact['dayOfCycle']);
				if(is_null($contact['scoring'])) unset($contact['scoring']);
				$contact['created_at'] = date('Y-m-d H:i:s',strtotime($contact['createdOn']));
				if(isset($contact['campaign'])) {
					$contact['campaignId'] = $contact['campaign']->campaignId;
					unset($contact['campaign']);
				}
				
				$old = Contact::where('contactId','=',$contact['contactId'])->first();
				
				if(!$old){
					$new = new Contact;
					foreach($contact AS $key=>$value){
						$new->$key = $value;
					}
					
					$save = $new->save();
					
					$out[] = $new->id . ' ' . $new->name . ' ' . $save;
				}
				else $save = 1;

			}
			
			$page = $page+1;
			return redirect()->to($request->path() . '?page='. $page, 301);
			
		}
		else return 'STOP!';
		
		*/
		
		#$contacts = GetResponse::route('contacts',['query'=>['email'=>'slava.trunow@gmail.com','origin'=>'www,api']]);
		#$out = $contacts;
		dd($out);
		

		#dd(GetResponse::route('forms'));
		#dd(GetResponse::route('contacts/5qsQw8',['_method'=>'DELETE']));
		#dd(GetResponse::contacts(['query'=>['email'=>'truno']])[0]);
	}
	
}