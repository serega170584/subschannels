Замечания:
1. Директория проекта - здесь находятся директории компонентов для работы с проектом( например, 
app, config, database и т п. );
2. Директория сайта - корневая директория сайта директория. Она кк правило находится в директории 
 проекта. Как правило называется public.
 
 Собственно сама инструкция:
 1. Устанавливаем jquery и bootstrap:
    1.1 Из директории проекта глобально устанавливаем bower: npm install -g bower
    1.2 В директории сайта создаем файл .bowerrc c содержимым:
        {
          "directory": "vendor/bower_dl"
        }
    1.3 Устанавливаем bower локально: npm install bower
    1.4 В директории сайта создаем файл bower.json:
    
    {
      "name": "subschannels",
      "description": "Subscribe channels for users",
      "ignore": [
        "**/.*",
        "node_modules",
        "vendor/bower_dl",
        "test",
        "tests"
      ]
    }
    
    1.5 Устанавливаем jquery и bootstrap:
    
    bower install jquery bootstrap --save
    
 2. Для работы с шаблонизатором twig необходимо:
    2.1 Установить TwigBridge для этого в директории проекта набрать команду:
    
    composer require rcrowe/twigbridge
    
    2.2 В файле config/app.php директории проекта в  блоке 'providers' => [
    добавить TwigBridge\ServiceProvider::class,
    
 3. Подготовка пакета с исходным кодом:
    3.1 Из данного репозитория копируем packages в директорию проекта;
                
    3.2 Указываем автозагрузчику где искать файлы нашего проекта. Для этого в директории
    composer.json проекта в секцию autoload > psr-4 необходимо добавить: "Serega170584\\Subschannels\\": "packages/Serega170584/Subschannels/src"
    
    3.3 Сохраняем изменения и запускаем: composer dump-autoload.
    
    3.4 В файле config/app.php директории проекта в  блоке 'providers' => [
        добавить 
        
        /*
                 * Subscribe Channels User Provider
                 */
                Serega170584\Subschannels\SubschannelsServiceProvider::class,
                
    3.5 Публикуем пакет и накатываем необходимую миграцию из директории проекта:
    
    php artisan vendor:publish && php artisan migrate
    
 4. Страница с формой добавления подписных каналов: /subschannels/{userId}. Для пробы 
 в миграции также в подписных каналов для пользователей добавил данные. 4 тестовых канала.
     
     

    