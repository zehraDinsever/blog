-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2016, 01:48:12
-- Sunucu sürümü: 5.7.9
-- PHP Sürümü: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_aciklama` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `kategori_aciklama`) VALUES
(1, 'css', 'css dersleri'),
(2, 'html', 'html dersleri'),
(3, 'php', 'php dersleri'),
(4, 'dle', 'dle dersleri'),
(5, 'diğer', 'diğer konular hakkında hersey');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

DROP TABLE IF EXISTS `konular`;
CREATE TABLE IF NOT EXISTS `konular` (
  `konu_id` int(11) NOT NULL AUTO_INCREMENT,
  `konu_baslik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `konu_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `konu_ekleyen` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `konu_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `konu_kategori` int(11) NOT NULL DEFAULT '0',
  `konu_durum` int(11) NOT NULL DEFAULT '0',
  `konu_hit` int(11) NOT NULL DEFAULT '0',
  `konu_resim` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`konu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`konu_id`, `konu_baslik`, `konu_aciklama`, `konu_ekleyen`, `konu_tarih`, `konu_kategori`, `konu_durum`, `konu_hit`, `konu_resim`) VALUES
(1, 'css dersleri', 'Lorem Ipsum Nedir?\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960''larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 'osman', '2016-08-24 21:07:42', 1, 1, 28, 'http://i.hizliresim.com/aX0qr7.jpg'),
(2, 'html dersleri', 'Lorem Ipsum Nedir?\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960''larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 'ahmet', '2016-08-29 21:40:39', 2, 1, 15, 'http://i.hizliresim.com/2j8Va2.png'),
(3, 'En Kolay Şekilde İnternet Sitesi Sahibi Olun', 'İnternet günümüzde insanların ihtiyaçlarını karşıladığı bir ortam haline gelmiştir. Bu ihtiyaçlar internet siteleri aracılığıyla karşılanmaktadır. İnternet dünyasında milyonlarca site bulunduğunu belirtmekte fayda var. İnsanlara bir alanda hizmet sağlamak veya bilgi aktarmak için internet siteleri kurulmaktadır. Peki internet siteleri nasıl kurulur, herkes internet sitesi açabilir mi gibi sorulara yanıt vererek makalemize devam edelim.\r\n	Öncelikle bilmeniz gerekir ki, internet sitesine sahip olmanız için domain ve hosting’e ihtiyacınız var. Bunların neler olduğunu açıklayarak devam edelim.\r\na) Domain (Alan adı)\r\n	Domain alan adı olarak da bilinmektedir. Sitenizin isminin ne olacağını ifade etmektedir. Site adı da diyebiliriz. Öncelikle sitenizin ismine karar vermeniz gerekiyor, ardından da isim uzantısına yani, .com, .net., .org gibi çeşitli uzantılar arasından bir seçim yapmalısınız. Bu aşamada önemli olan hayalinizdeki alan adını satın almanızdır. Alan adları en az 1 yıllık olarak alınabiliyor, uzun vadeli siteler için bu süreyi daha uzun olarak satın alabilirsiniz. Aksi takdirde her yıl süreyi uzatmanız gerekecektir.\r\nb) Hosting (Yer sağlayıcı)\r\n	Domain aldıktan sonra sitenizin ismi hazır demektir. Bu aşamadan sonra hosting satın alarak sitenizi kuracağınız yeri ayarlamanız gerekmektedir. Sitenize yükleyeceğiniz dosyalar, yazılar vs yer kaplayacaktır, bu yeri temin etmek için hosting firmaları kullanılmaktadır. Bilgisayardaki harddiskler gibi düşünebilirsiniz. Siteniz hostinginiz de yayın yapacaktır. Birçok hosting firması arasından ihtiyaçlarınıza en uygun paketi seçerek en az 1 yıllık satın alma işlemi gerçekleştirebilirsiniz.\r\n	Şuana kadar hosting ve domain satın alarak web sitesi kurmak için gerekli olan en temel iki unsuru gerçekleştirmiş olduk. Sitemizi kurmak için artık birkaç ince ayar gerekli. Onları da yaptıktan sonra sitemiz yayın hayatına başlayacaktır. Öncelikle yapmanız gereken, mail adresinize hosting firması tarafından gönderilen NS ayarlarınızı domaininize tanımlamak olmalıdır.\r\n	Bu işlem şöyle gerçekleşir. Domain aldığınız siteye girerek kullanıcı panelinden yönlendirme yapmalısınız. NS kısmına hosting NS ayarlarınızı girerek yönlendirmeyi tamamlayabilirsiniz. Bu noktada önemli bir hatırlatma yapmak gereklidir. NS ayarlarının tam olarak oturması 48 saati bulabilir. Bu süre içerisinde sitenize erişme de sorun yaşayabilirsiniz.\r\n	Yönlendirme işleminin ardından artık sitenize girebilirsiniz. Hostinginize uygun alt yapı yazılımlarını kurmanız gerektiğini de unutmamalısınız.', 'safak', '2016-09-08 18:56:54', 3, 1, 8, 'http://i.hizliresim.com/mEkGmR.png'),
(4, 'Dle İle film Sitesi Kurulumu', 'bu videomuzda data life engine ile film sitesi kuruyoruz ve butun ayarlarını  yapıyoruz  indirme linkleri videonun acıklama kısmanda mevcuttur  iyi seyirler..', 'abdullah', '2016-09-08 18:58:27', 4, 1, 6, 'http://i.hizliresim.com/7ANo0Y.png'),
(5, 'SEO Nedir? SEO Faydaları Nedir?', 'SEO, ürün ve hizmetlerinizin doğal yollar ile milyonlarca kişiye ulaştırılmasını ve bunların satışını yapabilmenize olanak tanıyan çalışmalardır. İnternet dünyasında en popüler yükselme çalışmaları arasında ilk sırada bu çalışmalar yer almaktadır. SEO çalışmaları yapan kişilere ise SEOCU denmektedir.\r\n\r\nArama motorlarının web sayfalarını daha kolay bir şekilde taramasına olanak tanıyan bu çalışan kullanıcılar için bir maliyet olarak değil de bir yatırım olarak düşünülmesi gerekmektedir. Çünkü SEO çalışmaları zaman geçtikçe etkisini gösteren oldukça faydalı hizmetlerdir.\r\n\r\nSite İçi SEO ve Site Dışı SEO olmak üzere SEO çalışmaları ikiye ayrılır.\r\n\r\nSite İçi SEO\r\nArama motorlarının web sitesini düzenli aralıklarla oldukça kolay bir şekilde taramasına olanak tanıyan bu çalışma site dışı SEO çalışmalarından daha önemlidir. Çünkü arama motoru botları içeriğini anlamlandıramadığı siteleri indexleyemezler bu durum arama motorlarında oldukça gerilere düşülmesine neden olabilmektedir.\r\nBu çalışmalara örnek olarak; görsel başlıkları, makale başlığı, robot txt. , görsellerin çözünürlük kalitesi ve özgün içerik gibi çalışmalar gelmektedir.\r\n\r\nSite Dışı SEO\r\nSite dışı SEO çalışmaları adından da anlaşılacağı üzerine sitenin dışı ile ilgili yapılan çalışmalardır. Mesela backlink, sosyal medya kullanımı ve marka bilinirliğini artırmak için yapılan çalışmalar site dışı SEO çalışmalarına örnek verilebilmektedir.\r\n\r\nSEO Faydaları Nedir?\r\nYukarıda yazdığımız tüm sonuçları bir araya getirdiğimiz de SEO çalışmalarının en büyük faydalarından bir tanesi arama motorlarında yükselebilme şansına sahip olunması gelmektedir. Ayrıca SEO çalışmaları ile ürün ve hizmetleriniz daha geniş kitlelere ulaştığı için işletmenizin karlılığı da bu doğrultuda ciddi artışlar gösterecektir…', 'cemil', '2016-09-08 19:01:21', 5, 1, 6, 'http://i.hizliresim.com/A3kmQB.jpg'),
(6, 'virusleri temizleme', '"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."\r\n"Acıyı seven, arayan ve ona sahip olmak isteyen hiç kimse yoktur. Nedeni basit. Çünkü o acıdır..."\r\n\r\nLorem Ipsum Nedir?\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960''larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum s', 'cemil', '2016-09-17 14:29:01', 5, 0, 3, 'http://i.hizliresim.com/A3DZRX.jpg'),
(20, 'deneme konu', 'Lorem Ipsum Nedir?\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960''larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanma', 'abdullah', '2016-09-18 22:47:00', 4, 0, 3, 'http://i.hizliresim.com/LaVXXa.jpg'),
(24, 'twitter sitesi kurmak 5', 'Lorem Ipsum Nedir?\r\nLorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500''lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960''larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 'kemal', '2016-09-28 20:40:26', 1, 0, 7, 'http://i.hizliresim.com/A3DZRX.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

DROP TABLE IF EXISTS `mesajlar`;
CREATE TABLE IF NOT EXISTS `mesajlar` (
  `mesaj_id` int(11) NOT NULL AUTO_INCREMENT,
  `mesaj_baslik` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_aciklama` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_gonderen` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj_kime` int(11) NOT NULL DEFAULT '0',
  `mesaj_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mesaj_okunma` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mesaj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `uye_id` int(11) NOT NULL AUTO_INCREMENT,
  `uye_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `uye_sifre` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `uye_eposta` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uye_rutbe` int(11) NOT NULL DEFAULT '0',
  `uye_onay` int(11) NOT NULL DEFAULT '0',
  `uye_hakkimda` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`uye_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_adi`, `uye_sifre`, `uye_eposta`, `uye_tarih`, `uye_rutbe`, `uye_onay`, `uye_hakkimda`) VALUES
(1, 'mehmet', '81dc9bdb52d04dc20036dbd8313ed055', 'mehmet@hotmail.com', '2016-08-26 22:36:50', 1, 1, ''),
(11, 'osman', '827ccb0eea8a706c4c34a16891f84e7b', 'tavuskusu@hotmail.com', '2016-09-18 21:05:59', 0, 0, ''),
(12, 'abdullah', 'd4c10b067e00dadf0528bc6ee9ab48d6', 'playstation3_tr@hotmail.com', '2016-09-18 21:08:43', 0, 0, ''),
(13, 'kemal', '202cb962ac59075b964b07152d234b70', 'kemal5555@hotmail.com', '2016-09-18 23:13:22', 0, 0, 'ben kemalim istediğimi yaparım 5555'),
(14, 'mehmet nuralp', 'd4c10b067e00dadf0528bc6ee9ab48d6', 'tavuskusu@hotmail.com', '2016-09-18 23:17:09', 0, 0, '<img src="http://i.hizliresim.com/mEM0z2.png"/>\r\n'),
(15, 'sdasdasdasdas', 'f1d25cfa91025cfa6461474ac8f95917', 'mehmet_cemil_nuralp@hotmail.com', '2016-09-18 23:17:55', 0, 0, 'sdasdasdasd'),
(16, '  1', '6c0cbf5029aed0af395ac4b864c6b095', 'mehmet_cemil_nuralp@hotmail.com', '2016-09-18 23:18:48', 0, 0, 'sdasdas');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE IF NOT EXISTS `yorumlar` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_ekleyen` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_eposta` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_mesaj` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_konu_id` int(11) NOT NULL DEFAULT '0',
  `yorum_onay` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`yorum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_ekleyen`, `yorum_eposta`, `yorum_mesaj`, `yorum_tarih`, `yorum_konu_id`, `yorum_onay`) VALUES
(4, 'mehmet', 'sdasdsa', 'dasdasd', '2016-08-26 23:11:40', 1, 0),
(3, 'osman', 'osman@hotmail.com', 'bu bir osman yorumudur', '2016-08-26 23:05:59', 1, 0),
(5, 'mehmet', 'mehmet@hotmail.com', 'bu bir mehmet yorumudur', '2016-08-26 23:12:00', 1, 0),
(6, 'mehmet', 'mehmet@hotmail.com', 'bu bir kemal yorumu', '2016-08-29 22:26:58', 2, 0),
(7, 'mehmet', 'mehmet@hotmail.com', 'okuzun oglu', '2016-09-10 19:45:25', 1, 0),
(8, 'ahmet', 'ahmet@hotmail.com', 'sdsadasd', '2016-09-18 18:43:22', 15, 0),
(9, 'mehmet', 'mehmet@hotmail.com', 'guzel derstir insallah', '2016-10-20 21:17:01', 24, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
