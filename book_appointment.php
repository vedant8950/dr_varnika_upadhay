<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars($_POST['phone']);
    $appointment_type = htmlspecialchars($_POST['appointment_type']);
    $appointment_date = htmlspecialchars($_POST['appointment_date']);
    $message = htmlspecialchars($_POST['message']);
    
    // Validate inputs
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    
    if (empty($appointment_type)) {
        $errors[] = "Appointment type is required";
    }
    
    if (empty($appointment_date)) {
        $errors[] = "Appointment date is required";
    }
    
    // If no errors, process the appointment
    if (empty($errors)) {
        // In a real application, you would:
        // 1. Connect to database
        // 2. Save the appointment
        // 3. Send confirmation email
        
        // For demo purposes, we'll just redirect to success
        $_SESSION['appointment_data'] = [
            'name' => $name,
            'date' => $appointment_date,
            'doctor' => 'Dr. Naresh Trehan'
        ];
        header("Location: appointment_success.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
