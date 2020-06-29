<h2>Activiteiten Logboek</h2>
<table>
    <tr>
        <th>Activiteit</th>
        <th>Datum</th>
    </tr>
    <?php
        $sth = $pdo->prepare("SELECT Activity, Time FROM activities ORDER BY Time DESC");
        $sth->execute();

        while($row = $sth->fetch())
        {
            echo "<tr>";
            echo "<td>" . $row["Activity"] . "</td>";
            echo "<td>" . $row["Time"] . "</td>";
            echo "</tr>";
        }
    ?>
</table>