<?php
    // update dit zodra RegistrerenForm.php ook meerdere inputs krijgt
    $firstName = $lastName = $password = $retypePassword = NULL;
    $fNameErr = $lNameErr = $passwordErr = $rePasswordErr = NULL;

    if(isset($_POST["registreren"]))
    {
        $checkErrors = false;

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $username = strtolower($firstName[0].$lastName);
        $role = $_POST["role"];
        $password = $_POST["password"];
        $retypePassword = $_POST["retypePassword"];
        // to be expanded

        // TODO: moet nog kijken of deze preg_match juist werkt
        if(preg_match("/[^A-Za-z]/", $firstName))
        {
            $fNameErr = "Je kunt alleen letters gebruiken.";
            $checkErrors = true;
        }

        if(!preg_match("/[A-Za-z]/", $lastName))
        {
            $lNameErr = "Je kunt alleen letters gebruiken.";
            $checkErrors = true;
        }
        // hieronder komen nog meer error checks

        if($password == $retypePassword)
        {
            if(!strlen($password) >= 8)
            {
                $passwordErr = "Wachtwoord moet minimaal 8 tekens zijn.";
                $checkErrors = true;
            }
            // je hoeft retypePassword niet nog een keer te controleren, want hij is al gelijk aan $password als hij hier komt
        }
        else
        {
            $passwordErr = "Wachtwoord is niet gelijk";
            $checkErrors = true;
        }


        if($checkErrors)
        {
            require("./Forms/RegistrerenForm.php");
        }
        else
        {
            // Formulier is succesvol gevalideerd
            
            // $password wordt nu het beveiligde wachtwoord die we in de database kunnen stoppen
            $salt = hash("sha512", uniqid(mt_rand(1, mt_getrandmax()), true));
            $password = hash("sha512", $password . $salt);
            $parameters = array(":FirstName"=>$firstName,
                                ":LastName"=>$lastName,
                                ":Username"=>$username,
                                ":Role"=>$role,
                                ":Password"=>$password,
                                ":Salt"=>$salt);

            $sth = $pdo->prepare("INSERT INTO users (FirstName, LastName, Username, Role, Password, Salt)
                                             VALUES (:FirstName, :LastName, :Username,
                                             :Role, :Password, :Salt)");

            if($sth->execute($parameters))
            {
                echo "<p>Je hebt je succesvol geregistreerd en kan vanaf nu inloggen op de website.</p>";
                // TODO: Redirect moet doorsturen naar Leraren overzicht, of leerlingen pagina
                // deze heb ik nog niet aangemaakt dus weet nog niet welke paginaNr dat zullen worden
                RedirectToPage(5, 0);
            }
        }
    }
    else
    {
        require("./Forms/RegistrerenForm.php");
    }
?>