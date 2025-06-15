<?php
// Start session for error handling
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medanta - Doctor Profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Display errors if any -->
    <?php if (isset($_SESSION['errors'])): ?>
        <div class="error-messages">
            <?php foreach($_SESSION['errors'] as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
            <?php unset($_SESSION['errors']); ?>
        </div>
    <?php endif; ?>

    <!-- Rest of your HTML from the template -->
    <!-- ... (paste all the HTML content from the original template here) ... -->
</body>
</html>
