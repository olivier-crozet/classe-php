<?php

session_start();

include("user.php");
$pd = new connexion();

if (!empty($_POST['submitdeco'])) 
    {   	
    unset ( $_SESSION ['id'] );
    unset ($_SESSION['login']);	
$erreur="<p> class='codeerreur'>vous n'etes pas connecté !</p>";
    }
               //si on clique sur la connexion
if ( isset($_SESSION['id'])) 
{
	echo "vous etes connecter";
}

 if (!empty($_POST['submitdeco'])) 
    {   	
    unset ( $_SESSION ['id'] );
    unset ($_SESSION['login']);	
$erreur="<p> class='codeerreur'>vous n'etes pas connecté !</p>";
    }

    //connexion
if (isset($formconnexion))
 {
 	echo "string";
	if (!empty($_POST['login']) && !empty($_POST['password']) && empty($_POST['email']) && empty($_POST['firstname']) && empty($_POST['lastname']))
	 {
	 	echo "AAAA";
	 		$loginconexion = htmlspecialchars($_POST['login']);
		$passwordconexion = sha1($_POST['password']);
		$po -> register($login,$password);
	 }
	 else
	 {
	 	echo "plus de trois caractere !";
	 }
}

?>


<DOCTYPE html>

	<body>
		<form method="post" action="">

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
                <label  for="passwordconect">mot de passe :</label>
              </td>
              <td>
                <input type="password" name="password" placeholder="ecrire votre mot de passe">
              </td>
          </tr>    
        </table>
        <input class="butonconexion" type="submit" name="formconnexion" value="CONNEXION"/>
    </br>
     <input class="butonconexion" type="submit" name="submitdeco" value="DECONNEXION"/>
    </form>
</body>
</html>