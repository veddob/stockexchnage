<?php

class ShowPage {
	
	public function __construct()
	{
		$database = AppCore::getDB();
		
		$query = 'SELECT * FROM `stock_data`'; //kupi podatke iz baze al za njega ni nemam model jer ne znan kako bi pravilno dovatila podatke iz baze pa san ovako
		$data = $database->sendQuery($query);  //na koji nacin je pravilno u MVC dohvcat podatke iz baze? jeli pravilno opet instancirat appcore?
		
		$rows = [];
		while($row = $data->fetch_array()) {
			$rows[] = $row;
		}
	
		$result = json_encode($rows);

		require __DIR__.'/../view/show.tpl.php';
	}
}
