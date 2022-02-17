{
"title": "Nasıl mobil yazılımcı olunur?",
"description": "Bu yazıda 2021 yılında, bir android ya da ios yazılımcısı nasıl olunur, en iyi yol haritası nedir, yazılımı öğrenmek ne kadar zaman alır gibi konuları konuşacağız.",
"image": "contents/media/mobil-yol-haritasi.jpg"
}
Mobil yazılımların değerini, hayatımızdaki yerini ve yazılım dünyası içindeki önemini tartışmaya bile gerek yok. Şüphesiz, hem an itibari ile hem de gelecek olarak, mobil yazılım mükemmel bir kariyer seçimi. Peki bu yola nasıl başlanır, nasıl devam edilir, işte asıl soru bu.

Bir yol haritası, herhangi bir yazılım platformunu öğrenirken verilen en büyük kararlardan birisi ve ne yazık ki bu kararı hiç bir tecrüben olmadan vermeden gerekiyor. Yıllar içinde edindiğim tecrübeler ile, daha sağlıklı karar alabilmen için elimden geleni yapacağım.

## İçerik için mi platform, platform için mi içerik

Öncelikle konuşmamız gereken konu, profesyonel bir firmanın kullanacağı platformu nasıl seçtiği. Zira bu mantığı, biz de yol haritamızı çizerken kullanacağız. Hemen bir örnek üzerinden konuşalım. Diyelim ki bir müşteri, bizden masaüstü yazılımı istedi. Bu yazılım, UI olarak modern bir dizayn, animasyonlar, özelleştirilebilir tema ve bir çok yerel veritabanı özelliği barındırıyor.

Elimize bu proje geldiğinde, kullanabileceğimiz masaüstü yazılım dillerini tek tek masaya yatırırız. Bilgimiz dahilinde python, .NET, java, electron gibi platformlar olduğunu düşünelim. Hangisinin projeye daha uygun olduğunu, o dilin bize sunduğu araçlara göre değerlendiririz. Mesela python arayüz konusunda bize limitli seçenek sunuyor. En azından UI için harcanak zaman, bütçeyi çok arttırdı. Java ise, farklı çözünürlük ve bit farklılıklarına göre sorun çıkarabiliyor. Bu kadar ağır bir UI için ilk tercih edeceğim dil olmazdı. Geriye .NET ve electron kalıyor.

Aynı mantık, mobil uygulamalarda da geçerli. Her mobil platformun kendine has avantajları ve dezavantajları var. React, flutter, native android ya da ios da, tıpkı desktop yazılım için kullandığımız mantık ile seçiliyor. Bu farklılıkları, aşağıda detaylı olarak inceleyeceğiz, fakat burada anlaşılması gereken, "ben x dilini biliyorum, hep onu kullanacağım" gibi bir ısrarın gerçekçi olmadığını göstermekti.

## MEVCUT MOBİL YAZILIM DİLLERİ

Mobil uygulama geliştirmek için kullanabileceğimiz platformları **native** ve **framework** olmak üzere ikiye ayıralım. Native 'den kastımız, doğrudan o platformun kendi ortamında geliştirmek. Örneğin android için, Android Studio üzerinde, JAVA ya da Kotlin dilini kullanırken, iOS için XCode üzerinde objective-c ya da Swift dilini kullanmak... Frameworkler ise, React, Flutter ve Xamarin gibi platformlar.

Daha önce de söylediğim gibi, her bir ortamın kendine has avantajları ve dezavantajları var. Seçim yapmadan önce bunları inceleyelim.

**Native Diller**

Bir mobil uygulamayı kendi native ortamında geliştirdiğinde, uygulama üzerinde %100 kontrolün oluyor. Her bir özelleştirme, detay senin tarafından belirlenebiliyor. Müşterinin isteyebileceği herhangi bir özellik, hiç bir sorun teşkil etmeden projede yer alabiliyor.

Dezavantaj olarak; hem androidin hem iosun ayrı ayrı progranlması, UI 'sinin ayarlanması ve fark farklı debug testlerine girmesi diyebiliriz. Bir projeyi native ortamda programlamak, uzun süren bir iştir. Üstelik her bir güncellemede, değişiklikte bu süreç tekrar yeniden başlar. Elbette, birden fazla dil üzerinde uzmanlaşmak gerektiğini de unutmamak gerek.

**Frameworkler**

Bu frameworklerin en büyük özelliği, hem android hem de ios projelerini tek bir dil kullanılmış çekirdek koddan, hem android hem de ios uygulamalar yaratmaları. Örneğin Flutter platformunda Dart dilini, React 'da ise JavaScript dilini kullanarak android ve ios uygulamaları yaratabiliyoruz.

Dezavantajları ise, platform için üretilmiş olan kütüphanelere bağlı kalmak. Bu dillerde, her bir özelleştirmenin yapılabileceğinin bir garantisi yok. Bu yüzden frameworkler, sadece belirli projelerde gerçekten iyi sonuç verebiliyorlar.

Örneğin genel, basit bir ses kayıt uygulaması yaptığını düşün. Bu basit proje hem nativede, hem de frameworklerde gerçekleştirilebilir. Fakat müşteri sonradan, bu proje için echo, disturtion vb filtre özellikleri isterse, native ortamda hiç bir sorun olmadan proje ilerlerken, framework dillerinde, bu özellikleri destekleyen bir kütüphane olup olmadığı sorunsalı ile karşılarsın.

## Hangi dili, neden seçmeli?

Bu yazı "günü kurtarmak" üzerine yazılmış olsaydı, bu soruya vereceğim cevap farklı olabilirdi, lakin bir kariyer planı üzerine konuştuğumuz için, kısa cevabım **Native**. Hatta bunu daha kesin bir ve nokta atışı belirtmem gerekirse, bence mobil uygulama geliştirici olmak için ilk başlanacak nokta **Android - Java**. Bunun temel bir kaç sebebi var. İzin ver açıklayayım...

Native ortamı, Frameworklere tercih etmemin sebebi, yukarıda da bahsettiğim gibi, frameworklerin kendine özel limitleri var. Eğer tek bildiğin yazılım ortamı framework ise, sana gelebilecek büyüklü küçüklü bir çok projeyi reddetmen gerekebilir. Fakat bu demek değil ki, framework kullanmyacaksın. Bir defa native ortamı öğrendiğinde, framework üzerinde çalışırken bile, frameworkün yarattığı kodları native ortamda düzenleyerek, istediğin sonucu alabiliyorsun. Yani frameworkün seni yarı yolda bıraktığı noktada, native becerilerin ile o hendeği atlayabiliyorsun.

Peki ya neden **Android**? Bunun sebebi ise istatiksel. Eğer kariyer olarak, objective-c ya da Swift dillerini öğrenirsen, sadece iOS uygulamaları yapabilirsin. Öte yandan, Android platformunu Java ile öğrenmeye karar verirsen, bir JAVA geliştiricisi olarak, tüm platformlara yazılım geliştirebilirsin. Bu bir can simidi gibi, CV 'inde ışıl ışıl parlayacak bir önlem.

"Ben sadece mobil geliştirici olacağım" diyerek yukarıda yazdığımı görmezden gelebilirsin ama şöyle düşünelim... Bir mobil projen için, veritabanı ile iletişim kuracak bir backend yazılıma ihtiyacın var. Herhangi ekstra bir dil öğrenmeye gerek kalmadan, bu backend yazılımı da java ile geliştirebilirsin. Üstelik OS için dert etmene bile gerek yok, zira JAVA hem windowsta, hem linuxta, hem de MacOS de çalışıyor. Bir taşta iki kuş...

## Ne tarz bir kariyer seçmeliyim?

Baştan söyleyeyim Mobil geliştirici olarak Freelancer olarak çalışmak zor, en azından uzun zaman alıyor. Genelde müşterilerin senden istedikleri, birden çok platformda senkronize çalışan uygulamalar oluyor. Yani bir içeriğin web sürümü, android ve ios sürümleri ve backend sunucuları oluyor. Böyle bir projeyi tek başına yapabilmen için, UI/UX designer, Frontend, Backend, Stackdeveloper, Android, IOS geliştiricisi rollerini aynı anda üstlenmek gerekiyor.

Yazılım bilgin bu noktaya gelse bile, projenin ilk yaratımından sonra, güncelleme/geliştirme bölümleri bile çok fazla vaktini almaya başlıyor. Veritabanındaki küçük bir değişikliğin bütün platformlarda güncellenmesi bile bütün gününü heba edebiliyor.

Bu sebeple, kurumsal bir firmada mobil yazılım geliştiricisi olmak daha rahat. Üstelik son yıllarda, bir çok yazılım firması çalışanlarına evden çalışmak gibi freelancerlara özel rahatlıklar sunuyor. Üstelik kurumsal çalışırken, işe başlamak için çok beklemeye de gerek kalmıyor. Java dilini ve android platformunu öğrenir öğrenmez "Junior Android Developer" olarak bu işe hemen başvurabiliyorsun.

## Nasıl devam etmeli

Diyelim Java dilini öğrendin, hatta bir firmada çalışıyorsun ama hala kendini geliştirmek istiyorsun. Bu durumda bir sonraki hamleni düşünelim. Swift öğrenek ios dünyasına da girebilirsin, bir framework de öğrenebilirsin.

İlk seçimimizin Native olmasına rağmen, bu aşamada Framework seçmeni tavsiye ederim. Hatta yine nokta atışı yapmam gerekirse, **React Native**. Bunun sebebi yine istatiksel. Bir android geliştirici olarak, zaten bir mobil uygulamanın life-cycle 'ını, projelerin algoritma yaratım süreçlerini zaten biliyorsun. Herhangi bir firmaya Mobil/Java geliştirici olarak başvurabiliyorsun. Eğer bir firmaya iOS/Android geliştiricisi olarak başvursan bile, seni büyük ihtimalle bu iki ortamdan birine atayacaklar ve diğer ortam üzerine çalışmayacaksın.

Bunun sebebi, dediğim gibi zamanlama. Bir yazılımcı, her bir native mobil ortam üzerine çalışıyorsa, o proje gecikir ve para kaybettirir. Yazılım firmalarının çoğu, android ve ios yazılım ekibini bu sebeple ayırır. Bu yüzden CV 'inde bu ikisinin de olmasına gerek yok. Öte yandan frameworkler için bu böyle değil. Android/Java/React Native dillerini aynı anda bilmek, bir yazılımcı için harikulade bir beceri listesi.

Herhangi bir firma, bu CV 'ye sahip yazılımcıyı çok çeşitli projede, anahtar yazılımcı olarak kullanabilir ve bu da o yazılımcının değerini çok arttırır. Üstelik yeteneklerine React Native 'in üzerine kurulduğu, JS, Node gibi dilleri ekleyince, isviçre çakısının yazılımcı versiyonuna dönüşmen işten bile değil.

## Sonuç

Yazı boyunca, bir yol haritası çizerken en çok dikkat ettiğim noktalar hızlı işe atılma, çok yönlü yazılımcı olma noktaları oldu. Elbette, yaptığın işi sevmek, heyecanla çalışmak da çok büyük etkenler. Dil ve platform seçerken, bu subjektif unsurları dikkate almadım. Belki React yerine Flutter 'ı daha çok sevmiş olabilirsin. Eğer React sana hevesini kaybettiren bir platform ise, söylediklerimi dikkate almayıp, Flutter dilini seçmelisin. Nihayetinde bu ömür boyu sürecek, öğrenme, çalışma gerektiren bir maraton.
