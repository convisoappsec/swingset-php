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
<p>Insecure randomness errors occur when a function that can produce predictable values is used as a source of randomness in security-sensitive context.</p>
<p>Computers are deterministic machines, and as such are unable to produce true randomness. Pseudo-Random Number Generators (PRNGs) approximate randomness algorithmically, starting with a seed from which subsequent values are calculated.<br /></p>
<p>There are two types of PRNGs: statistical and cryptographic. Statistical PRNGs provide useful statistical properties, but their output is highly predictable and forms an easy to reproduce numeric stream that is unsuitable for use in cases where security depends on generated values being unpredictable. Cryptographic PRNGs address this problem by generating output that is more difficult to predict. For a value to be cryptographically secure, it must be impossible or highly improbable for an attacker to distinguish between it and a truly random value. In general, if a PRNG algorithm is not advertised as being cryptographically secure, then it is probably a statistical PRNG and should not be used in security-sensitive contexts.</p>
<p>Examples:<br />
The following code uses a statistical PRNG to create generate a pseudo-random number.<br />
<p class="newsItem">
	<code>
	int GenerateRandomNumber() { <br />
		<span style="padding-left: 25px;">Random ranGen = new Random();</span><br />
		<span style="padding-left: 25px;">ranGen.setSeed((new Date()).getTime()); </span><br />
		<span style="padding-left: 25px;">return (ranGen.nextInt(400000000)); </span><br />
</span>
		} 
	</pre></code>
</p>
<p>This code uses the Random.nextInt() function to generate "unique" identifiers for the receipt pages it generates. Because Random.nextInt() is a statistical PRNG, it is easy for an attacker to guess the strings it generates. Although the underlying design of the receipt system is also faulty, it would be more secure if it used a random number generator that did not produce predictable receipt identifiers, such as a cryptographic PRNG.</p>
<p>
The Randomizer interface defines a set of methods for creating cryptographically random numbers and strings. Implementers should be sure to use a strong cryptographic implementation, such as the JCE or BouncyCastle. Weak sources of randomness can undermine a wide variety of security mechanisms.
</p>
<p>
ESAPI's Randomizer Interface includes following functions:
</p>

<ul>
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomBoolean()">getRandomBoolean()</a></b> 
	          Returns a random boolean. </li><br />	<br />
	          
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomFilename(java.lang.String)">getRandomFilename($extension)</a></b> 
	          Returns an unguessable random filename with the specified extension.</li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomGUID()">getRandomGUID()</a></b>
	          Generates a random GUID. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomInteger(int,%20int)">getRandomInteger($min, $max)</a></b> 
	          Gets the random integer. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomLong()">getRandomLong()</a></b> 
	          Gets the random long. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomReal(float,%20float)">getRandomReal($min, $max)</a></b> 
	          Gets the random real. </li><br /><br />
	
	<li> <b><a href="http://owasp-esapi-php.googlecode.com/svn/trunk_doc/org/owasp/esapi/reference/DefaultRandomizer.html#getRandomString(int,%20char[])">getRandomString($length, $characterSet)</a></b> 
          Gets a random string of a desired length and character set. </li>
</ul>

<?php include("footer.php");  ?>