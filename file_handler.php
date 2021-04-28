<?php
    session_start();

    // Перезапишем переменные для удобства
    $filePath=$_FILES['photo']['tmp_name'];
    $errorCode=$_FILES['photo']['error'];

    // Проверим на ошибки
    if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($filePath)) {

        // Массив с названиями ошибок
        $errorMessages = [
            UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>',
            UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>',
            UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
            UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>',
            UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>',
            UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>',
            UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>',
        ];

        // Зададим неизвестную ошибку
        $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>';

        // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
        $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;

        // Выведем название ошибки
        die($outputMessage);
    }

    // Создадим ресурс FileInfo
    $fi = finfo_open(FILEINFO_MIME_TYPE);

    // Получим MIME-тип
    $mime = (string) finfo_file($fi, $filePath);

    // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
    if (strpos($mime, 'image') === false) die('Можно загружать только изображения.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>');

    // Результат функции запишем в переменную
    $image = getimagesize($filePath);

    // Зададим ограничения для картинок
    $limitBytes  = 1024 * 1024 * 10;
    $limitWidth  = 5000;
    $limitHeight = 6000;

    // Проверим нужные параметры
    if (filesize($filePath) > $limitBytes) die('Размер изображения не должен превышать 10 Мбайт.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>');
    if ($image[1] > $limitHeight)          die('Высота изображения не должна превышать 5000 точек.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>');
    if ($image[0] > $limitWidth)           die('Ширина изображения не должна превышать 6000 точек.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>');

    // Сгенерируем новое имя файла на основе MD5-хеша
    $name = md5_file($filePath);

    // Сгенерируем расширение файла на основе типа картинки
    $extension = image_type_to_extension($image[2]);

    // Сократим .jpeg до .jpg
    $format = str_replace('jpeg', 'jpg', $extension);

    // Переместим картинку с новым именем и расширением в папку /pics
    if (!move_uploaded_file($filePath, __DIR__ . '/pict/' . $name . $format)) {
        die('При записи изображения на сервер произошла ошибка.<script>function foo(){window.location = "change_data_film.php"}</script> <br><button onclick="foo()">Назад</button>');
    }

    $_SESSION['name_pic'] = $name . $format;
    //echo $_SESSION['name_pic'];
    //header("Location: /models/add_course.php");
    header("Location: add_film.php");
?>