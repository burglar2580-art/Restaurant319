<?php 
include 'includes/header.php'; 
include 'includes/db.php'; 
?>

<style>
.menu-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.menu-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.price-badge {
    font-size: 1rem;
}
</style>

<h2 class="mb-3 text-center">🍽️ Our Menu</h2>
<p class="text-center text-muted">Fresh & authentic meals just for you</p>

<!-- Search -->
<div class="row mb-4">
    <div class="col-md-6 mx-auto">
        <input type="text" id="searchMeal" class="form-control" placeholder="Search for a meal...">
    </div>
</div>

<div class="row" id="menuContainer">

<?php
$mealImages = [
    "Eru" => "eru.jpg",
    "Ndole" => "ndole.jpg",
    "Achu" => "achu.jpg",
    "Koki" => "koki.jpg",
    "Ekwang" => "ekwang.jpg",
    "Kati Kati" => "katikati.jpg",
];
?>

<?php
$stmt = $conn->prepare("SELECT * FROM meals");
$stmt->execute();
$meals = $stmt->fetchAll(PDO::FETCH_ASSOC);



foreach ($meals as $meal) {
    echo "
    <div class='col-md-4 mb-4 meal-item'>
        <div class='card menu-card h-100'>
            <img src='".strtolower(str_replace(' ', '', $meal['name'])).".jpeg'
                 class='card-img-top'
                 style='height:200px; object-fit:cover;'
                 alt='{$meal['name']}'
                 onerror=\"this.src='default.jpeg';\">
            <div class='card-body text-center'>
                <h5 class='card-title meal-name'>{$meal['name']}</h5>
                <span class='badge bg-success price-badge mb-3'>
                    {$meal['price']} FCFA
                </span>
                <br>
                <a href='order.php?meal={$meal['name']}&price={$meal['price']}' 
                   class='btn btn-outline-success mt-3'>
                   Order Now
                </a>
            </div>
        </div>
    </div>
    ";
}

?>
</div>

<button id="toggleMenu" class="btn btn-primary d-block mx-auto mt-4">
    Hide / Show Menu
</button>
<div class="text-center mt-5 fade-section">
    <a href="logout.php" class="btn btn-outline-success btn-lg">Logout</a>
</div>

<script>
// Hide / Show menu
$("#toggleMenu").click(function () {
    $(".meal-item").slideToggle();
});

// Search filter
$("#searchMeal").on("keyup", function () {
    let value = $(this).val().toLowerCase();
    $(".meal-item").filter(function () {
        $(this).toggle(
            $(this).find(".meal-name").text().toLowerCase().indexOf(value) > -1
        );
    });
});
</script>
<?php include 'includes/footer.php'; ?>
