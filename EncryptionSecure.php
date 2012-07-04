<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");	
	include("header.php");
	
	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();
	
	$enc = ESAPI::getEncryptor();
	
	
	
	if ( $rvar_encrypted != null ) {
		try {
			$decrypted = $enc->getCrypto(Encryptor::ESAPI_CRYPTO_OP_DECRYPT_ASCII_HEX, $rvar_encrypted );
			$encrypted = "";
		} catch( EnterpriseSecurityException $e ) {
			$decrypted = $e->getLogMessage();
		}
	} else if ( $rvar_decrypted != null ) {
		try {
			$encrypted = $enc->getCrypto(Encryptor::ESAPI_CRYPTO_OP_ENCRYPT_ASCII_HEX, $rvar_decrypted );
			$decrypted = "";
		} catch( EnterpriseSecurityException $e ) {
			$encrypted = $e->getLogMessage();
		}			
	} else {
		$decrypted = "Encrypt me right now";
		$encrypted = null;
	}

	if( ($rvar_decrypted != null) && ($rvar_encrypted != null) ){
		$encrypted = $rvar_encrypted;
		$decrypted = $rvar_decrypted;
	}
?>

<hr><br><h2>Exercise: do something</h2>

<hr><br><h2>Encrypt and Decrypt</h2>
<table width="100%" border="1"><tr><th width="50%">Enter something to encrypt</th><th>Enter something to decrypt</th></tr>
<tr><td><form action="EncryptionSecure.php?function=Encryption&mode=secure" method="POST">
<textarea style="width:350px; height:150px" name="decrypted"><?=$decrypted ?></textarea><input type="submit" value="encrypt"><br></form></td>
<td><form action="EncryptionSecure.php?function=Encryption&mode=secure" method="POST">
<textarea style="width:350px; height:150px" name="encrypted"><?=$encrypted ?></textarea><input type="submit" value="decrypt"><br></form></td></tr></table>

<?php include("footer.php");  ?>