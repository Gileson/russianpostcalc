#Интерфейс для работы с russianpostcalc.ru API

##Установка
~~~sh
composer require gileson/russianpostcalc
~~~

### Подключаем autoload
~~~php
<?php
require_once __DIR__ . '/../vendor/autoload.php';
~~~

###Задаем ключи приложения для работы через API
~~~php
use \Gileson\RussianPostCalc\RussianPost;

RussianPost::instance()
            ->setApiKey('**************************')
            ->setApiPassword('*********************');
~~~
