# Ajans Paneli

Bu proje, Yazılım Ustası ajans müşterileri için temel bir panel örneğidir.

## Kurulum
1. `database.sql` dosyasındaki tabloyu veritabanınıza oluşturun.
2. `add_user.php` dosyasını düzenleyip örnek kullanıcı ekleyebilirsiniz. Parolalar `password_hash` fonksiyonu ile bcrypt algoritması kullanılarak saklanır.
3. `login.php` üzerinden giriş yapabilirsiniz. Başarılı giriş sonrası `dashboard.php` görüntülenecektir.

Oturum yönetimi için PHP `$_SESSION` mekanizması kullanılmaktadır.
