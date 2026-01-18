<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
?>

<h2>User Login</h2>

<form method="POST">
    <input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
    <input class="form-control mb-2" name="password" type="password" placeholder="Password" required>
    <button name="login" class="btn btn-success">Login</button>
</form>

<?php
if (isset($_POST['login'])) {

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password'])) {

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        echo "<p class='text-success mt-3'>Login successful!</p>";
        header("Location: menu.php");
        exit();

    } else {
        echo "<p class='text-danger mt-3'>Invalid email or password</p>";
    }
}
?>

<?php include 'includes/footer.php'; ?>
