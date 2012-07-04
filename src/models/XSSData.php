<?php

/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 5, 2010
*/

require_once dirname(__FILE__).'/src/reference/ArrayList.php';

class XSSData {
	private $allRules = "";

	/**
	 * prevent instantiation of this class
     */
    public function __construct() {
    	$this->allRules = new ArrayList(array());
    } 
    
  

	public function getRulesForSecure() {
		$ret = new ArrayList(array());

		foreach ($this->allRules as $rule ) {     
			if($rule->isShowSecure())
				$ret->add($rule);
		}
		return $ret;
	}

	public function getRulesForInsecure() {
		$ret = new ArrayList(array());

		foreach ($this->allRules as $rule )  {
			if ($rule->isShowInsecure()) {
				$ret->add($rule);
			}
		}
		return $ret;
	}
}
?>
