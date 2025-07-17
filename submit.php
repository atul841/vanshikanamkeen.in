<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(trim($_POST["name"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));

    // Simple validation
    if (empty($name) || empty($phone)) {
        echo "All fields are required.";
        exit;
    }

    // Format to save
    $data = "Name: $name | Phone: $phone\n";

    // Save to file (you can use a DB instead)
    $file = "form-data.txt";
    file_put_contents($file, $data, FILE_APPEND);

    echo "✅ Thank you! Your form has been submitted.";
} else {
    echo "❌ Invalid Request.";
}
?>
