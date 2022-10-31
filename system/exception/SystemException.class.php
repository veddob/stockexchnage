<?php
class SystemException extends \Exception{
	public function show(){
		return sprintf("Dogodila se greška '%s' u fileu '%s', linija '%s'. stacktrace: '%s'",
			$this->getMessage(),
			$this->getFile(),
			$this->getLine(),
			$this->getTraceAsString()
		);
		
		
		
	}
}

?>