<form method="POST">
    <label>Voornaam: </label>
    <input type="text" name="firstName" value="<?php echo $firstName; ?>" /><?php echo $fNameErr; ?>
    <br />
    <label>Achternaam: </label>
    <input type="text" name="lastName" value="<?php echo $lastName; ?>" /><?php echo $lNameErr; ?>
    <br />
    <label>Wachtwoord: </label>
    <input type="password" name="password" value="<?php echo $password; ?>" /><?php echo $passwordErr; ?>
    <br />
    <label>Bevestig Wachtwoord: </label>
    <input type="password" name="retypePassword" /><?php echo $rePasswordErr; ?>
    <br />
    <label>Leraar of Student?</label>
    <select name="role">
        <option value="Teacher">Leraar</option>
        <option value="Student">Student</option>
    </select>
    <br />
    <label>In welke groep zit hij/zij?</label>
    <select name="class">
        <option value="4">Groep 4</option>
        <option value="5">Groep 5</option>
        <option value="6">Groep 6</option>
    </select>
    <br />
    <input type="submit" name="registreren" value="Registreren" />
</form>