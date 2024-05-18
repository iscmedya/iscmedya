// JavaScript dosyası (örneğin metaTags.js)

// Sayfa yüklendiğinde çalışacak fonksiyon
window.onload = function() {
    // Görüntülenmekte olan sayfanın özelliklerini almak için gerekli değişkenler
    var pageTitle = document.title; // Sayfa başlığı
    var pageUrl = window.location.href; // Sayfa URL'si
    var pageDescription = document.querySelector('meta[name="description"]').getAttribute('content'); // Sayfa açıklaması

    // Meta etiketlerini alalım
    var ogTitleMeta = document.querySelector('meta[property="og:title"]');
    var ogUrlMeta = document.querySelector('meta[property="og:url"]');
    var ogDescriptionMeta = document.querySelector('meta[property="og:description"]');
    var ogImageMeta = document.querySelector('meta[property="og:image"]');
    var twitterTitleMeta = document.querySelector('meta[name="twitter:title"]');
    var twitterUrlMeta = document.querySelector('meta[name="twitter:domain"]');
    var twitterDescriptionMeta = document.querySelector('meta[name="twitter:description"]');
    
    // Eğer meta etiketleri bulunduysa
    if (ogTitleMeta && ogUrlMeta && ogDescriptionMeta && ogImageMeta && twitterTitleMeta && twitterUrlMeta && twitterDescriptionMeta) {
        // Meta etiketlerinin içeriğini güncelleyelim
        ogTitleMeta.setAttribute('content', pageTitle);
        ogUrlMeta.setAttribute('content', pageUrl);
        ogDescriptionMeta.setAttribute('content', pageDescription);
        ogImageMeta.setAttribute('content', getImageUrl()); // Sayfadan görsel adresini al
        twitterTitleMeta.setAttribute('content', pageTitle);
        twitterUrlMeta.setAttribute('content', pageUrl);
        twitterDescriptionMeta.setAttribute('content', pageDescription);
    }
};

// Sayfadan görsel adresini alacak fonksiyon
function getImageUrl() {
    // Örnek olarak, sayfadaki ilk görüntünün URL'sini alalım
    var images = document.getElementsByTagName('img');
    if (images.length > 0) {
        return images[0].src;
    } else {
        return ""; // Sayfada görüntü yoksa boş bir dize döndür
    }
}
