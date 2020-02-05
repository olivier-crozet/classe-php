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


?>