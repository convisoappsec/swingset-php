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

<script type="text/javascript" src="javascript/jquery-1.2.6.js"></script>

<script>
//create random get parameter to prevent caching

function timestamp() {
      var nowDate = new Date();
      return nowDate.getTime();
}
function getRandomBoolean() {
$("#randomBoolean").load('ajax?function=Randomizer&mode=secure&method=getRandomBoolean&timestamp='+timestamp());
}
function getRandomFileName() {
$("#randomFileName").load("ajax?function=Randomizer&mode=secure&method=getRandomFileName&fileExtension="+document.secureDemo.fileExtension.value+'&timestamp='+timestamp());
}
function getRandomInteger() {
$("#randomInteger").load("ajax?function=Randomizer&mode=secure&method=getRandomInteger&min="+document.secureDemo.min.value+"&max="+document.secureDemo.max.value+'&timestamp='+timestamp());
}
function getRandomLong() {
$("#randomLong").load('ajax?function=Randomizer&mode=secure&method=getRandomLong&timestamp='+timestamp());
}
function getRandomReal() {
$("#randomReal").load("ajax?function=Randomizer&mode=secure&method=getRandomReal&minFloat="+document.secureDemo.minFloat.value+"&maxFloat="+document.secureDemo.maxFloat.value+'&timestamp='+timestamp());
}
function getRandomString() {
$("#randomString").load("ajax?function=Randomizer&mode=secure&method=getRandomString&length="+document.secureDemo.length.value+"&charSet="+document.secureDemo.charSet.value+'&timestamp='+timestamp());
}

</script>

<h2 align=center>Exercise</h2>
<form name="secureDemo" action="?function=Randomizer&mode=secure" method="POST">
<p>The methods on this page are routed through ESAPI, which provides access to a cryptographically secure PRNG.</p>
	<div>
		<h4>Generate a random boolean</h4>
		Random Boolean: <font color="green"><span id="randomBoolean"></span></font>
		<br /><br />
		<input type="button" value="Get Random Boolean" onclick="getRandomBoolean()" />
	</div>
	<div>
		<br /><h4>Specify a file extension in the text field below to generate an unguessable random file name</h4>
		File Extension:
		<input type="text" name="fileExtension"/>
		<input type="button" value="Submit" onclick="getRandomFileName()" />
		<br /><br />Random File Name: <font color="green"><span id="randomFileName"></span></font>
	</div>
	<div>
		<br /><h4>Generate a random integer in between min and max parameters</h4>
		<p>Note: The random integer will be generated based on the given min and max, where min is inclusive and max is exclusive.</p>
		Min: <input type="text" name="min"/>
		Max: <input type="text" name="max"/>
		<input type="button" value="Submit" onclick="getRandomInteger()" />
		<br /><br />Random Integer: <font color="green"><span id="randomInteger"></span></font>
	</div>
	<div>
		<br /><h4>Generate a random long value</h4>
		Random Long: <font color="green"><span id="randomLong"></span></font>
		<br/><br/><input type="button" value="Submit" onclick="getRandomLong()" />
	</div>
	<div>
		<br /><h4>Generate a random real in between min and max parameters</h4>
		<p>Note: The random real will be generated based on the given min and max.</p>
		Min: <input type='text' name='minFloat'/>
		Max: <input type='text' name='maxFloat'/>
		<input type="button" value="Submit" onclick="getRandomReal()" />
		<br /><br />Random Real: <font color="green"><span id="randomReal"></span></font>
	</div>
	<div>
		<br /><h4>Generate a random string of a desired length and character set.</h4>
		<p>Sample test values:&nbsp;&nbsp;Length=10&nbsp;&nbsp;Char Set= abc</p>
		Length: <input type='text' name='length'/>
		Char Set: <input type='text' name='charSet'/>
		<input type="button" value="Submit" onclick="getRandomString()" />
		<br /><br />Random String: <font color="green"><span id="randomString"></span></font>
	</div>	
</form>

<?php include("footer.php");  ?>