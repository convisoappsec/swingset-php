<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M�rcio Andr� (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");
?>

<h2>Exercise: Change Session Identifier</h2>

<p>Current Cookie (generated by JavaScript in browser)</p>
<table align="center" border="1" width="60%"><tr><td align="center">
	<br><script>document.write(document.cookie)</script><br><br>
</td></tr></table>

<p>Click <a href="ChangeSessionIdentifierInsecure.php?function=ChangeSessionIdentifier&mode=insecure">here</a> to refresh the page.</p>

<?php include("footer.php");  ?>