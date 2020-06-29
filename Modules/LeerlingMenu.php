<?php
    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Student")
        {
            // hier komt de leerlingen pagina in
            TaskSetup($pdo);

            echo "<h2>Opdrachten</h2>";
            for($i = 0; $i < count($_SESSION["operators"]); $i++)
            {
                $curOperator = $_SESSION["operators"][$i];
                //echo "<a href='./index.php?paginaNr=11'>Sommen met $curOperator</a>";

                switch($_SESSION["operators"][$i])
                {
                    case "+":
                        echo "<a href='./index.php?paginaNr=11&curOp=plus'>Plus-sommen</a>";
                        break;
                    case "-":
                        echo "<a href='./index.php?paginaNr=11&curOp=min'>Min-sommen</a>";
                        break;
                    case "*":
                        echo "<a href='./index.php?paginaNr=11&curOp=keer'>Keer-sommen</a>";
                        break;
                    case "/":
                        echo "<a href='./index.php?paginaNr=11&curOp=deel'>Deel-sommen</a>";
                        break;
                }
                echo "<br />";
            }
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