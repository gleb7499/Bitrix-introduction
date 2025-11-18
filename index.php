<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

<!-- Основной контент страницы -->
<div id="mainContent">
    <!-- 1. Секция: ИТ-инфраструктура нового уровня -->
    <section class="section section--hero">
        <div class="hero__content">
            <div class="hero__text-group">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/hero_title.php",
                    [],
                    ["MODE" => "html", "NAME" => "Заголовок Hero-секции"]
                ); ?>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/hero_description.php",
                    [],
                    ["MODE" => "html", "NAME" => "Описание Hero-секции"]
                ); ?>
            </div>
            <button class="btn btn--primary hero__button">Заказать консультацию</button>
        </div>
        <div class="hero__image">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/hero_image.php",
                [],
                ["MODE" => "html", "NAME" => "Изображение Hero-секции"]
            ); ?>
        </div>
        <button class="btn btn--primary hero__button-mobile">Заказать консультацию</button>
    </section>

    <!-- 2. Секция: Преимущества работы с нами -->
    <section class="section section--advantages">
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/advantages_title.php",
            [],
            ["MODE" => "html", "NAME" => "Заголовок секции Преимущества"]
        ); ?>
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/advantages_subtitle.php",
            [],
            ["MODE" => "html", "NAME" => "Подзаголовок секции Преимущества"]
        ); ?>

        <div class="advantages__grid">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/advantages_card_1.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка преимущества 1"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/advantages_card_2.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка преимущества 2"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/advantages_card_3.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка преимущества 3"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/advantages_card_4.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка преимущества 4"]
            ); ?>
        </div>
    </section>

    <!-- 3. Секция: Услуги, открывающие новые возможности -->
    <section class="section section--services">
        <div class="services__header">
            <div class="services__header-text">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/services_title.php",
                    [],
                    ["MODE" => "html", "NAME" => "Заголовок секции Услуги"]
                ); ?>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/services_subtitle.php",
                    [],
                    ["MODE" => "html", "NAME" => "Подзаголовок секции Услуги"]
                ); ?>
            </div>
        </div>

        <div class="services__navigation">
            <button class="services__nav-btn services__nav-btn--prev" id="servicesPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="services__nav-btn services__nav-btn--next" id="servicesNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                    style="transform: rotate(0deg)" loading="lazy" />
            </button>
        </div>

        <div class="services__grid">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/services_card_1c.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка услуг 1С"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/services_card_bitrix24.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка услуг Битрикс 24"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/services_card_it_solutions.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка ИТ-решения и оборудование"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/services_card_server_solutions.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка Серверные решения и сети"]
            ); ?>
        </div>
    </section>

    <!-- 4. Секция: Как построена наша работа? -->
    <section class="section section--work-process">
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/work_process_title.php",
            [],
            ["MODE" => "html", "NAME" => "Заголовок секции Процесс работы"]
        ); ?>
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/work_process_subtitle.php",
            [],
            ["MODE" => "html", "NAME" => "Подзаголовок секции Процесс работы"]
        ); ?>

        <div class="work-process__grid">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/work_process_card_1.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка процесса 1 - Консультация"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/work_process_card_2.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка процесса 2 - Выбор решения"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/work_process_card_3.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка процесса 3 - Заключение договора"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/work_process_card_4.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка процесса 4 - Внедрение"]
            ); ?>
        </div>

        <div class="work-process__navigation">
            <button class="work-process__nav-btn work-process__nav-btn--prev" id="workProcessPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="work-process__nav-btn work-process__nav-btn--next" id="workProcessNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                    style="transform: rotate(0deg)" loading="lazy" />
            </button>
        </div>
    </section>

    <!-- 5. Секция: Узнайте больше о нашей компании -->
    <section class="section section--about-company">
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/about_company_title.php",
            [],
            ["MODE" => "html", "NAME" => "Заголовок секции О компании"]
        ); ?>
        <div class="about-company__image">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/about_company_image.php",
                [],
                ["MODE" => "html", "NAME" => "Изображение секции О компании"]
            ); ?>
        </div>
        <div class="about-company__content">
            <div class="about-company__text">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/about_company_text.php",
                    [],
                    ["MODE" => "html", "NAME" => "Текст секции О компании"]
                ); ?>
            </div>
            <button class="btn btn--primary about-company__button">Подробнее о компании</button>
        </div>
        <button class="btn btn--primary about-company__button-mobile">Подробнее о компании</button>
    </section>

    <!-- 6. Секция: Наши достижения и результаты -->
    <section class="section section--achievements">
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/achievements_title.php",
            [],
            ["MODE" => "html", "NAME" => "Заголовок секции Достижения"]
        ); ?>

        <div class="achievements__grid">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/achievements_card_1.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка достижения 1"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/achievements_card_2.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка достижения 2"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/achievements_card_3.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка достижения 3"]
            ); ?>
        </div>
    </section>

    <!-- 7. Секция: Более 50 постоянных клиентов с нами -->
    <section class="section section--clients">
        <div class="clients__header">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/clients_title.php",
                [],
                ["MODE" => "html", "NAME" => "Заголовок секции Клиенты"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/clients_subtitle.php",
                [],
                ["MODE" => "html", "NAME" => "Подзаголовок секции Клиенты"]
            ); ?>
        </div>

        <div class="clients__grid">
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/kessebohmer.png" alt="Kessebohmer" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/ternus.png" alt="Ternus" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/trans-atlantic.png" alt="Trans Atlantic"
                    loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/eka-center.png" alt="Eka Center" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/city-krovla.png" alt="City Krovla" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/belka.png" alt="Belka" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/abs-service.png" alt="ABS Service" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/chapurin.png" alt="Chapurin" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/geomon.png" alt="Geomon" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/lsc.png" alt="LSC" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/mediacontact.png" alt="Media Contact"
                    loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/presna-finans.png" alt="Presna Finans"
                    loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/smartlamps.png" alt="Smart Lamps" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/tract-group.png" alt="Tract Group" loading="lazy" />
            </div>

            <!-- Дубликаты для бесшовной анимации на desktop -->
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/kessebohmer.png" alt="Kessebohmer" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/ternus.png" alt="Ternus" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/trans-atlantic.png" alt="Trans Atlantic"
                    loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/eka-center.png" alt="Eka Center" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/city-krovla.png" alt="City Krovla" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/belka.png" alt="Belka" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/abs-service.png" alt="ABS Service" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/chapurin.png" alt="Chapurin" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/geomon.png" alt="Geomon" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/lsc.png" alt="LSC" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/mediacontact.png" alt="Media Contact"
                    loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/presna-finans.png" alt="Presna Finans"
                    loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/smartlamps.png" alt="Smart Lamps" loading="lazy" />
            </div>
            <div class="clients__logo">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/tract-group.png" alt="Tract Group" loading="lazy" />
            </div>
        </div>
    </section>

    <!-- 8. Секция: ИТ для Трак Групп -->
    <section class="section section--track-group">
        <div class="track-group__carousel">
            <!-- Навигация карусели -->
            <div class="track-group__navigation">
                <button class="track-group__nav-btn track-group__nav-btn--prev" id="trackGroupPrev">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Назад"
                        style="transform: rotate(180deg)" loading="lazy" />
                </button>
                <span class="track-group__nav-text">
                    <span class="track-group__nav-current">1</span> /
                    <span class="track-group__nav-total">3</span>
                </span>
                <button class="track-group__nav-btn track-group__nav-btn--next" id="trackGroupNext">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Вперед" loading="lazy" />
                </button>
            </div>

            <!-- Карточки карусели -->
            <div class="track-group__cards">
                <!-- Карточка 1: ИТ для Трак Групп -->
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/track_group_case_1.php",
                    [],
                    ["MODE" => "html", "NAME" => "Кейс 1 Track Group (ИТ для Трак Групп)"]
                ); ?>

                <!-- Карточка 2: ИТ для видеостудии -->
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/track_group_case_2.php",
                    [],
                    ["MODE" => "html", "NAME" => "Кейс 2 Track Group (ИТ для видеостудии)"]
                ); ?>

                <!-- Карточка 3: ИТ для Консалтинг Логистики -->
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/track_group_case_3.php",
                    [],
                    ["MODE" => "html", "NAME" => "Кейс 3 Track Group (ИТ для Консалтинг Логистики)"]
                ); ?>
            </div>
        </div>
    </section>

    <!-- 9. Секция: Отзывы -->
    <section class="section section--reviews">
        <div class="reviews__container">
            <!-- Блок слева: Заголовок и кнопка -->
            <div class="reviews__left-block">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/reviews_title.php",
                    [],
                    ["MODE" => "html", "NAME" => "Заголовок секции Отзывы"]
                ); ?>
                <button class="btn btn--primary">Все отзывы</button>
            </div>

            <!-- Блок справа: Карточки отзывов -->
            <div class="reviews__cards-block">
                <!-- Отзыв 1: Анна Иванова (первая карточка) -->
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/test-avatar-1.jpg" alt="Анна Иванова"
                            class="reviews__card-photo" loading="lazy" />
                        <div class="reviews__card-info">
                            <div class="reviews__card-name">Анна Иванова</div>
                            <div class="reviews__card-meta">
                                <span class="reviews__card-company">ТехноПро</span>
                                <span class="reviews__card-date">28 мая</span>
                            </div>
                        </div>
                    </div>
                    <p>
                        Потрясающая компания! Работать с вами — одно удовольствие.
                        Быстрое реагирование на запросы, качественная работа и внимание
                        к деталям. Рек..
                    </p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>

                <!-- Отзыв 2: Елена Петрова -->
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/test-avatar-2.jpg" alt="Елена Петрова"
                            class="reviews__card-photo" loading="lazy" />
                        <div class="reviews__card-info">
                            <div class="reviews__card-name">Елена Петрова</div>
                            <div class="reviews__card-meta">
                                <span class="reviews__card-company">РекордТех</span>
                                <span class="reviews__card-date">18 июн</span>
                            </div>
                        </div>
                    </div>
                    <p>
                        Мы в полном восторге от вашего сервиса!
                    </p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>

                <!-- Отзыв 3: Дмитрий Сидоров -->
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/test-avatar-3.jpg" alt="Дмитрий Сидоров"
                            class="reviews__card-photo" loading="lazy" />
                        <div class="reviews__card-info">
                            <div class="reviews__card-name">Дмитрий Сидоров</div>
                            <div class="reviews__card-meta">
                                <span class="reviews__card-company">ИнфоСистемы</span>
                                <span class="reviews__card-date">1 сент</span>
                            </div>
                        </div>
                    </div>
                    <p>
                        Компания, которая всегда находит время для каждого клиента.
                        Качество услуг всегда на высоте!
                    </p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>

                <!-- Отзыв 4: Анна Иванова (вторая карточка) -->
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/test-avatar-1.jpg" alt="Анна Иванова"
                            class="reviews__card-photo" loading="lazy" />
                        <div class="reviews__card-info">
                            <div class="reviews__card-name">Анна Иванова</div>
                            <div class="reviews__card-meta">
                                <span class="reviews__card-company">ТехноПро</span>
                                <span class="reviews__card-date">28 мая</span>
                            </div>
                        </div>
                    </div>
                    <p>
                        С вами легко работать! Приятно видеть, как компания заботится о
                        клиентах, постоянно улучшая сервис и предлагая гибкие решен..
                    </p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>

                <!-- Отзыв 5: Елена Петрова (третья карточка) -->
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/test-avatar-2.jpg" alt="Елена Петрова"
                            class="reviews__card-photo" loading="lazy" />
                        <div class="reviews__card-info">
                            <div class="reviews__card-name">Елена Петрова</div>
                            <div class="reviews__card-meta">
                                <span class="reviews__card-company">РекордТех</span>
                                <span class="reviews__card-date">18 июн</span>
                            </div>
                        </div>
                    </div>
                    <p>
                        Не раз обращались к вам, и каждый раз убеждаемся..
                    </p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>

                <!-- Отзыв 6: Елена Петрова (четвёртая карточка) -->
                <div class="reviews__card">
                    <div class="reviews__card-header">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/test-avatar-3.jpg" alt="Елена Петрова"
                            class="reviews__card-photo" loading="lazy" />
                        <div class="reviews__card-info">
                            <div class="reviews__card-name">Елена Петрова</div>
                            <div class="reviews__card-meta">
                                <span class="reviews__card-company">РекордТех</span>
                                <span class="reviews__card-date">18 июн</span>
                            </div>
                        </div>
                    </div>
                    <p>
                        каждый раз удивляемся качеству работы и оперативности)
                    </p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>
            </div>
        </div>

        <div class="reviews__navigation">
            <button class="reviews__nav-btn reviews__nav-btn--prev" id="reviewsPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="reviews__nav-btn reviews__nav-btn--next" id="reviewsNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                    style="transform: rotate(0deg)" loading="lazy" />
            </button>
        </div>
    </section>

    <!-- 10. Секция: Готовы начать? Узнайте, как мы можем помочь! -->
    <section class="section section--ready-to-start">
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/ready_to_start_title.php",
            [],
            ["MODE" => "html", "NAME" => "Заголовок секции Готовы начать"]
        ); ?>
        <? $APPLICATION->IncludeFile(
            SITE_TEMPLATE_PATH . "/include/ready_to_start_image.php",
            [],
            ["MODE" => "html", "NAME" => "Картинка секции Готовы начать"]
        ); ?>
        <div class="ready-to-start__content">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/ready_to_start_text.php",
                [],
                ["MODE" => "html", "NAME" => "Текст секции Готовы начать"]
            ); ?>
            <button class="btn btn--primary ready-to-start__button">Получить консультацию</button>
        </div>
        <button class="btn btn--primary ready-to-start__button-mobile">Получить консультацию</button>
    </section>

    <!-- 11. Секция: Специальные предложения -->
    <section class="section section--special-offers">
        <div class="special-offers__header">
            <div class="special-offers__header-text">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/special_offers_title.php",
                    [],
                    ["MODE" => "html", "NAME" => "Заголовок секции Специальные предложения"]
                ); ?>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/special_offers_subtitle.php",
                    [],
                    ["MODE" => "html", "NAME" => "Подзаголовок секции Специальные предложения"]
                ); ?>
            </div>
        </div>

        <div class="special-offers__navigation">
            <button class="special-offers__nav-btn special-offers__nav-btn--prev" id="specialOffersPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="special-offers__nav-btn special-offers__nav-btn--next" id="specialOffersNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                    style="transform: rotate(0deg)" loading="lazy" />
            </button>
        </div>

        <div class="special-offers__grid">
            <!-- Карточка 1: Готовая 1С за 2 дня -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/special_offers_card_1.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка предложения 1 (Готовая 1С)"]
            ); ?>

            <!-- Карточка 2: Битрикс 24 со скидкой до 50% -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/special_offers_card_2.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка предложения 2 (Битрикс 24)"]
            ); ?>

            <!-- Карточка 3: Бесплатный аудит -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/special_offers_card_3.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка предложения 3 (Бесплатный аудит)"]
            ); ?>

            <!-- Карточка 4: Установка в подарок -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/special_offers_card_4.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка предложения 4 (Установка в подарок)"]
            ); ?>

        </div>
    </section>

    <!-- 12. Секция: Вопрос-ответ -->
    <section class="section section--faq">
        <div class="faq__container">
            <!-- Блок слева: Заголовок и кнопка -->
            <div class="faq__left-block">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_title.php",
                    [],
                    ["MODE" => "html", "NAME" => "Заголовок секции FAQ (Вопрос-ответ)"]
                ); ?>
                <button class="btn btn--primary">Задать вопрос</button>
            </div>

            <!-- Блок справа: Карточки FAQ -->
            <div class="faq__cards-block">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_card_1.php",
                    [],
                    ["MODE" => "html", "NAME" => "FAQ Вопрос 1: Зачем бизнесу нужна автоматизация"]
                ); ?>

                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_card_2.php",
                    [],
                    ["MODE" => "html", "NAME" => "FAQ Вопрос 2: Как обеспечивается безопасность данных"]
                ); ?>

                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_card_3.php",
                    [],
                    ["MODE" => "html", "NAME" => "FAQ Вопрос 3: Сколько времени занимает внедрение"]
                ); ?>

                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_card_4.php",
                    [],
                    ["MODE" => "html", "NAME" => "FAQ Вопрос 4: Оказываете ли техподдержку"]
                ); ?>

                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_card_5.php",
                    [],
                    ["MODE" => "html", "NAME" => "FAQ Вопрос 5: Можно ли интегрировать 1С и Битрикс"]
                ); ?>

                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/faq_card_6.php",
                    [],
                    ["MODE" => "html", "NAME" => "FAQ Вопрос 6: Можно ли получить бесплатную консультацию"]
                ); ?>
            </div>
        </div>
    </section>

    <!-- 13. Секция: Получить ответ за 15 минут -->
    <section class="section section--quick-response">
        <div class="quick-response__content">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/quick_response_title.php",
                [],
                ["MODE" => "html", "NAME" => "Заголовок секции Получить ответ за 15 минут"]
            ); ?>
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/quick_response_subtitle.php",
                [],
                ["MODE" => "html", "NAME" => "Подзаголовок секции Получить ответ за 15 минут"]
            ); ?>
            <form class="quick-response__form">
                <div class="quick-response__field">
                    <input type="text" class="quick-response__input" placeholder="Имя" />
                    <span class="quick-response__error">Additional text</span>
                </div>
                <div class="quick-response__field">
                    <input type="tel" class="quick-response__input" placeholder="+7 __ __ __" />
                    <span class="quick-response__error">Additional text</span>
                </div>
                <button type="submit" class="btn btn--primary">Отправить</button>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/quick_response_agreement_text.php",
                    [],
                    ["MODE" => "html", "NAME" => "Текст соглашения формы Быстрый ответ"]
                ); ?>
            </form>
        </div>
        <div class="quick-response__image">
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/quick_response_image.php",
                [],
                ["MODE" => "html", "NAME" => "Картинка секции Получить ответ за 15 минут"]
            ); ?>
        </div>
    </section>

    <!-- 14. Секция: Полезные статьи -->
    <section class="section section--blog">
        <div class="blog__header">
            <div class="blog__header-text">
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/blog_title.php",
                    [],
                    ["MODE" => "html", "NAME" => "Заголовок секции Полезные статьи"]
                ); ?>
                <? $APPLICATION->IncludeFile(
                    SITE_TEMPLATE_PATH . "/include/blog_subtitle.php",
                    [],
                    ["MODE" => "html", "NAME" => "Подзаголовок секции Полезные статьи"]
                ); ?>
            </div>
        </div>

        <div class="blog__navigation">
            <button class="blog__nav-btn blog__nav-btn--prev" id="blogPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="blog__nav-btn blog__nav-btn--next" id="blogNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                    style="transform: rotate(0deg)" loading="lazy" />
            </button>
        </div>

        <div class="blog__grid">
            <!-- Карточка 1: Как ускорить работу в 1С -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/blog_card_1.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка статьи 1 (Как ускорить работу в 1С)"]
            ); ?>

            <!-- Карточка 2: 5 инструментов Битрикс 24 -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/blog_card_2.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка статьи 2 (5 инструментов Битрикс 24)"]
            ); ?>

            <!-- Карточка 3: Как выбрать ИТ-инфраструктуру -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/blog_card_3.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка статьи 3 (Как выбрать ИТ-инфраструктуру)"]
            ); ?>

            <!-- Карточка 4: Безопасность: что нужно знать -->
            <? $APPLICATION->IncludeFile(
                SITE_TEMPLATE_PATH . "/include/blog_card_4.php",
                [],
                ["MODE" => "html", "NAME" => "Карточка статьи 4 (Безопасность)"]
            ); ?>

        </div>
    </section>
</div>
<!-- Конец основного контента -->

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>