# mobil.gmoplus.com - Coolify Deployment

Bu proje Coolify üzerinde deploy edilmek üzere hazırlanmıştır.

## 🚀 Coolify Deploy Adımları

### 1. Yeni Proje Oluşturma

1. Coolify dashboard'a gidin
2. "New Application" → "Docker" seçin
3. GitHub/GitLab reposunu bağlayın veya "Docker Image" seçin

### 2. Ortam Değişkenleri (Environment Variables)

Coolify'da aşağıdaki ortam değişkenlerini tanımlayın:

```env
# Veritabanı (Harici MariaDB)
DB_HOST=your-mariadb-container-name
DB_PORT=3306
DB_NAME=gmoplus_mobil
DB_USER=your_db_user
DB_PASS=your_db_password
DB_PREFIX=fl_

# Site URL
SITE_URL=https://mobil.gmoplus.com

# Admin
ADMIN_EMAIL=gmoplusx@gmail.com

# Debug (Production'da false olmalı)
DEBUG=false
DB_DEBUG=false
AJAX_DEBUG=false

# Redis (Opsiyonel)
REDIS_HOST=your-redis-container
REDIS_PORT=6379

# Memcache (Opsiyonel)
MEMCACHE_HOST=127.0.0.1
MEMCACHE_PORT=11211
```

### 3. Domain Ayarları

- Domain: `mobil.gmoplus.com`
- Coolify'da SSL otomatik olarak Let's Encrypt ile sağlanacak

### 4. Persistent Storage (Kalıcı Depolama)

Aşağıdaki klasörler için volume mount yapın:

| Source    | Destination           | Açıklama                 |
| --------- | --------------------- | ------------------------ |
| `./files` | `/var/www/html/files` | Yüklenen dosyalar        |
| `./tmp`   | `/var/www/html/tmp`   | Geçici dosyalar ve cache |

### 5. Port Ayarları

- Container Port: `80`
- External Port: Coolify proxy üzerinden (443 HTTPS)

## 🗃️ Veritabanı Import

### SQL Dosyası

`gmoplus_mobil_extracted/gmoplus_mobil.sql` dosyasını harici MariaDB'ye import edin:

```bash
# MariaDB container'a bağlanın
docker exec -it your-mariadb-container bash

# SQL dosyasını import edin
mysql -u root -p gmoplus_mobil < /path/to/gmoplus_mobil.sql
```

### Veritabanı Oluşturma

```sql
CREATE DATABASE gmoplus_mobil CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'gmoplus_mobiluser'@'%' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON gmoplus_mobil.* TO 'gmoplus_mobiluser'@'%';
FLUSH PRIVILEGES;
```

## 📁 Proje Yapısı

```
mobil.gmoplus.com/
├── Dockerfile          # Docker image tanımı
├── .dockerignore       # Build'de hariç tutulacaklar
├── .env.example        # Ortam değişkenleri örneği
├── .htaccess           # Apache rewrite kuralları
├── index.php           # Ana giriş noktası
├── includes/
│   └── config.inc.php  # Yapılandırma (env destekli)
├── admin/              # Admin paneli
├── files/              # Yüklenen dosyalar
├── tmp/                # Geçici dosyalar
├── plugins/            # Eklentiler
├── templates/          # Şablonlar
└── libs/               # Kütüphaneler
```

## ⚠️ Önemli Notlar

1. **Lisans**: Bu yazılım Flynax lisansı altındadır ve sadece `mobil.gmoplus.com` domaininde kullanılabilir.

2. **Veritabanı Bağlantısı**: Harici veritabanı kullanılıyorsa, Docker network'te MariaDB container'ının erişilebilir olduğundan emin olun.

3. **Dosya İzinleri**: `files/` ve `tmp/` klasörlerinin yazılabilir olması gerekir (Docker'da otomatik ayarlanır).

4. **SSL**: Coolify Let's Encrypt ile otomatik SSL sağlar.

## 🔧 Sorun Giderme

### Veritabanı Bağlantı Hatası

```bash
# Container'dan veritabanına bağlantıyı test edin
docker exec -it your-app-container php -r "
  \$conn = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_NAME'));
  echo \$conn->connect_error ? 'Hata: '.\$conn->connect_error : 'Bağlantı başarılı!';
"
```

### Cache Temizleme

```bash
docker exec -it your-app-container rm -rf /var/www/html/tmp/cache_*/*
```

### Log İnceleme

```bash
docker logs your-app-container
```
