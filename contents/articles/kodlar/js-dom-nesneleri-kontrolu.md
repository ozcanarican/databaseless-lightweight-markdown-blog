{
"title":"JS ile DOM Nesneleri Kontrolü",
"description":"Temel JS komutları ile, websitemizdeki div button span gibi dom nesnelerini değiştirmeyi ve kontrol etmeyi öğrenelim",
"image":"contents/media/js-ve-dom.jpg",
"series": "js-ogreniyorum"
}

## DOM Nesneleri Nelerdir?

Bir dakika, önce şunun bir adını koyalım. DOM nesnesi dediğimiz şey, html taglarının bütünü. Yani o **div span table ul li** gibi etiketlerin tamamına DOM diyoruz. Document Modal Object 'den geliyor adı. Ben de az önce googlelayarak öğrendim. Ayrıca dominant erkek demek de oluyormuş. Bir anda google aramam çok enteresan yerlere gidiyordu, son anda durdum.

## DOM nesnelerini bulma

JS dosyamız içerisinden, js dosyamızın ekli olduğu sayfa içerisindeki bir html etiketini bularak başlıyoruz işe. Örneğin diyelim ana menümüzü kontrol eden bu **ul** listemiz olsun.

```html
<ul id="mainmenu">
  <li class="menulink">ANA MENU</li>
  <li class="menulink">HAKKIMDA</li>
  <li class="menulink">ÇALIŞMALARIM</li>
  <li class="menulink">REFERANSLARIM</li>
  <li class="menulink">İLETİŞİM</li>
</ul>
```

Yukarıdaki listedeki bazı DOM elementlerinin **id** ya da **class** gibi özellikleri var. JS 'de bir elementi bulurken en çok bu özelliklerden yararlanıyoruz.

**mainmenu** classını tanımladığımız **ul** nesnesini bularak başlayalım JS dosyamızda.

### getElementById()

```js
let mainmenu = document.getElementById("mainmenu");
console.log(mainmenu);
```

Yukarıdaki komut kendini açıklar nitelikte. **mainmenu** değişkenini listemize eşitlerken, ilk olarak _document_ değişkenini kullandık. Bu değişken html sayfasının tamamını temsil ediyor. _getElementById_ fonksiyonu ise, tamamen isminin işini yapıyor. _id_ özelliğine göre tüm DOM ları tarayarak, o isime ait _id_ taşıyan nesneyi buluyor.

Burada dikkat edilmesi gereken, prensip olarak bir web sayfasında, _aynı id ismine sahip iki DOM nesnesi olmayacağıdır_. Bu nedenle JS dosyası bize tek bir DOM nesnesi döndürüp çekiliyor. _console.log_ fonksiyonu ile de, gerçekten ilgili nesneyi bulup bulmadığını da kontrol edebiliriz.

### getElementsByClassName()

Hey maşşallah, fonksiyon adı evlere şenlik ama oldukça açıklayıcı. Tıpkı isminin söylediği gibi, bu fonksiyon bize, bu class adını taşıyan bütün DOM nesnelerini bir liste halinde getiriyor.

_menulink_ class ismine sahip olan **li** nesnelerimizi bir **Array** 'e çevirip console.log ile basalım.

```js
let menulinks = document.getElementByClassName("menulink");
Array.from(menulinks).forEach((menulink) => {
  console.log(menulink);
});
```

### querySelector()

Bu yakışıklı fonksiyonumuz ise, idmiş, classmış bakmadan, her ikisi için de sorgulama yapabileceğiniz bir tane. Tıpkı **CSS** de olduğu gibi "." ya da "#" işaretlerini kullanarak aradığımız DOM nesnesinin belirleyici özelliğini gönderiyoruz. Yani eğer bir id arıyorsak, id adının başına # koyuyoruz, bir class arıyorsak başına . koyuyoruz.

```js
let mainmenu = document.querySelector("#mainmenu");
console.log(mainmenu);
```

Yukarıdaki kod ile, yine **mainmenu** isimli idye sahip **ul** nesnemize ulaşabiliyoruz.

## DOM Nesnelerini Değiştirme

Tamam, aradık, buldum bu DOM arkadaşları ama biraz da kurcalayalım. Örnek olması için, yine aynı mainmenu listemizi manipüle ederek devam edelim. Mesela, tıkladığımız **li** elementlerinin içeriğini alert olarak ekrana basalım.

```js
let menulinks = document.getElementsByClassName("menulink");
Array.from(menulinks).forEach((menulink) => {
  menulink.addEventListener("click", (e) => {
    alert(menulink.innerHTML);
  });
});
```

Yukarıdaki kod bloğunda, daha önce yaptığım gibi menulink nesnelerini teker teker alıp, innerHTML özelliklerini ekrana alert olarak bastım. **innerHTML** temel olarak, bir DOM nesnesinin içerisinde tuttuğu veriyor deniyor. Mesela;

```html
<div>Merhaba, dünya!</div>
```

yukardaki **div** DOM nesnesinin innerHTML özelliği bize _Merhaba, dünya!_ değerini döndürür. Bu özelliği bir şeye eşitleyerek, o **DOM elementini de değiştirebiliriz**. Örneğin;

```js
let menulinks = document.getElementsByClassName("menulink");
Array.from(menulinks).forEach((menulink) => {
  menulink.addEventListener("click", (e) => {
    menulink.innerHTML = "Bana tıklarsın ha!!";
  });
});
```

yukardaki kod bloğu, tıklanan her bir **li** nesnesinin yazısını değiştiriyor. İnanmazsan kendin bak;

<p class="codepen" data-height="300" data-default-tab="html,result" data-slug-hash="wvPyjOQ" data-user="kuvarskure" style="height: 300px; box-sizing: border-box; display: flex; align-items: center; justify-content: center; border: 2px solid; margin: 1em 0; padding: 1em;">
  <span>See the Pen <a href="https://codepen.io/kuvarskure/pen/wvPyjOQ">
  Dersler-innerHTML</a> by Ozcan ARICAN (<a href="https://codepen.io/kuvarskure">@kuvarskure</a>)
  on <a href="https://codepen.io">CodePen</a>.</span>
</p>
<script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

## Style değişiklikleri

Elbette innerHTML kadar, stil değişiklikleri de sıklıkla kullanılan şeyler. Hemen bunu gerçekleştirmek için gerekli sytaxı birlikte inceleyelim. Aynı örneğimiz üzerinden gidersek, bu sefer, tıklanan her bir li öğesinin rengini kırmızı yapalım.

```js
let menulinks = document.getElementsByClassName("menulink");
Array.from(menulinks).forEach((menulink) => {
  menulink.addEventListener("click", (e) => {
    menulink.style.color = "red";
  });
});
```

Yukardaki kod bloğundan da anlaşılacağı gibi, doğrudan elementin style özelliğine, hangi stili manipüle edeceğimizi giriyoruz. Buradaki stil parametreleri, doğrudan CSS parametleri ile aynı değildir. Örneğin **background-color** yerine **backgroundColor** yazılıyor. Tüm stil isimlerini  [bu linki](https://www.w3schools.com/jsref/dom_obj_style.asp) ziyaret edebilirsiniz.



