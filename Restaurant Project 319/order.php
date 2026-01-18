<?php
include 'includes/header.php';
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Place Your Order</h2>

<form method="POST">
    <div class="mb-2">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Quantity</label>
        <input type="number" name="qty" class="form-control" required>
    </div>

    <div class="mb-2">
        <label>Payment Method</label>
        <select name="payment" class="form-control">
            <option>Online</option>
            <option>Payment on Delivery</option>
        </select>
    </div>

    <button name="order" class="btn btn-success">Place Order</button>
</form>

<?php
if (isset($_POST['order'])) {

    $userId   = $_SESSION['user_id'];
    $userName = $_SESSION['user_name'];

    $meal    = $_GET['meal'];
    $price   = $_GET['price'];
    $qty     = $_POST['qty'];
    $payment = $_POST['payment'];

    $total = $qty * $price;

    $stmt = $conn->prepare(
        "INSERT INTO orders (user_id, user_name, meal_name, quantity, payment_method, total_price)
         VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $userId,
        $userName,
        $meal,
        $qty,
        $payment,
        $total
    ]);

    header("Location: receipt.php");
    exit();
}


?>

<?php include 'includes/footer.php'; ?>
