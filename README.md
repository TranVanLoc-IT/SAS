<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Mô tả phần mềm
HƯỚNG DẪN CÀI ĐẶT PHẦN MỀM ĐIỂM DANH

laravel support: authentication, QRCode generation - simplesofwareio, migrations, excel - maatwebsite
node js support: api, vite, package tailwindcss
Chức năng | Mô tả |
| ---- | ------- |
| Điểm danh | Ngày, QRCode |
| Thống kê | Lớp / kỳ, sinh viên vắng /nghỉ |
| Lịch dạy | Theo tuần, ngày, hiện  tại |
| Login, Register | Laravel support |
| Xuất danh sách Excel | JS -> theo bảng điểm danh |
| Tin nhắn, thông báo | Fetch api: get, post |
| Profile | Hồ sơ giảng viên, hồ sơ học sinh/ sinh viên |
## Công nghệ

<p align="center">
<a href="https://vuejs.org/"><img width="100" height="50" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original-wordmark.svg" alt="vuejs"></a>
<a href="https://packagist.org/packages/laravel/framework"><img width="100" height="50" src="https://th.bing.com/th/id/OIP.4loA0ctgFlwKXLVqvDoA7wHaFj?w=197&h=180&c=7&r=0&o=5&dpr=1.6&pid=1.7" alt="Laravel"></a>
<a href="https://tailwindcss.com/brand"><img width="100" height="50" src="https://www.bing.com/th/id/OIP.DAd4ProxJ7RhaQ6iJZxoSAHaHT?w=167&h=180&c=7&r=0&o=5&dpr=1.6&pid=1.7" alt="Tailwindcss"></a>
<a href="https://nodejs.org/en"><img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original-wordmark.svg" alt="Node js" width="100" height="50"></a>
</p>
<hr>

## Kỹ thuật
Fetch API, AJAX
<hr>

## Tải phần mềm:
Github: 
```bash 
git clone https://github.com/TranVanLoc-IT/SAS.git
```
<font color="orange">Cài đặt laravel và composer:</font>
Laravel: 

``` bash
    composer global require laravel/installer
```
Composer: 

```bash 
https://getcomposer.org/download/
```
**Cài đặt node js và khởi tạo thư mục**:
Node js: https://nodejs.org/en/download/prebuilt-installer
 
1. npm init
2. npm install --package 
<font color="red">Chạy phần mềm:</font>

**Chạy laravel**:
``` bash
 php artisan serve 
```
 
**Chạy node js biên dịch và tải tài nguyên**: 
``` bash
npm run dev
```
**Chạy tailwindcss**: 
``` bash
npx tailwindcss -i ./resources/css/app.css -o ./resources/css/apptw.css –watch
--watch: xem liên tục  dù có thay đổi sẽ cập nhật ngay.
```

**Chạy api (fetch api)**:
Tin nhắn: 
``` bash
npx json-server ./resources/json/sas_messages.json -p  3000
``` 
Thông báo:
``` bash
 npx json-server ./resources/json/sas_announcement.json -p  4000
``` 
Sau khi chạy laravel ctrl + click vào link  http://127.0.0.1:8000 để đến trang login vào phần mềm.
 
<h4 style="color: green">Thông tin login</h4>

email: **loctran23.1.2003@gmail.com**. pass: **TranVLoc@2003**
<hr>
*Chỉ đăng nhập bằng email, mã giảng viên chưa xử lý.

<h4 style="color: green">Database</h4>
bacpac | sql |
| ---- | ---- |
| right click database folder in ssms > tasks> import datatier (priority to use) | run script |
