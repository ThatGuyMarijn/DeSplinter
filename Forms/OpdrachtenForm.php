<form method="POST">
    <?php echo "<label>$numOne $currentOperator $numTwo = </label>";?>
    <input type="number" name="answer" />
    <br />
    <input type="submit" name="opdrachten" value="Volgende" />

    <input type="hidden" name="numOne" value="<?php echo $numOne;?>" />
    <input type="hidden" name="currentOperator" value="<?php echo $currentOperator;?>" />
    <input type="hidden" name="numTwo" value="<?php echo $numTwo;?>" />
</form>
<br />