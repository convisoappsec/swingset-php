<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Fev 01, 2010
*/


	import_request_variables("gp", "rvar_");

	include("header.php");
	
	if ( $rvar_name == null || $rvar_name == "" ){
		 $rvar_name = "anonymous";
	}

?>
<h2>Exercise: Enter Malicious Input</h2>

<form action="OutputUserInputInsecure.php?function=OutputUserInput&mode=insecure" method="POST">
    <p>Enter your name:</p>
    <input name='name' value='<?=$rvar_name ?>'>
    <input type='submit' value='submit'>
</form>

<p>Hello, <?=$rvar_name?></p>


<?php include("footer.php");  ?>