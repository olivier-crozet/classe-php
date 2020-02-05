<?php

/**
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


                  $connexion=mysqli_connect("localhost","root","","bddclass");
                  $reqdoublon = "SELECT login FROM `user` where login=\"$login\";";
                  $req=mysqli_query($connexion,$reqdoublon);                 
              $retour=mysqli_num_rows($req);

                           if($retour==0)
                           {                 
                           echo "tamere";           
                            $requete="INSERT INTO user(login,password,email,firstname,lastname)
                            VALUES (\"$login\",\"$password\",\"$email\",\"$firstname\",\"$lastname\")";                
                            $inser= mysqli_query($connexion, $requete);
                             
                          } 
                          else
                          {
                            echo "ce login existe deja !";
                          }  
    	}
     	
}


?>