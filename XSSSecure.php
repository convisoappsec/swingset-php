<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 4, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");
	
	if ( $rvar_type == null ) $rvar_type = "SafeString";
	if ( $rvar_input == null ) $rvar_input = "type input here";
		
	require_once dirname(__FILE__).'/src/reference/ArrayList.php';
	require_once dirname(__FILE__).'/src/models/XSSRule.php';

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();

	$encoder = ESAPI::getEncoder();
	$validator = ESAPI::getValidator();
	
	try{
		$canonical = $encoder->canonicalize($rvar_input);
		$validator->getValidInput("Swingset Validation Secure Exercise",$rvar_input,$rvar_type,200,false);
	}catch( ValidationException $v ) {
		$rvar_input="Validation attack detected";
		$userMessage = $v->getUserMessage();
		$logMessage= $v->getLogMessage();
	}catch( IntrusionException $e ) {
		$rvar_input="double encoding attack detected";
		$userMessage = $e->getUserMessage();
		$logMessage = $e->getLogMessage();
	}
?>

<h2 align="center">Excercise</h2>
<h4>Enter a Type/Regex and Invalid Data</h4>

<form action=\"XSSSecure.php?function=ValidateUserInput&&mode=secure" method="POST">
Type/Regex: <input name="type" value="<?=$encoder -> encodeForHTMLAttribute($rvar_type)?>"\><br>
<textarea style="width:400px; height:150px" name="input">
<?= $encoder -> encodeForHTML($rvar_input)?>
</textarea><br>
<input type="submit" value="submit">
</form>

<p>Canonical output:<?=$encoder -> encodeForHTML($rvar_canonical)?></p>



<hr>
<?
	if ( $userMessage != null || $logMessage != null) {
?>

<p>User Message: <font color="red">
<?= $encoder->encodeForHTML($userMessage)?>
</font></p>
<p>Log Message: <font color="red">");
<?= $encoder ->encodeForHTML($logMessage)?>
</font></p><hr>
<?
	}
?>
<p><center><a href="http://www.owasp.org/index.php/ESAPI">OWASP Enterprise Security API Project</a> (c) 2008</center></p>
<!--  <span id=\"copyright\">Design by <a href=\"http://www.sitecreative.net\" target=\"_blank\" title=\"Opens link to SiteCreative.net in a New Window\">SiteCreative</a></span> -->
</div> <!-- end holder div -->
</div> <!-- end container div -->
</body>
</html>




<?php include("footer.php");  ?>