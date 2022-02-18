{
"title": "GIT ve GITHUB NEDİR, NE İŞE YARAR?",
"description": "Eğer bir süredir yazılım dünyasındaysan, mutlaka git ya da github terimlerini daha önce duymuş olmasın. Yeni projen için bu teknolojilerin işine yarayıp yaramayacağını birlikte inceleyelim",
"image": "contents/media/github-nedir.jpg"
}

## GIT Nedir?

Kısaca GIT 'i tanımlamak gerekirse, bu teknoloji için bir **versiyonlama aracı** diyebiliriz, fakat GIT kullanım alanı ve amaç olarak bundan çok daha geniş kapsamlı çalışan bir sistem.

GIT sistemi ile, üzerinde çalıştığımız projenin, o anki görüntüsünü alıp, bir önceki görüntü ile olan farkını kayıt altına alabiliyoruz. Örneğin, bir websitesi üzerinde çalıştığını düşünün ve index.html dosyasını değiştirme ihtiyacı duydun. Bu değişikliği yaptıktan sonra, projenin son halini GIT görüntüsü olarak kaydederken "index değiştirildi" gibi bir not yazabiliyorsun.

Bir GIT görüntüsü aldığında, sistem bunu otomatik olarak farklı bir yere, yeni bir versiyon olarak kayıt ediyor. İşler ters gittiği zaman, üzerinde oynama yaptığın bir dosyayı kolayca geri getiriyorsun.

Bu dosya geri getirme özelliğini, özellikle paket program satışında sıklıkla kullanma ihtiyacı duyabiliyorsun. Yazdığın bir programı, onlarca müşteriye sattığını düşün. Sürekli gelişen bu projenin farklı versiyonları, farklı farklı müşterilerde aktif halde çalışıyor oluyor. Bir hata gidermesi yapacağın zaman, müşterinin kullandığı versiyona geri dönüp, hızlıca değişiklik yapabiliyorsun.

## GIT Nasıl Kurulur?

Kısaca GIT 'in kullanım alanından bahsettiğimize göre, doğrudan bir örnek proje içerisinde denemeler yapıp, GIT komutlarına bakabiliriz.

**Linux için:**
`$ sudo dnf install git-all`
komutunu terminale yazmak yeterli.

**MacOS için:**
MAC bilgisayarlara GIT yüklemenin en kolay yolu, XCode yüklemek.

**Windows için:**
[Bu adrese girererek](https://git-scm.com/download/win) GIT for Windows uygulamasını bilgisayarınıza kurabilirsiniz.

## GIT Nasıl Kullanılır ve Komutları Neler

Evet! Bilgisayarımızda GIT kurduğumuza göre, hemen bir örnek üzerinde denemeler yapalım. Özellikle GIT gibi terminali sık kullanacağın projeler için, editör olarak VISUAL STUDIO CODE kullanmanı tavsiye ederim. Tamamen ücretsiz, Microsoft tarafından geliştirilen bu editör, kolayca terminale erişmene olanak sağlayıp, işlerini kolaylaştıracaktır.

![yeni git projesi](/contents/media/git-projem.jpg)

Resimde görüldüğü gibi, Visual Studio 'yu açarak, git-projem isimli yeni bir çalışma klasörü oluşturdum. Visual Studio üzerinde, hızlıca terminal ekranını açmak için **CTRL + SHIFT + "** klavye kombinasyonunu kullanabilirsin.

Boş klasörümüzde GIT 'i aktif etmek için terminale `git init` komutunu gönderelim.

init komutu girildikten sonra, dosya sisteminizde hiç bir şeyin değişmediğini fark edeceksiniz. Bunun sebebi, GIT 'in ana dizinin gizli bir klasör olmasından kaynaklanıyor. Kurulumu başarıyla gerçekleştiğini doğrulamak için, bu gizli klasörün içine girip kontrol edebilirsin.

```
$ cd .git
$ ls
```

```
Mode                 LastWriteTime         Length Name
----                 -------------         ------ ----
d-----        11.07.2021     13:22                hooks
d-----        11.07.2021     13:22                info
d-----        11.07.2021     13:22                objects
d-----        11.07.2021     13:22                refs
-a----        11.07.2021     13:22            130 config
-a----        11.07.2021     13:22             73 description
-a----        11.07.2021     13:22             23 HEAD
```

Gördüğün gibi, .git klasörü açılmış ve GIT kendi çalışma ortamını içine kurmuş. Bir önceki dizine geri dönerek, ilk dosyamızı oluşturalım ve bunu GIT 'e ekleyelim.

![git-ilk-dosya](/contents/media/git-merhaba-dunya.jpg)

Resimde görüldüğü gibi index.html isimli bir dosya oluşturdum ve bu dosyanın GIT versionları tarafından takip edilmesini sağlamak için, terminale `git add index.html` komutunu yazdım. Artık bu proje içerisinde, ne zaman index.html dosyasını değiştirsem, GIT bu değişiklikleri fark ederek, her yeni bir sürümde değiştirilmiş index.html 'in varyasyonlarını saklayacak.

**git add** komutu ile sadece dosya değil, tümden bir klasörü de GIT sistemine dahil edebilirsin.
`git add resimler` komutu ile tüm resimler klasörünün versiyonlanmasını sağlayabilirsin.

index.html dosyasını GIT sistemine dahil etmiş olsak bile, henüz bu dosya ile bir GIT sürümü oluşturmadık. GIT 'in çalışma prensibini anlamak için, aşağıdaki resme bir göz atalım.

![git-staging](/contents/media/git-staging.jpg)

Yarattığımız ve GIT 'e eklediğimiz her dosya, GIT tarafından versiyonlanmadan önce, mutlaka STAGING ALANI(AREA) diye isimlendirdiğimiz bölüme gider. Staging alanını, bir sonraki versiyon yaratımında değişikliğe uğrayacak ya da eklenecek dosyaların gösterildiği bir vitrin olarak düşünebiliriz.

Örneğin index.html dosyasını GIT 'e ekledik ama hala bu eklemeden sonra bir versiyon yaratmadığımız için, index.html dosyasının bizi STAGING alanında beklediğini tahmin edebiliriz. Bunu test etmek için, staging alanını görüntülemeye yarayan **git status** GIT komutunu yazalım.

```git
$ git status

On branch master

No commits yet

Changes to be committed:
  (use "git rm --cached <file>..." to unstage)
        new file:   index.html
```

Cevap olarak GIT 'den dönen yazıyı inceleyelim. **Changes to be commited** altında, yeni dosya olarak bize index.html 'in eklendiğini ve bir sonraki commit de(versiyonlamada), git versiyonuna ekleneceğini söylüyor.

Her şey saat gibi çalıştığı için, yeni index.html dosyamız ile, ilk sürümümüzü oluşturalım. Sürüm oluşturmak için kullanacağımız komut **git commit -m "mesaj"**. Buradaki mesaj bölümü, yaptığımız değişikliği kısaca tanımlayacak, sonradan kontrol ettiğimizde hemen anlayabileceğimiz bir mesaj yazısıdır.

```git
git commit -m "index.html eklendi"
```

komutunu terminale girerek, "index.html eklendi" mesajı ile ilk sürümü yarattım.

```
 1 file changed, 12 insertions(+)
 create mode 100644 index.html
PS C:\Users\ozcan\Desktop\Works\git-projem>
```

Cevaptan da anlaşıldığı üzere, 1 dosya değişikliği ile yeni sürümümüz GIT 'e kaydedildi. Dilersen **git status** komutu ile, STAGING alanın boş olduğunu teyit edebilirsin. Zira yaptığımız değişiklikler, Staging alanından, GIT sürümüne aktarıldığı ve çalışma klasörümüz ile GIT eşitlendiği için Staging alanı herhangi bir değişiklik göstermeyecektir.

Bu aşamadan sonra, çalışacağın CSS, JS vs gibi dosyaları ve klasörleri **git add "dosya/klasör adı"** komutu ile GIT sistemine dahil ederek, değişikliklerini **git commit -m "mesajın"** komutu ile versiyonlandırmak.

## GIT ile dosya kurtarma

Diyelim ki, daha önce yarattığımız index.html üzerinde korkunç(!) bir hata yaptık ve bir önceki versiyonda kaydettiğimiz haline geri dönmek istiyoruz. GIT ile tek komut kullanarak bu kabustan çabucak kurtulabiliriz.

`git restore dosyaadı`

Bizim senaryomuza göre, dosyaadı kısmı index.html olacak. Bunu test edebilmek için, önce index.html dosyamız üzerinde trajik bir hata yapalım.
![gule gule dünya](/contents/media/git-gule-gule.jpg)

Resimde görebildiğin gibi, Merhaba Dünya yazısını değiştirerek, Güle Güle Dünya yazdım. Bu olumsuz ve pesismistik mesajı, eski neşeli haline getirmek için
`git restore index.html`
komutunu kullanalım.

Komutu girip, enter tuşuna bastıktan hemen sonra, **Güle Güle Dünya** yazısının silinip, yerine **Merhaba Dünya** yazısının geri geldiğini göreceksin. Aynı şey klasörler için de geçerli. GIT dünyasında hiç bir hata geri-dönüşsüz değil.

## GITHUB Nedir, Nasıl Kullanılır?

Yukarıda temel GIT komutlarını incelerken, bilerek atladığım bazı GIT özelliklerini bu bölümde kısaca anlatayım. GIT ile proje yönetmenin en büyük avantajlarından birisi de, aynı proje üzerinde birden fazla kişinin çalışabilmesi. Versiyon yaratma ve bu versiyonlara mesaj eklemeyi öğrendik. Diyelim, iki yazılımcı, tek bir websitesi üzerinde çalışıyoruz. Benim eklediğim versiyonları, diğer yazılımcı da GIT üzerinde görebiliyor ve kendi kodlarını yeni versiyonlar ile ekleyebiliyor.

Ortaya _bu kodu da kim ekledi?_ gibi sorular çıkmadan, herkesin katkıda bulunduğu ortak bir proje üzerinde çalışabiliyoruz.

Buna ek olarak, bir ana proje üzerinden, o projenin farklı varyasyonlarını da yaratabiliyoruz. Bunu açmak için, bir blog sitesi yaptığımızı düşünelim ve adına ANA-BLOG diyelim. Bu projeyi, yeni yazı gönderme, yazı okuma, istatistik vs gibi fonksiyonlarını yazdıktan sonra tamamladığımızı farz edelim.

Bu özelliklere sahip, bir kişisel blog sayfası yapmak istediğimizde, tek yapmamız gereken ANA-BLOG projesinden bir versiyon yaratıp, bu sitenin temasını değiştirerek, kişisel blog olarak kullanmak oluyor.

Terminoloji ile olarak, bu varyasyon yaratma işlemine, dal anlamına gelen Branch deniyor. Ana projeyi bir ağaç olarak düşünürsen, bu gövdeden türemiş olan dallarımız varyasyonlar oluyor.

Peki bunları neden GITHUB başlığı altında anlatıyorum? Çünkü, GITHUB tüm bu işlemleri kolayca yapmamızı sağlayan, ücretsiz bir online platform. Bilgisayarınızdaki GIT projesini kolayca github.com üzerine yükleyip, ister özel ister genel proje yapıp, dilediğiniz insanların yeni bracnhlar yaratmasına izin verebiliyorsunuz. Dilerseniz, başka bir master projenin branchını oluşturup, kendi özelleştirmenizi yapabiliyorsunuz.

## GIT 'den GITHUBA Geçiş

Bu işlem sandığından çok daha kolay. Hemen adım adım gidelim.

**1.** Bir GITHUB hesabı yarat. [github.com](https://github.com) adresine girerek, üye ol.

**2.** Profil sayfana giderek, yeni bir proje yarat.

![github yeni proje](/contents/media/git-new-repo.jpg)

Terminoloji olarak, GIT projelerine repo ya da repository deniyor. Profil sayfana girdiğinde, yeşil "New" tuşuna basarak yeni proje yarat.

**3.** [Github desktop](https://desktop.github.com/) uygulamasını linke tıklayarak indir ve bilgisayarına kur.

**4.** Github uygulamasına giriş yaptıktan sonra, tek yapman gereken **Menü** 'den **File** a tıklayarak **Add local repository** seçeneğine tıklamak. git-projem klasörünün yerini bilgisayar üzerinde seç.

![yerel repository](/contents/media/git-add-local.jpg)

**5.** Son olarak **Publish repository** tuşuna basarak, yerel projeni, github üzerinde açtığın repository içerisine yüklemek.

![yerel repository](/contents/media/git-publish.jpg)

GIT ve GITHUB dünyası oldukça derin, öğrenmesi biraz zaman alabilen platformlar. Yine de her yazılımcının bilmesi elzem diye düşündüğüm için, mutlaka yüzelsel de olsa projelerinde kullanmanı tavsiye ederim.

Bugün bir çok kurumsal yazalım firması, GIT bilmeyi bir şart koşuyor. İster freelance ister kurumsal çalışıyor ol, GIT mutlaka her türden projende sana kolaylık ve avantaj sağlayacaktır.
