<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();	
	
	$authenticator = ESAPI::getAuthenticator();
	
	if($authenticator->exists("admin")){		
		require_once dirname(__FILE__).'/src/reference/DefaultUser.php';
		$user = $authenticator->createUser("admin", "l00katmeg0!@34", "l00katmeg0!@34");//return DefautlUser
		$user->enable();
		$user->loginWithPassword("l00katmeg0!@34");
	}
	
	
?>
<h2>Exercise: Enter Malicious Input</h2>
<?

	if ( $rvar_oldPassword == null ) $rvar_oldPassword = "type input here";
	if ( $rvar_newPassword1 == null ) $rvar_newPassword1 = "type input here";
	if ( $rvar_newPassword2 == null ) $rvar_newPassword2 = "type input here";
?>

		<form action="ChangePasswordInsecure.php?function=ChangePassword&mode=insecure" method="POST">
		<table><tr><td>Old Password:</td><td><input type="password" name="oldPassword"></td></tr>
		<tr><td>New Password:</td><td><input type="password" name="newPassword1" autocomplete="off"></td></tr>
		<tr><td>Re-type new Password:</td><td><input type="password" name="newPassword2" autocomplete="off"></td></tr></table>
		<input type="submit" value="Save"><br>
		</form>
		
<?php include("footer.php");  ?>