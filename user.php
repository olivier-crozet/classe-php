<?php

/** verif taille login
	verification de disponibilité du login
	requette insertion

 * 
 */
class user 
{
	
	private $id = "";
	public $login = "";
	public $email = "";
	public $firstname = "";
	public $lastname = "";
	


	function register($login,$password,$email,$firstname,$lastname)
	{

		if ( $login > 3   && $password > 3 && $firstname >2 && $lastname >2)
		 {
			# code...
		 	    if ($login < 249 && $password < 249 && $firstname < 249 && $lastname < 249 )
		 	     {
		 	    	# code...
		 	   

                  $connexion=mysqli_connect("localhost","root","","bddclass");
                  $reqdoublon = "SELECT login FROM `user` where login=\"$login\";";
                  $req=mysqli_query($connexion,$reqdoublon);                 
              $retour=mysqli_num_rows($req);

                           if($retour==0)
                           {                 
                                     
                            $requete="INSERT INTO user(login,password,email,firstname,lastname)
                            VALUES (\"$login\",\"$password\",\"$email\",\"$firstname\",\"$lastname\")";                
                            $inser= mysqli_query($connexion, $requete);

                             echo $login.$mail.$firstname.$lastname ;
                          } 
                          else
                          {
                            echo "ce login existe deja !";
                          }  
                 }
                 else
                 {
                 	echo "tu te fou de moi !";
                 }          
        }                  
    }
     	
}


/**fonction connexion


*/
/**
 * 
 */
class connexion 
{
	public $login="";


	function register($login,$password)
	{

		$bdd = new PDO('mysql:host=127.0.0.1;dbname=bddclass','root','');
		if (isset($_POST['formconnexion']))
		{ 
			echo "bbbbbbbbbb";
			if (!empty($_POST['psedoconect']) && !empty($_POST['passwordconect']) )
			{
				echo "cccccccccccccc";
				$requser = $connexion->prepare("SELECT * FROM utilisateurs where login = ? AND password = ?");
				$requser->execute(array($loginconexion, $passwordconexion));
				$userexist = $requser->rowcount();
				if($userexist == 1)
				{			
					echo "dddddddddd";
					$userinfo = $requser->fetch();
			     	session_start();
			     	$_SESSION['id'] = $userinfo['id'];
			     	$_SESSION['login'] = $userinfo['login'];

			     	echo $login;
			         	
			     }
			     else
			     {
			     	$erreur = "<br/>mauvais psedo ou mauvais mot de passe !";
			     }
			 }
			 else
			 {
			 	$erreur = "<p class=\"er\"><br/>tous les champ doives etre completés !";
			 }	
		}
	}
}
?>