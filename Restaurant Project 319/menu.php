<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
?>

<h2 class="mb-3">Our Menu</h2>

<?php
$stmt = $conn->prepare("SELECT * FROM meals");
$stmt->execute();
$meals = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($meals as $meal) {
    echo "
    <p class='meal-item'>
        <strong>{$meal['name']}</strong> - {$meal['price']} FCFA
        <a href='order.php?meal={$meal['name']}&price={$meal['price']}' 
           class='btn btn-sm btn-success ms-2'>Order</a>
    </p>
    ";
}
?>

<button id="toggleMenu" class="btn btn-primary mt-3">Hide / Show Menu</button>

<script>
$("#toggleMenu").click(function () {
    $(".meal-item").slideToggle();
});
</script>

<?php include 'includes/footer.php'; ?>
