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


        $login = htmlspecialchars($_POST['login']);
       $email = htmlspecialchars($_POST['email']);

       $firstname = htmlspecialchars($_POST['firstname']);
       $lastname = htmlspecialchars($_POST['lastname']);
 $password= password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));
			
		 	    if ($login < 249 && $password < 249 && $firstname < 249 && $lastname < 249 )
		 	     {
		 	    	# code...
                 $bdd = new PDO('mysql:host=localhost;dbname=bddclass', 'root', '');

               //   $connexion=mysqli_connect("localhost","root","","bddclass");
                //  $reqdoublon = "SELECT login FROM `user` where login=\"$login\";";
                  $req =  "SELECT login FROM `user` where login=\"$login\";"; 
                  $requser = $bdd->query($req);    
                             
                  //$retour=_num_rows($requser);
                  $retour = $requser->fetchAll(PDO::FETCH_ASSOC);

                  
                  
                           if(empty($retour))
                           {                 
                                 

                        
             
            $query = $bdd->prepare("INSERT INTO user (login,email,firstname,lastname,password) VALUES(?,?,?,?,?)");

           // $requet = $bdd->execute($query);   
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

?>