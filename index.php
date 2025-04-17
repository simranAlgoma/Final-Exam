<?php
include 'header.php';

$mysqli = new mysqli("localhost", "root", "", "final");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$feedback = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $message = trim($_POST['message']);

    if (!empty($message)) {
        $message = $mysqli->real_escape_string($message);
        $query = "INSERT INTO string_info (message) VALUES ('$message')";
        
        if ($mysqli->query($query)) {
            $feedback = "Message submitted successfully!";
        } else {
            $feedback = " Error: " . $mysqli->error;
        }
    } else {
        $feedback = "Please enter a message.";
    }
}
?>

<form method="post" action="">
    <input type="text" name="message" maxlength="50" required placeholder="Enter your message">
    <button type="submit" name="submit">Submit</button>
</form>

<p><?= $feedback ?></p>

<br>
<a href="showAll.php">Show all records</a>

</body>
</html>