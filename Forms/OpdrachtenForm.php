<form method="POST">
    <?php for($i = 0; $i < count($_SESSION["tasks"]); $i++)
        {
            echo "<label>".$_SESSION["tasks"][$i].$_SESSION["tasks"][$i+1].$_SESSION["tasks"][$i+2]."=</label>";
            echo "<input type='number' name='answer$i' />";
            echo "<br />";
            $i += 2;
        }
        echo "<input type='submit' name='opdrachten' value='Volgende' />";
        ?>
</form>
<br />