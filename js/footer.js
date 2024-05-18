document.addEventListener("DOMContentLoaded", function () {
    var footer = document.getElementById("footer");

    // Sidebar içeriğini belirleme
    footer.innerHTML = `
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <img class="img-fluid" src="images/logo.png" alt="ISIANCAR" width="200px" height="60px">
                </a>
                <p>Sitemiz hakkında bilgi almak yada paylaşmak istediğniz kayıtlar varsa için <a href="bilgi.html">bilgi</a> sayfamıza tıklayın.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://twitter.com/isiancar" target="blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/isiancar" target="blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/in/isiancar" target="blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://instagram.com/isiancar" target="blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://youtube.com/@isiancar" target="blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Kategoriler</h4>
                <div class="d-flex flex-wrap m-n1">
                    <a href="muzik.html" class="btn btn-sm btn-outline-secondary m-1">Müzik</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Reklamcılık</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Rehberlik</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Menajerlik</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Organizasyon</a>
                    <a href="video.html" class="btn btn-sm btn-outline-secondary m-1">Filmler</a>
                    <a href="foto.html" class="btn btn-sm btn-outline-secondary m-1">Fotolar</a>
                    <a href="video.html" class="btn btn-sm btn-outline-secondary m-1">Videolar</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Paylaşımlar</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Web Siteler</a>
                    <a href="bilgi.html" class="btn btn-sm btn-outline-secondary m-1">Bilgi</a>
                    <a href="contact.html" class="btn btn-sm btn-outline-secondary m-1">İletişim</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Etiketler</h4>
                <div class="d-flex flex-wrap m-n1">
                    <a href="muzik.html" class="btn btn-sm btn-outline-secondary m-1">Müzik</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Reklamcılık</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Rehberlik</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Menajerlik</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Organizasyon</a>
                    <a href="video.html" class="btn btn-sm btn-outline-secondary m-1">Filmler</a>
                    <a href="foto.html" class="btn btn-sm btn-outline-secondary m-1">Fotolar</a>
                    <a href="video.html" class="btn btn-sm btn-outline-secondary m-1">Videolar</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Paylaşımlar</a>
                    <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Web Siteler</a>
                    <a href="bilgi.html" class="btn btn-sm btn-outline-secondary m-1">Bilgi</a>
                    <a href="contact.html" class="btn btn-sm btn-outline-secondary m-1">İletişim</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">Linkler</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="bilgi.html"><i class="fa fa-angle-right text-dark mr-2"></i>Bilgi</a>
                    <a class="text-secondary mb-2" href="category.html"><i class="fa fa-angle-right text-dark mr-2"></i>Reklam</a>
                    <a class="text-secondary mb-2" href="gizlilik_bildirimi.html"><i class="fa fa-angle-right text-dark mr-2"></i>Gizlilik Bildirimi</a>
                    <a class="text-secondary mb-2" href="category.html"><i class="fa fa-angle-right text-dark mr-2"></i>Web Siteler</a>
                    <a class="text-secondary" href="contact.html"><i class="fa fa-angle-right text-dark mr-2"></i>İletişim</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy;2024<a class="font-weight-bold" href="http://iscmedya.xyz">&nbsp;&nbsp;ISIANCAR MEDYA</a>. All Rights Reserved. 
			
			<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
			Designed by <a class="font-weight-bold" href="https://htmlcodex.com"><font color="e5e5e5">HTML Codex</a>
        </p>
    </div>
    `;
});
