<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Jan 28, 2010
*/

	import_request_variables("gp", "rvar_");
	include("header.php");

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();
	

	if ( $rvar_name == null || $rvar_name == ""){
	 	 $rvar_name = "anonymous";
	}
	
	$encoder = ESAPI::getEncoder();
	$encoderHtml = $encoder -> encodeForHTML($rvar_name);
	$enconderHhtmlAttribute = $encoder -> encodeForHTMLAttribute($rvar_name);


?>

<h2>Exercise: Enter Malicious Input</h2>

<form action="OutputUserInputSecure.php?function=OutputUserInput&mode=secure" method="POST">
    <p>Enter your name:</p>
    <input name='name' value='<?=$enconderHhtmlAttribute?>'>
    <input type='submit' value='submit'>
</form>

<p>Hello, <?=$encoderHtml ?></p>

<code>


<?
	$encodedName = $encoder -> encodeForHTML($rvar_name);
	$encodedName = str_replace("&", "&amp;",$encodedName);

?>
Source:
<?=$encodedName ?>

</code>


<?php include("footer.php");  ?>