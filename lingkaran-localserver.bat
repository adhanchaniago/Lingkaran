@echo off
color A
start /WAIT %windir%\explorer.exe "C:\xampp\htdocs\lingkaran"
cd C:\xampp\htdocs\lingkaran
php artisan serve