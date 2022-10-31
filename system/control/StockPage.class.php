<?php

class StockPage
{
	public function __construct()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->post();
		} else {
			$this->get();
		}
	}
	
	public function get()
	{
		require __DIR__.'/../model/Stock.class.php';
		$stocks = Stock::getAll(); 
		$data = json_encode($stocks);
		/*
		$database = AppCore::getDB();
		
		$result = $database->sendQuery($stock::getAll());
		
		$rows = [];
		while($row = $result->fetch_array()) {
			$rows[] = $row;
		}
	
		$data = json_encode($rows);
		*/
		require __DIR__.'/../view/stock.tpl.php'; //stavljala san u template ispise da ih neman u klasi 
	}
	
	public function post()
	{
		print 'dodavanje dionica nije podrzano'; 
	}
	
}
