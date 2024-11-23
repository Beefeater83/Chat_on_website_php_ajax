<?php
setcookie('login', '', time() - 3600*24, "/");
unset($_COOKIE['login']);
