<?php include 'includes/header.php'; ?>

<style>
.about-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    animation: fadeUp 1s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.founder-list li {
    padding: 8px 0;
    transition: transform 0.3s;
}

.founder-list li:hover {
    transform: translateX(5px);
    color: #198754;
}
</style>

<div class="text-center mt-4 mb-4">
    <h2>📖 About Our Restaurant</h2>
    <p class="text-muted">Get to know who we are and what we stand for</p>
</div>

<ul class="nav nav-tabs justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" data-bs-toggle="tab" href="#history">🏛️ History</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="tab" href="#mission">🎯 Mission</a>
  </li>
</ul>

<div class="tab-content mt-4">
  <!-- History Tab -->
  <div class="tab-pane fade show active" id="history">
    <div class="about-card">
      <p>
        Founded in <strong>Buea, Cameroon</strong>, our restaurant was created
        with the goal of celebrating authentic Cameroonian cuisine.
      </p>

      <h5 class="mt-3">👨‍🍳 Founders</h5>
      <ul class="founder-list">
        <li>Awoh Emmanuel</li>
        <li>Fonki Graziella</li>
        <li>Nambu Thiara</li>
        <li>Afri Tyra</li>
        <li>Keziah Mangombo</li>
        <li>Basirou Fonyuy</li>
      </ul>
    </div>
  </div>

  <!-- Mission Tab -->
  <div class="tab-pane fade" id="mission">
    <div class="about-card">
      <p>
        Our mission is to <strong>serve quality, tasty meals</strong> to all parts
        of Cameroon while ensuring affordability and accessibility.
      </p>
      <p>
        We aim to reduce food insecurity by making meals easily available
        and offering <strong>home delivery services</strong> that minimize
        unnecessary movement.
      </p>
    </div>
  </div>
</div>

<script>
// Smooth fade when switching tabs
document.querySelectorAll('.nav-link').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.about-card').forEach(card => {
            card.style.animation = 'none';
            card.offsetHeight; // reset animation
            card.style.animation = 'fadeUp 0.8s ease';
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
