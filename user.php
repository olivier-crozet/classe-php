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


/**fonction connexion


*/
/**
 * 
 */
class connexion 
{
	public $login="";


	function registe($login,$password)
	{

		$connexion=mysqli_connect("localhost","root","","bddclass");
		if (isset($_POST['conne']))
		{ 
			 if (!empty($_POST['login']) && !empty($_POST['password']))
          {
          	 $login2=($_POST['login']);
            $login=htmlspecialchars($_POST['login']);
            $login2=($_POST['login']);
            $password= password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));

// $reqid=("SELECT id FROM utilisateurs where login='$login'");
 //           $idsql = mysqli_query($connexion,$reqid);
   //         var_dump($reqid);
     //       $reidsql = mysqli_fetch_array($idsql);
       //     var_dump($reidsql);
           // echo $idsql ;

            //REQUETTE VERIFICATION
            $requete=("SELECT * FROM user  where login = '$login' ");
            $sql=mysqli_query($connexion,$requete);
            
            $retour=mysqli_fetch_array($sql);  
            $reqid=("SELECT id FROM user where login = '$login2' ");
            $reqisql=mysqli_query($connexion,$reqid);
            $bostring=mysqli_fetch_all($reqisql);


           
             
                 if (password_verify($_POST['password'], $retour['password']))
                 {
                  $_SESSION['login']=$_POST['login'];
                  $_SESSION['password']=$_POST['password'];
                  $_SESSION['id']=$bostring[0][0];
                echo $_SESSION['id'];
                header("location: connexion.php");
                }
            else
            {
              echo "le mot de passe ou le login ne correspond pas !";
            }
          }
   else
   {
    echo "remplissez tous les champs !";
   }
		}
	}
}
?>