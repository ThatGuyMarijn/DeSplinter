<?php
    if(LoginCheck($pdo))
    {
        if($_SESSION["role"] == "Student")
        {
            // Hier komt de leraren pagina
            echo "<h2>Activiteiten Logboek</h2>";
            $sth = $pdo->prepare("SELECT Activity, Time FROM activities ORDER BY Time DESC");
            $sth->execute();

            echo
            "
            <table>
                <tr>
                    <th>Activiteit<th>
                    <th>Datum</th>
                </tr>
            ";
            while($row = $sth->fetch())
            {
                echo "<tr>";
                echo "<td>" . $row["Activity"] . "</td>";
                echo "<td>" . $row["Time"] . "</td>";
                echo "</tr>";
            }
            echo
            "
            </table>
            ";


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