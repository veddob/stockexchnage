<?php

class UpdatePage {
	
	public function __construct()
	{
		require __DIR__.'/../model/Api.class.php';
		require __DIR__.'/../model/Stock.class.php';
		$key = AppCore::getApiKey(); //ovo san dovatila priko appcore da ne ucitavan ponovo 
		$api = new Api($key);
		$stocks = Stock::getAll();
		
		$database = AppCore::getDB();
		foreach ($stocks as $stock) {
			
			$data = json_decode($api->getData($stock), true);
			foreach ($data as $key => $value) {
				if ('Time Series (Daily)' !== $key) {
					continue;
				}
				foreach ($value as $date => $row) {
					$query = sprintf("INSERT INTO `stock_data` (`name`, `date`, `open`, `close`, `high`, `low`, `volume`) 
						VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s');",
						$stock,
						$date,
						$row['1. open'], //brojevi su ovako naopako jer mi tako api vraca
						$row['4. close'],
						$row['2. high'],
						$row['3. low'],
						$row['5. volume']
					);
					
					$database->sendQuery($query);
				}
			}
		}
	}
}
