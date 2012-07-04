<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Jan 28, 2010
*/

import_request_variables("gp", "rvar_");

$paginas = array("AccessControlInsecure.php",		
"OutputUserInputSecure.php",
"AccessControlSecure.php",			
"OutputUserInputTutorial.php",
"AccessControlTutorial.php",		
"RandomizerInsecure.php",
"BrowserCachingInsecure.php",		
"RandomizerSecure.php",
"BrowserCachingSecure.php",		
"RandomizerTutorial.php",
"BrowserCachingTutorial.php",		
"RichContentInsecure.php",
"CanonicalizeInsecure.php",		
"RichContentSecure.php",
"CanonicalizeSecure.php",			
"RichContentTutorial.php",
"CanonicalizeTutorial.php",		
"ValidateUserInputInsecure.php",
"ChangePasswordInsecure.php",		
"ValidateUserInputSecure.php",
"ChangePasswordSecure.php",		
"ValidateUserInputTutorial.php",
"ChangePasswordTutorial.php",		
"XSSInsecure.php",
"ChangeSessionIdentifierInsecure.php",	
"XSSSecure.php",
"ChangeSessionIdentifierSecure.php",	
"XSSTutorial.php",
"ChangeSessionIdentifierTutorial.php",
"EncodingInsecure.php",		
"EncodingSecure.php",			
"EncodingTutorial.php",			
"EncryptionInsecure.php",			
"EncryptionSecure.php",			
"EncryptionTutorial.php",			
"GUIDInsecure.php",			
"GUIDSecure.php",				
"GUIDTutorial.php",			
"IntegrityInsecure.php",			
"IntegritySecure.php",			
"IntegrityTutorial.php",							
"ObjectReferenceInsecure.php",		
"ObjectReferenceSecure.php",		
"ObjectReferenceTutorial.php",		
"OutputUserInputInsecure.php"	
);

if( isset($rvar_function)){
 	 $function = $rvar_function; 	 
	 if($function != null && $function !=""){
	 	
	 	$rvar_mode = strtolower($rvar_mode);
	 	
	 	if($rvar_mode == null || $rvar_mode == "tutorial" )
	 		$mode = "Tutorial";
	 	else if($rvar_mode == "secure")
	 		$mode = "Secure";
	 	else if($rvar_mode == "insecure") 
	 		$mode = "Insecure";
	 	else
	 		$mode = "Tutorial";
	 	
	
	 	$pname = $function. $mode ;
	 	if(file_exists("$pname.php")){		 		
	 		if(in_array("$pname.php",$paginas)){	 			 
			 	// QUERYSTRING
			 	if($_SERVER["QUERY_STRING"]) { 
			 		if(stripos($_SERVER["QUERY_STRING"],"&mode=")){
			 			$redirect = $pname.".php?".$_SERVER["QUERY_STRING"];
			 		}else{
			 			$redirect = $pname.".php?".$_SERVER["QUERY_STRING"]."&mode=".$mode;   		 
			 		}
				   
				} else {		 
				   $redirect = $pname.".php?mode=".$mode;  		 
				} 
	 		}else{
	 			$redirect = "erro.php";
	 		}
 		}else{
			$redirect = "erro.php";
 		}
		
 	 }
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Refresh" content="0; url=<?=$redirect ?>">
<title></title>
</head>
<body>

</body>
</html>


