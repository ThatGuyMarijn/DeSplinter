<?php
    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Student")
        {
            // hier komt de leerlingen pagina in
            echo "<a href='./index.php?paginaNr=11'>Opdrachten</a>";
        }
        elseif($_SESSION["role"] == "Teacher")
        {
            // Redirect naar leraren pagina
            RedirectToPage(0, 20);
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