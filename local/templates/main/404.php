<?php
/**
 * 404 - Page Not Found
 * Root file for IntezGroup
 * 
 * IMPORTANT: This file must be in the site ROOT (/404.php)
 * It includes the template from /local/templates/main/404.php
 */

// Set HTTP 404 status
header("HTTP/1.0 404 Not Found");
@define("ERROR_404", "Y");

// Include Bitrix header
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

// Set page title
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
// Include Bitrix footer
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>