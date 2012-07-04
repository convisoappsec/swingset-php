<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	require_once dirname(__FILE__).'/src/Util.php';
	$util = new Util();

	header("Cache-Control", "public");
	header("Expires",$util->current_millis() + 5000 );
	
	import_request_variables("gp", "rvar_");	
	include("header.php");

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();
	
	$randomizer = ESAPI::getRandomizer();
		
?>

<h2>Exercise: Experiment with Browser Caching</h2>

<p>Page is set to cache for 5 seconds, so pressing refresh button should 
show the same value until the cache timeout.</p>

<p>Social Security Number: 123-12-1234</p>
<p>Credit Card Number: 1234-1234-1234-1234</p>
<table border="1">
<tr><th>Account Number</th><th>Balance</th></tr>
<tr><td>95812344</td><td>$<?=$randomizer->getRandomInteger(100000,900000) ?>.<?=$randomizer->getRandomInteger(10,100) ?></td></tr>
<tr><td>21231235</td><td>$<?=$randomizer ->getRandomInteger(100000,900000) ?>.<?=$randomizer ->getRandomInteger(10,100) ?></td></tr>
<tr><td>10823580</td><td>$<?=$randomizer ->getRandomInteger(100000,900000) ?>.<?=$randomizer ->getRandomInteger(10,100) ?></td></tr>
</table>

<form action="BrowserCachingInsecure.php" method="GET">
<input type="hidden" name="function" value="BrowserCaching">
<input type="hidden" name="mode" value="insecure"> 
<input type="submit" value="refresh">
</form>

<?php include("footer.php");  ?>