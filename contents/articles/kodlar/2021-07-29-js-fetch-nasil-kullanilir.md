{
"title": "JS FETCH nasıl kullanılır",
"description": "JavaScript 'in Fetch fonksiyonu ile dosya okumayı, POST form verisi göndermeyi inceleyelim",
"image": "contents/media/js-fetch.jpg"
}
JavaScript 'in fetch fonksiyonu, local ya da bulutda tutulan dosyaları okumamızı, POST ya da GET cinsi form verisi göndermemizi sağlayan, bir JS geliştiricisinin alet çantasında bulunması gereken en önemli fonksiyonlardan birisi. Üstelik bu fonksiyon sadece vanilla javascriptde değil, React, React Native ya da Electron gibi platformlarda da elimizin altında. Lafı çok uzatmadan, hemen kodlar ile bu fonksiyonu incelemeye başlayalım.

## Çalışma Prensibi

Kelime anlamı olarak **yakala** manasına gelen fetch fonksiyonu, bir **arkaplan** istemcisidir. Dolayısıyla, çalışma yapısı olarak, bir async fonksiyondur. Bununla ne demek istediğime bir bakalım.

```js
const verileriOku = () => {
    fetch(...)
    satir2
    satir3
}
```

Elimizde yukarıdaki gibi bir fonksiyon olduğunu düşünelim. JavaScript motoru, bu fonksiyonu çalıştırırken, fetch satırını çalıştırır çalıştırmaz, bitmesini beklemeden, satir2, ve daha sonra satir3 komutlarını uygulamaya geçer. Zira fetch fonksiyonu arka planda çalışacağı için, default olarak JavaScript motorunun, **main-thread** 'ini kilitmeyecektir. Bu durumda, satir2 ve satir3 komutlarının kullanımı sarasında, fetch 'den okunacak bilgilerin hiç birisine erişemeyiz.

Yukardaki gibi bir fonksiyon, çoğu zaman istediğimiz tam tersi olur. Genellikle, fetch ile bir bilgiyi okuyup, alttaki satırlarda bu okuduğumuz bilgi ile işlemler yaparız. Bu sebeple, yarattığımız fonksiyonlar **async** fonksiyonları olmalı.

Kısaca **async** fonksiyonun mantığını açıklamam gerekirse, bir satırda, bu satırdaki işlemi bitirmeden, bir sonraki satıra geçme ifadesi olan **await** komutunu girebiliriz. Elimizdeki düz, örnek fonskiyonu bir **async** fonksiyona çevirerek devam edelim.

```js
const verileriOku = async() => {
    await fetch(...)
    satir2
    satir3
}
```

Gördüğün gibi tek yapmam gereken, arrow functionın değer parantezinin başına **async** ve duraklama istediğim satıra ise **await** yazmak oldu. Bu şekilde, JavaScript motoru, fonksiyonumuzun bir async fonksiyonu olduğunu ve fetch işlemi bitmeden satir2 ve satir3 kısmına geçmek istemediğimizi örneğin. Bu örnek fonksiyon içerisinde, artık satir2 ve satir3 bölümlerinde, fetchden çektiğimiz verileri kullanabiliriz.

## Fetch ile dosya okuma

Örneğimizde kullanabilmek adına, rastgele kullanıcı datası üreten bir API kullanalım. Randomuser.me bu iş için çok uygun. [https://randomuser.me/api/?results=50](https://randomuser.me/api/?results=50) bu linke tıklarsan göreceğin gibi, bu API bize 50 adet kullanıcının verisini json formatında veriyor.

```js
const verileriOku = async () => {
  const hamVeri = await fetch("https://randomuser.me/api/?results=50");
};
```

Örnek async fonksiyonumuzu kullanarak, fetch fonksiyonun içerisine, okunacak dosyanın adresini girerek, await komutu ile işlemi başlattım. Aldığım sonucu ise, hamVeri değişkenine yazdım. Bu aşamada, hamVeri değişkenini konsola yazdırırsan, dosyanın içeriği yerine, **Promise** cinsi bir veri görürsün.

Bir defa fetch ile dosyayı okuduğumuzda, bunu ya bir **text** ya da **json** formatına çevirmemiz gerekmekte. Örnekte bir json dosyası okuduğumuz için, biz fetch verisini bir **json** formatına çevirelim.

```js
const verileriOku = async () => {
  const hamVeri = await fetch("https://randomuser.me/api/?results=50");
  const jsonSonuc = await hamVeri.json();
  console.log(jsonSonuc);
};
```

Yukarıda dikkat edilmesi gereken şey, **hamVeri.json()** komutunun başında da **await** oluşu. **json()** fonksiyonu da bir arka plan fonksiyonu ve bu yüzden, başına **await** ibaresi yazarak, konsola yazdırma işleminden önce, çevirinin bitmesini bekliyoruz.

Eğer fetch verisini düz metin halinde okutmak istiyorsak, **.json()** fonksiyonu yerine **.text()** fonksiyonunu kullanabiliriz.

```js
const verileriOku = async () => {
  const hamVeri = await fetch("https://randomuser.me/api/?results=50");
  const textSonuc = await hamVeri.text();
  console.log(textSonuc);
};
```

Burada bilinmesi gereken, hamVeri değişkeninden verileri yalnızca bir defa okuyabileceğimiz. Yani hamVeri değişkenini **hamVeri.json()** komutu ile bir defa okuttuktan sonra, bir sonraki satırda tekrar **hamVeri.text()** şeklinde okutamayız. Elbette bunu aşmanın da bir yolu. Öyle bir durum düşünelim ki, bir verinin hem text, hem de json formatındaki hali işimize lazım olsun. Bu durumda, hamVeri değişkenini önce text formatında okuyup, bu meti daha sonra, JavaScript 'in dahili JSON sınıfı ile json formatına çevirebiliriz.

```js
const verileriOku = async () => {
  const hamVeri = await fetch("https://randomuser.me/api/?results=50");
  const textSonuc = await hamVeri.text();
  const jsonSonuc = JSON.parse(textSonuc);
  console.log(textSonuc);
  console.log(jsonSonuc);
};
```

Yukarıda gördüğün gibi, **JSON.parse(...)** komutu ile, json çevirme işlemini, doğrudan JavaScript 'in kendi sınıfı ile sorunsuz bir şekilde yaptık.

## Doğrudan then() fonksiyonu ile çalışmak

Bazı durumlarda, **async** fonksiyon yaratmak, kod bütünlüğünü ya da kod görselliğini bozabilir. Diyelim ki düz bir fonksiyon içerisinde, tüm bir websitesinin açılış mantığını kodluyorsun ve fetch komutu ile veri çekmen gerekiyor. Yukarıda öğrendiğimiz kadarıyla, böyle bir durumda, sadece fetch için ayrı bir **async** fonksiyon yaratıp, bu işlemi orada yapman gerek. Halbu ki buna mecbur değilsin. Fetch 'in kendi fonksiyonu olan **then()** ile **async** kullanmadan da bu işlemi yapabilirsin.

Yine json okuma örneğimizi, **then()** fonksiyonunu kullanacak şekilde değiştirelim.

```js
const verileriOku = () => {
  fetch("https://randomuser.me/api/?results=50")
    .then((hamVeri) => hamVeri.json())
    .then((jsonSonuc) => console.log(jsonSonuc));
};
```

Yukarıdaki fonksiyonun bir async fonksiyon olmadığına dikkat edelim. Burada **then** ibaresini kullanarak, satır satır fonksiyonun ilerleyişini kontrol etmek yerine, fetch fonksiyonun kendisine, _"yukarıdaki satır ile işin bittikten sonra bunu yap"_ diyerek işlerimi yürüttük. Yani yukarıdaki kodu türkçeleştirecek olursak, _"fetch ile https://randomuser.me/api/?results=50 adresini oku, **SONRA** okuduğun bilgiye hamVeri adını ver ve hamVeri 'yi json formatına çevir, **SONRA** çevrilmiş veriye jsonSonuc adını verip, jsonSonuc verisini konsola yaz"_ demiş olduk.

Bu iki tipi de öğrenmekte fayda var. Zira zaman zaman, fetch 'in bir arkaplan fonksiyonu olarak çalışmaya devam etmesini isteyebilirsin. Bu zamanlarda await ile tüm sistemi bekletmek yerine, then ile, fetch 'in sonucu ile işlem yapabilirsin.

## Fetch ile POST verisi gönderme

Hemen bir senaryo düşünelim. Hostingimizde, kendisine gönderilen üyelik formunu kayıt eden ve sonuc olarak bize JSON cinsi veri döndüren bir PHP dosyamız olsun. JavaScript dosyamız ile, bu PHP dosyasına POST cinsi veri gönderelim ve cevabını okuyalım.

```js
const fd = new FormData();
fd.append("isim", "ÖZCAN ARICAN");
fd.append("email", "ozcan.arican@birmobil.com");
fd.append("sifre", "sifremcokgizli");
fd.append("telefon", "05330001212");

fetch("https://ozcanarican.com/post.php", {
  method: "POST",
  body: fd,
})
  .then((cevap) => cevap.json())
  .then((json) => dogrula(json));

const dogrula = (json) => {
  if (json.sonuc === "successful") {
    console.log("başarıyla kayıt yapıldı");
  } else {
    console.log("hatalı giriş");
  }
};
```

Yukaridaki fonksiyonda, JavaScript 'in form verilerini tutan **FormData** harita sınıfını kullanarak, isim, email, şifre ve telefon alanlarına istediğimiz bilgileri yazıp, fetch ile, bu bilgileri **https://ozcanarican.com/post.php** adresine yolladık. Burada, veri okumaktan farklı olarak, **URL** değişkeninden sonra, **fetch** fonksiyonumuza bir obje yolladık. Bu obje içerisinde, **method** değişkenimizin **POST** olduğunu ve bu form verisinin **body** değişkeninin yarattığımız FormData sınıfı **fd** haritasının olduğunu söyledik. Eğer POST yerine GET cinsi veri yollamak istersen, tek yapman gereken **method** değişkenin içeriğini **POST** yerine **GET** olarak ayarlamak.

Fetch fonksiyonumuz çalıştıktan sonra ise, dönen cevabı **then** fonksiyonu ile **cevap** değişkenine yazıp, bunu json formatına çevirmek oldu. En sonunda ise, json formatına çevrilmiş bilgiyi, **dogrula** isimli fonksiyonumuza yolladık.

Bize gelen cevabın;

```json
{
  "sonuc": "successful"
}
```

ya da

```json
{
  "sonuc": "fail"
}
```

olacağını düşünelim. Bu durumda, **dogrula** fonksiyonumuz, jsonın **sonuc** değişkenini okuyarak, PHP dosyamızdan aldığı cevaba göre giriş işlemini yapabilir.

## Sonuç

fetch fonksiyonu belki sadece okunduğunda bir parça karışık gelebilir ama kullanır kullanmaz ne kadar kolay ve işlevsel olduğunu sen de göreceksin. Sana tavsiyem hemen bir kaç örnek ile, bu fonksiyon üzerinde deneyler yapman. Benim de örneklerde kullandığım gibi randomuser.me üzerinden veri çekip, bu verileri html dosyasına bir arayüz ile basmayı deneyebilirsin. Hem fetch, hem de json dosyalarını okuman açısında çok faydalı bir pratik olur.
