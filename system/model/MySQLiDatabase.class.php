<?php

class MySQLiDatabase
{
	protected $MySQLi;
	protected $host;
	protected $user;
	protected $password;
	protected $database;
	
	public function __construct($host, $user, $password, $database)
	{
		require __DIR__.'/../exception/DatabaseException.class.php';
		$this->host = $host;
		$this->password = $password;
		$this->user = $user;
		$this->database = $database;
		
		$this->connect();
	}
	
	public function sendQuery($query)
	{
		$result = $this->MySQLi->query($query);
		if (false === $result){
			throw new DatabaseException();
		}
		return $result;
	}
	
	public function selectDatabase()
	{
		if($this->MySqli->select_db($this->database)===false){
			throw new DataBaseException("Cannot use database".$this->database,$this);
		}
	}
	
	private function connect()
	{
		$this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->database);
		if (mysqli_connect_errno()) {
			throw new DatabaseException();
		}
	}
	
}

?>