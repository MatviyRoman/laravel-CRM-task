<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

ТЗ на тестове завдання за напрямком FullStack Developer

Основнітехнології:Laravel 9, Vue 3, PHP 8.1, MySQL;

Допоміжнітехнології:Js, Node.js, Docker, Composer, Git, Meilisearch.

Завдання

Створитиконструктор запитів між сайтом та CRM.За приклад беремо таку документацію: https://documenter.getpostman.com/view/11293610/Uz5DrdC3,так як CRM можуть бути з різними API, тому генерація PHP файлів не є статичною і таких інтеграцій буде безліч. (це потрібнопередбачити). Робимо на Laravel + vue (дизайнне має різниці).

Вданому випадку інтеграція складаєтьсяз 1го реквеста – відправки даних клієнта(name, lastName, phone, email + додаткові поля інтегратора). Також є інтеграції, які можуть складатися з двох запитів(отримання токена, а тоді відправленняданих), повинно (потрібно) на сторінці додаватися як поля, це продумати).

Сайт буде генерувати php інтеграцію, на основі наданих даних (user data) перша та даних куди переадресувати (URL + credentials). Всі запити зберігати в базі с різними типами та статусами.

Найпростіший варіант створити 2 текст бокси, де першийце curl-like код для інтеграції, а друге поле Data, де буде описано поля даних з SQL які будуть прокидуватися в іншу CRM. Так як спочатку дані повинні прийти в систему обробитися в базі даних, а тоді паралельно відправитися на вказану в параметрах інтеграцію, до прикладу визначену як integration_id. Тобто нам прийшли дані із сайту реєстрації, і в полі integration_id отримали значення 14, що означає, що дані які булоотримано, потрібно відправити на CRM, на яку ми написали інтеграцію і зберегли,на вихід отримавши integration_id: 14. Куди миі передамо дані з нашої бази по нашим ключам, отримаємо респонс з CRM і відправимо його назад на сайт з якого отримали дані реєстрація клієнта + додатково визначені поля.

Виконане завдання залити на git та надати лінк.

Середній час виконання такого тестового завданнядо 4 днів.

При надані тестового завдання, бажано надати ReadME + при питаннях, обов’язково їх задавати.

ReadME

All api request send with Accept => application/json

Model:

App\Models\User.php

Controller:

App\Http\Controllers\AuthController

App\Http\Controllers\UserController

1. Route for register user domain.com/api/signup fields (name, lastName, phone, email, password, integration_id, field1, field2, field3, field4, field5)
2. Route for login domain.com/api/login fields(email, password) Responce bearer token
3. Route for auth with bearer token and create user domain.com/api/signup/procform fields (name, lastName, phone, email, password, integration_id, field1, field2, field3, field4, field5)
4. Route for logout with bearer token domain.com/api/logout
