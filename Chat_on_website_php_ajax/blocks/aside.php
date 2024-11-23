<aside>
    <div class="info">
        <h2>Про OAuth 2.0:</h2>
        <p>Це популярний протокол для авторизації, який дозволяє користувачам отримувати доступ до своїх облікових записів на сторонніх сайтах, не передаючи паролі. Він використовує маркери доступу для безпечної взаємодії між сервісами.</p>
    </div>
    <img src="https://itproger.com/img/intensivs/back-end.svg">

    <?php if (isset($_COOKIE['login'])): ?>
        <?php require "chat.php"; ?>
    <?php endif; ?>
</aside>
