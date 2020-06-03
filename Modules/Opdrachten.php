<?php
    // deze file is voor de opdrachten van de ''opdracht'' te laten zien en die je kunt beantwoorden
    // het menu wordt op een later moment gemaakt :)

    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Student")
        {
            // zorgt dat de student de juiste sommen en operators krijgt
            TaskSetup($pdo);

            for($i = 0; $i < 1; $i++)
            {
                $numOne = mt_rand(1, $_SESSION["maxValue"]);
                $numTwo = mt_rand(1, $_SESSION["maxValue"]);

                $x = array_rand($_SESSION["operators"]);
                switch($_SESSION["operators"][$x])
                {
                    case "+":
                        echo "<p>$numOne + $numTwo = </p>";
                        break;
                    case "-":
                        echo "<p>$numOne - $numTwo = </p>";
                        break;
                    case "*":
                        echo "<p>$numOne x $numTwo = </p>";
                        break;
                    case "/":
                        echo "<p>$numOne / $numTwo = </p>";
                        break;
                }
                // end of forloop
            }
        }
        else
        {
            echo "Je hebt niet de juiste bevoegdheid voor deze pagina.";
            // TODO: redirect de persoon terug naar zijn rol behorende home pagina
            RedirectToPage(3, NULL);
        }
    }
    else
    {
        // Redirect naar login pagina
        RedirectToPage();
    }
?>