<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	session_start();
	
	require_once dirname(__FILE__).'/src/reference/RandomAccessReferenceMap.php';
	import_request_variables("gp", "rvar_");
	include("header.php");


	$directReference0 = "Oh man...when you're on the other side of the screen...it all looks so easy... ";
	$directReference1 = "Tron, is that you?";
	$directReference2 = "The Matrix has you.";
	$directReference3 = "Take the blue pill... trust me!";
	$directReference4 = "The Matrix is everywhere. It is all around us. Even now, in this very room. You can see it when you look out your window or when you turn on your television. You can feel it when you go to work... when you go to church... when you pay your taxes. It is the world that has been pulled over your eyes to blind you from the truth.";
	$directReference5 = "The Matrix is a system, Neo. That system is our enemy. But when you're inside, you look around, what do you see? Businessmen, teachers, lawyers, carpenters. The very minds of the people we are trying to save. But until we do, these people are still a part of that system and that makes them our enemy. You have to understand, most of these people are not ready to be unplugged. And many of them are so inert, so hopelessly dependent on the system, that they will fight to protect it.";
	$directReference6 = "PC Load Letter? What does that mean?";			
			
	$instance = new RandomAccessReferenceMap();

	if($rvar_showItem == null){
		$ind0 = $instance->addDirectReference($directReference0);
		$ind1 = $instance->addDirectReference($directReference1);
		$ind2 = $instance->addDirectReference($directReference2);
		$ind3 = $instance->addDirectReference($directReference3);
		$ind4 = $instance->addDirectReference($directReference4);
		$ind5 = $instance->addDirectReference($directReference5);
		$ind6 = $instance->addDirectReference($directReference6);
						
		$_SESSION['ind0']= $ind0;
		$_SESSION['ind1']= $ind1;
		$_SESSION['ind2']= $ind2;
		$_SESSION['ind3']= $ind3;
		$_SESSION['ind4']= $ind4;
		$_SESSION['ind5']= $ind5;
		$_SESSION['ind6']= $ind6;
		
		
		$_SESSION["$ind0"] = $directReference0;
		$_SESSION["$ind1"] = $directReference1;
		$_SESSION["$ind2"] = $directReference2;
		$_SESSION["$ind3"] = $directReference3;
		$_SESSION["$ind4"] = $directReference4;
		$_SESSION["$ind5"] = $directReference5;
		$_SESSION["$ind6"] = $directReference6;
	}
	$href="?function=ObjectReference&mode=secure&showItem=";
	$output = "Click a link or change the URL to change this message.";

	$dir0 = $_SESSION["$ind0"];
	$dir1 = $_SESSION["$ind1"];
	$dir2 = $_SESSION["$ind2"];
	$dir3 = $_SESSION["$ind3"];
	$dir4 = $_SESSION["$ind4"];
	$dir5 = $_SESSION["$ind5"];
	$dir6 = $_SESSION["$ind6"];

?>

<h2>Access Reference Maps</h2>
<table width="100%" border="1">
<tr><th width="50%">Links with indirect references</th><th>The direct reference</th></tr>
<tr><td><a href="<?=$href . $_SESSION["ind0"] ?>"><?=$_SESSION["ind0"]  ?></a></td><td><?=$directReference0 ?></td></tr>
<tr><td><a href="<?=$href . $_SESSION["ind1"] ?>"><?=$_SESSION["ind1"] ?></a></td><td><?=$directReference1 ?></td></tr>
<tr><td><a href="<?=$href . $_SESSION["ind2"] ?>"><?=$_SESSION["ind2"] ?></a></td><td><?=$directReference2 ?></td></tr>
<tr><td><a href="<?=$href . $_SESSION["ind3"] ?>"><?=$_SESSION["ind3"] ?></a></td><td><?=$directReference3 ?></td></tr>
<tr><td><a href="<?=$href . $_SESSION["ind4"] ?>"><?=$_SESSION["ind4"] ?></a></td><td><?=$directReference4 ?></td></tr>
<tr><td><a href="<?=$href . $_SESSION["ind5"] ?>"><?=$_SESSION["ind5"] ?></a></td><td><?=$directReference5 ?></td></tr>
<tr><td><a href="<?=$href . $_SESSION["ind6"] ?>"><?=$_SESSION["ind6"] ?></a></td><td><?=$directReference6 ?></td></tr>
</table>
<?
if( $rvar_showItem != null ){
	if($_SESSION[$rvar_showItem] != null){
		$output = $_SESSION[$rvar_showItem];
	}
	else 
		$output = "<p style=\"color: red; display:inline\">Invalid item.</p>  See the value? :)";
}

?>
Message: <?=$output?>
<br /><br />
Click <a href="?function=ObjectReference&mode=secure&refresh">here</a> to get new object mapping.


<?php include("footer.php");  ?>