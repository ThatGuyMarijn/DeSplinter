<?php
    if(LoginCheck($pdo))
    {
        // TODO: wil rol nog niet checken als je account maakt, moet nog oplossen
        if($_SESSION["role"] == "Teacher")
        {

            // update dit zodra RegistrerenForm.php ook meerdere inputs krijgt
            $firstName = $lastName = $password = $retypePassword = NULL;
            $fNameErr = $lNameErr = $passwordErr = $rePasswordErr = NULL;
            
            if(isset($_POST["registreren"]))
            {
                $checkErrors = false;

                $guid = CreateGuid();
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                // haalt de whitespace weg
                $username = strtolower($firstName.$lastName);
                $username = str_replace(" ", "", $username);
                $role = $_POST["role"];
                $class = $_POST["class"];
                $password = $_POST["password"];
                $retypePassword = $_POST["retypePassword"];

                // TODO: Check if username doesnt already exist?

                if(preg_match("/[^A-Za-z]/", $firstName))
                {
                    $fNameErr = "Je kunt alleen letters gebruiken.";
                    $checkErrors = true;
                }

                if(!preg_match("/[A-Za-z]/", $lastName))
                {
                    $lNameErr = "Je kunt alleen letters gebruiken.";
                    $checkErrors = true;
                }

                if($password == $retypePassword)
                {
                    if(!strlen($password) >= 8)
                    {
                        $passwordErr = "Wachtwoord moet minimaal 8 tekens zijn.";
                        $checkErrors = true;
                    }
                    // je hoeft retypePassword niet nog een keer te controleren, want hij is al gelijk aan $password als hij hier komt
                }
                else
                {
                    $passwordErr = "Wachtwoord is niet gelijk";
                    $checkErrors = true;
                }
                // TODO: Moeten nog toevoegen om te kijken of de username al bestaat


                if($checkErrors)
                {
                    require("./Forms/RegistrerenForm.php");
                }
                else
                {
                    // Formulier is succesvol gevalideerd
                    $salt = hash("sha512", uniqid(mt_rand(1, mt_getrandmax()), true));
                    $parameters = array(":ID"=>$guid,
                                        ":FirstName"=>$firstName,
                                        ":LastName"=>$lastName,
                                        ":Username"=>$username,
                                        ":Role"=>$role,
                                        ":Class"=>$class,
                                        ":Password"=>SecurePassword($password, $salt),
                                        ":Salt"=>SecurePassword(NULL, $salt));

                    $sth = $pdo->prepare("INSERT INTO users (ID, FirstName, LastName, Username, Role, Class, Password, Salt)
                                                    VALUES (:ID, :FirstName, :LastName, :Username, :Role,
                                                            :Class, :Password, :Salt)");

                    if($sth->execute($parameters))
                    {
                        // TODO: Moeten de klas nog aanmaken als deze niet bestaat

                        // Voegt de Student / Leraar aan de klas toe
                        echo "<p>Je hebt je succesvol geregistreerd en kan vanaf nu inloggen op de website.</p>";
                        $sth = $pdo->prepare("SELECT * FROM classes WHERE Class=$class");
                        $sth->execute();
                        $classRow = $sth->fetch();
                        
                        if($role == "Student")
                        {
                            // Leerlingen registratie
                            $classID = $classRow["ClassID"];
                            // $guid is userID
                            $sth = $pdo->prepare("INSERT INTO student_class (StudentID, ClassID)
                                                            VALUES ('$guid', '$classID')");
                            $sth->execute();

                            // Stuurt je over 5 seconden naar de LeerlingenMenu.php (Leerlingen Hoofdpagina)
                            RedirectToPage(5, 10);
                        }
                        elseif($role == "Teacher")
                        {
                            // Leraren registratie
                            if(!$sth->rowCount() == 1)
                            {
                                // Hier bestaat de klas nog niet, dus we maken hem aan
                                // hier komen we in principe niet omdat ze maar 3 klassen hebben (4, 5, 6)
                                $classID = CreateGuid();

                                $sth = $pdo->prepare("INSERT INTO classes (ClassID, Class, TeacherID)
                                                                VALUES ('$classID', '$class', '$guid')");

                                $sth->execute();

                                RedirectToPage(5, 20);
                            }
                        }
                    }
                }
            }
            else
            {
                require("./Forms/RegistrerenForm.php");
            }
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