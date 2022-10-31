<?php
require 'core.functions.php';
class AppCore{
	
	protected static $dbObj;
	
	public function __construct(){
		
		self::$dbObj=$this->initDB();
		$this->initOptions();
		require 'util/RequestHandler.class.php';
		RequestHandler::handle(); 
	}
	public function handleException(\Throwable $e){
		$e->show();
	}
	public static final function getDB(){
		
		return self::$dbObj;
		
	}
	
	public static function getApiKey()
	{
		require 'config.inc.php';
		return $apiKey;
	}
	
	private function initDB(){
		require 'config.inc.php';
		require 'model/MySQLiDatabase.class.php';
		return new MySQLiDatabase($host, $user, $password, $database); 
	}
	
	private function initOptions(){
		require 'system/options.inc.php';
	}
}




?>