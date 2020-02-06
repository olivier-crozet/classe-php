<?php

session_start();

include("user.php");
$pd = new user();


               //si on clique sur la connexion
 if (!empty($_POST['submitdeco'])) 
    {   	
    unset ( $_SESSION ['id'] );
    unset ($_SESSION['login']);	
$erreur="<p> class='codeerreur'>vous n'etes pas connecté !</p>";
    }

?>

<DOCTYPE html>

	<body>
		<form method="post" action="">
			<?php
			
if (!empty($_POST["submit"])) 
{

      if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) 
      {
      	$login = htmlspecialchars($_POST['login']);
       $email = htmlspecialchars($_POST['email']);
       $firstname = htmlspecialchars($_POST['firstname']);
       $lastname = htmlspecialchars($_POST['lastname']);
       $password = sha1($_POST['password']);

       $pd -> register($login,$password,$firstname,$lastname,$email);
   }
else
  {
    echo "tous les champs doivent etre complétés !";
  }

}

?>
 <table class="inputconexion" >
          <tr>
              <td>
                <label  for="login"> login :</label>
              </td>
              <td>
                <input type="text" name="login" placeholder="ecrire votre pseudo" value=""><!--php pour laisser le text dans l'input-->
              </td>
          </tr>
           <tr>
              <td>
                <label  for="email"> mail :</label>
              </td>
              <td>
                <input type="mail" name="email" placeholder="mail" value="">
              </td>
          </tr>
          <tr>
              <td>
                <label  for="firstname"> prenom :</label>
              </td>
              <td>
                <input type="text" name="firstname" placeholder="prenom" value="">
              </td>
          </tr>
           <tr>
              <td>
                <label  for="lastname"> nom :</label>
              </td>
              <td>
                <input type="text" name="lastname" placeholder="nom" value="">
              </td>
          </tr>

          <tr>
               <td>
                <label  for="passwordconect">mot de passe :</label>
              </td>
              <td>
                <input type="password" name="password" placeholder="ecrire votre mot de passe">
              </td>
          </tr>    
        </table>
        <br/>
                <input class="butonconexion" type="submit" name="submit" value="inscription"/>  
        <br/><br/>
        		<input class="butonconexion2" type="submit" name="submitdeco" value="se deconnecté"/>       		   
          </form>
        
         
        </table>

    </body>
</html>
