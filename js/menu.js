document.addEventListener("DOMContentLoaded", function () {
    var menuContainer = document.getElementById("menuContainer");

    // Menü içeriğini belirleme
    menuContainer.innerHTML = `
        <style>
            #menuContainer nav ul {
                list-style: none; /* Listenin önceki öğelerinin işaretlerini kaldırır */
                padding: 0; /* Listenin iç boşluğunu kaldırır */
                margin: 0; /* Listenin dış boşluğunu kaldırır */
            }
            #menuContainer nav ul li {
                display: inline-block;
                margin-right: 20px; /* İstediğiniz boşluk değeri */
            }
        </style>
        <nav>
            <ul class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <li class="navbar-nav mr-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Anasayfa</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="category.html" class="nav-item nav-link">Kategoriler</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="muzik.html" class="nav-item nav-link">Müzik</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="foto.html" class="nav-item nav-link">Foto</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="video.html" class="nav-item nav-link">Video</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="reklam.html" class="nav-item nav-link">Reklam</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="menajerlik.html" class="nav-item nav-link">Menajerlik</a>
                </li><li class="navbar-nav mr-auto py-0">
                    <a href="contact.html" class="nav-item nav-link">İletişim</a>
                </li>
            </ul>
        </nav>
    `;
});
