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
                // looped door elke opdracht/antwoord
                for($i = 0; $i < count($_SESSION["tasks"]); $i++)
                {
                    $numOne = $_SESSION["tasks"][$i];
                    $currentOperator = $_SESSION["tasks"][$i+1];
                    $numTwo = $_SESSION["tasks"][$i+2];
                    $answer = $_POST["answer$i"];

                    // haalt het correcte antwoord uit de functie
                    $correctAnswer = CheckAnswer($numOne, $currentOperator, $numTwo);

                    // zet het antwoord en het juiste antwoord in een array
                    array_push($_SESSION["answers"], $answer, $correctAnswer);

                    $i += 2;
                }

                // Kijken hoeveel opdrachten je daadwerkelijk goed hebt

                $totalCorrectAnswers = 0;
                $totalFailedAnswers = 0;

                for($i = 0; $i < count($_SESSION["answers"]); $i++)
                {
                    $answer = $_SESSION["answers"][$i];
                    $correctAnswer = $_SESSION["answers"][$i+1];

                    if($answer == $correctAnswer)
                        $totalCorrectAnswers++;
                    else
                        $totalFailedAnswers++;

                    $i += 1;
                }

                $parameters = array(":Guid"=>CreateGuid(),
                                    ":StudentID"=>$_SESSION["user_id"],
                                    ":Date"=>date("Y-m-d H:i:s"),
                                    ":Type"=>"Oefening",
                                    ":Correct"=>$totalCorrectAnswers);
                $sth = $pdo->prepare("INSERT INTO progress (ID, StudentID, Date, Type, Correct)
                                                    VALUES (:Guid, :StudentID, :Date, :Type, :Correct)");
                
                if($sth->execute($parameters))
                {
                    // Succesvol geexecute
                    echo "<script>console.log('saved');</script>";
                }
            }
            else
            {
                // opdracht is nog niet gesubmit
                TaskSetup($pdo);
                GenerateTasks(10);
                require("./Forms/OpdrachtenForm.php");
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