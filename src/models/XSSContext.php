<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 5, 2010
*/
require_once dirname(__FILE__).'/src/reference/ArrayList.php';

class XSSContext {
	private $contextCode = null;
	private $comment = null;
	private $vulnerableForm = null;
	private $input = null;
	private $attacks = null;
	
	/**
	 * prevent instantiation of this class
     */
    public function __construct($comment = "") {
    	$this->comment = $comment;
    	$this->attacks = new ArrayList(array());
    } 
    
    public function addAttack($attack) {
		$this->attacks->add($attack);
	}
	
	public function getAttacks() {
		return clone $this->attacks;
	}
	
	public function getFormPart($part) {		
		$parts = preg_split("\\?\\?",-1,PREG_SPLIT_NO_EMPTY);
		return $parts[$part];
	}
	
	public function getInputEncodedForHTMLAttribute() {

		require_once dirname(__FILE__).'/src/ESAPI.php';
		$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
		$ESAPI = new ESAPI();		
		$encoder = ESAPI::getEncoder();
				
		return $encoder->encodeForHTMLAttribute($input);
	}	
	
		// GETTERS AND SETTERS
	
	public function setInput($input) {
		$this->input = $input;
	}
	
	public function getInput() {
		return input;
	}

	public function setComment($comment) {
		$this->comment = $comment;
	}

	public function getComment() {
		return comment;
	}

	public function setContextCode($versionCode) {
		$this->contextCode = $versionCode;
	}

	public function getContextCode() {
		return contextCode;
	}
	
	public function setVulnerableForm($vulnerableForm) {
		$this->vulnerableForm = $vulnerableForm;
	}
	
	public function getVulnerableForm() {
		return vulnerableForm;
	}
	
}

?>
