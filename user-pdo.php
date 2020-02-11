<?php

class userpdo 
{
	
	private $id = "";
	public $login = "";
	public $email = "";
	public $firstname = "";
	public $lastname = "";
	


	function inscription($login,$password,$email,$firstname,$lastname)
	{



 $password= password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));
			
		 	    if ($login < 249 && $password < 249 && $firstname < 249 && $lastname < 249 )
		 	     {
		 	    	# code...
                 $bdd = new PDO('mysql:host=localhost;dbname=bddclass', 'root', '');

                  $req =  "SELECT login FROM `user` where login=\"$login\";"; 
                  $requser = $bdd->query($req);    
                             
                  $retour = $requser->fetchAll(PDO::FETCH_ASSOC);
  
                           if(empty($retour))
                           {                 
            $query = $bdd->prepare("INSERT INTO user (login,email,firstname,lastname,password) VALUES(?,?,?,?,?)");  
             $query->execute(array("$login","$email","$firstname","$lastname","$password"));
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




/**
 * 
 */
class conexion
{
  
  function conex()
  {
      $bdd = new PDO('mysql:host=127.0.0.1;dbname=bddclass','root','');

  if (isset($_POST['submit']))
   { 
      $login = htmlspecialchars($_POST['login']);
    $password= password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));
    
      if (!empty($_POST['login']) && !empty($_POST['password']) )
      {
      $requser = $bdd->prepare("SELECT * FROM user where login = '$login' ");
      $requser->execute(array($login,));
      $userexist = $requser->rowcount();

          if($userexist == 1)
           {
                $reqmdp = $bdd ->query("SELECT password FROM user where login = '$login'");
                $mdp_bdd_reponse = $reqmdp -> fetch();
                $mdp = $_POST['password'];

                if(password_verify($mdp, $mdp_bdd_reponse[0]))
                {                  
                   $rec = $bdd -> query("SELECT * FROM user where login = '$login'");
                   $recall = $rec -> fetch();
                   $_SESSION['login'] = $recall['login'];
                   $_SESSION['email'] = $recall['email'];
                   $_SESSION['firstname'] = $recall['firstname'];
                   $_SESSION['lastname'] = $recall['lastname'];
                     echo "conecté";
                }
               
            }

          else
          {
          $erreur = "<br/>mauvais psedo ou mauvais mot de passe !";
          }
          }

      else
      {
      $erreur = "<br/>tous les champ doives etre completés !";
      }
    
  }
  }
}
?>


