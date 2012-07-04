<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/

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

sort($paginas);
/**
foreach ($paginas as $pag) {
    echo "$pag <br>";
}
*/
if(in_array("ObjectReferenceTutorial.php",$paginas)){
	echo "Achou!";
}else{
	echo "Nao Achou";
}


?>
