<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 5, 2010
*/

require_once (dirname(__FILE__).'/').'../reference/ArrayList.php';


class XSSRule {
	private $ruleTitle = "";
	private $ruleURL = "";
	private $contexts = null;
	private $showInsecure = true;
	private $showSecure = true;
	private $encoder = "";
	private $encoderText = "";
	
	public function __construct($title, $url) {
		$this->setRuleTitle($title);
		$this->setRuleURL($url);
		$this->contexts = new ArrayList();
	}
	
	public function getContexts() {
		return clone $this->contexts;
	}
	
	/**
	 * $newContext = XSSContext;
	 */
	public function addContext($newContext) {
		$this->contexts->add($newContext);
	}
	
	public function setRuleTitle($ruleTitle) {
		$this->ruleTitle = $ruleTitle;
	}

	public function getRuleTitle() {
		return $this->ruleTitle;
	}

	public function setRuleURL($ruleURL) {
		$this->ruleURL = $ruleURL;
	}

	public function getRuleURL() {
		return $this->ruleURL;
	}
	
	public function setShowSecure($show) {
		$this->showSecure = $show;
	}
	
	public function setShowInsecure($show) {
		$this->showInsecure = $show;
	}
	
	public function isShowSecure() {
		return $this->showSecure;
	}
	
	public function isShowInsecure() {
		return $this->showInsecure;
	}
	
	public function setEncoder($newEncoder) {
		$this->encoder = $newEncoder;
	}
	
	public function encodeForRule($input){ //throws SecurityException, NoSuchMethodException, IllegalArgumentException, IllegalAccessException, InvocationTargetException {
		$instance = ESAPI::getEncoder();
		$class_methods = get_class_methods(get_class($instance));		
			
		if ( in_array( $encoder, get_class_methods(get_class($instance) ) ) ) {
			return $instance->$encoder($input);
		}	
		
	}

	public function setEncoderText($encoderText) {
		$this->encoderText = $encoderText;
	}

	public function getEncoderText() {
		return $this->encoderText;
	}
}

?>
