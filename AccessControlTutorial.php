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
<p>The AccessController interface defines a set of methods that can be used in a wide variety of applications to enforce access control. In most applications, access control must be performed in multiple different locations across the various application layers. This class provides access control for URLs, business functions, data, services, and files. </p>


<p>For using the secure demo first we need to set the following url access rules in the c:\resources\URLAccessRules.txt file.</p>  
<p class="newsItem">
<code>
# URL Access Rules
#
<br />
/ESAPI/test.php     | any      | allow  |<br />
/ESAPI/test1.php    | admin    | allow  |<br />
</code>
</p>

<p>In the secure demo following ESAPI function is used:</p>

<p class="newsItem">
<code>
	isAuthorizedForURL($url) 
<br />Checks if an account is authorized to access the referenced URL. 
<br />Returns true, if is authorized for URL
</code>
<p>Once you click on the test url. The requested jsp calls the ESAPI's isAuthorizedForURL function. It displays the success and failure messages depending upon the boolean value returned by the function.</p>
<p>The jsp also displays the boolean value returned by calling ESAPI::getAccessController()->isAuthorizedForURL($requestURI);
and the log message in case of authorization failure.</p>
<h4>ESAPI's AccessController Interface includes:</h4>

<p style="color:red">.....::::::   VERIFICAR ABAIXO   ::::::.....</p>
<ul>
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#assertAuthorizedForData(java.lang.String)">assertAuthorizedForData($key)</a></b> Checks if the current user is authorized to access the referenced data. This method simply returns if access is authorized.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#assertAuthorizedForData(java.lang.String, java.lang.Object)">assertAuthorizedForData($action, $data) </a></b> Checks if the current user is authorized to access the referenced data.</li><br />
    <li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#assertAuthorizedForFile(java.lang.String)">assertAuthorizedForFile($filepath)</a></b>Checks if an account is authorized to access the referenced file.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#assertAuthorizedForFunction(java.lang.String)">assertAuthorizedForFunction($functionName)</a></b>Checks if an account is authorized to access the referenced function.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#assertAuthorizedForService(java.lang.String)">assertAuthorizedForService($serviceName) </a></b>   Checks if an account is authorized to access the referenced service.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#assertAuthorizedForURL(java.lang.String)">assertAuthorizedForURL($url) </a></b>Checks if an account is authorized to access the referenced URL.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#isAuthorizedForData(java.lang.String)">isAuthorizedForData($key) </a></b>Checks if an account is authorized to access the referenced data, represented as a String.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#isAuthorizedForData(java.lang.String, java.lang.Object)">isAuthorizedForData($action, $data) </a></b>Checks if an account is authorized to access the referenced data, represented as an Object.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#isAuthorizedForFile(java.lang.String)">isAuthorizedForFile($filepath) </a></b>Checks if an account is authorized to access the referenced file.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#isAuthorizedForFunction(java.lang.String)">isAuthorizedForFunction($functionName) </a></b>Checks if an account is authorized to access the referenced function.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#isAuthorizedForService(java.lang.String)">isAuthorizedForService($serviceName) </a></b>Checks if an account is authorized to access the referenced service.</li><br />
	<li><b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/AccessController.html#isAuthorizedForURL(java.lang.String)">isAuthorizedForURL($url)</a></b>Checks if an account is authorized to access the referenced URL.</li><br />
</ul>

<?php include("footer.php");  ?>