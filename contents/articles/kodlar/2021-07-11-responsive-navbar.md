{
"title": "Responsive Navbar Örneği",
"description": "Hem desktop ile hem de mobil platforlarla uyumlu çalışan bir ana menüyü, sadece CSS kullanarak birlikte yapalım.",
"image": "contents/media/responsive-navbar.jpg"
}

## Hedefimiz

<iframe width="100%" height="315" src="https://www.youtube.com/embed/E7fLk_EvnIw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

## ÖZET

Responsive bir navbar yaparken, birden fazla farklı strateji izlenebilir. Örneğin; bir tuşun :hover pseudo özelliğini kullanabilirsin. Mobil platformlarda fiziki bir fare olmadığı için, hover özelliği yalnızca o tagın üzerine tıklandığında aktif oluyor. Bu şekilde, tuşun üzerine tıklandığında açılan ve, tuş haricinde başka bir yere tıklandığında kapanan bir menü yaratılabilirsin.

Ben bu örnekte, işi bir seviye ileriye götürüm, input tagının :checked pseudo özelliğini kullandım. Bunun avantajı ise, menüyü açmak ve kapatmak için aynı tuşa basmak yetiyor. Daha kullanıcı dostu olduğunu düşündüğüm bu yöntem, tıpkı bir toggle tuş gibi çalışıyor.

Lafı uzatmadan hemen örneğin kodlama kısmına geçelim.

## HTML Bölümü

```html
<nav>
  <div class="logo">ŞİRKETTO</div>
  <div class="ana-menu">
    <label for="menu-check">MENU</label>
    <input type="checkbox" id="menu-check" />
    <ul class="menu-links">
      <li><a href="#">ANA SAYFA</a></li>
      <li><a href="#">YAZILAR</a></li>
      <li><a href="#">GALERİ</a></li>
      <li><a href="#">HAKKIMDA</a></li>
      <li><a href="#">İLETİŞİM</a></li>
    </ul>
  </div>
</nav>
```

Bu yapıyı oluştururken dikkat etmen gereken tek bir alan var, o da **ana-menu** sınıf isimli taşıyıcı divin yapısı... **label, input ve ul** etiketleri, birbirinin kardeşi olmak zorunda. Yani tüm bu taglar, doğrudan doğruya **ana-menu** taşıyıcı sınıfının doğrudan çocuğu olmalı.

Bu önemli bir nokta çünkü; buradaki **input** etiketinin işaretli ya da işaretsiz olması durumuna göre, **ul** etiketinin görünür ya da gizli olmasını sağlayacağız. Bunu yapabilmemiz için de, bildiğin gibi, ul etiketi ya doğrudan input 'un bir çocuğu ya da kardeşi olmalı.

## CSS BÖLÜMÜ

Her şeyden önce, genel olarak sayfamızı ve içerisindeki tüm elementleri bir derleyip toplayalım.

```css
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
a {
  color: orange;
  text-decoration: none;
}
```

Yukarıdaki CSS kodları ile, tüm elementlerin gereksiz boşluklarını alıp, çerçevelerini, gerçek boyutları ile sınırlandırdık. Bir proje ne kadar basit ya da kompleks olursa olsun, bir alışkanlık olarak CSS yazmaya mutlaka bu kodlar ile başlıyorum. Bunun haricinde bir de, linklerimizin altı çizili halini kaldırıp, turuncu bir renk verdim.

### Mobil Menü

İlk iş olarak, CSS üzerinde, mobil ortamda göreceğimiz navigasyonu biçimlendirelim.

```css
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  text-align: center;
  background: #000;
  color: #fff;
  padding: 0.5rem 2rem;
}
```

Doğrudan nav etiketini bir flexboxa çevirerek, logo kısmı ile menü kısmını **justify-content: space-between** kodu ile birbirinden ayırdım. **align-items:center** komutu ile de, dikey olarak, flexboxın tüm elementlerini ortaladım. Bu iki önemli adımdan sonra, açılacak menünün konumunu, bu nav taşıyıcısına göre ayarlayabilmek adına **position: relative** komutunu kullandım. Geri alan komutlar sadece, basit görsel biçimlendirmeler.

```css
#menu-check {
  display: none;
}
```

Elbette bu checkbox 'ın menümüz içerisinde görünür olmasını istemediğimiz için, **display:none** komutu ile gizliyoruz. Doğrudan checkboxın kendisine tıklamak yerine, onunla eşleştirilmiş olan label etiketine tıklayarak checkboxın seçilip, seçilmemesini kontrol edeceğiz.

```html
<label for="menu-check">MENU</label>
```

Bu label etiketindeki **for** bölümü, tam olarak bu eşleştirmeyi yapıyor. Bir input 'un idsini girdiğimiz **for** etiketi, o labelı, idsi girilen inputun bir parçası haline getiriyor. Yani labelın üzerine tıklamak, checkboxın üzerine tıklamak ile aynı işi görüyor.

Buradaki **MENU** yazısını silip, bunun yerine fontawesome ile bir hamburger menü ikonu ya da doğrudan bir png resmi de yerleştirebilirsin. Çok daha güzel görünür. Ben örneği basit tutmak adına, işin içine bir de ikonları karıştırmak istemedim.

```css
.menu-links {
  display: none;
  position: absolute;
  right: 1rem;
  top: 120%;

  background: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  padding: 1rem;
  list-style-type: none;
  text-align: left;
}
.menu-links li {
  padding: 0.5rem 1rem;
}
```

Gelelim menünün kendisini şekillendirmeye... İlk yaptığımız iş **display:none** komutu ile, menünün normalde gizli olarak karşımıza çıkmasını sağlamak. **position:absolute** ile, menünün nav içerisinden çıkıp, yine nava bağlı bir görecelilik ile ekranın istediğimiz yerinde görünmesini sağlıyoruz. Bu konumlandırma için ben; **top:120%** diyerek, navın hemen altında, küçük bir boşlukla görünmesini ayarladım. **right:1rem** diyerek de, ekranın sağ tarafına 16pxlik bir boşluk bıraktırdım.

```css
#menu-check:checked + .menu-links {
  display: block;
}
```

Mobil için son ve en önemli olan CSS kodunu da yukarıda bu şekilde ekliyoruz. Temel olarak burada CSS 'e şunu söylüyoruz; \*\*Eğer menu-check idli tag seçili ise, menu-links sınıflı etiketin görünürlüğünü block olarak değiştir.

Buradaki **+** simgesi, kardeş sınıf demek. Yazının başında, bununla ilgili bir uyarıda bulunmuştum. **input** ile **menu-links** divi kardeş oldukları için, birbirlerine bu şekilde müdahale edebiliyorlar.

## DESKTOP BÖLÜMÜ

```css
@media only screen and (min-width: 900px) {
  label {
    display: none;
  }
  .menu-links {
    display: flex;
    position: inherit;
    background: none;
  }
}
```

Menünün desktopa uyumlu görünmesi için kısa 2 biçimlendirme yapıyoruz. Öncelikle **MENU** yazan labelı gizlemek için **display:hidden** diyoruz. Daha sonra menünün kendisini, yatay bir şekilde görünür kılmak için **display:flex** diyoruz ve pozisyonunu absolutedan alıp, orijinal haline getirmek için **position:inherit** komutunu kullanıyoruz.

## Kendin incele

 <p class="codepen" data-height="300" data-default-tab="html,result" data-slug-hash="gOWwZxp" data-user="kuvarskure" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/kuvarskure/pen/gOWwZxp">
  Responsive Navbar</a> by Ozcan ARICAN (<a href="https://codepen.io/kuvarskure">@kuvarskure</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>
