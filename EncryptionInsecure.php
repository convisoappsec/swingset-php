<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");	
	include("header.php");

	$encrypted = "";
	$decrypted = "Encrypt me right now";
	if( ($rvar_decrypted != null) && ($rvar_encrypted != null) ){
		$encrypted = $rvar_encrypted;
		$decrypted = $rvar_decrypted;
	}
?>

<hr><br><h2>Exercise: do something</h2>

<hr><br><h2>Encrypt and Decrypt</h2>
<table width="100%" border="1"><tr><th width="50%">Enter something to encrypt</th><th>Enter something to decrypt</th></tr>
<tr><td><form action="EncryptionInsecure.php?function=Encryption&mode=insecure" method="POST">
<textarea style="width:400px; height:150px" name="decrypted"><?=$decrypted ?></textarea><input type="submit" value="encrypt"><br></form></td>
<td><form action="EncryptionSecure.php?function=Encryption&mode=secure" method="POST">
<textarea style="width:400px; height:150px" name="encrypted"><?=$encrypted ?></textarea><input type="submit" value="decrypt"><br></form></td>			</tr></table>

<?php include("footer.php");  ?>