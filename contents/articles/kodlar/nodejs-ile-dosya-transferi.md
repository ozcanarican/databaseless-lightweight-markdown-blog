{
"title": "NodeJS ile dosya transferi",
"description": "Bilgisayarımıza bir nodejs sunucusu yaparak, herhangi bir cihazdan dosya gönderme işlemi yapacağız.",
"image": "contents/media/node-file-server.jpg"
}
Proje sonundaki hedefimiz, herhangi bir işletim sisteminden çalıştırılan serverımıza, herhangi bir cihazdan kolaylıkla dosyalarımızı transfer etmek olacak. Bunu yapabilmek için, ortam bağımsız dillerden olan NodeJS 'yi tercih ettim. Bu ortamda geliştireceğimiz sunucuyu, ister windows, ister linux, istersen macos işletim sistemden çalıştır, android ya da ios cihazından o bilgisayara dosyalarını transfer edebileceksin.

![NodeJS Sunucusu](contents/media/node-file-server-windows.jpg)

Bu işlemi kolayca yapabilmek için, NodeJS 'nin yaratacağı web adresini bir QRCODE 'a yazdırmayı uygun buldum. Telefonumuzdan kolayca bu kodu taratıp, adres yazmakla uğraşmadan, çektiğimiz fotoğrafları saniyeler içerisinde transfer edebiliriz.

## Çalışma Ortamı

İlk olarak, projemizi oluşturacağımız klasörü yaratmakla başlayalım. Ben Masaüstünde Work isimli bir klasör açtım ve klasörü Visual Studio Code ile açtım. Üstteki menüden **Terminal** seçeneğine basarak **Yeni Terminal** segmesine tıkladım.

Bir node projesi yaratabilmek için, terminale gerekli init komutunu girdim.

```
npm init
```

Node paket yöneticinin benden istediği soruları cevaplayarak, bir **package.json** oluşturdum. Eğer bu aşamada problem yaşarsan, çok önemseme çünkü aşağıda kendi dosyalarımı paylaşacağım. Doğrudan benim projemi github 'dan indirerek de sistemi inceleyebilirsin.

Proje içerisinde kullanarak işleri hızlandırabileceğim bir kaç node paketini yükledim. Bunlardan ilki, hızlıca navigasyon ve post işlemlerini yapabileceğim **express** paketi.

```
npm i express
```

komutu ile, **express** paketini projeme dahil ettim. Daha önce söylediğim gibi, web adresini de QRCODE 'una çevirmek istediğim için, bunu yapabilecek paketi de sistemime aşağıdaki gibi dahil ettim.

```
npm i qrcode-terminal
npm i express-fileupload
npm i ip
```

Bütün eklemelerim bittiği zaman, package.json dosyam aşağıdaki gibi göründü;

```json
{
  "name": "node-file-server",
  "version": "1.0.0",
  "description": "A server to receive files from mobile apps",
  "main": "app.js",
  "scripts": {
    "start": "node app.js"
  },
  "author": "Özcan ARICAN",
  "license": "ISC",
  "dependencies": {
    "express": "^4.17.1",
    "express-fileupload": "^1.2.1",
    "ip": "^1.1.5",
    "qrcode-terminal": "^0.12.0"
  }
}
```

## Sunucu Tarafı

Aşağıda paylaşacağım kodlarda, kısaca nodejs serverını express paketi ile kurup, **public** klasörünü, ilk giriş adresi olarak gösterdik. Bu sebeple, proje dizinine bir **public** klasörü yaratarak, içerisine **index.html main.css ve main.js** dosyalarını açtım. Şimdilik bu dosyalar boş kalabilirler.

```js
const http = require("http");
var ip = require("ip");
var qrcode = require("qrcode-terminal");
const express = require("express");
const app = express();

const fileUpload = require("express-fileupload");
app.use(fileUpload());

//Sunucu Portu ve hedef klasör
const port = 3000;
const hedef = "C:/Users/ozcan/Desktop/";

//public klasörünü statik dosyalar olarak sun
app.use(express.static("public"));

// Dosya taşıma fonksiyonu
const move = (dosya, res) => {
  dosya.mv(hedef + dosya.name, function (err) {
    if (err) console.log("Yükleme hatası");
  });
};

//Upload işlemini ayarlıyoruz
app.post("/upload", function (req, res) {
  let uploadFile = req.files.dosya;
  var dosyaSayisi = 1;

  //Eğer birden fazla dosya gönderiyorsa
  if (Array.isArray(uploadFile)) {
    dosyaSayisi = uploadFile.length;
    uploadFile.map((d) => {
      move(d);
    });

    //Eğer tek dosya gönderiyorsa
  } else {
    move(uploadFile);
  }
  //Cevap gönder
  console.log(`${dosyaSayisi} adet dosya alındı.`);
  res.redirect("/?adet=" + dosyaSayisi);
});

//Web serverını başlat
app.listen(port, () => {
  console.log(`Server adresi: http://${ip.address()}:${port}`);
});
//Console 'a sunucu bilgilerini ve QRCODE 'unu bas
qrcode.generate(`http://${ip.address()}:${port}`, { small: true });
console.log("Dosya transferi için QRCODE 'unu okutun");
```

Kodlarda görüldüğü gibi, açılış klasörü haricinde bir de **/upload** isimli bir adres oluşturdum. Bu adrese POST olarak gelen **dosya** isimli input, öncelikle array mi yoksa tek dosya mı diye kontrol ediliyor. Eğer tek bir dosya ise, doğrudan **move** isimli fonksiyon sayesinde, **hedef** ismiyle belirttiğimiz klasörün içerisine taşınıyor. Eğer bir array ise, for döngüsüne sokularak, her bir dosya için **move** isimli fonksiyon çalışıyor.

## İstemci Tarafı

Dosya gönderecek olan istemci, bir websitesi olarak çalışacağı için, **public** klasörünün içerisinde yarattığımız dosyaları düzenlememiz yeterli. Her şey bittiğinde, dosyalarımızı bilgisayara göndermek için, QRCODE 'u taratarak, bu websitesini açmamız yeterli olacak.

Öncelikle index.html 'den başlayalım.

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NODE SERVER</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    <div class="header"><a href="/">NODE DOSYA YÜKLEYİCİ</a></div>
    <div class="main">
      <div class="bilgi" style="display: none"></div>
      <div class="form-container">
        <h1>DOSYA GÖNDER</h1>
        <small>Birden fazla dosya seçebilirsiniz</small>
        <form
          method="post"
          action="/upload"
          enctype="multipart/form-data"
          id="form"
        >
          <input type="file" name="dosya" id="dosya" multiple />
          <div class="tuslar">
            <button type="button" id="sec">DOSYA SEÇ</button>
          </div>
        </form>
      </div>
    </div>
    <script src="main.js"></script>
  </body>
</html>
```

HTML dosyasında, basit bir şablon oluşturarak, **main.css** ve **main.js** dosyalarına link verdim. Şimdi bu iki dosyayı da ekleyelim. Basit ve temiz bir görüntü için, CSS dosyamızı ekleyelim.

```css
* {
  margin: 0;
  padding: 0;
  font-size: "sans";
}
body {
  background: #c31432; /* fallback for old browsers */
  background: -webkit-linear-gradient(
    to right,
    #240b36,
    #c31432
  ); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(
    to right,
    #240b36,
    #c31432
  ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.header {
  background-color: #fff;
  padding: 1rem 2rem;
  font-weight: 600;
  color: rgba(0, 0, 0, 0.8);
  font-size: 1.2em;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.4);
}

.main {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  justify-content: center;
  align-items: center;
  padding-top: 5vh;
}
.form-container {
  padding: 1rem;
  background-color: rgba(255, 255, 255, 0.9);
  border-radius: 0.5rem;
  text-align: center;
}
h1 {
  margin-bottom: 0.5rem;
}
small {
  display: block;
  margin-bottom: 2rem;
}
.tuslar {
  margin-top: 1rem;
}
button {
  background-color: #c31432;
  color: #fff;
  padding: 0.5rem 2rem;
  font-weight: bold;
  border: none;
  border-radius: 0.5rem;
}
#dosya {
  display: none;
}

a {
  text-decoration: none;
  color: #c31432;
}
.bilgi {
  background-color: #fff;
  padding: 1rem;
  border-radius: 0.5rem;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.4);
  font-weight: 600;
  font-size: 1.5em;
  color: red;
  margin-bottom: 1rem;
}
```

CSS dosyasında, **.bilgi** divini ve dosya seçme inputunu gizledim. Dosya seçme inputu özellikle çirkin göründüğü için bu inputu doğrudan kullanmayı sevmiyorum. Bunun yerine, bir tuş koyarak, tuşa tıklandığında, sanki inputa tıklanmış gibi göstermek daha hoş bir görüntü veriyor. İşleri bir tık gereksiz karmaşıklaştırdığımı farkındayım ama sonuç gerçekten göze daha hoş geliyor.

Son olarak **main.js** dosyamızı yazalım

```js
//Seçme tuşu, formu ve dosya inputunu tanımlıyoruz
const buttonSec = document.getElementById("sec");
const files = document.getElementById("dosya");
const form = document.getElementById("form");
//Seçme tuşuna basıldığında, dosya inputuna basılma komutu veriyoruz
buttonSec.addEventListener("click", (e) => {
  files.click();
});

//Dosya inputu değiştiği zaman, formu gönderiyoruz
files.addEventListener("change", (e) => {
  form.submit();
  const container = document.querySelector(".form-container");
  container.innerHTML = "<h1>Yükleniyor</h1>Lütfen Bekleyiniz...";
});

//web urlsini kontrol edip, adet değişkenin olup olmadığına bakıyoruz
var params = new URLSearchParams(window.location.search);

//eğer varsa, adet verisini alarak, .bilgi divine basıyoruz
if (params.has("adet")) {
  const adet = params.get("adet");
  const bilgi = document.querySelector(".bilgi");
  bilgi.style.display = "block";
  bilgi.innerHTML = `${adet} adet dosya yüklendi`;
}
```

## Serverı Çalıştırma

Tüm dosyalarımız yaratıldıktan sonra, tek yapmamız gereken, run komutunu çalıştırmak.

```
npm run start
```

Yukarıdaki komutu terminale yazdıktan sonra, karşına bir adet QRCODE ve yazı olarak sunucu adresi çıkmalı. Bu QRCODE 'unu telefonuna okutarak, karşına çıkacak olan websitesinden, dosyalarını sunucuya gönderebilirsin.

![Node File Server Android](contents/media/node-server-phone.jpg)

## GITHUB

Tüm projeyi [buraya tıklarak](https://github.com/ozcanarican/nodejs-file-server) github üzerinde görebilir ve bilgisayarına indirebilirsin. İndirdiğin klasörü Visual Studio Code ile açarak **npm install** yazıp, gerekli bileşenleri yükledikten sonra **npm run start** komutu ile projeyi çalıştırabilirsin.
