<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio Andr (mishida@conviso.com.br)
* Created on Feb 2, 2010
*/
require_once dirname ( __FILE__ ) . '/Codec.php';
require_once dirname ( __FILE__ ) . '/../ESAPI.php';
require_once dirname ( __FILE__ ) . '/../StringBuilder.php';

/**
 * Implementation of the Codec interface for DN encoding.
 * 
 * @author
 * @since 1.4
 * @see org.owasp.esapi.Encoder
 */
class DNCodec extends Codec{
	
	
	private $sb = null;
	
    /**
     * Public Constructor 
     */
    function __construct()
    {
    	parent::__construct();
    } 
	
	public function encode($immune, $input)
    {
    	$this->sb = new StringBuilder();
    	
    	if(strlen($input) > 0 && ((substr($input,0,1) == ' ') || (substr($input,0,1) == '#'))){
    		$this->sb->append("\\");    		
    	}
    	    	
    	for($i=0;$i<strlen($input);$i++){
    		$c = substr($input,$i,1);
    		switch ( $c ) {
				case "\\":
					$this->sb->append("\\\\");
					break;
				case ",":
					$this->sb->append("\\,");
					break;
				case "+":
					$this->sb->append("\\+");
					break;
				case "\"":
					$this->sb->append("\\\"");
					break;
				case "<":
					$this->sb->append("\\<");
					break;
				case ">":
					$this->sb->append("\\>");
					break;
				case ";":
					$this->sb->append("\\;");
					break;
				default:
					$this->sb->append($c);
					break;
			}
    	}
    	    	
    	return $this->sb->toString();
    }	
}

?>
