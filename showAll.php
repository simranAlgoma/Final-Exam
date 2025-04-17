
<?php include 'header.php'; ?>
<?php
$mysqli = new mysqli("localhost", "root", "", "final");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = (int)$_POST['delete_id'];
    $mysqli->query("DELETE FROM string_info WHERE string_id = $delete_id");
}


$result = $mysqli->query("SELECT * FROM string_info");

while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['string_id'] . " — Message: " . $row['message'] . "<br>";
}
?>

<br>
<form method="post" action="">
    <input type="number" name="delete_id" placeholder="Enter ID to delete" required>
    <button type="submit">Delete</button>
</form>

</body>
</html>