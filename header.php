<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Jan 28, 2010
*/

import_request_variables("gp", "rvar_");

if( isset($rvar_function) && isset($rvar_mode)){ 
	
		switch ( $rvar_function ) {
		case "OutputUserInput":
			$func = $rvar_function;
			break;
		case "OutputUserInput":
			$func = $rvar_function;
			break;	
		case "RichContent":
			$func = $rvar_function;
			break;	
		case "ValidateUserInput":
			$func = $rvar_function;
			break;	
		case "Encoding":
			$func = $rvar_function;
			break;	
		case "Canonicalize":
			$func = $rvar_function;
			break;	
		case "XSS":
			$func = $rvar_function;
			break;	
		case "ChangePassword":
			$func = $rvar_function;
			break;	
		case "ChangeSessionIdentifier":
			$func = $rvar_function;
			break;	
		case "ObjectReference":
			$func = $rvar_function;
			break;	
		case "AccessControl":
			$func = $rvar_function;
			break;	
		case "Encryption":
			$func = $rvar_function;
			break;	
		case "Randomizer":
			$func = $rvar_function;
			break;	
		case "Integrity":
			$func = $rvar_function;
			break;	
		case "BrowserCaching":
			$func = $rvar_function;
			break;	
		default:
			$func = "erro";
			break;
	}
	
	$title = "ESAPI - ".$func;
	$pageHeader = "ESAPI - ".$func;
	
	$rvar_mode = strtolower($rvar_mode);
	
	// Find the mode
	if ($rvar_mode == null || $rvar_mode =="tutorial") {
		$mode = "Tutorial";
	} else if ($rvar_mode == "secure") {
		$mode = "Secure";
	} else if ($rvar_mode == "insecure") {
		$mode = "Insecure";
	} else { // Default to tutorial mode
		$mode = "Tutorial";
	}

	if ($mode == "Secure") {
		$title = $title.": Secured by ESAPI";
		$pageHeader = $pageHeader.": Secured by ESAPI";
	} else if ($mode == "Insecure") {
		$title = $title.": Insecure";
		$pageHeader = $pageHeader.": Insecure";
	}	
	
	$function = $rvar_function;
	
}
?>
<html>
<head>
<title><?=$title?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
<?
	if($func != null && $func != ""){
		if($func == "erro"){
?>		
	<meta http-equiv="Refresh" content="0; url=erro.php">
<?		}
	}
?>
</head>

<? 
	if($mode == "Tutorial"){  echo "<body>";  }
	if($mode == "Insecure"){ echo "<body bgcolor=\"#EECCCC\">";}
	if ($mode == "Secure") { echo "<body bgcolor=\"#BBDDBB\">";}
?>
<div id="container">
	<div id="holder">
		<div id="logo"><img src="style/images/owasp-logo_130x55.png" width="130" height="55" alt="owasp_logo" title="owasp_logo"></div>
<h2><?=$pageHeader ?></h2>

<div id="navigation">
<a href="index.php">Home</a> | 
<?	if ( $mode == "Tutorial" ) {echo "<b>";	}?>	
	<a href="main.php?function=<?= $function?>&mode=tutorial"> Tutorial </a>
<?	if ( $mode == "Tutorial" ) {echo "</b>";	}?>	 | 
<?	if ( $mode == "Insecure" ) {echo "<b>";	}?>	
 	<a href="main.php?function=<?=$function?>&mode=insecure" > Insecure Demo </a>
<?	if ( $mode == "Insecure" ) {echo "</b>";	}?>	|
<?	if ( $mode == "Secure" ) {echo "<b>";	}?>	 	
 	<a href="main.php?function=<?=$function?>&mode=secure" > Secure Demo </a>
 <?	if ( $mode == "Secure" ) {echo "</b>";	}?>		

</div>
<div id="header"></div>
<p>
<hr>