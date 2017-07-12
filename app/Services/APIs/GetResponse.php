<?php namespace App\Services\APIs;

class GetResponse  {

	protected $api_key;
	/**

	*/
	public function __construct($api_key = null)
	{
		$this->api_key = ($api_key) ? $api_key : config('getresponse.api_key');
	}
	/**

	*/
	public function api($route = null, $param = [])
	{
		
		$out = false;
		
		$route = ($route) ? $route : false;
		$param = ($param && is_array($param)) ? (isset($param[0]) ? $param[0] : $param) : [];
		if(isset($param['_method']) && ($param['_method']==='POST' || $param['_method']==='DELETE')){
			$method = $param['_method'];
			unset($param['_method']);
		}
		else {
			$method = 'GET';
		}
		$param = ($param) ? urldecode(http_build_query($param)) : false;
		
		$X_Auth_Token = 'X-Auth-Token: api-key '. $this->api_key;
		$ch_headers = array($X_Auth_Token);
		$ch_url = 'https://api.getresponse.com/v3/';
		
		if( $route && $ch = curl_init() ) {
			
			if( $method !== 'POST' &&  $method !== 'DELETE' ) {
				$route .= ($param) ? '?'.$param : '';
			}
			
			curl_setopt($ch, CURLOPT_URL, $ch_url.$route);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $ch_headers );
			
			if(  $method === 'POST' ) {
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $param);	
			}
			elseif( $method === 'DELETE' ) {
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			}
			
			$out = curl_exec($ch);
			$out = json_decode($out);
			
			curl_close($ch);
		}
		
		return $out;
	}
	
	public static function route($route = '', $param = [])
	{
		$gr = new self();
		return $gr->api($route, $param);
	}
	
	public function __call($route = '', $param = [])
	{
		return $this->api($route, $param);
	}
	
	public static function __callStatic($route = '', $param = [])
	{
		return self::route($route, $param);
	}

}