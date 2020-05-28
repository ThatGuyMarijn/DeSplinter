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
    <select name="role">
        <option value="teacher">Leraar</option>
        <option value="student">Student</option>
    </select>
    <br />
    <input type="submit" name="registreren" value="Registreren" />
</form>