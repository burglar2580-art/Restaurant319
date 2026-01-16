<?php include 'includes/header.php'; ?>

<style>
.hero-text {
    animation: fadeInDown 1.5s ease;
}

@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.carousel img {
    height: 420px;
    object-fit: cover;
}

.fade-section {
    opacity: 0;
    transform: translateY(20px);
    transition: all 1s ease;
}

.fade-section.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<div class="text-center mt-4 hero-text">
    <h2>🍽️ Welcome to Our Restaurant</h2>
    <p class="lead text-muted">
        Enjoy authentic Cameroonian meals made with love
    </p>
</div>

<div id="demoCarousel" class="carousel slide mt-4" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Achu.jpeg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="ndole.jpeg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="Katikati.jpeg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="Koki.jpeg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="BangaSoup.jpeg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="Ekwang.jpeg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="Eru.jpeg" class="d-block w-100">
    </div>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demoCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demoCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- Call to Action -->
<div class="text-center mt-5 fade-section">
    <h4>Hungry already?</h4>
    <p>Register or login to view our delicious menu</p>
    <a href="register.php" class="btn btn-success btn-lg me-2">Register</a>
    <a href="login.php" class="btn btn-outline-success btn-lg">Login</a>
</div>

<script>
// Fade in on scroll
window.addEventListener("scroll", function () {
    document.querySelectorAll(".fade-section").forEach(section => {
        const pos = section.getBoundingClientRect().top;
        if (pos < window.innerHeight - 100) {
            section.classList.add("show");
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
