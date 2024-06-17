document.addEventListener('DOMContentLoaded', function() {
  var navbarSection = `
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <a class="navbar-brand" href="index.html">
          <span>
            <a href="https://ozelguvenlik.github.io/"><img src="https://ozelguvenlik.github.io/images/logo.png" width="140" height="auto"></a>
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">ANASAYFA <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bilgi.html"> BİLGİ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="medya.html"> MEDYA </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sektor.html"> SEKTÖR </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="iletisim.html">İLETİŞİM</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  `;
  document.querySelector('.header_bottom').innerHTML = navbarSection;
});
