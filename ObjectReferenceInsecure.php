<?php
/**
* OWASP Enterprise Security API (ESAPI)
* 
* @author Ishida, M‡rcio AndrŽ (mishida@conviso.com.br)
* Created on Feb 9, 2010
*/
	
	import_request_variables("gp", "rvar_");
	include("header.php");
	
	$hashMap = array(
		"Admin" => "My password is abc123.  It's really secure, but it controls EVERYTHING, so don't tell anyone - please.",
		"admin"=> "So long, and thanks for all the fish<br />So sad that it should come to this<br />We tried to warn you all, but, oh, dear<br />You may not share out intellect<br />Which might explain your disrespect<br />For all the natural wonders that grow around you<br />So long, so long, and thanks for all the fish! The world's about to be destroyed<br />There's no point getting all annoyed<br />Lie back and let the planet dissolve around you<br />Despite those nets of tuna fleets<br />We thought that most of you were sweet<br />Especially tiny tots and your pregnant women<br />So long, so long, so long, so long, so long! So long, so long, so long, so long, so long! So long, so long, and thanks for all the fish!<br /> If I had just one last wish<br />I would like a tasty fish!<br />If we could just change one thing<br />We would all have learnt to sing!<br />Come one and all<br />Man and mammal<br />Side by side<br />In life's great gene pool!<br />So long, so long, so long, so long, so long<br />So long, so long, so long, so long<br />So long, so long and thanks for all the fish! ",
		"Jeff1"=> "Take the blue pill... trust me!",
		"Jeff2"=> "The Matrix has you.",
		"Jeff3"=> "We're two wild and crazy guys!",
		"Kevin1"=> "Tron, is that you?",
		"Kevin2"=> "Oh man...when you're on the other side of the screen...it all looks so easy... ",
		"Kevin3"=> "I should never have written all of those tank programs!",
		"matrix"=> "Do you want to know what <i>it</i> is?",
		"matrix1"=> "The Matrix is everywhere. It is all around us. Even now, in this very room. You can see it when you look out your window or when you turn on your television. You can feel it when you go to work... when you go to church... when you pay your taxes. It is the world that has been pulled over your eyes to blind you from the truth.",
		"matrix2"=> "The Matrix is a system, Neo. That system is our enemy. But when you're inside, you look around, what do you see? Businessmen, teachers, lawyers, carpenters. The very minds of the people we are trying to save. But until we do, these people are still a part of that system and that makes them our enemy. You have to understand, most of these people are not ready to be unplugged. And many of them are so inert, so hopelessly dependent on the system, that they will fight to protect it.",
	);	
	
	$arraySession = array(
		"do0"=> "Admin",
		"do1"=> "admin",
		"do2"=> "Jeff1",
		"do3"=> "Jeff2",
		"do4"=> "Jeff3",
		"do5"=> "Kevin1",
		"do6"=> "Kevin2",
		"do7"=> "Kevin3",
		"do8"=> "matrix",
		"do9"=> "matrix1",
		"do10"=> "matrix2"
	);
	
	
	try{
		if( $rvar_user != null){
			$user = $hashMap[$rvar_user];
		}
	}catch (Exception $e){
		echo "ERROR = ".$e."<br>";
	}
	$found = false;
	$quote = "Change the URL to access other files...";
	if($rvar_user != null){
		$found = true;
		$quote = $hashMap[$rvar_user];
	} 
	$href="?function=ObjectReference&mode=insecure&user=";
	
	
?>

<h2>Exercise: Insecure Object Reference</h2>
<table width="30%" border="1">
<tr><th width="50%">List of Users</th></tr>
<tr><td><a href="<?=$href . $arraySession["do0"] ?>"><?=$arraySession["do0"] ?></a></td></tr>
<tr><td><a href="<?=$href . $arraySession["do1"] ?>"><?=$arraySession["do1"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do2"] ?>"><?=$arraySession["do2"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do3"] ?>"><?=$arraySession["do3"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do4"] ?>"><?=$arraySession["do4"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do5"] ?>"><?=$arraySession["do5"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do6"] ?>"><?=$arraySession["do6"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do7"] ?>"><?=$arraySession["do7"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do8"] ?>"><?=$arraySession["do8"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do9"] ?>"><?=$arraySession["do9"] ?></a></td></tr> 
<tr><td><a href="<?=$href . $arraySession["do10"] ?>"><?=$arraySession["do10"] ?></a></td></tr>
</table>
<br />  
<? if($found){ ?>User's message:  <br /><p style="color: red"><?} ?><?=$quote ?></p><br />








<?php include("footer.php");  ?>