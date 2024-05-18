document.addEventListener("DOMContentLoaded", function () {
    var topbar = document.getElementById("topbar");

    // Sidebar içeriğini belirleme
    topbar.innerHTML = `
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">
            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">Güncel</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3" style="width: calc(100% - 100px); padding-left: 90px;">
                        <div class="text-truncate"><a class="text-secondary" href="">ISIANCAR Medya sitemize hoşgeldiniz</a></div>
                        <div class="text-truncate"><a class="text-secondary" href="">isiancar organizasyonlarında sizde yerini almak istermisiniz. Haydi mail gönderin..</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://twitter.com/isiancar" target="blank"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/isiancar" target="blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/in/isiancar" target="blank"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://instagram.com/isiancar" target="blank"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://youtube.com/@isiancar" target="blank"><i class="fab fa-youtube"></i></a>

            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <img class="img-fluid" src="images/logo.png" alt="iscmedya.xyz" width="200px" height="60px">
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="img/ads-700x70.gif" alt="">
            </div>
        </div>
    </div>
    `;
});
