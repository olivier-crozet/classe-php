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
?>
<form method="post" action="">
<?php
    //connexion
if (!empty($_POST['conne']))
 {
 	
	if (!empty($_POST['login']) && !empty($_POST['password']))
	 {
	 
	 	$login = htmlspecialchars($_POST['login']);
	 	$password= password_hash($_POST["password"], PASSWORD_DEFAULT,array('cost'=> 12));

		$pd -> registe($login,$password);
	 }
	 else
	 {
	 	echo "plus de trois caractere !";
	 }
}

?>


<DOCTYPE html>

	<body>
		

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
                <label  for="password">mot de passe :</label>
              </td>
              <td>
                <input type="password" name="password" placeholder="ecrire votre mot de passe">
              </td>
          </tr>    
        </table>
        <input class="butonconexion" type="submit" name="conne" value="CONNEXION"/>
    </br>
     <input class="butonconexion" type="submit" name="submitdeco" value="DECONNEXION"/>
    </form>
</body>
</html>