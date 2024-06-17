document.addEventListener('DOMContentLoaded', function() {
  var headerSection = `
    <div class="header_top">
      <div class="container-fluid">
        <div class="contact_link-container">
          <a href="https://ozelguvenlik.github.io" class="contact_link1">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
              ozelguvenlik.github.io
            </span>
          </a>
          <a href="call:" class="contact_link2">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span>
              Call : +01 1234567890
            </span>
          </a>
          <a href="mailto:privatesecurity@outlook.com" class="contact_link3">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>
              privatesecurity@outlook.com
            </span>
          </a>
        </div>
      </div>
    </div>
  `;
  document.getElementById('header').innerHTML = headerSection;
});
