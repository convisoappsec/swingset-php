<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 2, 2010
*/
require_once dirname ( __FILE__ ) . '/Codec.php';
require_once dirname ( __FILE__ ) . '/../ESAPI.php';
require_once dirname ( __FILE__ ) . '/../StringBuilder.php';

/**
 * Implementation of the Codec interface for LDAP encoding.
 * 
 * @author
 * @since 1.4
 * @see org.owasp.esapi.Encoder
 */
class LDAPCodec extends Codec{
	
	
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
    	for($i=0;$i<strlen($input);$i++){
    		$c = substr($input,$i,1);
   		
    		switch ( $c ) {
				case "\\":
					$this->sb->append("\\5c");
					break;
				case "*":
					$this->sb->append("\\2a");
					break;
				case "(":
					$this->sb->append("\\28");
					break;
				case ")":
					$this->sb->append("\\29");
					break;
				case "\0":
					$this->sb->append("\\00");
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
