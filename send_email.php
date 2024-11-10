<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);
    
    // Define email variables
    $to = "info@thealphanova.com";
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: $email";
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
        sessionStorage.setItem('toast_message', 'success');
        </script>
        "
        header("Location: index.html");
        exit();
    } else {
        echo "<script> 
        sessionStorage.setItem('toast_message', 'error');
        </script>
        ";
        // header("location:")
        // exit();
    }
}
?>