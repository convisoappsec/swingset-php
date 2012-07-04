<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, Márcio André (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	import_request_variables("gp", "rvar_");
	include("header.php");
?>

<h2 align="center">Tutorial</h2>
<p>A direct object reference occurs when a developer exposes a reference to an internal 
implementation object, such as a file, directory, database record, or key, as a URL or form 
parameter. An attacker can manipulate direct object references to access other objects without 
authorization, unless an access control check is in place.</p>

<p>For example, in Internet Banking applications, it is common to use the account number as 
the primary key. Therefore, it is tempting to use the account number directly in the web interface. 
Even if the developers have used parameterized SQL queries to prevent SQL injection, if there is no 
extra check that the user is the account holder and authorized to see the account, an attacker 
tampering with the account number parameter can see or change all accounts.</p>

<p>This type of attack occurred to the Australian Taxation Office’s GST Start Up Assistance site in 
2000, where a legitimate but hostile user simply changed the ABN (a company tax id) present in the 
URL. The user farmed around 17,000 company details from the system, and then e-mailed each system. 
This was a major embarrassment to the Government of the 17,000 companies with details of his attack. 
This type of vulnerability is very common, but is largely untested in current applications.</p>

<p><span style="font-weight: bold">ESAPI</span> has the ability to create an 
<span style="font-style: italic">access reference map</span> in order to prevent direct object 
referencing.</p>

<p>If a developer chooses to use the reference implementation that comes with the ESAPI, integer 
access reference maps and random access reference maps are available for use.  Random access reference 
maps are the preferred security tactic because they also protect against a CSRF (Cross-Site Request Forgery)
attack.</p>

<p>Direct object references may be added to an AccessReferenceMap object either as a set or 
individually.  Below is an example of how to add a direct object containing a String to a
RandomAccessReferenceMap object, though the String could be substituted for any object.</p>

<p class="newsItem">
	<code>
		String directReference = "This is a direct reference.";<br />
		<br />
		require_once dirname(__FILE__).'/reference/DefaultRandomizer.php';</br>
		$instance = new RandomAccessReferenceMap();<br />
		$ind = $instance->addDirectReference($directReference);<br /> 
	</code><br />
	</p>
		The String ind will contain the randomly-generated indirect reference that is safe to use in a URL, something like "Pxf5Ma".

<?php include("footer.php");  ?>