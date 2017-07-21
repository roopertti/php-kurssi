<?php include "./functions.php "; ?>
<?php include "./dates.php "; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Katsastuspalvelu</title>
    <style>
        * {
            font-family: "Arial", sans-serif;
        }
        label {
            font-weight: bold;
        }
        .form-group {
            padding: 5px;
            margin: 5px 5px 5px 5px;
        }
    </style>
</head>
<body>
    <h1>Katsastuspalvelu</h1>
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="reg-num">Rekisterinumero</label><br>
            <input type="text" name="reg-num">
        </div>
        <div class="form-group">
            <label for="owner">Omistajan nimi</label><br>
            <input type="text" name="owner">
        </div>
        <div class="form-group">
            <input type="submit" name="reserve" value="Varaa">
            <input type="submit" name="suggest" value="Ehdota">
        </div>
    </form>
    <?php include "./requests.php" ?>
</body>
</html>