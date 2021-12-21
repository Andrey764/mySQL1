<?
$link = mysqli_connect("localhost", "root", "", "shop") or die("Не удалось подключиться к серверу");
if ($link != false) {
    if (isset($_POST['title'], $_POST['manufacturer'], $_GET["id"])) {
        $title = $_POST['title'];
        $manufacturer = $_POST['manufacturer'];
        $id = $_GET["id"];
        $query = "UPDATE `products` SET `Title`='$title',`Manufacturer`='$manufacturer' WHERE `Id` = $id";
        $res = mysqli_query($link, $query);
        if ($res)
            echo "<h2>Товар успешно изменен!</h2>";
    }
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "SELECT * FROM products WHERE Id=" . $id;
        $res = mysqli_query($link, $query);

        if ($res) {
            while ($row = mysqli_fetch_array($res)) {
                echo "<a href='Index.php'>на главную</a>
                      <form action='edit.php?id=" . $row[0] . "' method='POST'>
                         <div class='mb-3'>
                             <label for='formGroupExampleInput' class='form-label'>Title:</label>
                             <input type='text' class='form-control' value='$row[1]' id='formGroupExampleInput' name='title'>
                         </div>
                         <div class='mb-3'>
                             <label for='formGroupExampleInput2' class='form-label'>Manufacturer:</label>
                             <input type='text' class='form-control' value='$row[2]' id='formGroupExampleInput2' name='manufacturer'>
                         </div>
                         <input type='submit' class='btn btn-primary' value='SAVE'>
                     </form>";
                break;
            }
        }
    }
}
