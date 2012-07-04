<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M�rcio Andr� (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");	
	include("header.php");
	
	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();
	
	
	$httpUtilities = ESAPI::getHttpUtilities();
	$httpUtilities -> setNoCacheHeaders($httpUtilities->getCurrentResponse());

	$randomizer = ESAPI::getRandomizer();
?>


<h2>Exercise: Experiment with Browser Caching</h2>

<p>Page is not set to cache, so pressing refresh button should 
show a new set of account balances each time</p>

<p>Social Security Number: 123-12-1234</p>
<p>Credit Card Number: 1234-1234-1234-1234</p>
<table border="1">
<tr><th>Account Number</th><th>Balance</th></tr>
<tr><td>95812344</td><td>$<?=$randomizer ->getRandomInteger(100000,900000) ?>.<?=$randomizer ->getRandomInteger(10,100) ?></td></tr>
<tr><td>21231235</td><td>$<?=$randomizer ->getRandomInteger(100000,900000) ?>.<?=$randomizer ->getRandomInteger(10,100) ?></td></tr>
<tr><td>10823580</td><td>$<?=$randomizer ->getRandomInteger(100000,900000) ?>.<?=$randomizer ->getRandomInteger(10,100) ?></td></tr>
</table>

<form action="main" method="GET">
<input type="hidden" name="function" value="BrowserCaching">
<input type="hidden" name="mode" value="secure"> 
<input type="submit" value="refresh">
</form>
<?php include("footer.php");  ?>