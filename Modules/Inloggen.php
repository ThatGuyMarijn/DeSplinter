<?php 
    function login($username, $password, $pdo)
    {
        // haal gegevens van de klant op
        $sth = $pdo->prepare("SELECT * FROM users WHERE ")

        // $sth = $pdo->prepare etc..
        
        // if($sth->rowCount() == 1)
        // {
        //     $row = $sth->fetch();
        // }
        // else
        // {
        //     return false;
        // }
    }

    if(isset($_POST["inloggen"]))
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(login($username, $password, $pdo))
        {
            echo "Je bent succesvol ingelogd";
            RedirectToPage(1, 0);
        }
        else
        {
            echo "De gebruikersnaam of het wachtwoord is onjuist. <br />";
            echo "<a href='./index.php?paginaNr=0'>Probeer opnieuw</a>";
        }
    }
    else
    {
        require("./Forms/InloggenForm.php");
    }
?>