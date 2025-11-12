# 🔧 Настройка страницы 404 в Bitrix

## ✅ Что создано

Файл `404.php` создан в папке:

```
/local/templates/main/404.php
```

---

## 📤 Шаг 1: Загрузите файл на сервер

**Через File Manager в админке:**

1. Войдите: `http://new.intezgroup.ru/bitrix`
2. Настройки → Файлы и папки → Проводник файлов
3. Перейдите в: `/local/templates/main/`
4. Нажмите **Загрузить файлы**
5. Выберите файл:

   ```
   c:\Users\kseni\Documents\Фриланс\Bitrix-introduction\local\templates\main\404.php
   ```

6. Дождитесь загрузки

---

## ⚙️ Шаг 2: Настройте 404 в админке Bitrix

### Вариант 1: Через настройки сайта (рекомендую)

1. **Откройте настройки:**
   - Настройки → Настройки продукта → Настройки модулей → Главный модуль

2. **Найдите раздел "Страницы ошибок"**

3. **Укажите путь к странице 404:**

   ```
   /local/templates/main/404.php
   ```

4. **Сохраните**

---

### Вариант 2: Через .settings.php (альтернатива)

Если первый способ не работает:

1. **Откройте файл:** `/bitrix/.settings.php`

2. **Найдите секцию `exception_handling`:**

   ```php
   'exception_handling' => [
       'value' => [
           'debug' => false,
           'handled_errors_types' => 4437,
           'exception_errors_types' => 4437,
           'ignore_silence' => false,
           'assertion_throws_exception' => true,
           'assertion_error_type' => 256,
           'log' => null,
       ],
   ],
   ```

3. **Добавьте настройку 404:**

   ```php
   'exception_handling' => [
       'value' => [
           'debug' => false,
           'handled_errors_types' => 4437,
           'exception_errors_types' => 4437,
           'ignore_silence' => false,
           'assertion_throws_exception' => true,
           'assertion_error_type' => 256,
           'log' => null,
           'page_404' => '/local/templates/main/404.php',  // ← Добавьте эту строку
       ],
   ],
   ```

4. **Сохраните файл**

---

### Вариант 3: Создать файл 404.php в корне сайта

Если Bitrix не подхватывает шаблонную 404:

1. **Создайте файл:** `/404.php` (в корне сайта)

2. **Содержимое файла:**

   ```php
   <?php
   // Перенаправляем на шаблонную 404
   include($_SERVER['DOCUMENT_ROOT'] . '/local/templates/main/404.php');
   ```

3. **В настройках Apache/Nginx** добавьте:

   ```
   ErrorDocument 404 /404.php
   ```

---

## 🎨 Шаг 3: Проверьте изображение 404

Убедитесь, что файл `404.png` загружен на сервер:

**Путь на сервере:**

```
/local/templates/main/images/content/404.png
```

**Если его нет:**

1. Возьмите из вашей папки:

   ```
   c:\Users\kseni\Documents\Фриланс\Bitrix-introduction\assets\img\content\404.png
   ```

2. Загрузите в:

   ```
   /local/templates/main/images/content/
   ```

---

## ✅ Шаг 4: Проверьте работу

1. **Откройте несуществующую страницу:**

   ```
   http://new.intezgroup.ru/test-404-page-not-found
   ```

2. **Должна открыться красивая страница 404** с:
   - Заголовком "Страница не найдена"
   - Текстом "Независимо от сложности задачи..."
   - Кнопкой "На главную"
   - Изображением 404.png

3. **Если не работает:**
   - Проверьте путь к файлу в настройках
   - Очистите кеш: Настройки → Производительность → Очистить кеш
   - Проверьте права на файл: `chmod 644 404.php`

---

## 🔍 Отладка проблем

### Проблема: Показывается стандартная 404 Bitrix

**Решение:**

1. Проверьте, что файл `404.php` существует на сервере
2. Убедитесь, что путь правильный: `/local/templates/main/404.php`
3. Очистите кеш Bitrix

---

### Проблема: Изображение не отображается

**Решение:**

1. Проверьте путь к изображению:

   ```
   /local/templates/main/images/content/404.png
   ```

2. Загрузите файл `404.png` если его нет
3. Проверьте права на файл: `chmod 644 404.png`

---

### Проблема: Страница 404 не использует шаблон

**Решение:**

1. Убедитесь, что в `404.php` есть вызовы:

   ```php
   require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
   // ... контент ...
   require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
   ```

2. Эти вызовы подключают `header.php` и `footer.php` вашего шаблона

---

## 📝 Структура файла 404.php

```php
<?php
// 1. Защита от прямого доступа
if (!defined('B_PROLOG_INCLUDED')) die();

// 2. Установка HTTP статуса 404
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

// 3. Подключение header (шапка сайта)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

// 4. Установка заголовка страницы
$APPLICATION->SetTitle("Страница не найдена");

// 5. HTML контент 404
?>
<section class="section section--hero section--404">
    <!-- Ваш контент -->
</section>
<?php

// 6. Подключение footer (подвал сайта)
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>
```

---

## 🎯 Чек-лист

- [ ] Файл `404.php` загружен в `/local/templates/main/`
- [ ] Изображение `404.png` загружено в `/local/templates/main/images/content/`
- [ ] Настроен путь к 404 в админке Bitrix
- [ ] Кеш очищен
- [ ] Проверена несуществующая страница — работает 404
- [ ] Header и footer отображаются правильно

---

**Всё готово!** Страница 404 будет выглядеть стильно и соответствовать дизайну сайта. 🎉
