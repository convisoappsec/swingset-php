<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 02, 2010
*/

	import_request_variables("gp", "rvar_");
	include("header.php");
	
		
	if ( $rvar_input == null ) $rvar_input = "<p>test <b>this</b> <script>alert(document.cookie)</script><i>right</i> now</p>";
	$markup = str_replace("<script>", "",$rvar_input);	
?>
<h2>Background</h2>
One method many people use to safeguard their application from a XSS attack is to filter out the &lt;script&gt; tag.  While this may seem like it would prevent an attack involving javascript, it does contain some flaws.
One way to bypass this filtering is to input &lt;scr&lt;script&gt;ipt&gt;.  When &lt;script&gt; is removed, the two halves of the other &lt;script&gt; tag will come together, forming an attack.  Try this below and see what happens.<br /><br />


<hr><br><h2>Exercise: Enter Rich HTML Markup</h2>
 
<form action="RichContentInsecure.php?function=RichContent&mode=insecure" method="POST">
	<table width="100%" border="1"><tr><th width="50%">Enter whatever markup you want</th><th>Safe HTML rendered</th></tr>
	<tr><td><textarea style="width:400px; height:150px" name="input"><?=$rvar_input?></textarea>
	<input type="submit" value="render"><br></td>
	<td><?=$markup ?></td></tr></table>
</form>

<?php include("footer.php");  ?>