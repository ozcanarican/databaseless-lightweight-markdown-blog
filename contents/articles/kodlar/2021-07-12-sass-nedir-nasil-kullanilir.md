{
"title": "SASS NEDİR, NASIL KULLANILIR?",
"description": "Web dünyasında giderek popülerleşen ve CSS 'in karmaşıklığına son veren SASS 'ın kurulumunu ve kullanımını inceleyelim",
"image": "contents/media/sass-nedir.jpg",
"series": "js-ogreniyorum"
}

## SASS kısaca nedir

SASS, Syntactically Awesome Style Sheets olarak açılıyor. Türkçeye çevirmek gerekirse, Yazımı Harikulade CSS gibi bir şey diyebiliriz. Baştan söyleyeyim, gerçekten isminin hakkını veriyor.

SASS için; gerçekten bir sorunu çözmek üzere peydah olmuş bir platform diyebiliriz. Özellikle birden fazla sayfası ve stili olan bir web sayfası kodlarken, CSS dosyalarının nasıl dağıldığını, organize olmanın ne kadar zorlaştığını sen de biliyorsundur. SASS 'ın getirdiği en büyük fayda, NESTED SELECTION, yani yuvalanma özelliği. Kulağa garip gelse bile, aşağıda örnekler ile ne demek istediğimi açıklayacağım.

SASS dosyaları .scss uzantılı olup, preprocessor CSS 'lerdir. Yani sass dosyalarını doğrudan hostinge yüklemiyoruz. Bir JS dosyası gibi, ziyaretçinin bilgisayarında derlenmiyorlar. Biz SASS dosyalarını kendi bilgisayarımızda kullanıyoruz ve otomatik olarak bu .sass dosyalarından birer .css dosyaları yaratıyoruz. Hostinge ise bu yaratılmış CSS dosyalarını yüklüyoruz.

## SASS nasıl kurulur

SASS ile çalışmak için en rahat ortam VISUAL STUDIO CODE. Bu editör sahip olduğu araçlar ile, bizi derleme aşamalarını düşünmekten tamamıyla kurtarıyor. Eğer hal-i hazırda VISUAL STUDIO CODE kullanmıyorsan, aşağıdaki adımları takip edebilirsin.

**1.** [Bu adrese girerek](https://code.visualstudio.com/download) VSC programını bilgisayarına indir ve kur.

**2.** VSC 'yi açarak, programın **Uzantılar** bölümüne gir.
![VSC Araç Yükleme](/contents/media/sass-vsc-uzantilar.jpg)

**3.** Uzantı arama çubuğuna **Live Sass Compiler** yazarak arama yap ve çıkan ilk uzantıyı **install** tuşuna basarak kur.
![live sass compiler](/contents/media/sass-live-sass-compiler.jpg)

Hepsi bu kadar. Artık SASS ile çalışmaya başlayabiliriz.

## SASS 'ı CSS 'e çevirme

Bilgisayarımızda SASS ile çalışma ortamını hazırladığımıza göre, örnek bir proje ile testler yapabiliriz. Bunun için bilgisayarımda **sass-projem** isimli bir klasör yaratıp, bunu VSC ile açıyorum.

İlk yapacağım şey, bir index.html dosyası yaratıp, henüz ortada olmayan **main.css** dosyasına **header** kısmında link vermek.

```html
<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SASS PROJEM</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body></body>
</html>
```

Hal-i hazırda link verdiğim ama henüz yaratmadığım **main.css** dosyasını, doğrudan yeni bir dosya oluşturarak eklemeyeceğim. Bunun yerine _main.scss_ dosyası yaratarak, bunun otomatik olarak _main.css_ dosyasına dönüştürülmesini sağlayacağım.

VSC üzerine yeni bir dosya yaratarak adına **main.scss** yazıyorum ve daha sonra, VSC 'un alt sağ köşesindeki **Watch Sass** tuşuna basıyoruz.
![live sass compile](/contents/media/sass-compile.jpg)

Bu tuşa basar basmaz, yüklediğimiz eklentinin otomatik olarak bize **main.css** dosyasını yarattığını göreceksin. Alt kısımda açılan terminalde ise **Watching** ifadesi karşına çıkacak. Artık SASS dosyasında yaptığımız her değişiklik, otomatik olarak **main.css** dosyasına CSS dilinde aktarılacak. Bu CSS dosyasını düzenlemeye hiç ihtiyacımız olmadığı için, açmana bile gerek yok.

## SASS Yuvalanma

Geldik SASS 'ın faydalarına... Daha önce de bahsettiğim, en çok kullanılan SASS özelliği yuvalanma özelliği. Bunu bir örnekle inceleyelim.

```html
<nav>
  <div class="main-menu">
    <ul>
      <li id="#ana-sayfa">ANA SAYFA</li>
      <li>HAKKIMDA</li>
      <li>İLETİŞİM</li>
      <li>BLOG</li>
    </ul>
  </div>
</nav>
```

index dosyamızda böyle bir kod olduğunu düşünelim ve bunu SASS ile biçimlendirelim ve bizim için yaratılan CSS dosyasına bakalım.
![scss vs css](/contents/media/sass-scss-vs-css.jpg)

Resimde de görüldüğü gibi, SASS dosyasında, tüm **nav** ve çocuklarını **nav** etiketi altında biçimlendirdim. Öte yandan CSS dosyasında klasik, ayrı ayrı yazılmış CSS seçicileri mevcut.

SASS ile, header, footer, hero gibi klasik alanları, tek bir blok halinde yazıp, bu alanları küçültebiliyorsun ve, daha sonradan sitede düzenleme yaparken, yalnızca değişiklik yapacağın bölümü açabiliyorsun.

![sass nedir](/contents/media/sass-blog.jpg)

Örneğin yukarıdaki SASS dosyası görüntüsü, bu blog sitesini biçimlendiren dosyanın ekran görüntüsü. Dediğim gibi, bütün kod blockları kapalı halde, bir düzen içerisinde duruyor ve bu da benim siteyi çok rahat bir şekilde düzenlememe olanak tanıyor.
