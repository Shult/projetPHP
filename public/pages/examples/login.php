<?php
    session_start();

    if(isset($_POST['email']) && isset($_POST['password'])){
        // Sécurité
        $Email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
        $MotDePasse = htmlentities($_POST['mdp'], ENT_QUOTES, "UTF-8");
        // Connexion à la base de données
        $servername = 'localhost';
        $username = 'admin';
        $password = 'RFnnQX54419H--';

        //on se connecte à la base de données:
        $mysqli = mysqli_connect($servername, $username, $password, "projetPhp");
        //on vérifie que la connexion s'effectue correctement:
        if(!$mysqli){
            echo "Erreur de connexion à la base de données.";
        }else{
           echo "Connexion !";
           $Requete = mysqli_query($mysqli,"SELECT alias FROM Student WHERE pwd = '".$MotDePasse."'");
           //$Requete = mysqli_query($mysqli,"SELECT alias FROM Student WHERE login = '".$Email."' AND pwd = '".$MotDePasse."'");
           // Problème juste au dessus à la dernière session !!!
           if(mysqli_num_rows($Requete) == 0) {
               echo "<br>L'email ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
           } else {
               //$_SESSION['email'] = $Email;
               echo "Vous êtes à présent connecté !";
           }
        }


    }



    echo ("<br>Email : ".htmlspecialchars($_POST['email']));
    //echo("all fine");
?>