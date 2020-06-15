<?php
    // deze file is voor de opdrachten van de ''opdracht'' te laten zien en die je kunt beantwoorden
    // het menu wordt op een later moment gemaakt :)

    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Student")
        {
            // TODO: dit is nog een WIP, en zal er misschien niet meer zo uit zien als het klaar is
            if(isset($_POST["opdrachten"]))
            {
                // opdracht is gesubmit
                $answer = $_POST["answer"];
                $numOne = $_POST["numOne"];
                $numTwo = $_POST["numTwo"];
                $currentOperator = $_POST["currentOperator"];
               
                switch($currentOperator)
                {
                    case "+":
                        $correctAnswer = $numOne + $numTwo;
                        break;
                    case "-":
                        $correctAnswer = $numOne - $numTwo;
                        break;
                    case "x":
                        $correctAnswer = $numOne * $numTwo;
                        break;
                    case "/":
                        $correctAnswer = $numOne / $numTwo;
                        break;
                }
                
                if($correctAnswer == $answer)
                {
                    // je antwoord is goed
                    echo "Goed geantwoord";
                    echo "<script>console.log('Correct Answer');</script>";

                }
                else
                {
                    // je antwoord is fout
                    echo "Fout geantwoord";
                    echo "<script>console.log('Wrong Answer');</script>";
                }
            }
            else
            {
                // opdracht is nog niet gesubmit
                
                TaskSetup($pdo);
                // moet nog een andere parameter komen, voor te kijken of de opdracht al gegenereerd is of niet en of hij klaar is
                GenerateTasks(1);

                // for($i = 0; $i < 1; $i++)
                // {
                //     // de numOne, numTwo in een array zetten?
                //     $numOne = mt_rand(1, $_SESSION["maxValue"]);
                //     $numTwo = mt_rand(1, $_SESSION["maxValue"]);

                //     switch($_SESSION["operators"][array_rand($_SESSION["operators"])])
                //     {
                //         case "+":
                //             $currentOperator = "+";
                //             require("./Forms/OpdrachtenForm.php");
                //             break;
                //         case "-":
                //             $currentOperator = "-";
                //             require("./Forms/OpdrachtenForm.php");
                //             break;
                //         case "*":
                //             $currentOperator = "x";
                //             require("./Forms/OpdrachtenForm.php");
                //             break;
                //         case "/":
                //             $currentOperator = "/";
                //             require("./Forms/OpdrachtenForm.php");
                //             break;
                //     }
                //     // end of forloop
                // }
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