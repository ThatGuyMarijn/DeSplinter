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
        if(isset($_SESSION["user_id"], $_SESSION["username"], $_SESSION["role"]))
        {
            $parameters = array(":userID"=>$_SESSION["user_id"]);
            $sth = $pdo->prepare("SELECT * FROM users WHERE ID=:userID");
            $sth->execute($parameters);

            if($sth->rowCount() == 1)
            {
                $row = $sth->fetch();
                if(SecurePassword($row["Password"], $_SERVER["HTTP_USER_AGENT"]) == $_SESSION["login_string"])
                {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function SecurePassword($password = NULL, $salt = NULL)
    {
        // hier maken we nog een salt aan
        if(isset($password))
        {
            $password = hash("sha512", $password . $salt);
            return $password;
        }
        else
        {
            // voor als de salt nodig hebben voor in de database
            return $salt;
        }
    }

    function CreateGuid()
    {
        mt_srand((double)microtime()*10000);
        $charID = strtoupper(md5(uniqid(rand(), true)));
        $hypen = chr(45);
        $uuid = substr($charID, 0, 8).$hypen
            .substr($charID, 8, 4).$hypen
            .substr($charID, 12, 4).$hypen
            .substr($charID, 16, 4).$hypen
            .substr($charID, 20, 12);
        return $uuid;
    }

    function CheckTask($numOne, $operator, $numTwo)
    {
        switch($operator)
        {
            case "+":
                return $numOne + $numTwo;
                break;
            case "-":
                return $numOne - $numTwo;
                break;
            case "*":
                return $numOne * $numTwo;
                break;
            case "/":
                return $numOne / $numTwo;
                break;
        }
    }

    function TaskSetup($pdo)
    {
        // haalt de groep/klas uit de database (4, 5, 6)
        $parameters = array(":ClassID"=>$_SESSION["class_id"]);
        $sth = $pdo->prepare("SELECT Class FROM classes WHERE ClassID=:ClassID");
        $sth->execute($parameters);
        $row = $sth->fetch();

        $_SESSION["operators"] = array();

        if($row["Class"] == "4")
        {
            $_SESSION["maxValue"] = 10;
            array_push($_SESSION["operators"], "+", "-", "*");
        }
        elseif($row["Class"] == "5")
        {
            $_SESSION["maxValue"] = 100;
            array_push($_SESSION["operators"], "+", "-", "*", "/");
        }
        elseif($row["Class"] == "6")
        {
            $_SESSION["maxValue"] = 1000;
            array_push($_SESSION["operators"], "+", "-", "*", "/");
        }
    }

    // TODO: komt nog een extra parameter om te kijken of de opdracht al klaar is
    //       zodat we de $_SESSION["tasks"] kunnen leegmaken
    function GenerateTasks($totalTasks)
    {
        $_SESSION["tasks"] = array();

        // Hoeveel sommen moet hij genereren?
        for($i = 0; $i < $totalTasks; $i++)
        {
            $numOne = mt_rand(0, $_SESSION["maxValue"]);
            $numTwo = mt_rand(0, $_SESSION["maxValue"]);

            switch($_SESSION["operators"][array_rand($_SESSION["operators"])])
            {
                case "+":
                    $currentOperator = "+";
                    require("./Forms/OpdrachtenForm.php");
                    break;
                case "-":
                    $currentOperator = "-";
                    require("./Forms/OpdrachtenForm.php");
                    break;
                case "*":
                    $currentOperator = "x";
                    require("./Forms/OpdrachtenForm.php");
                    break;
                case "/":
                    $currentOperator = "/";
                    require("./Forms/OpdrachtenForm.php");
                    break;
            }

            // if(!isset($_SESSION["tasks"]))
            //     $_SESSION["tasks"] = array();

            // array_push($_SESSION["tasks"], $numOne, $currentOperator, $numTwo);
        }
        
    }
?>