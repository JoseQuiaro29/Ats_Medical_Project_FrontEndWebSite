<?php
// send_contact.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Here you can process the message:
    // e.g., send an email, store in a database, etc.
    // For this example, we will simply redirect back with a success message.

    // Redirect back to the home page
    header("Location: index.php?status=success");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>
