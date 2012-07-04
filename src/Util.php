<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
class Util{
	
	public function __construct(){
	 	
	}
	public function current_millis() {
	    list($usec, $sec) = explode(" ", microtime());
	    return round(((float)$usec + (float)$sec) * 1000);
	}
	
	
}
?>
