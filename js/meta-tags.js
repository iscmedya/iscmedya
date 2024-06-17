// meta-tags.js

// Bu fonksiyon sayfanın içeriğine göre uygun meta bilgilerini oluşturur
function createMetaTags() {
    // Sayfanın başlığını al
    var pageTitle = document.title;
    
    // Meta etiketlerini oluştur
    var metaDescription = document.createElement('meta');
    metaDescription.setAttribute('name', 'description');
    metaDescription.setAttribute('content', 'Sayfa için otomatik oluşturulan açıklama');

    var metaKeywords = document.createElement('meta');
    metaKeywords.setAttribute('name', 'keywords');
    metaKeywords.setAttribute('content', 'anahtar kelime, başka anahtar kelime, SEO');

    var metaAuthor = document.createElement('meta');
    metaAuthor.setAttribute('name', 'author');
    metaAuthor.setAttribute('content', 'ÖZEL GÜVENLİK');

    // Oluşturulan meta etiketlerini sayfaya ekle
    document.head.appendChild(metaDescription);
    document.head.appendChild(metaKeywords);
    document.head.appendChild(metaAuthor);
}

// Sayfa yüklendiğinde meta etiketlerini oluştur
document.addEventListener('DOMContentLoaded', createMetaTags);
