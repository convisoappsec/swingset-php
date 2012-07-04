<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 02, 2010
*/

include("header.php");


?>

<h2 align="center">Background</h2>

<p>Validation is the cornerstone of a secure application.</p>
<p>The most common web application security weakness is the failure to properly validate input from the client or environment. This weakness leads to almost all of the major vulnerabilities in applications, such as Interpreter Injection, locale/Unicode attacks, file system attacks and buffer overflows. Data from the client should never be trusted for the client has every possibility to tamper with the data.</p> 
<p>
In many cases, Encoding has the potential to defuse attacks that rely on lack of input validation. For example, if you use HTML entity encoding on user input before it is sent to a browser, it will prevent most XSS attacks. However, simply preventing attacks is not enough - you must perform Intrusion Detection in your applications. Otherwise, you are allowing attackers to repeatedly attack your application until they find a vulnerability that you haven't protected against. Detecting attempts to find these weaknesses is a critical protection mechanism. 
</p>
<h4>Input validation using ESAPI's Validator interface:</h4>
<p>The Validator interface defines a set of methods for canonicalizing and validating untrusted input. Implementors should feel free to extend this interface to accommodate their own data formats. Rather than throw exceptions, this interface returns boolean results because not all validation problems are security issues. Boolean returns allow developers to handle both valid and invalid results more cleanly than exceptions. 
</p>
<p>
This lesson demonstrates the use of ESAPI's Validator interface to validate user input. In the insecure demonstration, the user input is not validated, any input in the box becomes a part of the webpage.
</p>
If you enter a script in the field, it will become a part of the page
and will run.</p>
<p>EXAMPLE: <b>&lt;script&gt;alert(document.cookie)&lt;/script&gt;</b></p>

<p>To fix this problem, we can use the following function of the ESAPI's Validator interface</p>
<p class="newsItem">
	<code>
		ESAPI::getValidator()->getValidInput($context,$input,$type,$maxLength,$allowNull,$errorList)<br />
	</code>
</p>
<p>It Returns canonicalized and validated input as a String. Invalid input will generate a descriptive ValidationException, and input that is clearly an attack will generate a descriptive IntrusionException. Instead of throwing a ValidationException on error, this variant will store the exception inside of the ValidationErrorList. </p>


<p >
ESAPI's Validator Interface includes following functions:
</p>
<ul >
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#assertIsValidHTTPRequest()"> assertIsValidHTTPRequest()</a></b> 
	          Validates the current HTTP request by comparing parameters, headers, and cookies to a predefined whitelist of allowed characters. </li><br />	<br />
	          
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#assertIsValidHTTPRequestParameterSet(java.lang.String, java.util.Set, java.util.Set)"> assertIsValidHTTPRequestParameterSet(String context, Set required, Set optional)</a></b> 
	          Validates that the parameters in the current request contain all required parameters and only optional ones in addition.</li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#assertIsValidHTTPRequestParameterSet(java.lang.String, java.util.Set, java.util.Set, org.owasp.esapi.ValidationErrorList)"> assertIsValidHTTPRequestParameterSet(String context, Set required, Set optional, ValidationErrorList errorList) </a></b>
	          Validates that the parameters in the current request contain all required parameters and only optional ones in addition.</li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#assertValidFileUpload(java.lang.String, java.lang.String, java.lang.String, byte[], int, boolean)"> assertValidFileUpload(String context, String filepath, String filename, byte[] content, int maxBytes, boolean allowNull) </a></b> 
	          Validates the filepath, filename, and content of a file. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#assertValidFileUpload(java.lang.String, java.lang.String, java.lang.String, byte[], int, boolean, org.owasp.esapi.ValidationErrorList)"> assertValidFileUpload(String context, String filepath, String filename, byte[] content, int maxBytes, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Validates the filepath, filename, and content of a file. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidCreditCard(java.lang.String, java.lang.String, boolean)">String getValidCreditCard(String context, String input, boolean allowNull) </a></b> 
	          Returns a canonicalized and validated credit card number as a String. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidCreditCard(java.lang.String, java.lang.String, boolean, org.owasp.esapi.ValidationErrorList)">String getValidCreditCard(String context, String input, boolean allowNull, ValidationErrorList errorList) </a></b> 
          	   Returns a canonicalized and validated credit card number as a String. </li>

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDate(java.lang.String, java.lang.String, java.text.DateFormat, boolean)">Date getValidDate(String context, String input, java.text.DateFormat format, boolean allowNull) </a></b> 
	          Returns a valid date as a Date. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDate(java.lang.String, java.lang.String, java.text.DateFormat, boolean, org.owasp.esapi.ValidationErrorList)">Date getValidDate(String context, String input, java.text.DateFormat format, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns a valid date as a Date. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDirectoryPath(java.lang.String, java.lang.String, boolean)">String getValidDirectoryPath(String context, String input, boolean allowNull) 
          Returns a canonicalized and validated directory path as a String.</a></b> 
	          Returns a canonicalized and validated directory path as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDirectoryPath(java.lang.String, java.lang.String, boolean, org.owasp.esapi.ValidationErrorList)">String getValidDirectoryPath(String context, String input, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns a canonicalized and validated directory path as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDouble(java.lang.String, java.lang.String, double, double, boolean)">Double getValidDouble(String context, String input, double minValue, double maxValue, boolean allowNull) </a></b> 
	          Returns a validated real number as a double. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDouble(java.lang.String, java.lang.String, double, double, boolean, org.owasp.esapi.ValidationErrorList)">Double getValidDouble(String context, String input, double minValue, double maxValue, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns a validated real number as a double. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidDouble(java.lang.String, java.lang.String, double, double, boolean, org.owasp.esapi.ValidationErrorList)">byte[] getValidFileContent(String context, byte[] input, int maxBytes, boolean allowNull) </a></b> 
	          Returns validated file content as a byte array. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidFileContent(java.lang.String, byte[], int, boolean, org.owasp.esapi.ValidationErrorList)">byte[] getValidFileContent(String context, byte[] input, int maxBytes, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns validated file content as a byte array. </li><br />	<br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidFileName(java.lang.String, java.lang.String, boolean)">String getValidFileName(String context, String input, boolean allowNull) </a></b>
          	  Returns a canonicalized and validated file name as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidFileName(java.lang.String, java.lang.String, boolean, org.owasp.esapi.ValidationErrorList)">String getValidFileName(String context, String input, boolean allowNull, ValidationErrorList errorList) </a></b> 
	           Returns a canonicalized and validated file name as a String.</li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidInput(java.lang.String, java.lang.String, java.lang.String, int, boolean)">String getValidInput(String context, String input, String type, int maxLength, boolean allowNull) </a></b> 
	          Returns canonicalized and validated input as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidInput(java.lang.String, java.lang.String, java.lang.String, int, boolean, org.owasp.esapi.ValidationErrorList)">String getValidInput(String context, String input, String type, int maxLength, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns canonicalized and validated input as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidInteger(java.lang.String, java.lang.String, int, int, boolean)">Integer getValidInteger(String context, String input, int minValue, int maxValue, boolean allowNull) </a></b> 
	          Returns a validated integer. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidInteger(java.lang.String, java.lang.String, int, int, boolean, org.owasp.esapi.ValidationErrorList)">Integer getValidInteger(String context, String input, int minValue, int maxValue, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns a validated integer. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidListItem(java.lang.String,%20java.lang.String,%20java.util.List)">String getValidListItem(String context, String input, List list) </a></b> 
	          Returns the list item that exactly matches the canonicalized input. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidListItem(java.lang.String,%20java.lang.String,%20java.util.List,%20org.owasp.esapi.ValidationErrorList)">String getValidListItem(String context, String input, List list, ValidationErrorList errorList) </a></b> 
	          Returns the list item that exactly matches the canonicalized input. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidNumber(java.lang.String,%20java.lang.String,%20long,%20long,%20boolean)">Double getValidNumber(String context, String input, long minValue, long maxValue, boolean allowNull) </a></b> 
	          Returns a validated number as a double within the range of minValue to maxValue. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidNumber(java.lang.String,%20java.lang.String,%20long,%20long,%20boolean,%20org.owasp.esapi.ValidationErrorList)">Double getValidNumber(String context, String input, long minValue, long maxValue, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns a validated number as a double within the range of minValue to maxValue. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidPrintable(java.lang.String,%20byte[],%20int,%20boolean)">byte[] getValidPrintable(String context, byte[] input, int maxLength, boolean allowNull)</a></b> 
	          Returns canonicalized and validated printable characters as a byte array. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidPrintable(java.lang.String,%20byte[],%20int,%20boolean,%20org.owasp.esapi.ValidationErrorList)">byte[] getValidPrintable(String context, byte[] input, int maxLength, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns canonicalized and validated printable characters as a byte array. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidPrintable(java.lang.String,%20java.lang.String,%20int,%20boolean)">String getValidPrintable(String context, String input, int maxLength, boolean allowNull) </a></b> 
	          Returns canonicalized and validated printable characters as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidPrintable(java.lang.String,%20java.lang.String,%20int,%20boolean,%20org.owasp.esapi.ValidationErrorList)">String getValidPrintable(String context, String input, int maxLength, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns canonicalized and validated printable characters as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidRedirectLocation(java.lang.String,%20java.lang.String,%20boolean)">String getValidRedirectLocation(String context, String input, boolean allowNull) </a></b> 
	          Returns canonicalized and validated printable characters as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidRedirectLocation(java.lang.String,%20java.lang.String,%20boolean,%20org.owasp.esapi.ValidationErrorList)">String getValidRedirectLocation(String context, String input, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns canonicalized and validated printable characters as a String. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidSafeHTML(java.lang.String,%20java.lang.String,%20int,%20boolean)">String getValidSafeHTML(String context, String input, int maxLength, boolean allowNull) </a></b> 
	          Returns canonicalized and validated "safe" HTML. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#getValidSafeHTML(java.lang.String,%20java.lang.String,%20int,%20boolean,%20org.owasp.esapi.ValidationErrorList)">String getValidSafeHTML(String context, String input, int maxLength, boolean allowNull, ValidationErrorList errorList) </a></b> 
	          Returns canonicalized and validated "safe" HTML. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidCreditCard(java.lang.String,%20java.lang.String,%20boolean)">boolean isValidCreditCard(String context, String input, boolean allowNull) </a></b> 
	          Returns true if input is a valid credit card. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidDate(java.lang.String,%20java.lang.String,%20java.text.DateFormat,%20boolean)">boolean isValidDate(String context, String input, java.text.DateFormat format, boolean allowNull) </a></b> 
	          Returns true if input is a valid date according to the specified date format. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidDirectoryPath(java.lang.String,%20java.lang.String,%20boolean)">boolean isValidDirectoryPath(String context, String input, boolean allowNull) </a></b> 
	          Returns true if input is a valid directory path. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidDouble(java.lang.String,%20java.lang.String,%20double,%20double,%20boolean)">boolean isValidDouble(String context, String input, double minValue, double maxValue, boolean allowNull) </a></b> 
	          Returns true if input is a valid double within the range of minValue to maxValue. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidFileContent(java.lang.String,%20byte[],%20int,%20boolean)">boolean isValidFileContent(String context, byte[] input, int maxBytes, boolean allowNull)</a></b> 
	          Returns true if input is valid file content. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidFileName(java.lang.String,%20java.lang.String,%20boolean)">boolean isValidFileName(String context, String input, boolean allowNull) </a></b> 
	          Returns true if input is a valid file name. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidFileUpload(java.lang.String,%20java.lang.String,%20java.lang.String,%20byte[],%20int,%20boolean)">boolean isValidFileUpload(String context, String filepath, String filename, byte[] content, int maxBytes, boolean allowNull) </a></b> 
	          Returns true if a file upload has a valid name, path, and content. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidHTTPRequest()">boolean isValidHTTPRequest() </a></b> 
	          Validate the current HTTP request by comparing parameters, headers, and cookies to a predefined whitelist of allowed characters. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidHTTPRequestParameterSet(java.lang.String,%20java.util.Set,%20java.util.Set)">boolean isValidHTTPRequestParameterSet(String context, Set required, Set optional) </a></b> 
	          Returns true if the parameters in the current request contain all required parameters and only optional ones in addition. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidInput(java.lang.String,%20java.lang.String,%20java.lang.String,%20int,%20boolean)">boolean isValidInput(String context, String input, String type, int maxLength, boolean allowNull) </a></b> 
	          Returns true if input is valid according to the specified type. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidInteger(java.lang.String,%20java.lang.String,%20int,%20int,%20boolean)">boolean isValidInteger(String context, String input, int minValue, int maxValue, boolean allowNull) </a></b> 
	          Returns true if input is a valid integer within the range of minValue to maxValue. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidListItem(java.lang.String,%20java.lang.String,%20java.util.List)">boolean isValidListItem(String context, String input, List list) </a></b> 
	          Returns true if input is a valid list item. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidNumber(java.lang.String,%20java.lang.String,%20long,%20long,%20boolean)">boolean isValidNumber(String context, String input, long minValue, long maxValue, boolean allowNull) </a></b> 
	          Returns true if input is a valid number within the range of minValue to maxValue. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidPrintable(java.lang.String,%20byte[],%20int,%20boolean)">boolean isValidPrintable(String context, byte[] input, int maxLength, boolean allowNull) </a></b> 
	          Returns true if input contains only valid printable ASCII characters (32-126). </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidPrintable(java.lang.String,%20java.lang.String,%20int,%20boolean)">boolean isValidPrintable(String context, String input, int maxLength, boolean allowNull) </a></b> 
	          Returns true if input contains only valid printable ASCII characters (32-126). </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidRedirectLocation(java.lang.String,%20java.lang.String,%20boolean)">boolean isValidRedirectLocation(String context, String input, boolean allowNull)</a></b> 
	          Returns true if input is a valid redirect location, as defined by "ESAPI.properties". </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#isValidSafeHTML(java.lang.String,%20java.lang.String,%20int,%20boolean)">boolean isValidSafeHTML(String context, String input, int maxLength, boolean allowNull) </a></b> 
	          Returns true if input is "safe" HTML. </li><br />	<br />

	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/Validator.html#safeReadLine(java.io.InputStream,%20int)">boolean safeReadLine(InputStream inputStream, int maxLength) </a></b> 
	          Reads from an input stream until end-of-line or a maximum number of characters. </li><br />	<br />
</ul>

<?php include("footer.php");  ?>