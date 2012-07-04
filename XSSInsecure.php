<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M�rcio Andr� (mishida@conviso.com.br)
* Created on Feb 4, 2010
*/
	
	import_request_variables("gp", "rvar_");
	include("header.php");
		
	require_once dirname(__FILE__).'/src/reference/ArrayList.php';
	require_once dirname(__FILE__).'/src/models/XSSRule.php';

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();

	$encoder = ESAPI::getEncoder();
?>

 <h2 align="center">Exercise</h2>

<form name="form" action="XSSInsecure.php?function=XSS&mode=insecure" method="POST">

<hr><h4><a href="http://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet#RULE_.230_-_Never_Insert_Untrusted_Data_Except_in_Allowed_Locations">RULE #0 - Never Insert Untrusted Data Except in Allowed Locations</a></h2>
<hr>
<?
	$encoded0 = $encoder -> encodeForHTMLAttribute($rvar_input0);
?>
<div>Only put untrusted data in the five approved locations! Not into a script:<ul>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input0.focus(); document.form.input0.value='50;alert(\'xss0\')'">50; alert('xss0')</li></ul>
<table align="center" width="80%" border="1">
<tr><td><div>Don't put untrusted data in a script<br>&lt;html&gt;&lt;body&gt;data&lt;script&gt;var i=&nbsp;<input name="input0" type="text" style="background-color: yellow; overflow:visible" size="20" value="<? echo $encoded0;?>"/>&nbsp;;&lt;/script&gt;&lt;/body&gt;&lt;/html&gt;</div></td></tr>
	<tr bgcolor="pink"><td>data
	<script>
		var i=<?echo $rvar_input0?>;
	</script>
</td></tr></table>
<hr><h4><a href=\"http://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet#RULE_.231_-_HTML_Escape_Before_Inserting_Untrusted_Data_into_HTML_Element_Content">RULE #1 - HTML Escape Before Inserting Untrusted Data into HTML Element Content</a></h2>

<hr>
<?	
 	$encoded1= $encoder -> encodeForHTMLAttribute($rvar_input1);
?>
<div>Normal Element Content, common attacks are: <ul>
<li>Inject down into script context by introducing a new element &lt;script&gt;</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input1.focus(); document.form.input1.value='<script>alert(\'xss1\')</script>'">&lt;script&gt;alert('xss1')&lt;/script&gt;</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input1.focus(); document.form.input1.value='<img src=javascript:alert(\'xss1\') />'">&lt;img src=javascript:alert('xss1') /&gt;</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input1.focus(); document.form.input1.value='<img src=1 onerror=alert(\'xss1\') />'">&lt;img src=1 onerror=alert('xss1') /&gt;</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>Normal element<br>&lt;html&gt;&lt;body&gt;&lt;div&gt;&nbsp;
	<input name="input1" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?echo $encoded1;?>"/>
	&nbsp;
	&lt;/div&gt;&lt;/body&gt;&lt;/html&gt;</div></td></tr>
	<tr bgcolor="pink"><td><div>
      <?
      	echo $rvar_input1;
      ?>
</div></td></tr></table>

<hr><h4><a href="http://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet#RULE_.232_-_Attribute_Escape_Before_Inserting_Untrusted_Data_into_HTML_Common_Attributes">RULE #2 - Attribute Escape Before Inserting Untrusted Data into HTML Common Attributes</a></h2>
<hr>
<?
 	$encoded21= $encoder -> encodeForHTMLAttribute($rvar_input21); 
?>
<div>Unquoted Attribute, common attacks are:<ul>
<li>Inject up to another attribute with ASCII 9, 10, 11, 12, 13, 32</li>
<li>Inject up to the containing HTML element with ></li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input21.focus(); document.form.input21.value='dummy onmouseover=alert(\'xss2.1\')'">dummy onmouseover=alert('xss2.1')</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input21.focus(); document.form.input21.value='dummy style=xss:expression(alert(\'xss2.1\'))'">dummy style=xss:expression(alert('xss2.1'))</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;div name=<input name="input21" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?echo $encoded21?>">&gt;test&lt;/div&gt;</div></td></tr>
<tr bgcolor="pink"><td>
<div name=<?=$rvar_input21?>>test</div></td></tr></table>
<hr>
<?
 $encoded22= $encoder -> encodeForHTMLAttribute($rvar_input22); 
?>
<div>Quoted Attribute, common attacks are: <ul>
<li>Inject up to another attribute with \" or ' depending on what quotes were used</li>
<li>Inject up to the containing HTML element with \"></li>
<li>Inject down only possible with special attributes like href, src, style, onXXX - see other rules</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input22.focus(); document.form.input22.value='dummy\x22 onmouseover=\x22alert(\'xss2.2\')'">dummy" onmouseover="alert('xss2.2')"</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input22.focus(); document.form.input22.value='dummy \x22 style=\x22xss:expression(alert(\'xss2.2\'))'">dummy" style="xss:expression(alert('xss2.2'))"</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;div name="&nbsp;<input name="input22" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded22?>" />/&gt;test&lt;/div&gt;</div></td></tr>
<tr bgcolor="pink"><td><div name=<?=$rvar_input22?>>test</div></td></tr></table>


<hr><h4><a href="http://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet#RULE_.233_-_JavaScript_Escape_Before_Inserting_Untrusted_Data_into_HTML_JavaScript_Data_Values">RULE #3 - JavaScript Escape Before Inserting Untrusted Data into HTML JavaScript Data Values</a></h2>

<hr>
<?
 $encoded31=$encoder -> encodeForHTMLAttribute($rvar_input31); 
?>
<div>Unquoted Value, common attacks are:<ul>
<li>Inject up to another attribute with ; | and many others 50; alert('xss3.1')</li>
<li>Inject down with a JavaScript expression 50 + alert('xss3.1')</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input31.focus(); document.form.input31.value='50 + alert(\'xss3.1\')'">50 + alert('xss3.1')</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input31.focus(); document.form.input31.value='50; alert(\'xss3.1\')'">50; alert('xss3.1')</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;div onmouseover="var i=&nbsp;<input name="input31" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded31?>">;>test&lt;/div&gt;</div></td></tr>
    <tr bgcolor="pink"><td><div onmouseover="var i="<?=$rvar_input31?>">test</div></td></tr></table>
<hr>
<?
 $encoded32=$encoder -> encodeForHTMLAttribute($rvar_input32); 
?>
<div>Quoted Value, common attacks are: <ul>
<li>Inject up to the JavaScript context with \" or ' depending on what quotes were used</li>
<li>Inject up to the containing HTML element with \"></li>
<li>Note that JavaScript escaping can be \\A (ascii) or \\xHH (hex) or \\OOO (octal)</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input32.focus(); document.form.input32.value='dummy\';alert(\'xss3.2\'); var j=\''">dummy'; alert('xss3.2'); var j="</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input32.focus(); document.form.input32.value='dummy\x27\x22>&lt;script>alert(\x22xss3.2\x22)&lt;/script>'\">dummy">&lt;script>alert("xss3.2")&lt;/script>"</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;div onmouseover="var i='&nbsp;<input name="input32" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded32?>"/>&nbsp;' ">test&lt;/div&gt;</div></td></tr>
<tr bgcolor="pink"><td><div onmouseover="var i='<?=$rvar_input32;?>'">test</div></td></tr></table>
<hr><h4><a href="http://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet#RULE_.234_-_CSS_Escape_Before_Inserting_Untrusted_Data_into_HTML_Style_Property_Values">RULE #4 - CSS Escape Before Inserting Untrusted Data into HTML Style Property Values</a></h2>

<hr>
<?
 	$encoded41=$encoder -> encodeForHTMLAttribute($rvar_input41); 
?>
<div>Unquoted Style Attribute, common attacks are:<ul>
<li>Inject up to another attribute with ASCII 9, 10, 11, 12, 13, 32</li>
<li>Inject up to the containing HTML element with ></li>
<li>Inject down with xss:expression(alert('xss')) or xss:url(javascript:alert('xss'))</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input41.focus(); document.form.input41.value='>&lt;script>alert(\'xss4.1\')&lt;/script>'">dummy&gt;&lt;script&gt;alert('xss4.1')&lt;/script&gt;</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input41.focus(); document.form.input41.value='dummy onmouseover=alert(\'xss4.1\')'">dummy onmouseover=alert('xss4.1')</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input41.focus(); document.form.input41.value='xss:expression(alert(\'xss4.1\'))'">xss:expression(alert('xss4.1'))</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;div style=&nbsp;<input name="input41" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded41?>" />&nbsp;>test&lt;/div&gt;</div></td></tr>
<tr bgcolor="pink"><td><div style=<?=$rvar_input41?>>test</div></td></tr></table>

<hr>
<?
	$encoded42= $encoder -> encodeForHTMLAttribute($rvar_input42); 
?>
<div>Quoted Style Attribute, common attacks are: <ul>
<li>Inject up to another attribute with \" or ' depending on what quotes were used</li>
<li>Inject up to the containing HTML element with \"></li>
<li>Inject down with xss:expression(alert('xss')) or xss:url(javascript:alert('xss'))</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input42.focus(); document.form.input42.value='dummy\x22 onmouseover=\x22alert(\'xss4.2\')'">dummy\" onmouseover=\"alert('xss4.2')\"</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input42.focus(); document.form.input42.value='xss:expression(alert(\'xss4.2\'))'">xss:expression(alert('xss4.2'))</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;div name="&nbsp;<input name="input42" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded42?>"/>&nbsp;">test&lt;/div&gt;</div></td></tr>
<tr bgcolor="pink"><td><div style="<?=$rvar_input42?>">test</div></td></tr></table>

<hr><h4><a href="http://www.owasp.org/index.php/XSS_(Cross_Site_Scripting)_Prevention_Cheat_Sheet#RULE_.235_-_URL_Escape_Before_Inserting_Untrusted_Data_into_HTML_URL_Attributes">RULE #5 - URL Escape Before Inserting Untrusted Data into HTML URL Attributes</a></h2>

<hr>
<?
	$encoded51 = $encoder -> encodeForHTMLAttribute($rvar_input51); 
?>
<div>Unquoted URL Attribute, common attacks are:<ul>
<li>Inject up to another attribute with ASCII 9, 10, 11, 12, 13, 32</li>
<li>Inject up to the containing HTML element with ></li>
<li>Inject down with javascript: type URLs</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input51.focus(); document.form.input51.value='>&lt;script>alert(\'xss5.1\')&lt;/script>'">dummy&gt;&lt;script&gt;alert('xss5.1')&lt;/script&gt;</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input51.focus(); document.form.input51.value='dummy onmouseover=alert(\'xss5.1\')'">dummy onmouseover=alert('xss5.1')</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input51.focus(); document.form.input51.value='javascript:alert(\'xss5.1\')'">javascript:alert('xss5.1')</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;a href=&nbsp;<input name="input51" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded51?>" />&nbsp;>test&lt;/a&gt;</div></td></tr>
<tr bgcolor="pink"><td><a href=<?=$rvar_input51?>>test</a></td></tr></table>

<hr>
<?
 $encoded52=$encoder -> encodeForHTMLAttribute($rvar_input52); 
?>
<div>Quoted URL attribute, common attacks are: <ul>
<li>Inject up to another attribute with " or ' depending on what quotes were used</li>
<li>Inject up to the containing HTML element with "></li>
<li>Inject down with javascript: type URLs</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input52.focus(); document.form.input52.value='dummy\x22 onmouseover=\x22alert(\'xss5.2\')'">dummy" onmouseover="alert('xss5.2')"</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input52.focus(); document.form.input52.value='xss:expression(alert(\'xss5.2\'))'">xss:expression(alert('xss5.2'))</li>
<li style="cursor:pointer;text-decoration:underline" onclick="document.form.input52.focus(); document.form.input51.value='javascript:alert(\'xss5.1\')'">javascript:alert('xss5.1')</li></ul></div>
<table align="center" width="80%" border="1">
<tr><td><div>&lt;a href="&nbsp;<input name="input52" type="text" style="background-color: yellow; overflow:visible" size="20" value="<?=$encoded52?>" />&nbsp;">test&lt;/a&gt;</div></td></tr>
<tr bgcolor="pink"><td><a href="<?=$rvar_input52?>">test</a></td></tr></table>


<br /><br />

<input type="submit" value="Submit">

</form>



<hr>
<?
	if ( $rvar_userMessage != null || $rvar_logMessage != null) {
?>
<p>User Message: <font color="red">
<?
      echo $encoder -> encodeForHTML($rvar_userMessage);       
?>
</font></p>
<p>Log Message: <font color="red">
<?
      echo $encoder -> encodeForHTML($rvar_logMessage);
?>
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