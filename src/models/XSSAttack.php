<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 5, 2010
*/

require_once dirname(__FILE__).'/src/reference/ArrayList.php';

class XSSAttack{	
	private $comment = null;
	private $examples = null;
	
	   /**
     * prevent instantiation of this class
     */
    public function __construct($comment = "") {
    	$this->comment = $comment;
    	$this->examples = new ArrayList(array());
    }
    
    public function getComment() {
		return $this->comment;
	}
	
	public function addExample($example){
		$this->examples->add($example);
	}
	
	public function getExamples(){
		return $this->examples;
	}
}


?>
