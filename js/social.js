document.addEventListener("DOMContentLoaded", function () {
    var social = document.getElementById("social");

    // Sidebar içeriğini belirleme
    social.innerHTML = `
                  <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Sosyal Medya</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="https://facebook.com/isiancar" target="blank" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                                <small class="fab fa-facebook-f mr-2"></small><small>7845 Beğeni</small>
                            </a>
                            <a href="https://twitter.com/isiancar" target="blank"  class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                                <small class="fab fa-twitter mr-2"></small><small>4225 Takipçi</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="https://linkedin.com/in/isiancar" target="blank"  class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                                <small class="fab fa-linkedin-in mr-2"></small><small>7100 Bağlantılı</small>
                            </a>
                            <a href="https://instagram.com/isiancar" target="blank"  class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                                <small class="fab fa-instagram mr-2"></small><small>11020 Takipçi</small>
                            </a>
                        </div>
                        <div class="d-flex mb-3">
                            <a href="https://youtube.com/@isiancar" target="blank"  class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                                <small class="fab fa-youtube mr-2"></small><small>10500 İzlenme</small>
                            </a>
                            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Takipçi</small>
                            </a>
                        </div>
                    </div>
    `;
});
