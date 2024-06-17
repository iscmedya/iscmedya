document.addEventListener('DOMContentLoaded', function() {
  var infoSection = `
  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_logo">
            <a class="navbar-brand" href="index.html">
              <span>
                <a href="https://ozelguvenlik.github.io/"><img src="https://ozelguvenlik.github.io/images/logo.png" width="90" height="auto"></a>
              </span>
            </a>
            <p><p>
              Özel Güvenlik Sitemiz ile ilgili <a href="https://ozelguvenlik.github.io/gizlilik-bilgirimi">Bilgilendirme</a> sayfamızı ziyaret edin.
            </p></p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Faydalı Linkler
            </h5>
            <ul>
              <li><i class="fa fa-bullhorn" aria-hidden="true"></i>
              <span>
                <a href="">
                   -&nbsp;İlanlar
                </a>
              </li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>
              <span>
                <a href="">
                   -&nbsp;Etkinlikler
                </a>
              </li>
              <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              <span>
                <a href="">
                   -&nbsp;Sınavlar
                </a>
              </li>
              <li><i class="fa fa-graduation-cap" aria-hidden="true"></i>
              <span>
                <a href="">
                   -&nbsp;Eğitimler
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              İletişim
            </h5>
          </div>
          <div class="info_contact">
            <a href="https://ozelguvenlik.github.io/" class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                ozelguvenlik.github.io
              </span>
            </a>
            <a href="call:" class="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +01 1234567890
              </span>
            </a>
            <a href="mailto:privatesecurity@outlook.com" class="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                privatesecurity@outlook.com
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Abonelik Formu
            </h5>
            <form action="#">
              <input type="email" placeholder="Enter your email">
              <button>
                Gönder
              </button>
            </form>
            <div class="social_box">
              <a href="https://fb.com/guvenlikgorevlisi" target="blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="https://x.com/guvgorevlisi" target="blank">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
              <a href="https://instagram.com/guvgorevlisi" target="blank">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->
  `;
  document.getElementById('info').innerHTML = infoSection;
});
