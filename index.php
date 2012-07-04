<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Jan 28, 2010
*/

$title = "ESAPI SwingSet Demonstration Application beta";
?>
<html>
<head>
<title><?=$title ?></title>
<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
<div id="container">
	<div id="holder">
		<div id="logo"><img src="style/images/owasp-logo_130x55.png" width="130" height="55" alt="owasp_logo" title="owasp_logo">
	</div>
	<h1><?=$title ?></h1>
<div id="header"></div>
<hr> 

<h3>Swinget to PHP By Conviso IT Security - http://www.conviso.com.br</h3>

<h2>Input Validation, Encoding, and Injection</h2>
<ul>
	<li><a href="main.php?function=OutputUserInput">Output User Input</a></li>
	<li><a href="main.php?function=RichContent">Accept Rich Content</a></li>
	<li><a href="main.php?function=ValidateUserInput">Validate User Input</a></li>
	<li><a href="main.php?function=Encoding">Encode Output</a></li>
	<li><a href="main.php?function=Canonicalize">Canonicalize Input</a></li>
</ul>

<h2>Cross Site Scripting</h2>
<ul>
	<li><a href="main.php?function=XSS">Cross Site Scripting</a></li>
</ul>

<h2>Authentication and Session Management</h2>
<ul>
<li>
<!--<a href="https://localhost:8443<%=request.getContextPath() %>/main.php?function=Login">Login</a></li>-->
<!-- <li><a href="main?function=Logout">Logout</a></li> (no implementation)-->
<li><a href="main.php?function=ChangePassword">Change Password</a></li>
<li><a href="main.php?function=ChangeSessionIdentifier">Change Session Identifier</a></li>
</ul>


<h2>Access Control and Referencing Objects</h2>
<ul>
<li><a href="main.php?function=ObjectReference">Reference a Server-Side Object</a></li>
<li><a href="main.php?function=AccessControl">Access Control</a></li>
</ul>

<h2>Encryption, Randomness, and Integrity</h2>
<ul>
<li><a href="main.php?function=Encryption">Encryption</a></li>
<li><a href="main.php?function=Randomizer">Randomizer</a></li>
<li><a href="main.php?function=Integrity">Integrity Seals</a></li>
</ul>

<h2>Caching</h2>
<ul>
<li><a href="main.php?function=BrowserCaching">Browser Caching</a></li>
</ul>

<?php include("footer.php");  ?>