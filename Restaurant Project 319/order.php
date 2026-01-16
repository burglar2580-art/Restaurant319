<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
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

    $name   = $_POST['name'];
    $qty    = $_POST['qty'];
    $meal   = $_GET['meal'];
    $price  = $_GET['price'];
    $pay    = $_POST['payment'];
    $total  = $qty * $price;

    $stmt = $conn->prepare(
        "INSERT INTO orders (user_name, meal_name, quantity, payment_method, total_price)
         VALUES (:name, :meal, :qty, :payment, :total)"
    );

    $stmt->execute([
        ':name'    => $name,
        ':meal'    => $meal,
        ':qty'     => $qty,
        ':payment' => $pay,
        ':total'   => $total
    ]);

    header("Location: receipt.php?total=$total");
    exit();
}
?>

<?php include 'includes/footer.php'; ?>
