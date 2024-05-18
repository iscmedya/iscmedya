document.addEventListener("DOMContentLoaded", function () {
    var newsletter = document.getElementById("newsletter");

    // Sidebar içeriğini belirleme
    newsletter.innerHTML = `
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
    `;
});
