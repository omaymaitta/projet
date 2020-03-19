<?php 

function connexion($host,$user,$pass,$bdd)
{


	$a=mysqli_connect($host,$user,$pass,$bdd);
	return $a;

}


function deconnexion()
{
	global $con;
	return mysqli_close($con);
}

function recuperervarpost($b)
{
	if(!empty($_POST[$b]))
	return $_POST[$b];
else{
	$s="";
	return $s;}
}

function select($table,$log,$pass,$con)
{
	
	 $b="select * from user where login='".$log."'and pass='".$pass."'";
    $r=mysqli_query($con,$b);
	if($v=mysqli_fetch_array($r)){
	$_SESSION['login']=$v['login'];
   $_SESSION['statut']=$v['statut'];
   $_SESSION['pass']=$v['pass'];
   return $_SESSION['statut'];
    }
    
   else
   	echo "login or mot de passe inorrect</br></br>";
}

function erreur($log,$pass,$statut)
{	
    if(!empty($_POST['l'])&& !empty($_POST['p'])&& !empty($statut))
    {
    	$ss="";
    	return $ss;
    }
    else{ 
    	if(empty($_POST['l']))
		echo"veuillez saisir votre login </br>";
	     if(empty($_POST['p']))
		echo"veuilles saisir votre mot de passe </br>";
	if(empty ($statut) )
		echo" votre statut n’est pas autorisé ";
}

}
 function redirection($statut) {
	header('location:'.$statut.'.php');
}

function ajout_entree($statut ) 
{
	global $erreur;
	if($erreur=="")
	{
		$f = fopen('historique.txt','a');
		$d = date("d/m/Y h:i:s");
		$data = "*************************".PHP_EOL;
		$data .= "Laayoune le : ".$d.PHP_EOL;
		$data .= "    USER : ".$_SESSION['login'].PHP_EOL;
		$data .= "    PASSWORD : ".crypt($_SESSION['pass'],'blowfish').PHP_EOL;
		$data .= "    STATUT : ".$statut.PHP_EOL;

		fputs($f,$data);
		fclose($f);
	}
	

}

?>
