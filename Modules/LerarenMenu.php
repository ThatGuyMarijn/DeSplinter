<?php
    if(LoginCheck($pdo))
    {
        // TODO: Student naar Teacher veranderen
        if($_SESSION["role"] == "Student")
        {
            // Hier komt de leraren pagina
            
            // laad het activiteiten logboek
            require("./Modules/ActiviteitenLogboek.php");

            // laad de klassen


        }
        elseif($_SESSION["role"] == "Student")
        {
            // Redirect naar leerlingen pagina
            RedirectToPage(0, 10);
        }
        else
        {
            // Redirect naar login pagina
            echo "<script>console.log('geen Teacher/Student rol');</script>";
            RedirectToPage();
        }
    }
    else
    {
        echo "<script>console.log('logincheck failed');</script>";
        // Redirect naar login pagina
        RedirectToPage();
    }
?>