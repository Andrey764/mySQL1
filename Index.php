<?
$link = mysqli_connect("localhost", "root", "", "shop") or die("Не удалось подключиться к серверу");
if ($link != false) {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "DELETE FROM Products WHERE  Id=" . $id;
        $res = mysqli_query($link, $query);
        if ($res) {
            echo "<h2>Товар успешно удален!</h2>";
        }
    }
    $query = "SELECT * FROM `products`";
    $res = mysqli_query($link, $query);

    if ($res) {
        echo "<a href='Add.php'>Добавить товар</a>";
        echo "<table class='table table-striped'><thead><tr><th>Id</th><th>Title</th><th>Manufacturer</th><th>Edit</th><th>Delete</th></tr></thead>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td><a href='edit.php?id=" . $row[0] . "'>edit</a></td>";
            echo "<td><a href='index.php?id=" . $row[0] . "'>delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    mysqli_close($link);
}
