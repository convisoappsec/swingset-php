<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 02, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");

	if ( $rvar_type == null ) $rvar_type = "SafeString";
	if ( $rvar_input == null ) $rvar_input = "type input here";
	
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


<h2 align="center">Exercise</h2>
<h4>Enter a Type/Regex and Invalid Data</h4>

<form action="ValidateUserInputSecure.php?function=ValidateUserInput&mode=secure" method="POST">
	Type/Regex: <input name="type" value="<?=$encoder->encodeForHTMLAttribute($rvar_type)?>"><br>
	<textarea style="width:400px; height:150px" name="input"><?=$encoder-> encodeForHTML($rvar_input)?></textarea><br>
	<input type="submit" value="submit">
</form>

<p>Canonical output: <?=$encoder->encodeForHTML($canonical) ?></p>




<?php include("footer.php");  ?>