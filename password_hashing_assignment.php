<?php
// Initialize variables
$plaintext = "";
$hashedPassword = "";
$verificationResult = "";

// Step 1: Check if the Hash button was clicked
if (isset($_POST['hash'])) {
    $plaintext = $_POST['password']; // Read user input (plaintext)
    $hashedPassword = password_hash($plaintext, PASSWORD_DEFAULT); // Hash the password
}

// Step 2: Check if the Verify button was clicked
if (isset($_POST['verify'])) {
    $plaintext = $_POST['password']; // Read user input
    $hashToCheck = $_POST['hash_value']; // Get the hash stored earlier

    // Verify password against the hash
    if (password_verify($plaintext, $hashToCheck)) {
        $verificationResult = "Match ✅";
    } else {
        $verificationResult = "No Match ❌";
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>PHP Password Hashing Assignment</title>
</head>
<body>
    <h2>PHP Password Hashing Assignment</h2>

    <!-- Step 3: Form -->
    <form method="POST">
        <!-- User input -->
        <label>ادخل كلمة المرور:</label>
        <input type="text" name="password" value="<?php echo htmlspecialchars($plaintext); ?>" required>
        <br><br>

        <!-- Hash button -->
        <button type="submit" name="hash">تجزئة (Hash)</button>
        <br><br>

        <!-- Display hashed password -->
        <?php if ($hashedPassword != ""): ?>
            <label>كلمة المرور بعد التجزئة:</label>
            <input type="text" name="hash_value" value="<?php echo $hashedPassword; ?>" readonly>
            <br><br>
        <?php endif; ?>

        <!-- Verify button -->
        <button type="submit" name="verify">التحقق من كلمة المرور</button>
        <br><br>

        <!-- Display verification result -->
        <?php if ($verificationResult != ""): ?>
            <label>نتيجة التحقق:</label>
            <strong><?php echo $verificationResult; ?></strong>
        <?php endif; ?>
    </form>
</body>
</html>
