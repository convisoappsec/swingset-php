<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 02, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");
	$output = $rvar_input;
	if ( $rvar_input == null ) $rvar_input = "type input here";
?>


<h2 align="center">Exercise</h2>

<form action="ValidateUserInputInsecure.php?function=ValidateUserInput&mode=insecure" method="POST">
	<h4>Enter malicious data in the textbox</h4>
	<p class="newsItem">
	<code>
		EXAMPLE: <b>&lt;script&gt;alert(document.cookie)&lt;/script&gt;</b>
	</code>
	</p>
	<textarea style="width:300px; height:100px" name="input"><?=$rvar_input ?></textarea>
	<br /><br /><input type="submit" value="Submit">
</form>
<h4>Unvalidated output: </h4><?=$output ?>



<?php include("footer.php");  ?>