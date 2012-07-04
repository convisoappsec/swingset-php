<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 2, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");
	
	if ( $rvar_input == null ) $rvar_input = "encode 'this' <b>string</b> null \0 byte";

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();
	
	$encode = ESAPI::getEncoder();
	
	require_once dirname(__FILE__).'/src/codecs/OracleCodec.php';
	$oracle = new OracleCodec();
	
	
	require_once dirname(__FILE__).'/src/codecs/MySQLCodec.php';
	$mysqlansi = new MySQLCodec(MySQLCodec::MYSQL_ANSI);
	$mysql = new MySQLCodec(MySQLCodec::MYSQL_STD);

?>
<hr><br><h2>Exercise: Enter input destined for an interpreter</h2>

<form action="EncodingSecure.php?function=Encoding&mode=secure" method="POST">
	Enter whatever input you want</br>
	<textarea style="width:400px; height:150px" name="input"><?=$rvar_input ?></textarea><br>
	<input type="submit" value="submit">
</form>

<table border="1">
<tr><th>Input</th><th>Encoded output</th></tr>
<tr><td>Unencoded</td><td><p><pre><?=$rvar_input ?></pre></td></tr>
<tr><td>HTML Body (encodeForHTML)</td><td><p><pre><?= $encode -> encodeForHTML($rvar_input);?></pre></p></td></tr>
<tr><td>HTML Attribute (encodeForHTMLAttribute)</td><td><p><pre><?=$encode -> encodeForHTMLAttribute($rvar_input) ?></pre></p></td></tr>
<tr><td>Javascript (encodeForJavascript)</td><td><p><pre><?=$encode -> encodeForJavaScript($rvar_input) ?></pre></p></td></tr>
<tr><td>VBScript (encodeForVBScript)</td><td><p><pre><?=$encode -> encodeForVBScript($rvar_input) ?></pre></p></td></tr>
<tr><td>CSS (encodeForCSS)</td><td><p><pre><?=$encode -> encodeForCSS($rvar_input) ?></pre></p></td></tr>
<tr><td>URL (encodeForURL)</td><td><p><pre><?=$encode -> encodeForURL($rvar_input) ?></pre></p></td></tr>
<tr><td>Base 64 (encodeForBase64)</td><td><p><pre><?=$encode -> encodeForBase64($rvar_input, false) ?></pre></p></td></tr>
<tr><td>LDAP (encodeForLDAP)</td><td><p><pre><?=$encode -> encodeForLDAP($rvar_input) ?></pre></p></td></tr>
<tr><td>Oracle (encodeForSQL) - discouraged use PreparedStatement</td><td><p><pre><?=$encode -> encodeForSQL($oracle, $rvar_input) ?></pre></p></td></tr>
<tr><td>MySQL (encodeForSQL) - discouraged use PreparedStatement</td><td><p><pre><?=$encode -> encodeForSQL($mysql, $rvar_input) ?></pre></p></td></tr>
<tr><td>MySQLAnsi (encodeForSQL) - discouraged use PreparedStatement</td><td><p><pre><?=$encode -> encodeForSQL($mysqlansi, $rvar_input) ?></pre></p></td></tr>
<tr><td>XML (encodeForXML)</td><td><p><pre><?=$encode -> encodeForXML($rvar_input) ?></pre></p></td></tr>
<tr><td>XML Attribute (encodeForXMLAttribute)</td><td><p><pre><?=$encode -> encodeForXMLAttribute($rvar_input) ?></pre></p></td></tr>
<tr><td>LDAP Distinguished Name (encodeForDN)</td><td><p><pre><?=$encode -> encodeForDN($rvar_input) ?></pre></p></td></tr>
<tr><td>XPath Query (encodeForXPath)</td><td><p><pre><?=$encode -> encodeForXPath($rvar_input) ?></pre></p></td></tr>
</table>


<h2>Quick Reference</h2>

<p>Important: The characters below are what is produced by the ESAPI codecs. These
represent the most standard ways of encoding for the listed interpreters. However,
there are many other <i>legal</i> encoding formats. For example, the ESAPI default
is to use decimal HTML entities if there is not a named entity, but hexidecimal entities
(e.g. &amp;#x26;) are completely legal. ESAPI follows the principle of being liberal
in what it accepts (for canonicalization) and strict in what it emits.
</p>

<table width="100%">
<tr align="center" bgcolor="yellow">
<th width="10%">int</th>
<th width="10%">char</th>
<th width="10%">html body</th>
<th width="10%">html attr</th>
<th width="10%">javascript</th>
<th width="10%">vbscript</th>
<th width="10%">css</th>
<th width="10%">url</th>
<th width="10%">oracle</th>
<th width="10%">mysql</th>
<th width="10%">mysqlansi</th>
<th width="10%">xml</th>
<th width="10%">xml attr</th>
<th width="10%">ldap</th>
<th width="10%">ldap dn</th>
<th width="10%">xpath</th>
</tr>

<?
for ( $i = 0; $i < 127; $i++ ) {
	$c = "".chr($i);
?>

<tr bgcolor="#e0e0e0" align="center">
	<td bgcolor="yellow"><?=$i ?></td>
	<td bgcolor="yellow"><?=$c ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForHTML($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForHTMLAttribute($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForJavaScript($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForVBScript($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForCSS($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForURL($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForSQL($oracle, $c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForSQL($mysql, $c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForSQL($mysqlansi, $c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForXML($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForXMLAttribute($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForLDAP($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForDN($c)); ?></td>
	<td><?=$encode -> encodeForHTML($encode -> encodeForXPath($c)); ?></td>
</tr>

<? }?>
</table>

<?php include("footer.php");  ?>

