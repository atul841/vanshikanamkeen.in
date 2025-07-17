<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get all form values
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name  = htmlspecialchars(trim($_POST['last_name']));
    $phone      = htmlspecialchars(trim($_POST['phone']));
    $email      = htmlspecialchars(trim($_POST['email']));
    $city       = htmlspecialchars(trim($_POST['city']));
    $pincode    = htmlspecialchars(trim($_POST['pincode']));
    $message    = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $to = "atulpande433@gmail.com"; //  Replace with your actual email
    $subject = "This is made website in namkeen Bazar.com . Here the from there and best part of that in part of that one here from to connect the part of here motion ";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Email Body  
    $body = "You have received a new message from the contact form:\n\n";
    $body .= "Name : $first_name $last_name\n";
    $body .= "Phone: $phone\n";    
    $body .= "Email: $email\n";
    $body .= "City : $city\n";     
    $body .= "Pin Code: $pincode\n\n";
    $body .= "Message :\n$message\n";  
    
    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Failed to send message. Please try again later.'); window.history.back();</script>";
    } 
}

// connect page connect the mysql 
$conn = new mysqli("localhost" , "username", "password", "database_name");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO contact_form (first_name, last_name, phone, email, city, pincode, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $first_name, $last_name, $phone, $email, $city, $pincode, $message);
$stmt->execute();
$stmt->close();
$conn->close(); 

?>


