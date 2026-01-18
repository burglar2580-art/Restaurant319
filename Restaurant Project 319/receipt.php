<?php
include 'includes/header.php';
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];

/* Fetch latest order made by this user */
$stmt = $conn->prepare(
    "SELECT * FROM orders 
     WHERE user_id = ? 
     ORDER BY id DESC 
     LIMIT 1"
);

$stmt->execute([$userId]);
$order = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$order) {
    echo "<p>No order found.</p>";
    include 'includes/footer.php';
    exit();
}
?>

<h2 class="mb-4">Order Receipt</h2>

<table class="table table-bordered">
    <tr>
        <th>Customer Name</th>
        <td><?php echo htmlspecialchars($order['user_name']); ?></td>
    </tr>
    <tr>
        <th>Meal Ordered</th>
        <td><?php echo htmlspecialchars($order['meal_name']); ?></td>
    </tr>
    <tr>
        <th>Quantity</th>
        <td><?php echo $order['quantity']; ?></td>
    </tr>
    <tr>
        <th>Payment Method</th>
        <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
    </tr>
    <tr>
        <th>Total Price</th>
        <td><strong><?php echo $order['total_price']; ?> FCFA</strong></td>
    </tr>
</table>

<a href="menu.php" class="btn btn-primary">Order Another Meal</a>

<?php include 'includes/footer.php'; ?>
