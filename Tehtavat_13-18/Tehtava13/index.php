<!--Tehtävä 13-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tehtava13</title>
    <style>
        input {
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
   <h1>Lomake</h1>
    <form action="teht13_post.php" method="post">
        <label for="name">Nimi: </label>
        <input type="text" name="name">
        <br>
        <label for="address">Osoite: </label>
        <input type="text" name="address">
        <br>
        <label for="number">Puhelin: </label>
        <input type="text" name="number">
        <br>
        <label for="book1">Kirja 1: </label>
        <input type="text" name="book1">
        <br>
        <label for="book2">Kirja 2:</label>
        <input type="text" name="book2">
        <br>
        <label for="book3">Kirja 3: </label>
        <input type="text" name="book3">
        <br>
        <input type="submit" name="submit">
    </form>
</body>
</html>