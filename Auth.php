<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
</head>
<body background="bg.jpg"><center>
<h2>Authentification</h2>
		<form method="post" action="">

			<table  width="500px" height="150px">
				<tr>
					<td>Login : </td>
					<td><input type="text" name="l"></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td><input type="password" name="p"></td>
				</tr>
				<tr>
					<td colspan="2"><center><button type="submit" name="s">Se connecter</button></center> </td>
				</tr>
			</table>
			</center>
		</form><br><br>
<center><?php
session_start();
 include("fonctions.php");
$host="localhost";
$user="root";
$p="";
$bdd="gesnote";
$table="user";
$con=connexion($host,$user,$p,$bdd);?>
<h3>Historique</h3>
		<form method="post" action="">
			<input type="submit" name="his" value="Afficher Historique">
		</form>
		<?php
		if(isset($_POST['his']))
		{
			$fi = fopen('historique.txt','r');
			while(!feof($fi))
			{
				$d = fgets($fi);
				echo $d."<br>";
			}
			fclose($fi);
		}
 if(isset($_POST['s']))
{
	
$log= recuperervarpost("l");
$pass= recuperervarpost("p");
$statut=select($table,$log,$pass,$con);
$erreur=erreur($log,$pass,$statut);
ajout_entree($statut );
if($erreur!=="")
	echo"";
else
	redirection($statut);


         

}

?>
</center>
</body>
</html>