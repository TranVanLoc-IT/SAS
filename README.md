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
| Chức năng | Mô tả |
| Điểm danh | Ngày, QRCode |
| Thống kê | Lớp / kỳ, sinh viên vắng /nghỉ |
| Lịch dạy | Theo tuần, ngày, hiện  tại |
| Login, Register | Laravel support |
| Xuất danh sách Excel | JS -> theo bảng điểm danh |
| Tin nhắn, thông báo | Fetch api: get, post |
| Profile | Hồ sơ giảng viên, hồ sơ học sinh/ sinh viên |
## Công nghệ

## Vue.js
![Vue.js](https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original-wordmark.svg)

## Laravel
![Laravel](https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain-wordmark.svg)

## Tailwind CSS
![Tailwind CSS](https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-plain.svg)

## Node.js
![Node.js](https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original-wordmark.svg)

## Kỹ thuật
Fetch API, AJAX
## Tải phần mềm:
Github: git clone https://github.com/TranVanLoc-IT/SAS.git
<font color="orange">Cài đặt laravel và composer:</font>
Laravel: composer global require laravel/installer
Composer: https://getcomposer.org/download/

Cài đặt node js và khởi tạo thư mục:
Node js: https://nodejs.org/en/download/prebuilt-installer
 
1. npm init
2. npm install --package 
<font color="red">Chạy phần mềm:</font>

Chạy laravel: php artisan serve
 
Chạy node js biên dịch và tải tài nguyên: npm run dev
 
Chạy tailwindcss: npx tailwindcss -i ./resources/css/app.css -o ./resources/css/apptw.css –watch
--watch: xem liên tục  dù có thay đổi sẽ cập nhật ngay.

Chạy api (fetch api):
Tin nhắn: npx json-server ./resources/json/sas_messages.json -p  3000
 
Thông báo: npx json-server ./resources/json/sas_announcement.json -p  4000
 
Sau khi chạy laravel ctrl + click vào link  http://127.0.0.1:8000 để đến trang login vào phần mềm.
 
<font color="green">Thông tin loginfont>

email: loctran23.1.2003@gmail.com. pass: TranVLoc@2003
*Chỉ đăng nhập bằng email, mã giảng viên chưa xử lý.

<font color="pink">Import db</font>
| bacpac | sql|
| right click database folder in ssms > tasks> import datatier (priority to use) | run script |