<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 3, 2010
*/
	import_request_variables("gp", "rvar_");	
	include("header.php");
	if($rvar_input == null) $rvar_input = "%2&#x35;2%3525&#x32;\\u0036lt;\r\n\r\n%&#x%%%3333\\u0033;&%23101;";
	
	require_once dirname(__FILE__).'/src/codecs/PercentCodec.php';
	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();
	
	$pc = new PercentCodec();
	$encode = ESAPI::getEncoder();
	
	try{
		$canonical = $encode->canonicalize($rvar_input);
	} catch( IntrusionException $e ) {
		$userMessage = $e->getUserMessage();
		$logMessage = $e->getLogMessage();
	}	
			
?>

<h2 align="center">Exercise</h2>
<h4>Enter encoded data</h4>

<form action="CanonicalizeSecure.php?function=Canonicalize&mode=secure" method="POST">
	<table>
	<tr><td>Original</td><td>Decoded</td></tr>
	<tr><td>
		<textarea style="width:300px; height:150px" name="input"><?=$encode->encodeForHTML($rvar_input)?></textarea>
	</td><td>
		<textarea style="width:300px; height:150px"><?=$encode->encodeForHTML($canonical)?></textarea>
	</td></tr></table>
	<input type="submit" value="submit">
</form>
<p>User Message: <font color="red"><?=$encode->encodeForHTML($userMessage) ?></font></p>
<p>Log Message: <font color="red"><?=$encode->encodeForHTML($logMessage) ?></font></p><hr>
<p>
<h2 align="center">Quick Reference</h2>

<table border=0 width="100?">
<tr align="center">
<td bgcolor="yellow">int</td><td>hex</td><td>char</td><td bgcolor="black">&nbsp;</td>
<td bgcolor="yellow">int</td><td>hex</td><td>char</td><td bgcolor="black">&nbsp;</td>
<td bgcolor="yellow">int</td><td>hex</td><td>char</td><td bgcolor="black">&nbsp;</td>
<td bgcolor="yellow">int</td><td>hex</td><td>char</td>
<?
for( $i=1; $i<65; $i++ ) {
	$value = $i;
	$charValue = chr($value);
	$toHex = $pc->toHex($charValue);
	
?>
<tr align="center">
<td bgcolor="yellow"><?=$charValue?></td>
<td><?=$toHex?></td>
<td><?=$charValue ?></td>
<td bgcolor="black">&nbsp;</td>

<?
	$value= $value + 64;
	$charValue = chr($value);
	$toHex = $pc->toHex($charValue);
?>
<td bgcolor="yellow"><?=$charValue?></td>
<td><?=$toHex?></td>
<td><?=$charValue ?></td>
<td bgcolor="black">&nbsp;</td>

<?
	$value=$value + 64;
	$charValue = chr($value);
	$toHex = $pc->toHex($charValue);
?>
<td bgcolor="yellow"><?=$charValue?></td>
<td><?=$toHex?></td>
<td><?=$charValue ?></td>
<td bgcolor="black">&nbsp;</td>

<?
	$value=$value + 64;
	$charValue = chr($value);
	$toHex = $pc->toHex($charValue);
?>
<td bgcolor="yellow"><?=$charValue?></td>
<td><?=$toHex?></td>
<td><?=$charValue ?></td>
</tr>
<?
}
?>
</table>

<?php include("footer.php");  ?>