<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    $name = trim($_POST['name']);
    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Only letters and white space allowed in Name.";
    }

    $email = trim($_POST['email']);
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    $password = $_POST['password'];
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    $phoneno = trim($_POST['phoneno']);
    if (empty($phoneno)) {
        $errors[] = "Phone Number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phoneno)) {
        $errors[] = "Phone Number must be a valid 10-digit number.";
    }

    $adrno = trim($_POST['adrno']);
    if (empty($adrno)) {
        $errors[] = "Aadhaar Number is required.";
    } elseif (!preg_match("/^[0-9]{12}$/", $adrno)) {
        $errors[] = "Aadhaar Number must be a valid 12-digit number.";
    }

    if (count($errors) > 0) {
        echo "<div style='color: red;'>";
        echo "<h3>Please fix the following errors:</h3>";
        foreach ($errors as $error) {
            echo "- " . $error . "<br>";
        }
        echo "<br><a href='javascript:history.back()'>Go Back</a>";
        echo "</div>";
    } else {
        echo "<div style='color: green;'>";
        echo "<h3>Form submitted successfully!</h3>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Phone: " . htmlspecialchars($phoneno) . "<br>";
        echo "Aadhaar: " . htmlspecialchars($adrno) . "<br>";
        echo "</div>";
    }
} else {
    header("Location: index.html");
    exit();
}
?>