document.addEventListener('DOMContentLoaded', function() {
  var heroSection = `
    <div class="hero_bg_box">
      <div class="img-box">
        <img src="images/hero-bg.jpg" alt="">
      </div>
    </div>
  `;
  document.querySelector('.hero_area').innerHTML = heroSection;
});
