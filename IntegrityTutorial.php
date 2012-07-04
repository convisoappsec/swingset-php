<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");	
	include("header.php");
?>

<h2 align="center">Tutorial</h2>

<p style="color:red">MODIFICAR ABAIXO</p>

Following methods from the ESAPI' Encryptor interface are used in the secure demo:
<ul>
<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#getRelativeTimeStamp(long)">getRelativeTimeStamp(long offset)</a></b> 
          Gets an absolute timestamp representing an offset from the current time to be used by other functions in the library.</li>
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#getTimeStamp()"> long getTimeStamp()</a></b> Gets a timestamp representing the current date and time to be used by other functions in the library.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#hash(java.lang.String, java.lang.String)">String hash(java.lang.String plaintext, java.lang.String salt) </a></b>
           Returns a string representation of the hash of the provided plaintext and salt.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#seal(java.lang.String, long)">String seal(java.lang.String data, long timestamp) </a></b>
           Creates a seal that binds a set of data and includes an expiration timestamp.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#sign(java.lang.String)">String sign(java.lang.String data) </a></b>
           Create a digital signature for the provided data and return it in a string.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#unseal(java.lang.String)">String unseal(java.lang.String seal) </a></b>
           Unseals data (created with the seal method) and throws an exception describing any of the various problems that could exist with a seal, such as an invalid seal format, expired timestamp, or decryption error.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#verifySeal(java.lang.String)">boolean verifySeal(java.lang.String seal) </a></b>
           Verifies a seal (created with the seal method) and throws an exception describing any of the various problems that could exist with a seal, such as an invalid seal format, expired timestamp, or data mismatch.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#verifySignature(java.lang.String, java.lang.String)">boolean verifySignature(java.lang.String signature, java.lang.String data)</a></b> 
           Verifies a digital signature (created with the sign method) and returns the boolean result.</li> 
</ul>

<h4>Create Seal</h4>
In the secure demo an integrity seal is created for the plain text entered by the user, the seal is set to be valid for 15 seconds by default.
<p class="newsItem">
<code>
$seal = ESAPI::getEncryptor -> seal( plaintext, $instance->getTimeStamp() + 1000 * (int)$timer );
</code>
</p>
<h4>Verify Seal:</h4>
The call to the following method will return true if the seal is verified within 15 seconds.
<p class="newsItem">
<code>
$verified = ESAPI::getEncryptor->verifySeal( $toVerify );
</code>
</p>
<h4>Unseal:</h4>
The call to the following method will unseal it back to the plain text if it is done within 15 seconds.
<p class="newsItem">
<code>
$plaintext = ESAPI::getEncrypto->unseal($sealed); 
</code>
</p>

<?php include("footer.php");  ?>