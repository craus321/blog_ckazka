<?php

return [

    /*
     |--------------------------------------------------------------------------
     | Настройки Debugbar
     |--------------------------------------------------------------------------
     |
     | По умолчанию отладчик включен, когда отладка установлена в true в файле app.php.
     | Вы можете изменить значение, установив вместо null enable в true или false.
     |
     | Вы можете предоставить массив URI, которые должны быть проигнорированы (например, 'api/*')
     |
     */

    'enabled' => env('DEBUGBAR_ENABLED', null),
    'except' => [
        'telescope*',
        'horizon*',
    ],

    /*
     |--------------------------------------------------------------------------
     | Настройки хранилища
     |--------------------------------------------------------------------------
     |
     | DebugBar хранит данные для сессий/ajax-запросов.
     | Вы можете отключить это, чтобы DebugBar сохранял данные в заголовках/сессии,
     | но это может вызвать проблемы с большими сборщиками данных.
     | По умолчанию используется файловое хранилище (в папке storage). Можно также использовать Redis и PDO.
     | Для PDO сначала запустите миграции пакета.
     |
     | Предупреждение: Включение storage.open позволит всему миру получить доступ к предыдущим запросам,
     | не включайте открытое хранилище в общедоступных средах!
     | Укажите обратный вызов, если хотите ограничить на основе IP или аутентификации.
     */
    'storage' => [
        'enabled'    => true,
        'open'       => env('DEBUGBAR_OPEN_STORAGE', false), // bool/callback.
        'driver'     => 'file', // redis, file, pdo, socket, custom
        'path'       => storage_path('debugbar'), // Для драйвера file
        'connection' => null,   // Оставьте null для соединения по умолчанию (Redis/PDO)
        'provider'   => '', // Экземпляр StorageInterface для пользовательского драйвера
        'hostname'   => '127.0.0.1', // Имя хоста для использования с драйвером "socket"
        'port'       => 2304, // Порт для использования с драйвером "socket"
    ],

    /*
    |--------------------------------------------------------------------------
    | Редактор
    |--------------------------------------------------------------------------
    |
    | Выберите предпочтительный редактор для использования при щелчке по имени файла.
    |
    | Поддерживается: "phpstorm", "vscode", "vscode-insiders", "vscode-remote",
    |            "vscode-insiders-remote", "vscodium", "textmate", "emacs",
    |            "sublime", "atom", "nova", "macvim", "idea", "netbeans",
    |            "xdebug", "espresso"
    |
    */

    'editor' => env('DEBUGBAR_EDITOR', 'phpstorm'),

    /*
    |--------------------------------------------------------------------------
    | Удаленное отображение пути
    |--------------------------------------------------------------------------
    |
    | Если вы используете удаленный dev-сервер, такой как Laravel Homestead, Docker или
    | даже удаленный VPS, будет необходимо указать сопоставление пути.
    |
    | Оставление пустым или null не вызовет изменений URL-адресов удаленного сервера
    | и Debugbar будет рассматривать ссылки вашего редактора как локальные файлы.
    |
    | "remote_sites_path" - абсолютный базовый путь для ваших сайтов или проектов
    | в Homestead, Vagrant, Docker или другом удаленном сервере разработки.
    |
    | Пример значения: "/home/vagrant/Code"
    |
    | "local_sites_path" - абсолютный базовый путь для ваших сайтов или проектов
    | на вашем локальном компьютере, где запущен ваш IDE или редактор кода.
    |
    | Примеры значений: "/Users/<name>/Code", "C:\Users\<name>\Documents\Code"
    |
    */

    'remote_sites_path' => env('DEBUGBAR_REMOTE_SITES_PATH'),
    'local_sites_path' => env('DEBUGBAR_LOCAL_SITES_PATH', env('IGNITION_LOCAL_SITES_PATH')),

    /*
     |--------------------------------------------------------------------------
     | Поставщики
     |--------------------------------------------------------------------------
     |
     | Файлы поставщиков включены по умолчанию, но их можно отключить.
     | Это также можно установить в 'js' или 'css', чтобы включить только файлы JavaScript или CSS поставщика.
     | Файлы поставщика для css: font-awesome (включая шрифты) и highlight.js (файлы css)
     | и для js: jquery и highlight.js
     | Поэтому, если вы хотите подсветку синтаксиса, установите его в true.
     | jQuery настроен так, чтобы не конфликтовать с существующими скриптами jQuery.
     |
     */

    'include_vendors' => true,

    /*
 |--------------------------------------------------------------------------
 | Захват Ajax-запросов
 |--------------------------------------------------------------------------
 |
 | Debugbar может захватывать Ajax-запросы и отображать их. Если вы не хотите этого (например, из-за ошибок),
 | вы можете использовать эту опцию для отключения отправки данных через заголовки.
 |
 | По желанию, вы также можете отправлять заголовки ServerTiming для Ajax-запросов для инструментов разработчика Chrome.
 |
 | Примечание: для того чтобы ваш запрос был идентифицирован как Ajax-запросы, он должен либо отправлять заголовок
 | X-Requested-With со значением XMLHttpRequest (большинство библиотек JavaScript отправляют его), либо иметь application/json в качестве заголовка Accept.
 |
 | По умолчанию `ajax_handler_auto_show` установлено в true, что позволяет автоматически отображать ajax-запросы в Debugbar.
 | Изменение `ajax_handler_auto_show` на false предотвратит перезагрузку Debugbar.
 */

    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,

    /*
    |--------------------------------------------------------------------------
    | Пользовательский обработчик ошибок для предупреждений о считанных функциях
    |--------------------------------------------------------------------------
    |
    | При включении Debugbar показывает предупреждения о считанных функциях для компонентов Symfony
    | на вкладке Сообщения.
    |
    */
    'error_handler' => false,

    /*
    |--------------------------------------------------------------------------
    | Интеграция с Clockwork
    |--------------------------------------------------------------------------
    |
    | Debugbar может эмулировать заголовки Clockwork, чтобы вы могли использовать расширение Chrome
    | без серверного кода. Он использует коллекторы Debugbar вместо этого.
    |
    */
    'clockwork' => false,

    /*
    |--------------------------------------------------------------------------
    | Коллекторы данных
    |--------------------------------------------------------------------------
    |
    | Включение/отключение коллекторов данных
    |
    */

    'collectors' => [
        'phpinfo'         => true,  // Версия PHP
        'messages'        => true,  // Сообщения
        'time'            => true,  // Время работы
        'memory'          => true,  // Использование памяти
        'exceptions'      => true,  // Отображение исключений
        'log'             => true,  // Логи от Monolog (объединены с сообщениями, если включено)
        'db'              => true,  // Показывать запросы и привязки к базе данных (PDO)
        'views'           => true,  // Представления со своими данными
        'route'           => true,  // Информация о текущем маршруте
        'auth'            => false, // Статус аутентификации Laravel
        'gate'            => true,  // Проверки Laravel Gate
        'session'         => true,  // Данные сессии
        'symfony_request' => true,  // Может быть включен только один..
        'mail'            => true,  // Перехват сообщений почты
        'laravel'         => false, // Версия и среда Laravel
        'events'          => false, // Все события, которые были вызваны
        'default_request' => false, // Обычный или специальный логгер запросов Symfony
        'logs'            => false, // Добавить последние сообщения журнала
        'files'           => false, // Показать включенные файлы
        'config'          => false, // Отображение настроек конфигурации
        'cache'           => false, // Отображение событий кэша
        'models'          => true,  // Отображение моделей
        'livewire'        => true,  // Отображение Livewire (при наличии)
        'jobs'            => false, // Отображение отправленных заданий
    ],

    /*
    |--------------------------------------------------------------------------
    | Дополнительные параметры
    |--------------------------------------------------------------------------
    |
    | Настройка некоторых коллекторов данных
    |
    */

    'options' => [
        'time' => [
            'memory_usage' => false,  // Рассчитывается путем вычитания начала и конца памяти, это может быть неточно
        ],
        'messages' => [
            'trace' => true,   // Отслеживание происхождения отладочного сообщения
        ],
        'memory' => [
            'reset_peak' => false,     // выполнить memory_reset_peak_usage перед сбором
            'with_baseline' => false,  // Установить использование памяти загрузки в качестве максимального значения памяти
            'precision' => 0,          // Точность округления памяти
        ],
        'auth' => [
            'show_name' => true,   // Также показывать имя пользователя/электронную почту в Debugbar
        ],
        'db' => [
            'with_params'       => true,   // Рендеринг SQL с подставленными параметрами
            'backtrace'         => true,   // Использовать бэктрейс для поиска происхождения запроса в ваших файлах.
            'backtrace_exclude_paths' => [],   // Пути для исключения из бэктрейса. (в дополнение к значениям по умолчанию)
            'timeline'          => false,  // Добавить запросы в ленту времени
            'duration_background'  => true,   // Показать закрашенный фон на каждом запросе относительно времени его выполнения.
            'explain' => [                 // Показать вывод EXPLAIN по запросам
                'enabled' => false,
                'types' => ['SELECT'],     // Устаревший параметр, всегда только SELECT
            ],
            'hints'             => false,    // Показывать подсказки для частых ошибок
            'show_copy'         => false,    // Показывать кнопку копирования рядом с запросом,
            'slow_threshold'    => false,   // Отслеживать только запросы, которые длительнее этого времени в мс
            'memory_usage'      => false,   // Показывать использование памяти запросов
            'soft_limit'       => 100,      // После мягкого предела не собираются параметры/трассировка
            'hard_limit'       => 500,      // После жесткого предела запросы игнорируются
        ],
        'mail' => [
            'timeline' => false,  // Добавлять почтовые сообщения в ленту
            'full_log' => false,
        ],
        'views' => [
            'timeline' => false,    // Добавлять представления в ленту (Экспериментально)
            'data' => false,        // true для всех данных, 'keys' только для имен, false для отсутствия параметров.
            'group' => 50,          // Группировать дубликаты представлений. Передайте значение для автогруппировки или true/false для принудительного.
            'exclude_paths' => [    // Добавить пути, которые не должны отображаться в представлениях
                'vendor/filament'   // По умолчанию исключать компоненты Filament
            ],
        ],
        'route' => [
            'label' => true,  // показывать полный маршрут на панели
        ],
        'session' => [
            'hiddens' => [], // скрывать чувствительные значения, используя пути массива
        ],
        'symfony_request' => [
            'hiddens' => [], // скрывать чувствительные значения, используя пути массива, например: request_request.password
        ],
        'logs' => [
            'file' => null,
        ],
        'cache' => [
            'values' => true, // собирать значения кэша
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Встраивание Debugbar в ответ
     |--------------------------------------------------------------------------
     |
     | Обычно панель отладки добавляется прямо перед </body>, прослушивая
     | Ответ после завершения приложения. Если вы отключите это, вам придется добавить их
     | в ваш шаблон самостоятельно. См. http://phpdebugbar.com/docs/rendering.html
     |
     */

    'inject' => true,

    /*
     |--------------------------------------------------------------------------
     | Префикс маршрута DebugBar
     |--------------------------------------------------------------------------
     |
     | Иногда вам нужно установить префикс маршрута, который будет использоваться DebugBar для загрузки
     | его ресурсы из. Обычно необходимость возникает из-за неправильной настройки веб-сервера или
     | из попыток преодоления ошибок, подобных этим: http://trac.nginx.org/nginx/ticket/97
     |
     */
    'route_prefix' => '_debugbar',

    /*
     |--------------------------------------------------------------------------
     | Middleware маршрута DebugBar
     |--------------------------------------------------------------------------
     |
     | Дополнительное промежуточное ПО для выполнения на маршрутах DebugBar
     */
    'route_middleware' => [],

    /*
     |--------------------------------------------------------------------------
     | Домен маршрута DebugBar
     |--------------------------------------------------------------------------
     |
     | По умолчанию маршрут DebugBar обслуживается с того же домена, с которого был запрос.
     | Чтобы переопределить домен по умолчанию, укажите его как непустое значение.
     */
    'route_domain' => null,

    /*
     |--------------------------------------------------------------------------
     | Тема DebugBar
     |--------------------------------------------------------------------------
     |
     | Переключает между светлой и темной темой. Если установлено значение auto, оно будет учитывать настройки системы
     | Допустимые значения: auto, light, dark
     */
    'theme' => env('DEBUGBAR_THEME', 'auto'),

    /*
     |--------------------------------------------------------------------------
     | Предел стека возврата вызовов
     |--------------------------------------------------------------------------
     |
     | По умолчанию DebugBar ограничивает количество кадров, возвращаемых функцией 'debug_backtrace()'.
     | Если вам нужны более крупные стековые трассировки, вы можете увеличить это число. Установка его в 0 приведет к отсутствию ограничений.
     */
    'debug_backtrace_limit' => 50,
];
