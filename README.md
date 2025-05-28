# Proje Adı

Laravel tabanlı  sipariş yönetim sistemi (örnek proje)

---

## İçindekiler

- [Genel Bakış](#genel-bakış)
- [Özellikler](#özellikler)
- [Kurulum](#kurulum)
- [Kullanım](#kullanım)
- [API](#api)


---

## Genel Bakış

Bu proje Laravel ile geliştirilmiş, kullanıcıların ürünleri sepete ekleyip sipariş verebildiği basit bir restorant uygulamasıdır.

---

## Özellikler

- Kullanıcı kayıt / giriş
- Ürün listeleme
- Sepete ürün ekleme ve çıkarma
- Sipariş oluşturma
- Sipariş durumu takip
- API tabanlı endpointler

---
Projede controllerlarım API klasörünün içinde bunlar frontend kısmında kullandığım işlemler için
controller klasörünün altında admin klasöründe ise admin panel için controllerlarım var .
----
blade dosyalarım resources/views frontend-backend olarak ikiye ayrılıyor 
----
Projem host/api linki altında çalışıyor ,admin panel host/panel altında linki ile çalışıyor
----
Admin panele hem admin hem kurye kullanıcıları erişiyor ikisininde erişebildiği dosyalar farklı kuryeler sadece onlara atanan sipariş sayfasını görebiliyorlar
---
.env ayarları
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=order
DB_USERNAME=root
DB_PASSWORD=

Test Kullanıcıları
----
Admin
E-Mail:admin@gmail.com
Şifre:12345678
----
Kurye
E-Mail:kurye@gmail.com
Şifre:12345678
----
User
E-Mail:farukslmy@gmail.com
Şifre:12345678
