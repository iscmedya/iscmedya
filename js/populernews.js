document.addEventListener("DOMContentLoaded", function () {
    var populernews = document.getElementById("populernews");

    // Sidebar içeriğini belirleme
    populernews.innerHTML = `
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
    `;
});
