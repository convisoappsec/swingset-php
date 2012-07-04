<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 02, 2010
*/

	include("header.php");
	
?>
<h2 align="center">Tutorial</h2>



<p>More and more, the data passed around the Internet is "rich", meaning that it
contains markup and the data is intended to be parsed, rendered, and sometimes
executed. Ensuring that this rich data does not contain any malicious instructions
is extremely difficult. Nowhere is this problem more significant than in HTML, the
worst scramble of code and data of all time.</p>

<p>In this page, you can enter whatever rich markup you like in the textarea. When you
submit it, it is returned for rendering on the right. This page a very weak filter that
disallows the string &lt;script&gt;. Try entering some markup to see if you can bypass
this filtering.</p>

<p>EXAMPLE: <b>&lt;script &gt;alert(document.cookie)&lt;/script&gt;</b> - note the space before the &gt;</p>

<p>EXAMPLE: <b>&lt;/textarea&gt;&lt;script&gt;alert(document.cookie)&lt;/script&gt;</b></p>




<p>ESAPI protects against scripts embedded in rich data in a new way. Rather
than trying to search through the input for dangerous characters and patterns,
ESAPI uses another OWASP project called AntiSamy, which fully parses the rich
content and has an extensive set of rules for which tags and attributes are allowed.</p>

<p>The difficulty of verifying whether rich content contains attacks is increasing
rapidly as we use more and more complex formats. Using a robust parser and a whitelist
set of rules is the right approach for detecting and preventing attacks. In addition
to HTML, AntiSamy supports CSS, which is particularly challenging to parse and validate.</p> 

<p>To use ESAPI to validate rich HTML data, use the following approach:</p>

<p class="newsItem">
	<code>
	&lt;?php<br/>
			require_once dirname(__FILE__).'/src/ESAPI.php';<br />
			$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");<br />
			$ESAPI = new ESAPI();<br />
			
			$requestInput = $_GET['input'];<br />
			
			$validator = ESAPI::getValidator();<br />
			$safeMarkup = $validator -> getValidSafeHTML("input",$requestInput,2500,true);<br />
    		// store, use, or render the safeMarkup <br />
	?&gt;<br />

	</code>
</p>







<?php include("footer.php");  ?>