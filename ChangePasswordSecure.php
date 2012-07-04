<?php

/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");
	include ("header.php");
	
	$result = "";
	$test="bob";
	
	if($rvar_testCase != null){
		$test = $rvar_testCase;
	}
	if($rvar_result != null){
		$result = $rvar_result;
	}
	
	
	$oldPassword = "";
	$newPassword1 = "";
	$newPassword2 = "";
	$result = "";
	$default_username = "swingset";
	$default_password = "lookatme01@";
	$invalid = false;
	
	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();	

	
	if ($rvar_oldPassword != null) {
		try{				
			$instance = ESAPI::getAuthenticator();
			if(!$instance->exists($default_username)){
				$user1=$instance->createUser($defaut_username,$default_password,$default_password);
				$user->enable();
			}
			$user1 = $instance->getUser($default_username);
			$_POST['oldPassword'] = $rvar_oldPassword;
			$_POST['newPassword1'] = $rvar_newPassword1;
			$_POST['newPassword2'] = $rvar_newPassword2;
			$_POST['currentUser'] = $instance->getCurrentUser();
			$_POST['testCase'] = 'hi there!';
			$_POST['accountName'] = $instance->getUser('admin')->getAccountName();
			$_POST['isLocked'] = $user1->isLocked();
			$_POST['pwChanged'] = $user1->getLastPasswordChangeTime();
			$_POST['account'] = $user1->getAccountName();
			
			$invalid = true;
			$user1->changePassword($rvar_oldPassword,$rvar_newPassword1,$rvar_newPassword2);
			
			$result = "Success! Your password has been changed!";
		}catch(Exception $e){
			if($invalid)
				$result = "Password change failed.<br /><ul><u>Possible causes:</u><li>The old password you entered does not match stored old password</li><li>Your new password does not meet password complexity requirements</li><li>The new password you entered is a recently used password</li><li>The new password you entered is part of a recently used password</li></ul>";
		}
	}
	$_POST['result'] = $result;
?>

<h2>Exercise: Enter Malicious Input</h2>
Any changes you make to the password will persist until the server is restarted.<br />
This is due to the users.txt file not being written to when passwords are changed. To write to users.txt, use the saveUsers() method from FileBasedAuthenticator.java.<br />
Every time the server is loaded, the original password will be: <b>lookatme01@</b><br /><br />

<div style="border: 1px solid black; padding-left:10px;">
New passwords must be at least 8 characters in length and contain at least two of the following sets: 
<ul>
<li>lower-case letters</li>
<li>upper-case letters</li>
<li>digits</li>
<li>special characters ( valid characters include . - _ ! @ $ ^ * = ~ | + ? )</li>
</ul>
		<form action="ChangePasswordSecure.php?function=ChangePassword&mode=secure" method="POST">
		<table><tr><td>Old Password:</td><td><input type="password" name="oldPassword"></td></tr>
		<tr><td>New Password:</td><td><input type="password" name="newPassword1" autocomplete="off"></td></tr>
		<tr><td>Re-type new Password:</td><td><input type="password" name="newPassword2" autocomplete="off"></td></tr></table>
		<input type="submit" value="Save"><br>
		</form>

</div>
<!--  
Old Password: <?=$rvar_oldPassword ?><br />
New Passsword1: <?=$rvar_newPassword1 ?><br />
New Passsword2: <?=$rvar_newPassword2 ?><br />
Current User: <?=$rvar_currentUser ?><br />
Account Name: <?=$rvar_accountName ?><br />
User1 Account name: <?=$rvar_account ?><br />
Locked? <?=$rvar_isLocked ?><br />
Password last changed: <?=$rvar_pwChanged ?><br />
Test Case: <?=$rvar_testCase ?><br /><br />
-->
<?=$result ?>






<?php include("footer.php");  ?>
