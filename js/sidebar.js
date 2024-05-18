document.addEventListener("DOMContentLoaded", function () {
    var sidebar = document.getElementById("sidebar");

    // Sidebar içeriğini belirleme
    sidebar.innerHTML = `
                    <!-- Social Follow Start -->
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
                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Haber Aboneliği</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            <p>Güncel haberlerimize ücretsiz abone olmak istermisin.</p>
                            <div class="input-group" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Gönder</button>
                                </div>
                            </div>
                            <small>Mail adresinizi yazıp Gönder butonuna basınız</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
                    </div>
                    <!-- Ads End -->

                    <!-- Popular News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Popüler yazılar</h3>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="images/isiancar001.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="muzik.html">Müzik</a>
                                    <span class="px-1">/</span>
                                    <span>isiancar</span>
                                </div>
                                <a class="h6 m-0" href="muzik.html">Konser Organizasyonlarında tercih edilen isiancar</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="images/isiancar002.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="foto.html">Foto</a>
                                    <span class="px-1">/</span>
                                    <span>isiancar</span>
                                </div>
                                <a class="h6 m-0" href="category.html">Reklam sponsoru olduğumuz yerler</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="images/isiancar020.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="foto.html">Foto</a>
                                    <span class="px-1">/</span>
                                    <span>isiancar</span>
                                </div>
                                <a class="h6 m-0" href="category.html">ISIANCAR çok sevilen ve popüler oldu</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="images/isiancar018.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="foto.html">Foto</a>
                                    <span class="px-1">/</span>
                                    <span>isiancar</span>
                                </div>
                                <a class="h6 m-0" href="category.html">Tercih edilenler arasında isiancar</a>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <img src="images/isiancar022.jpg" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="muzik.html/">Organizasyon</a>
                                    <span class="px-1">/</span>
                                    <span>isiancar</span>
                                </div>
                                <a class="h6 m-0" href="category.html">Gece organizasyonlarında popülerlik</a>
                            </div>
                        </div>
                    </div>
                    <!-- Popular News End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Etiketler</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            <a href="isiancar.html" class="btn btn-sm btn-outline-secondary m-1">isiancar</a>
                            <a href="muzik.html" class="btn btn-sm btn-outline-secondary m-1">müzik</a>
                            <a href="foto.html" class="btn btn-sm btn-outline-secondary m-1">foto</a>
                            <a href="video.html" class="btn btn-sm btn-outline-secondary m-1">video</a>
                            <a href="muzik.html" class="btn btn-sm btn-outline-secondary m-1">Konserler</a>
                            <a href="video.html" class="btn btn-sm btn-outline-secondary m-1">Sinema</a>
                            <a href="muzik.html" class="btn btn-sm btn-outline-secondary m-1">Tanıtımlar</a>
                            <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Rehberlik</a>
                            <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Menajerlik</a>
                            <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Blog</a>
                            <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Web</a>
                            <a href="category.html" class="btn btn-sm btn-outline-secondary m-1">Reklam</a>
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->
    `;
});
