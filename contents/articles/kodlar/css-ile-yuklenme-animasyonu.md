{
"title": "Sadece CSS ile Yüklenme Animasyonu",
"description": "JS kullanmadan, sadece CSS ile web sayfan için basit yüklenme animasyonu",
"image": "contents/media/yukleniyor.jpg"
}
Öncelikle, böyle bir animasyonu, basit bir GIF yerine neden CSS ile yapmayı tercih edeceğimizi konuşalım. Bunun ilk sebebi; çözünürlük ve uyumluluk. GIF gibi sabit bir imaj yerine, her ortamda media sorgusu ile özelleştirilmiş bir animasyonu, en iyi hali ile ziyaretçilere sunabilirsin.

İkincil derecede ise, dosya boyutunu düşünebiliriz. Eğer 4k bir ekranda GIF animasyonunu pixellenmeden çalıştırmak istiyorsak, bir kaç mb veri kullanımını gözden çıkarmalıyız. Halbu ki CSS animasyonu ile, yarım kilobyte 'dan daha az bir kod ile, yüksek çözünürlüklü basit bir animasyon yaratabiliriz.

## HTML Bölümü

Doğrudan html sayfasına ekleyeceğimiz kod oldukça az. Temel olarak bir taşıyıcı div içerisine "Yükleniyor" yazısı ve bir kaç tane div eklememiz yeterli.

```html
<div class="yukleniyor-wrapper">
  <div class="yukleniyor-yazi">YÜKLENİYOR</div>
  <div class="circles">
    <div class="mavi"></div>
    <div class="kirmizi"></div>
    <div class="yesil"></div>
  </div>
</div>
```

## CSS Bölümü

Öncelikle **yukleniyor-wrapper** isimli divi, tüm ekranı kaplayacak, arka planını birazcık gösterecek şekilde ayarlayalım. Ayrıca içindeki tüm çocuk elementlerini, ekranın tam ortasında göstermesini sağlayalım

```css
.yukleniyor-wrapper {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  min-height: 100vh;

  background-color: #0009;
  color: white;
  font-weight: bold;
  font-size: 1.2em;
  letter-spacing: 0.5rem;
}
```

Oluşturacağımız renkli çemberleri taşıyan taşıyacak olan **circles** isimli divimiz için ise, yine **display:flex** biçimlendirmesini kullanarak, bütün çocuk divleri yan yana gösterelim.

```css
.circles {
  display: flex;
}
```

Bir sonraki adımımız çemberlerin kendisini şekillendirmek. Bütün çemberlerin ortak elementlerini, tek bir CSS sorgusu ile girelim. Bunu yapmak için, çember divlerine ortak bir sınıf adı verip, bu sınıfı biçimlendirebiliriz, fakat bunun yerine daha eğlenceli ve pratik bir CSS seçilimi yapalım.

**circles** isimli divin, tüm **doğrudan çocuğu** elementlerini seçerek - ki bunlar bizim çember divlerimiz oluyor - biçimlendirme yapalım.

```css
.circles > * {
  margin: 1rem 0.5rem;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  animation: grow 400ms linear infinite alternate;
}
```

Bu aşamada, henüz websitesi üzerinde ne çemberleri görebiliyoruz, ne de animasyonu. Henüz çemberlerimize bir arka plan rengi atamadık ve grow isimli animasyonumuzu yaratmadık. Hemen bunları da ekleyelim.

```css
.mavi {
  background-color: blue;
}
.kirmizi {
  background-color: red;
  animation-delay: 400ms;
}
.yesil {
  background-color: green;
}

@keyframes grow {
  to {
    transform: scale(1.2);
  }
}
```

Yukarıdaki biçimlendirmede, **kirmizi** isimli çembere, bir animasyon gecikmesi ekleyerek, basit bir dalgalanma elde ettik. Animasyonun kendisi, sadece çemberlerin skalasını 1.2 boyutunda büyütüyor. **infitinite** ve **alternate** etiketlerini kullanarak, animasyonun sürekli ve iki yönlü olmasını sağladık. Yani animasyon baştan-sona çalıştıktan sonra sondan-başa bir daha çalışacak.

## Sonuç

<p class="codepen" data-height="300" data-default-tab="html,result" data-slug-hash="gOWLNMv" data-user="kuvarskure" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/kuvarskure/pen/gOWLNMv">
  </a> by Ozcan ARICAN (<a href="https://codepen.io/kuvarskure">@kuvarskure</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
