<?php
    function ConnectDB()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=desplinter", "root");
        return $pdo;
    }

    function RedirectToPage($seconds = NULL, $paginaNr = NULL)
    {
        if(!empty($seconds))
            $refresh = "Refresh: ".$seconds.";URL=";
        else
            $refresh = "location:";

        if(!isset($pginaNr))
        {
            echo "<br />Je wordt binnen ".$seconds." seconden doorgestuurd naar de hoofdpagina.";
            header($refresh . "index.php");
        }
        else
        {
            header($refresh . "index.php?paginaNr=".$paginaNr);
        }
    }

    function LoginCheck($pdo)
    {
        // TODO: LoginCheck moet nog gemaakt worden, overnemen van cinema7?
        return true;
    }

    function SecurePassword($password = NULL, $salt = NULL)
    {
        // hier maken we nog een salt aan
        if(isset($password))
        {
            $password = hash("sha512", $password . $salt);
            return $password;
        }
        else
        {
            // voor als de salt nodig hebben voor in de database
            return $salt;
        }
    }

    function CreateGuid()
    {
        mt_srand((double)microtime()*10000);
        $charID = strtoupper(md5(uniqid(rand(), true)));
        $hypen = chr(45);
        $uuid = substr($charID, 0, 8).$hypen
            .substr($charID, 8, 4).$hypen
            .substr($charID, 12, 4).$hypen
            .substr($charID, 16, 4).$hypen
            .substr($charID, 20, 12);
        return $uuid;
    }
?>