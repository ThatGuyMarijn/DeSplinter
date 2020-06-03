<?php
    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Teacher")
        {
            // Hier komt de leraren pagina
        }
        elseif($_SESSION["role"] == "Student")
        {
            // Redirect naar leerlingen pagina
            RedirectToPage(0, 10);
        }
        else
        {
            // Redirect naar login pagina
            RedirectToPage();
        }
    }
    else
    {
        // Redirect naar login pagina
        RedirectToPage();
    }
?>