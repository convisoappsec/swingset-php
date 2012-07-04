<?php
/*
 * Created on Jan 28, 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
/*	$teste ="teste";
	$param = "param";
	echo "<b><a href=\"index.php?".$teste."&".$param."\"> Tutorial </a> <br>";
 
 	$parce = "main?param=teste";//"&tem";
 	$posicao = stripos($parce,"&");
 	
 	if($posicao != "")
 		echo "branco";
 	else 	
 		echo "tem";*/
 		
 	//	header("Location: http://www.google.com/"); 
/*  
require_once dirname(__FILE__).'/src/ESAPI.php';

$ESAPI = new ESAPI(dirname(__FILE__)."/ESAPI.xml");
$ESAPI = new ESAPI();
$encoder = ESAPI::getEncoder();
*/
/*
$httpUtil = ESAPI::getHttpUtilities();


$self = $_SERVER["PHP_SELF"];

  if($_SERVER["QUERY_STRING"]) {
 
    $finalurl = $self . "?" . $_SERVER["QUERY_STRING"] . 
      "&myvariable=myvalue";   
 
  }else {
 
   $finalurl = $self . "?" . "myvariable=myvalue";  
 
  } 
  
  echo $finalurl;


$t1 = "ZW5jb2RlICd0aGlzJyA8Yj5zdHJpbmc8L2I+IG51bGwgACBieXRl";
$t2 = "ZW5jb2RlICd0aGlzJyA8Yj5zdHJpbmc8L2I+IG51bGwgJiM2NTUzMzsgYnl0ZQ==";

echo base64_decode($t1)." T1 <br>";
echo base64_decode($t2)." T2 <br>";
*/

///*echo strpos($email,"@");
//echo substr($email,0,1);
/*
;

	$c = "".chr(128);
	switch ( $c ) {
		case 'Û':
			$c ="?";
			break;
			
		default:
			break;
	}

	echo chr(127)." Char<br>";

	if($c == chr(127))
		echo "sim";
	else
		echo "nao";	  

$instance = ESAPI::getEncoder();
$class_methods = get_class_methods(get_class($instance));

foreach ($class_methods as $method_name) {
    echo "$method_name\n <br>";
}
$method = "encodeForCSS";
if ( in_array( $method, get_class_methods(get_class($instance) ) ) ) {
	print $instance->$method("<script>");
}

$str = "dummy onmouseover=alert(\'xss2.1\')";

$teste = str_replace(" ","\"",$str);
 
echo $teste; 

$os = array("Mac", "NT", "Irix", "Linux"); 
if (in_array("Irix", $os)) { 
    $key = array_search("Irix",$os);
    echo $os[$key];
}


$fileHandle = "/Users/marcioandreishida/Sites/projetos/esapi/users.txt";
if(file_exists($fileHandle))
	fopen($fileHandle, 'a');
	
	
else
	echo "Nao encontrado";
	*/
	session_start();

$old_sessionid = session_id();

session_regenerate_id();

$new_sessionid = session_id();

echo "Old Session: $old_sessionid<br />";
echo "New Session: $new_sessionid<br />";

print_r($_SESSION);
?>

 