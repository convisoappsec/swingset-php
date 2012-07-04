<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 2, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");

	if ( $rvar_input == null ) $rvar_input = "encode this string";
?>

<hr><br><h2>Exercise: Enter Rich HTML Markup</h2>

<form action="EncodingInsecure.php?function=Encoding&mode=insecure" method="POST">
	Enter whatever input you want
	<textarea style="width:400px; height:150px" name="input"><?=$rvar_input ?></textarea>
	<input type="submit" value="submit"><br>

</form>

<table border="1">
<tr><th>Encoding method</th><th>Encoded output</th></tr>
<tr><td>Unencoded</td><td><p><pre><?=$rvar_input ?></pre></td></tr>
</table>


<?php include("footer.php");  ?>