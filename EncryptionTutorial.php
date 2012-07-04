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

<h4>Background:</h4>
<p>The failure to encrypt data passes up the guarantees of confidentiality, integrity, and accountability that properly implemented encryption conveys.</p> 

<h4>Consequences:</h4> 
<ul>
<li>Confidentiality: Properly encrypted data channels ensure data confidentiality.</li> 
<li>Integrity: Properly encrypted data channels ensure data integrity.</li> 
<li>Accountability: Properly encrypted data channels ensure accountability.</li> 
</ul>
<h4>Risk:</h4>
<p>Omitting the use of encryption in any program which transfers data over a network of any kind should be considered on par with delivering the data sent to each user on the local networks of both the sender and receiver. 

<br />Worse, this omission allows for the injection of data into a stream of communication between two parties - with no means for the victims to separate valid data from invalid. 

<br /><br />In this day of widespread network attacks and password collection sniffers, it is an unnecessary risk to omit encryption from the design of any system which might benefit from it. 
</p>
<h4>Encryption using ESAPI:</h4>
<p>The Encryptor interface provides a set of methods for performing common encryption, random number, and hashing operations.</p>

<p>Following ESAPI encryption & decryption methods are used in the secure demo:</h4>
<ul>
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#decrypt(java.lang.String)">decrypt($ciphertext)</a></b> 
         <br /> Decrypts the provided ciphertext string (encrypted with the encrypt method) and returns a plaintext string.</li> 
 <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Encryptor.html#encrypt(java.lang.String)">encrypt($plaintext)</a></b> 
         <br /> Encrypts the provided plaintext and returns a ciphertext string.</li> 
</ul>
<p>Encryption & decryption using ESAPI's encryptor interface can be done as follows:</p>
<p class="newsItem">
<code>
	require_once dirname(__FILE__).'/src/ESAPI.php';</br>
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");</br>
	$ESAPI = new ESAPI();	</br>
	$encrypted = ESAPI::getEncryptor->encrypt( $decrypted );</br>
	$decrypted = ESAPI::getEncryptor()->decrypt( $encrypted );
</code>
</p>


<?php include("footer.php");  ?>