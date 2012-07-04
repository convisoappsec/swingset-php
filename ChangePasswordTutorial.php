<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/

	import_request_variables("gp", "rvar_");

	include("header.php");
?>
<h2 align="center">Tutorial</h2>
<h4>Change Password: </h4>
<p>Following method in the ESAPI's User interface helps in securely changing the user password</p>
<b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/User.html#changePassword(java.lang.String, java.lang.String, java.lang.String)">changePassword($oldPassword, $newPassword1, $newPassword2)</a></b> 
<p><br />Sets the user's password, performing a verification of the user's old password, the equality of the two new passwords, and the strength of the new password.</p>
<p>Proper logger messages are displayed on every successful/unsuccessful password change.</p>
<p>Throws AuthenticationCredentialsException if newPassword1 does not match newPassword2, if oldPassword does not match the stored old password, or if the new password does not meet complexity requirements 
</p>
<?php include("footer.php");  ?>