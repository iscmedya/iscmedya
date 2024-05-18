<div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
<div class="input-group">
    <input type="text" id="searchInput" class="form-control" placeholder="Keyword" onkeydown="if(event.keyCode==13) search()">
    <div class="input-group-append">
        <button class="input-group-text text-secondary" onclick="search()"><i class="fa fa-search"></i></button>
    </div>
</div>

<script>
    function search() {
        var query = document.getElementById("searchInput").value;
        if (query.trim() !== '') {
            // Arama yapılacak URL'yi oluştur
            var searchUrl = '/' + encodeURIComponent(query) + '.html';

            // Yönlendirme işlemi
            window.location.href = searchUrl;
        } else {
            alert('Lütfen bir arama terimi girin!');
        }
    }
</script>