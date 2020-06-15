<?php 
    function login($username, $password, $pdo)
    {
        // haal gegevens van de klant op
        $sth = $pdo->prepare("SELECT * FROM users WHERE Username = '$username'");
        $sth->execute();
        
        if($sth->rowCount() == 1)
        {
            $row = $sth->fetch();

            $password = SecurePassword($password, $row["Salt"]);

            if($row["Password"] == $password)
            {
                // TODO: kijken of dit weg kan
                unset($_SESSION["username"]);
                unset($_SESSION["role"]);
                $_SESSION["user_id"] = $row["ID"];
                $_SESSION["username"] = $row["Username"];
                $_SESSION["role"] = $row["Role"];
                $_SESSION["login_string"] = SecurePassword($password, $_SERVER["HTTP_USER_AGENT"]);

                $parameters = array(":StudentID"=>$_SESSION["user_id"]);
                $sth = $pdo->prepare("SELECT ClassID FROM student_class WHERE StudentID=:StudentID");
                $sth->execute($parameters);
                $secondRow = $sth->fetch();

                $_SESSION["class_id"] = $secondRow["ClassID"];
                echo "<script>console.log('ik geef true');</script>";
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

    // kijkt of de user al ingelogd is
    // misschien LoginCheck gebruiken?
    if($_SESSION["role"] == "Teacher" || $_SESSION["role"] == "Student")
    {
        if(isset($_POST["inloggen"]))
        {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if(login($username, $password, $pdo))
            {
                echo "<p>Je bent succesvol ingelogd</p>";
                if($_SESSION["role"] == "Student")
                {
                    echo "<script>console.log('redirect naar 2, 10');</script>";
                    RedirectToPage(2, 10);
                }
                if($_SESSION["role"] == "Teacher")
                {
                    echo "<script>console.log('redirect naar 2, 20');</script>";
                    RedirectToPage(2, 20);
                }
            }
            else
            {
                echo "<p>De gebruikersnaam of het wachtwoord is onjuist. <br /></p>";
                echo "<a href='./index.php?paginaNr=0'>Probeer opnieuw</a>";
            }
        }
        else
        {
            require("./Forms/InloggenForm.php");
        }
    }
?>