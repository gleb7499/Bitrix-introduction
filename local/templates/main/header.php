<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;

$asset = Asset::getInstance();
$curPage = $APPLICATION->GetCurPage();
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php $APPLICATION->ShowTitle(); ?></title>

    <?php
    // Подключение CSS
    $asset->addCss(SITE_TEMPLATE_PATH . '/css/template_styles.css');

    // Мета-теги и заголовки
    $APPLICATION->ShowHead();

    // CSS из панели управления и компонентов
    $APPLICATION->ShowCSS();
    ?>

    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/image/icons/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php $APPLICATION->ShowPanel(); ?>

    <!-- Overlay для размытия main (для services-popup) -->
    <div class="services-popup__overlay" id="overlay"></div>

    <!-- Overlay для модального окна (выше всех элементов) -->
    <div class="modal-overlay" id="modalOverlay"></div>

    <!-- Модальное окно с формой -->
    <div class="modal-popup" id="callModal">
        <div class="modal-popup__wrapper">
            <div class="modal-popup__container">
                <!-- Контент формы (переиспользуем стили quick-response) -->
                <div class="quick-response__content">
                    <h2>Получить ответ за 15 минут</h2>
                    <p>
                        Заполните форму с актуальными данными
                    </p>
                    <form class="quick-response__form" id="callModalForm">
                        <div class="quick-response__field">
                            <input type="text" class="quick-response__input" placeholder="Имя" />
                            <span class="quick-response__error">Additional text</span>
                        </div>
                        <div class="quick-response__field">
                            <input type="tel" class="quick-response__input" placeholder="+7 __ __ __" />
                            <span class="quick-response__error">Additional text</span>
                        </div>
                        <button type="submit" class="btn btn--primary">Отправить</button>
                        <p>
                            Отправляя форму, вы соглашаетесь с условиями
                            <a href="#">пользовательского соглашения</a> и
                            <a href="#">обработкой персональных данных</a>
                        </p>
                    </form>
                </div>

                <!-- Контент успешной отправки (скрыт по умолчанию) -->
                <div class="modal-success" style="display: none;">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/successfully-done.png" alt="Успешно"
                        class="modal-success__image" loading="lazy">
                    <div class="modal-success__content">
                        <h2>Спасибо за обращение!</h2>
                        <p>Мы уже получили вашу заявку. Ожидайте звонка — специалист свяжется с вами в ближайшее время
                        </p>
                    </div>
                </div>
            </div>

            <!-- Кнопка закрытия справа от контейнера -->
            <button class="modal-popup__close" id="modalClose" aria-label="Закрыть">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/close.svg" alt="Закрыть" loading="lazy">
            </button>
        </div>
    </div>

    <!-- Всплывающее меню услуг -->
    <div class="services-popup__container" id="servicesPopup">
        <div class="services-popup__links">
            <!-- Колонка с категориями -->
            <div class="services-popup__column-wrapper">
                <div class="services-popup__categories">
                    <h3 class="active" data-category="1c">Услуги 1С</h3>
                    <h3 data-category="bitrix24">Услуги Битрикс 24</h3>
                    <h3 data-category="it-infrastructure">ИТ-инфраструктура и оборудование</h3>
                    <h3 data-category="server-solutions">Серверные решения и сети</h3>
                </div>
            </div>

            <!-- Колонка 1 -->
            <div class="services-popup__column-wrapper">
                <div class="services-popup__column" data-column="1">
                    <!-- Услуги 1С - Колонка 1 -->
                    <a href="/services/1c/implementation/" class="services-popup__link" data-category="1c">Внедрение
                        1С</a>
                    <a href="/services/1c/customization/" class="services-popup__link" data-category="1c">Доработка
                        1С</a>
                    <a href="/services/1c/support/" class="services-popup__link" data-category="1c">Техническая
                        поддержка 1С</a>
                    <a href="/services/1c/maintenance/" class="services-popup__link" data-category="1c">Сопровождение
                        1С</a>

                    <!-- Услуги Битрикс 24 - Колонка 1 -->
                    <a href="/services/bitrix24/implementation/" class="services-popup__link" data-category="bitrix24"
                        style="display: none">Внедрение Битрикс 24</a>
                    <a href="/services/bitrix24/maintenance/" class="services-popup__link" data-category="bitrix24"
                        style="display: none">Обслуживание Битрикс 24</a>

                    <!-- ИТ-инфраструктура и оборудование - Колонка 1 -->
                    <a href="/services/IT-infrastructure-and-equipment/creation/" class="services-popup__link"
                        data-category="it-infrastructure" style="display: none">Создание ИТ инфраструктуры</a>
                    <a href="/services/IT-infrastructure-and-equipment/server-installation/"
                        class="services-popup__link" data-category="it-infrastructure" style="display: none">Установка
                        серверного оборудования и
                        ПО</a>
                    <a href="/services/IT-infrastructure-and-equipment/pc-support/" class="services-popup__link"
                        data-category="it-infrastructure" style="display: none">ИТ-обслуживание ПК и серверов</a>

                    <!-- Серверные решения и сети - Колонка 1 -->
                    <a href="/services/server-solutions-and-networks/implementation-of-data-storage-solutions/"
                        class="services-popup__link" data-category="server-solutions" style="display: none">Внедрение
                        хранилищ данных</a>
                    <a href="/services/server-solutions/mail-server/" class="services-popup__link"
                        data-category="server-solutions" style="display: none">Внедрение почтового сервера</a>
                </div>
            </div>

            <!-- Колонка 2 -->
            <div class="services-popup__column-wrapper">
                <div class="services-popup__column" data-column="2">
                    <!-- Услуги 1С - Колонка 2 -->
                    <a href="/services/1c/update/" class="services-popup__link" data-category="1c">Обновление 1С</a>
                    <a href="/services/1c/setup/" class="services-popup__link" data-category="1c">Настройка 1С</a>
                    <a href="/services/1c/development/" class="services-popup__link" data-category="1c">Разработка
                        1С</a>
                    <a href="/services/1c/rent/" class="services-popup__link" data-category="1c">Аренда 1С</a>

                    <!-- Услуги Битрикс 24 - Колонка 2 -->
                    <a href="/services/bitrix24/configuration/" class="services-popup__link" data-category="bitrix24"
                        style="display: none">Настройка Битрикс 24</a>
                    <a href="/services/bitrix24/development/" class="services-popup__link" data-category="bitrix24"
                        style="display: none">Разработка Битрикс 24</a>

                    <!-- ИТ-инфраструктура и оборудование - Колонка 2 -->
                    <a href="/services/IT-infrastructure-and-equipment/lan/" class="services-popup__link"
                        data-category="it-infrastructure" style="display: none">Монтаж локальных сетей</a>
                    <a href="/services/IT-infrastructure-and-equipment/sks/" class="services-popup__link"
                        data-category="it-infrastructure" style="display: none">Монтаж СКС</a>
                    <a href="/services/IT-infrastructure-and-equipment/video-surveillance/" class="services-popup__link"
                        data-category="it-infrastructure" style="display: none">Установка систем видеонаблюдения</a>

                    <!-- Серверные решения и сети - Колонка 2 -->
                    <a href="/services/server-solutions/vpn/" class="services-popup__link"
                        data-category="server-solutions" style="display: none">Корпоративный VPN</a>
                </div>
            </div>
        </div>

        <!-- Блок с фотографией -->
        <div class="services-popup__image">
            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/popup-menu-1c.png" alt="Услуги 1С" data-image="1c"
                class="services-popup__photo active" loading="lazy" />
            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/popup-menu-bitrix-24.png" alt="Услуги Битрикс 24"
                data-image="bitrix24" class="services-popup__photo" loading="lazy" />
            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/popup-menu-IT-solutions-and-equipment.png"
                alt="ИТ-инфраструктура и оборудование" data-image="it-infrastructure" class="services-popup__photo"
                loading="lazy" />
            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/popup-menu-server-solutions-and-networks.png"
                alt="Серверные решения и сети" data-image="server-solutions" class="services-popup__photo"
                loading="lazy" />
        </div>
    </div>

    <!-- Шапка сайта (десктоп версия) -->
    <header class="header header--desktop">
        <div class="container">
            <div class="header__content">
                <a href="/">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/logo-header-desktop.svg" alt="IntezGroup Logo"
                        class="header__logo" loading="lazy" />
                </a>

                <button class="btn btn--services" id="servicesBtn">
                    Услуги
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/show-more.svg" alt="" class="btn__icon"
                        loading="lazy" />
                </button>

                <nav class="nav">
                    <ul class="nav__list">
                        <li class="nav__item nav__item--has-dropdown">
                            <a href="#about" class="nav__link">
                                О компании
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/show-more.svg" alt=""
                                    class="nav__link-icon" loading="lazy" />
                            </a>
                            <!-- Всплывающее меню "О компании" -->
                            <div class="nav-dropdown" id="aboutDropdown">
                                <div class="nav-dropdown__container">
                                    <a href="#" class="nav-dropdown__link">О компании</a>
                                    <a href="#" class="nav-dropdown__link">Вакансии</a>
                                    <a href="#" class="nav-dropdown__link">Отзывы</a>
                                    <a href="#" class="nav-dropdown__link">Вопрос-ответ</a>
                                    <a href="#" class="nav-dropdown__link">Акции и скидки</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav__item">
                            <a href="#prices" class="nav__link">Цены</a>
                        </li>
                        <li class="nav__item">
                            <a href="#projects" class="nav__link">Проекты</a>
                        </li>
                        <li class="nav__item">
                            <a href="#blog" class="nav__link">Блог</a>
                        </li>
                        <li class="nav__item">
                            <a href="#contacts" class="nav__link">Контакты</a>
                        </li>
                    </ul>
                </nav>

                <div class="header__actions">
                    <a href="tel:+74954765464" class="header__phone">+7 495 476-54-64</a>
                    <button class="btn btn--secondary" id="callBtn">Заказать звонок</button>
                </div>

                <button class="burger" id="burger">
                    <span class="burger__line"></span>
                    <span class="burger__line"></span>
                    <span class="burger__line"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Шапка сайта (мобильная версия для <= 1023px) -->
    <header class="header header--mobile">
        <div class="header__mobile-container">
            <a href="/">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/logo-header-mobile.svg" alt="IntezGroup Logo"
                    class="header__mobile-logo" loading="lazy" />
            </a>

            <div class="header__mobile-actions">
                <button class="btn btn--mobile-services" id="mobileServicesBtn">Услуги</button>
                <button class="btn-icon" id="mobileCallBtn" aria-label="Позвонить">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/phone-mobile.svg" alt="" loading="lazy" />
                </button>
                <button class="btn-icon" id="mobileMenuBtn" aria-label="Меню">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/menu-mobile.svg" alt="" loading="lazy" />
                </button>
            </div>
        </div>
    </header>

    <!-- Overlay для мобильного меню (содержит меню внутри) -->
    <div class="mobile-menu-overlay" id="mobileMenuOverlay">
        <button class="btn-icon mobile-menu-back" id="mobileMenuBack" aria-label="Назад">
            <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/back.svg" alt="" loading="lazy" />
        </button>
        <div class="mobile-menu-content" id="mobileMenuContent"></div>
    </div>

    <!-- Основной контент страницы -->
    <main id="workarea">