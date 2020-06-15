<?php
    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Teacher")
        {
            echo "<script>console.log('lerarenmenu is hier');</script>";
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