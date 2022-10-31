<?php
class Api{ 
	private $apiKey;
	
	private $apiUrl = 'https://www.alphavantage.co/query?'; 
	
	public function __construct($key)
	{
		$this->apiKey = $key;
	}
	
	public function getData($symbol)
	{
		$params = [
			'apikey' => $this->apiKey,      //ovo bi tribalo bit vani ali mi nije radilo 
			'symbol' => $symbol,
			'function' => 'TIME_SERIES_WEEKlY',
		];
		$url = $this->apiUrl.http_build_query($params);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$this->response = curl_exec($ch);
		
		return $this->response;
	}
}


?>