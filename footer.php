<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Jan 28, 2010
*/
?>


<hr>
<?
	$message = $_POST['message'];
	if ( $_POST['userMessage'] != null || $_POST['logMessage']!= null) {
	
	$encoder = ESAPI::getEncoder();
	
?>
	<p>User Message: <font color="red"><?= $encoder -> encodeForHTML($_POST['userMessage']) ?></font></p>
	<p>Log Message: <font color="red"><?= $encoder -> encodeForHTML($_POST['logMessage']) ?></font></p><hr>
<?
	}
?>
<p><center><a href="http://www.owasp.org/index.php/ESAPI">OWASP Enterprise Security API Project</a> (c) 2010</center></p>
<!--  <span id="copyright">Design by <a href="http://www.sitecreative.net" target="_blank" title="Opens link to SiteCreative.net in a New Window">SiteCreative</a></span> -->
	</div> <!-- end holder div -->
</div> <!-- end container div -->
</body>
</html>
