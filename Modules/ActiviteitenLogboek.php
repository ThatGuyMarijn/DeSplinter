<h2>Activiteiten Logboek</h2>
<table>
    <tr>
        <th>Activiteit</th>
        <th>Datum</th>
    </tr>
    <?php
        $parameters = array(":TeacherID"=>$_SESSION["user_id"]);
        $sth = $pdo->prepare("SELECT Activity, Time FROM activities WHERE TeacherID=:TeacherID ORDER BY Time DESC");
        $sth->execute($parameters);

        while($row = $sth->fetch())
        {
            echo "<tr>";
            echo "<td>" . $row["Activity"] . "</td>";
            echo "<td>" . $row["Time"] . "</td>";
            echo "</tr>";
        }
    ?>
</table>