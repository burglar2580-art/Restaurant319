<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
?>

<h2>User Registration</h2>

<form method="POST">
    <input class="form-control mb-2" name="name" placeholder="Full Name" required>
    <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
    <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
    <button name="register" class="btn btn-primary">Register</button>
</form>

<?php
if (isset($_POST['register'])) {

    try {
        $stmt = $conn->prepare(
            "INSERT INTO users (name, email, password) VALUES (?, ?, ?)"
        );

        $stmt->execute([
            $_POST['name'],
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);

        echo "<p class='text-success mt-3'>
                Registration successful! <a href='login.php'>Login here</a>
              </p>";

    } catch (PDOException $e) {
        echo "<p class='text-danger mt-3'>
                This email is already registered. Please login.
              </p>";
    }
}
?>

<?php include 'includes/footer.php'; ?>
