<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");	
	include("header.php");
	
	$timer = "15";
	if($rvar_timer != null) $timer = $rvar_timer;
	if($rvar_verified != null) $verified = $rvar_verified;
	if($rvar_sealed != null) $sealed = $rvar_sealed;
	if($rvar_sealToVerify != null) $sealToVerify = $rvar_sealToVerify;
	if($rvar_unsealed != null) $unsealed = $rvar_unsealed; 

?>

<h2>Enter Malicious Data to Seal</h2>
<table width="100%" border="1">
<form action="IntegritySecure.php?function=Integrity&mode=secure" method="POST">
<tr>
	<th width="50%">Enter something to seal</th>
</tr>
<tr>
	<td><textarea style="width:750px; height:50px" name="unsealed"><?=$unsealed ?></textarea><br />Seal will be valid for: <input type="text" size="5" maxlength="7" name="timer" value="<?=timer ?>"> seconds.
	<input type="submit" value="seal"></td>
</tr>
</form>
<form action="IntegritySecure.php?function=Integrity&mode=secure&unseal" method="POST">
<th>This is the sealed text</th>
<tr>
	<td><textarea style="width:750px; height:50px" name="sealed"><?=$sealed ?></textarea><br />
	<input type="submit" value="unseal"></td>
</tr>
</form>
<form action="IntegritySecure.php?function=Integrity&mode=secure" method="POST">
<tr>
	<th>Seal to verify</th>
</tr>
<tr>
	<td><textarea style="width:750px; height:50px" name="sealToVerify"><?=$sealToVerify ?></textarea><br />
	<input type="submit" value="verify"></td>
</tr>
<th>Result of Seal Verification</th>
<tr>
	<td>Verification: <?=$verified ?> </td>
</tr>
<br>
</form>
</table>




<?php include("footer.php");  ?>