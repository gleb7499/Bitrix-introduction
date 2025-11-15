<?php
/**
 * 404 - Страница не найдена
 * Корневой файл для IntezGroup
 * 
 * ВАЖНО: Этот файл должен быть в КОРНЕ сайта (/404.php)
 * Он подключает шаблон из /local/templates/main/404.php
 */

// Устанавливаем HTTP статус 404
header("HTTP/1.0 404 Not Found");
@define("ERROR_404", "Y");

// Подключаем header Bitrix
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

// Устанавливаем заголовок страницы
$APPLICATION->SetTitle("Страница не найдена");
$APPLICATION->SetPageProperty("title", "404 - Страница не найдена | IntezGroup");
?>

<!-- Секция 404: Страница не найдена -->
<section class="section section--hero section--404">
    <div class="hero__content">
        <div class="hero__text-group">
            <h1>Страница не найдена</h1>
            <p>
                Независимо от сложности задачи — мы решим ваши ИТ-проблемы. Доверьтесь нам!
            </p>
        </div>
        <a href="/" class="btn btn--primary hero__button">На главную</a>
    </div>
    <div class="hero__image">
        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/404.png" alt="Страница не найдена" loading="lazy" />
    </div>
    <a href="/" class="btn btn--primary hero__button-mobile">На главную</a>
</section>

<?php
// Подключаем footer Bitrix
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>