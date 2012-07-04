<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 02, 2010
*/

	import_request_variables("gp", "rvar_");
	include("header.php");

	require_once dirname(__FILE__).'/src/ESAPI.php';
	$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
	$ESAPI = new ESAPI();	

	$encoder = ESAPI::getEncoder();
	

	$rvar_input = "<p>test <b>this</b> <script>alert(document.cookie)</script><i>right</i> now</p>";
	
	$markup = "testing";
	if( $rvar_input != null ){
	
		$instance = ESAPI::getValidator();
		$markup = $instance ->getValidSafeHTML("input",$rvar_input,2500,false);
	}
?>
<h2>Exercise: Enter Rich HTML Markup</h2>
<form action="RichContentSecure.php?function=RichContent&mode=secure" method="POST">
	<table width="100?" border="1">
		<tr>
			<th width="50?">Enter whatever markup you want</th>
			<th>Safe HTML rendered</th>
			<th>HTML encoded</th></tr>
		<tr>
			<td>
				<textarea style="width:400px; height:150px" name="input"><?=$rvar_input ?></textarea>
				<input type="submit" value="render"><br>
			</td>
			<td><?=$markup ?></td>
			<td>
				<?= $encoder -> encodeForHTML($markup) ?>
			</td>
		</tr>
	</table>
</form>


<?php include("footer.php");  ?>