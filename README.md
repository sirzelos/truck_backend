# truck_truck

## เครื่องมือที่ใช้
* Laragon โหลด https://sourceforge.net/projects/laragon/files/releases/4.0/laragon-full.exe
* Visual studio

## ขั้นตอนการติดตั้ง
* ย้ายไฟล์นี้ไปใน   C:\laragon\www\
* กด start all ที่ laragon
* กดปุ่ม Database ที่ laragon กด open
* สร้าง Database ใหม่ ชื่อ truck_truck ตั้ง Collation เป็น utf8mb4_unicode_ci
* เปิด Terminal ของ Laragon เปลี่ยน path ไปที่ C:\laragon\www\truck_truck\truck_truck-api
* ใช้คำสั่ง composer install
* ใช้คำสั่ง composer dump-autoload
* ใช้คำสั่ง php artisan key:generate
* ใช้คำสั่ง php artisan migrate:refresh --seed
* ใช้คำสั่ง php artisan serve
* พร้อมใช้งาน ไม่ต้องปิดterminal
