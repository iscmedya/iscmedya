document.addEventListener("DOMContentLoaded", function () {
    var tags = document.getElementById("tags");

    // Sidebar içeriğini belirleme
    tags.innerHTML = `
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
    `;
});
