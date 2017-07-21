<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava 16</title>
    <style>
        label{
            font-weight: bold;
        }
        .form-group {
            padding: 5px;
            margin: 5px 0 5px 0;
        }
    </style>
</head>
<body>
    <h2>Lomake</h2>
    <form action="data_check.php" method="post">
        <div class="form-group">
            <label for="name">Nimi</label><br>
            <input type="text" name="name"><br>
        </div>
        <div class="form-group">
            <label for="gender">Sukupuoli</label><br>
            <input type="radio" name="gender" value="Mies"> Mies
            <input type="radio" name="gender" value="Nainen"> Nainen
        </div>
        <div class="form-group">
            <label for="education">Koulutus</label><br>
            <input type="checkbox" name="education[]" value="Peruskoulu"> Peruskoulu
            <input type="checkbox" name="education[]" value="Lukio"> Lukio
            <input type="checkbox" name="education[]" value="Ammattikoulu"> Ammattikoulu
            <input type="checkbox" name="education[]" value="Ammattikorkeakoulu"> Ammattikorkeakoulu
        </div>
        <input type="submit">
    </form>
</body>
</html>