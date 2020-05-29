<?php 
    function login($username, $password, $pdo)
    {
        // haal gegevens van de klant op
        $sth = $pdo->prepare("SELECT * FROM users WHERE Username = '$username'");
        $sth->execute();
        
        if($sth->rowCount() != 0)
        {
            $row = $sth->fetch();

            $password = SecurePassword($password, $row["Salt"]);

            if($row["Password"] == $password)
            {
                $_SESSION["user_id"] = $row["ID"];
                $_SESSION["username"] = $row["Username"];
                $_SESSION["role"] = $row["Role"];

                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
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