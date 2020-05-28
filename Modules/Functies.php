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
?>