document.addEventListener('DOMContentLoaded', function() {
  var footerSection = `
  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      &copy; <span id="currentYear"></span> Özel Güvenlik Web Sitesi - <a href="https://ozelguvenlik.github.io/"> ozelguvenlik.github.io</a>
    </p>
  </footer>
  <!-- footer section -->
  `;
  document.getElementById('footer').innerHTML = footerSection;
});
