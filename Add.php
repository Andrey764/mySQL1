<?
if (isset($_POST['title'], $_POST['manufacturer'])) {
    $link = mysqli_connect("localhost", "root", "", "Shop") or die("Не удалось подключиться к серверу");
    if ($link != false) {
        $title = $_POST['title'];
        $manufacturer = $_POST['manufacturer'];
        $query = "INSERT INTO `products`(`Title`, `Manufacturer`) VALUES ('$title','$manufacturer')";
        $res = mysqli_query($link, $query);
        if ($res)
            echo "<h2>Товар успешно добавлен!</h2>";
    }
}

?>
<a href='Index.php'>на главную</a>;
<form action="Add.php" method="POST">
    <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Title:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" name="title">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Manufacturer:</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" name="manufacturer">
    </div>
    <input type="submit" class="btn btn-primary" value="SAVE">
</form>