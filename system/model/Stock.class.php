<?php
class Stock{
	
	private const STOCKS=[ 
		'IBM',
		'TSLA',
		'DAX',
	];
	
	public static function getAll()
	{
		//return "SELECT * FROM 'company'";   //tribala bi ovde dohvatit
		return self::STOCKS;
	}
		
}

?>