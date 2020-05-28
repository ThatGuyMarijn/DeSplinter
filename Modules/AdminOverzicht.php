<?php
    if(LoginCheck(($pdo)))
    {
        $_SESSION["role"] = "Admin";
        if($_SESSION["role"] == "Admin")
        {
            echo "<a href='./index.php?paginaNr=2'>Account Toevoegen</a>";
        }
        else
        {
            echo "Je hebt niet de juiste bevoegdheid voor deze pagina.";
            // TODO: redirect de persoon terug naar zijn rol behorende home pagina
            RedirectToPage();
        }
    }
    else
    {
        // Redirect naar login pagina
        RedirectToPage();
    }
?>