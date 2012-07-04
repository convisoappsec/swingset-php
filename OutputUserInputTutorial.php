<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Jan 28, 2010
*/

	include("header.php");

?>

<h2 align="center">Tutorial</h2>

<p>This lesson shows how to use user input in a webpage without
introducing scripting vulnerabilities. In the insecure demonstration,
any text that you put in the box
will become a part of the webpage.</p>

<p class="newsItem">
	<code>
    $name = $_GET['name'];<br />
    &lt;p>Hello, &lt;?=$name?&gt;&lt;/p&gt;<br />
	</code>
</p>

Notice that the input
will show up in the text of the page right after the word "Hello."
If you enter a script in the field, it will become a part of the page
and will run.</p>

<p>EXAMPLE: <b>&lt;script&gt;alert(document.cookie)&lt;/script&gt;</b></p>

<p>Notice that the input was used twice in the page. Did you see that the
input was also used to repopulate the form field itself.

<p class="newsItem">
	<code>
    &lt;input name='name' value='&lt;?=$name ?>'>
	</code>
</p>


This can be used for
XSS attacks as well. Try the example attack below and then click
in and out of the field with your mouse. Note that you don't need to use any
greater-than or less-than characters for this attack. If you're having trouble, use your
browser's view source function to see just where your attack ended up.</p>

<p>EXAMPLE: <b>' onblur='alert(document.cookie)</b></p>

<p><b>To fix the problem, we can wrap the user input contained in the "name" parameter
with a call to the ESAPI Encoder.encodeForHTML() method.
The encodeForHTML() method uses a "whitelist" HTML entity encoding algorithm to ensure that
they cannot be interpreted as script. The Encoder ensures that there are no double-encoded
characters in the input. This call should be used to wrap any user input
being rendered in HTML element content.</b></p>

<p class="newsItem">
	<code>
	&lt;?php<br/>
	<span style="padding-left: 25px;">require_once dirname(__FILE__).'/src/ESAPI.php';</span><br />
	<span style="padding-left: 25px;">$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");</span><br />
	<span style="padding-left: 25px;">$ESAPI = new ESAPI();</span><br />
	    <br />
	<span style="padding-left: 25px;">$encoder = ESAPI::getEncoder();</span><br />
	<span style="padding-left: 25px;">$encoderNomeHtml = $encoder -> encodeForHTML($name);</span><br />
	?&gt;<br />
    &lt;p&gt;Hello, &lt;?=$encoderNomeHtml?>&lt;/p&gt;
	</code>
</p>

<p><b>For the HTML attribute, the updated page uses ESAPI::getEncoder()->encodeForHTMLAttribute($name).
This call does a slightly different encoding that is more effective with attributes.</b></p> 

<p class="newsItem">
	<code>
	&lt;?php<br/>
	<span style="padding-left: 25px;">require_once dirname(__FILE__).'/src/ESAPI.php';</span><br />
	<span style="padding-left: 25px;">$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");</span><br />
	<span style="padding-left: 25px;">$ESAPI = new ESAPI();</span><br />
	    <br />
	<span style="padding-left: 25px;">$encoder = ESAPI::getEncoder();</span><br />
	<span style="padding-left: 25px;">$encoderNomeHtml = $encoder -> encodeForHTML($name);</span><br />
	?&gt;<br />
	
    &lt;form action="main.php?function=OutputUserInput&secure" method="POST"&gt;<br />
        <span style="padding-left: 25px;">&lt;p>Enter your name:&lt;/p&gt;</span><br />
        <span style="padding-left: 25px;">&lt;input name='name' value='&lt;?=$encoderNomeHtml ?&gt;'&gt;</span><br />
        <span style="padding-left: 25px;">&lt;input type='submit' value='submit'&gt;</span><br />
    &lt;/form&gt;
	</code>
</p>

<?php include("footer.php");  ?>
