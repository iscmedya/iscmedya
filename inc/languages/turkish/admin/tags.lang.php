<?php
/**
 * MyBB-Tags 2 English Language Pack
 * Copyright 2014 My-BB.Ir Group, All Rights Reserved
 * 
 * Author: AliReza_Tofighi - http://my-bb.ir
 *
 */


$l['tags_pluginname'] = "Etiketler";

// Settings
$l['setting_group_tags'] = 'Etiketler Eklentisi';
$l['setting_group_tags_desc'] = "Etiketler Eklentisi Ayarları.";

$l['setting_tags_enabled'] = "Eklentiyi Etkinleştir?";
$l['setting_tags_enabled_desc'] = 'Eğer bu eklentiyi etkinleştirin istiyorsanız "Açık" Set.';
$l['setting_tags_seo'] = "SEO Dost URL";
$l['setting_tags_seo_desc'] = 'SEO URLleri kullanmak istiyor musunuz (örnek: tag-***.html) etiketleri?<br />
Bu kodları eklemeniz gerekir ".htaccess" dosyasını önce ayarlayın "Açık":
<pre style="background: #f7f7f7;border: 1px solid #ccc;padding: 6px;border-radius: 3px;direction: ltr;text-align: left;font-size: 12px;">
RewriteEngine <strong>on</strong>
RewriteRule <strong>^tag-(.*?)\.html$ tag.php?name=$1</strong> <em>[L,QSA]</em>
RewriteRule <strong>^tag\.html$ tag.php</strong> <em>[L,QSA]</em>
</pre>';
$l['setting_tags_per_page'] = "Sayfa başına Etiketler";
$l['setting_tags_per_page_desc'] = 'How many tags shown in "Tags" page?';
$l['setting_tags_limit'] = 'Sınır Etiketler "Ana Sayfa" ve "Forum Görüntüleme Sayfası"';
$l['setting_tags_limit_desc'] = 'Kaç etiket gösterilen "Ana Sayfa" ve "Forum Görüntüleme Sayfası" ?';
$l['setting_tags_index'] = 'Ana sayfada etiketler gösterilsin mi?';
$l['setting_tags_index_desc'] = 'Ana Sayfada etiketler gösterilsin istiyor musunuz?';
$l['setting_tags_forumdisplay'] = 'Forum Görüntüleme Sayfasında etiketler gösterilsin mi?';
$l['setting_tags_forumdisplay_desc'] = 'Forum Görüntüleme Sayfasında etiketler gösterilsin istiyor musunuz';
$l['setting_tags_max_thread'] = 'Konuda maksimum etiket';
$l['setting_tags_max_thread_desc'] = 'Lütfen konular için etiketlerin maksimum sayısını girin. Sınırsız için 0 olarak ayarlayın.';
$l['setting_tags_groups'] = 'Etiketler Moderatörleri';
$l['setting_tags_groups_desc'] = 'Gruplar "etiketlerini" düzenleyebilirsiniz seçiniz. konu düzenleyebilir etiketleri, düzenleyebilir kim unutmayın.';
$l['setting_tags_bad'] = 'Kötü Etiketler';
$l['setting_tags_bad_desc'] = 'Kötü etiketleri girin, Bu etiketler etiket listesinde görünmüyor. her yeni satıra etiket girin.';
$l['setting_tags_droptable'] = 'Tablo Kaldırma?';
$l['setting_tags_droptable_desc'] = 'Bu "etiketleri" istiyor musunuz bu eklentiyi kaldırdığınızda tablo düştü?';
$l['setting_tags_maxchars'] = 'Maksimum etiket uzunluğu';
$l['setting_tags_maxchars_desc'] = 'Bir etiketin sahip olabileceği maksimum uzunluğu giriniz';
$l['setting_tags_minchars'] = 'Minumum etiket uzunluğu';
$l['setting_tags_minchars_desc'] = 'Bir etiketin sahip olabileceği minumum uzunluğu giriniz';
$l['setting_tags_charreplace'] = 'Karakter Çeviri';
$l['setting_tags_charreplace_desc'] = 'Diğer karakterler için bazı karakterleri çevirmek istiyorsanız, bu ayarı kullanabilirsiniz.<br />
For example if you want replace "a" to "b" and "c" to "d" use this code:<br />
<pre style="background: #f7f7f7;border: 1px solid #ccc;padding: 6px;border-radius: 3px;direction: ltr;text-align: left;font-size: 12px;">
a=>b
c=>d
</pre>';
$l['settings_tags_disallowedforums'] = 'İzin verilmeyen forumlar';
$l['settings_tags_disallowedforums_desc'] = 'İstediğiniz grupları seçin "Etiketler" bunlar üzerinde çalışmaz.';
$l['setting_tags_forceseo'] = 'Kullanıcılar seo linkler kullanmak için zorlansın mı?';
$l['setting_tags_forceseo_desc'] = 'SEO URLleri kullanmak için kullanıcıyı zorlama istiyor musunuz (örnek: tag-***.html) etiketleri?';
$l['setting_tags_urlscheme'] = 'Etiketler URL şeması';
$l['setting_tags_urlscheme_desc'] = 'Etiket URL şemasını girin. Varsayılan olarak bu tag-{name}.html. bu değişiklikleri lütfen unutmayın, Ayrıca yeni bir yazma kuralı eklemek gerekir sizin .htaccess dosyadan ayarlayın.';