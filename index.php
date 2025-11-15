<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

<!-- Основной контент страницы -->
<main>
    <!-- Обертка для основного контента (можно скрывать при показе 404) -->
    <div id="mainContent">
        <!-- 1. Секция: ИТ-инфраструктура нового уровня -->
        <section class="section section--hero">
            <div class="hero__content">
                <div class="hero__text-group">
                    <h1>ИТ-инфраструктура нового уровня</h1>
                    <p>
                        Мы помогаем бизнесу автоматизировать процессы, обеспечивать
                        безопасность и создавать ИТ-инфраструктуру
                    </p>
                </div>
                <button class="btn btn--primary hero__button">Заказать консультацию</button>
            </div>
            <div class="hero__image">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/a-new-level-of-IT-infrastructure.png"
                    alt="ИТ-инфраструктура нового уровня" loading="lazy" />
            </div>
            <button class="btn btn--primary hero__button-mobile">Заказать консультацию</button>
        </section>

        <!-- 2. Секция: Преимущества работы с нами -->
        <section class="section section--advantages">
            <h2>Преимущества работы с нами</h2>
            <p>
                Надёжность, скорость, контроль и безопасность ваших бизнес-процессов
            </p>

            <div class="advantages__grid">
                <!-- Карточка 1: Защита данных -->
                <div class="advantage-card">
                    <div class="advantage-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/fast-solution-section-advantages.png"
                            alt="Защита данных" loading="lazy" />
                    </div>
                    <div class="advantage-card__content">
                        <h3>Защита данных</h3>
                    </div>
                </div>

                <!-- Карточка 2: Оперативность -->
                <div class="advantage-card">
                    <div class="advantage-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/individual-approach-section-advantages.png"
                            alt="Оперативность" loading="lazy" />
                    </div>
                    <div class="advantage-card__content">
                        <h3>Оперативность</h3>
                    </div>
                </div>

                <!-- Карточка 3: Полный контроль -->
                <div class="advantage-card">
                    <div class="advantage-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/optimizing-IT-costs-section-advantages.png"
                            alt="Полный контроль" loading="lazy" />
                    </div>
                    <div class="advantage-card__content">
                        <h3>Полный контроль</h3>
                    </div>
                </div>

                <!-- Карточка 4: Аудит и подход -->
                <div class="advantage-card">
                    <div class="advantage-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/range-of-IT-services-section-advantages.png"
                            alt="Аудит и подход" loading="lazy" />
                    </div>
                    <div class="advantage-card__content">
                        <h3>Аудит и подход</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- 3. Секция: Услуги, открывающие новые возможности -->
        <section class="section section--services">
            <div class="services__header">
                <div class="services__header-text">
                    <h2>
                        Услуги, открывающие новые возможности
                    </h2>
                    <p>
                        Откройте новые возможности с нашими услугами
                    </p>
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
                <!-- Карточка 1: Услуги 1С -->
                <div class="services__card">
                    <div class="services__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/1C-services-section-service.png"
                            alt="Услуги 1С" loading="lazy" />
                    </div>
                    <h3>Услуги 1С</h3>
                    <ul class="services__card-menu">
                        <li><a href="/services/1c/implementation/">Внедрение 1С</a></li>
                        <li><a href="/services/1c/customization/">Доработка 1С</a></li>
                        <li><a href="/services/1c/support/">Техническая поддержка 1С</a></li>
                        <li><a href="/services/1c/maintenance/">Сопровождение 1С</a></li>
                        <li><a href="/services/1c/update/">Обновление 1С</a></li>
                        <li><a href="/services/1c/setup/">Настройка 1С</a></li>
                        <li><a href="/services/1c/development/">Разработка 1С</a></li>
                        <li><a href="/services/1c/rent/">Аренда 1С</a></li>
                    </ul>
                </div>

                <!-- Карточка 2: Битрикс 24 -->
                <div class="services__card">
                    <div class="services__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/bitrix-24-section-service.png"
                            alt="Битрикс 24" loading="lazy" />
                    </div>
                    <h3>Битрикс 24</h3>
                    <ul class="services__card-menu">
                        <li><a href="http://new.intezgroup.ru/services/bitrix24/implementation/">Внедрение Битрикс
                                24</a></li>
                        <li><a href="#">Обслуживание Битрикс 24</a></li>
                        <li><a href="#">Настройка Битрикс 24</a></li>
                        <li><a href="#">Разработка Битрикс 24</a></li>
                    </ul>
                </div>

                <!-- Карточка 3: ИТ-решения и оборудование -->
                <div class="services__card">
                    <div class="services__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/IT-solutions-and-equipment-section-service.png"
                            alt="ИТ-решения и оборудование" loading="lazy" />
                    </div>
                    <h3>ИТ-решения и оборудование</h3>
                    <ul class="services__card-menu">
                        <li><a href="http://new.intezgroup.ru/services/IT-infrastructure-and-equipment//creation/">Создание
                                ИТ инфраструктуры</a></li>
                        <li><a href="#">Установка серверного оборудования и ПО</a></li>
                        <li><a href="#">ИТ-обслуживание ПК и серверов</a></li>
                        <li><a href="#">Монтаж локальных сетей</a></li>
                        <li><a href="#">Монтаж СКС</a></li>
                        <li><a href="#">Установка систем видеонаблюдения</a></li>
                    </ul>
                </div>

                <!-- Карточка 4: Серверные решения и сети -->
                <div class="services__card">
                    <div class="services__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/server-solutions-and-networks-section-service.png"
                            alt="Серверные решения и сети" loading="lazy" />
                    </div>
                    <h3>Серверные решения и сети</h3>
                    <ul class="services__card-menu">
                        <li><a
                                href="http://new.intezgroup.ru/services/server-solutions-and-networks/implementation-of-data-storage-solutions/">Внедрение
                                хранилищ данных</a></li>
                        <li><a href="#">Внедрение почтового сервера</a></li>
                        <li><a href="#">Корпоративный VPN</a></li>
                    </ul>
                </div>

            </div>
        </section>

        <!-- 4. Секция: Как построена наша работа? -->
        <section class="section section--work-process">
            <h2>Как проходит внедрение CRM?</h2>
            <p>
                Анализ, настройка, интеграция и обучение для эффективности
            </p>

            <div class="work-process__grid">
                <!-- Карточка 1: Консультация -->
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/consultation.png" alt="Консультация"
                            loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Консультация</h3>
                        <p>Проведём аудит процессов и определим ключевые задачи для оптимизации</p>
                    </div>
                </div>

                <!-- Карточка 2: Выбор решения -->
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/choosing-solution.png" alt="Выбор решения"
                            loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Выбор решения</h3>
                        <p>
                            Предложим оптимальные варианты внедрения и обслуживания ИТ-инфраструктуры
                        </p>
                    </div>
                </div>

                <!-- Карточка 3: Заключение договора -->
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/conclusion-of-an-agreement.png"
                            alt="Заключение договора" loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Заключение договора</h3>
                        <p>
                            Согласуем объём работ, сроки, стоимость и условия сотрудничества
                        </p>
                    </div>
                </div>

                <!-- Карточка 4: Внедрение -->
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/integration.png" alt="Внедрение"
                            loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Внедрение</h3>
                        <p>
                            Установим оборудование, настроим ПО и проверим работу системы
                        </p>
                    </div>
                </div>
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
            <h2>
                Узнайте больше о нашей компании
            </h2>
            <div class="about-company__image">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/more-about-the-company.png"
                    alt="Узнайте больше о нашей компании" loading="lazy" />
            </div>
            <div class="about-company__content">
                <div class="about-company__text">
                    <p>
                        Мы — команда профессионалов, предлагающих полный спектр ИТ-услуг для
                        вашего бизнеса.
                    </p>
                    <p>
                        Наши решения позволяют оптимизировать процессы и повысить эффективность работы.
                        Мы работаем с компаниями всех размеров и отраслей, обеспечивая высококачественное
                        внедрение и поддержку систем.
                    </p>
                </div>
                <button class="btn btn--primary about-company__button">Подробнее о компании</button>
            </div>
            <button class="btn btn--primary about-company__button-mobile">Подробнее о компании</button>
        </section>

        <!-- 6. Секция: Наши достижения и результаты -->
        <section class="section section--achievements">
            <h2>Наши достижения и результаты</h2>

            <div class="achievements__grid">
                <!-- Карточка 1: 50+ -->
                <div class="achievements__card">
                    <div class="achievements__card-content">
                        <div class="achievements__card-value">50+</div>
                        <div class="achievements__card-label">Постоянных клиентов</div>
                    </div>
                </div>

                <!-- Карточка 2: -51% -->
                <div class="achievements__card">
                    <div class="achievements__card-content">
                        <div class="achievements__card-value">-51%</div>
                        <div class="achievements__card-label">
                            Снижение затрат бизнеса клиентов
                        </div>
                    </div>
                </div>

                <!-- Карточка 3: +37% -->
                <div class="achievements__card">
                    <div class="achievements__card-content">
                        <div class="achievements__card-value">+37%</div>
                        <div class="achievements__card-label">
                            Рост эффективности бизнеса клиентов
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. Секция: Более 50 постоянных клиентов с нами -->
        <section class="section section--clients">
            <div class="clients__header">
                <h2>Более 50 постоянных клиентов с нами</h2>
                <p>
                    Доверие 50+ клиентов подтверждает качество нашего обслуживания
                </p>
            </div>

            <div class="clients__grid">
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/kessebohmer.png" alt="Kessebohmer"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/ternus.png" alt="Ternus" loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/trans-atlantic.png" alt="Trans Atlantic"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/eka-center.png" alt="Eka Center"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/city-krovla.png" alt="City Krovla"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/belka.png" alt="Belka" loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/abs-service.png" alt="ABS Service"
                        loading="lazy" />
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
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/smartlamps.png" alt="Smart Lamps"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/tract-group.png" alt="Tract Group"
                        loading="lazy" />
                </div>

                <!-- Дубликаты для бесшовной анимации на desktop -->
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/kessebohmer.png" alt="Kessebohmer"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/ternus.png" alt="Ternus" loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/trans-atlantic.png" alt="Trans Atlantic"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/eka-center.png" alt="Eka Center"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/city-krovla.png" alt="City Krovla"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/belka.png" alt="Belka" loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/abs-service.png" alt="ABS Service"
                        loading="lazy" />
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
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/smartlamps.png" alt="Smart Lamps"
                        loading="lazy" />
                </div>
                <div class="clients__logo">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/tract-group.png" alt="Tract Group"
                        loading="lazy" />
                </div>
            </div>

            <div class="clients__navigation">
                <button class="clients__nav-btn clients__nav-btn--prev" id="clientsPrev">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                        style="transform: rotate(180deg)" loading="lazy" />
                </button>
                <button class="clients__nav-btn clients__nav-btn--next" id="clientsNext">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                        style="transform: rotate(0deg)" loading="lazy" />
                </button>
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
                    <div class="track-group__card track-group__card--active">
                        <div class="track-group__content">
                            <h2>ИТ для Трак Групп</h2>
                            <p>
                                Защита сети и хранилище данных
                            </p>
                            <p>
                                Для компании была разработана и внедрена интегрированная
                                система для защиты локальной сети, которая включала в себя
                                установку надежного файервола и настройку безопасных каналов
                                связи для всех подразделений компаний. Также была разработана
                                система централизованного хранения данных, обеспечивающая
                                быстрый и безопасный доступ к информации для всех сотрудников.
                            </p>
                            <ul class="track-group__list">
                                <li>
                                    Обеспечена защита сети и централизованное хранение данных
                                </li>
                                <li>Внедрены 1С, Exchange и Project Server</li>
                                <li>Повышена эффективность управления проектами</li>
                            </ul>
                            <button class="btn btn--primary track-group__button">Хочу так же</button>
                        </div>
                        <div class="track-group__image">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/IT-truck-group-section-track-group.png"
                                alt="ИТ для Трак Групп" loading="lazy" />
                        </div>
                        <button class="btn btn--primary track-group__button-mobile">Хочу так же</button>
                    </div>

                    <!-- Карточка 2: ИТ для видеостудии -->
                    <div class="track-group__card">
                        <div class="track-group__content">
                            <h2>ИТ для видеостудии</h2>
                            <p>
                                Высокоскоростное хранилище и GPU-серверы
                            </p>
                            <p>
                                Для видеостудии была разработана система с высокоскоростным
                                хранилищем данных объемом свыше 200 ТБ для работы с большими
                                видеофайлами. Установлены GPU-серверы для ускоренной обработки
                                видео и рендеринга. Все данные хранятся в зашифрованном,
                                обеспечивающим безопасный доступ.
                            </p>
                            <ul class="track-group__list">
                                <li>Создано высокоскоростное хранилище данных</li>
                                <li>
                                    Установлен GPU-сервер, ускоряющий обработку видео на 80 %
                                </li>
                                <li>Обеспечен безопасный и стабильный доступ к данным</li>
                            </ul>
                            <button class="btn btn--primary track-group__button">Хочу так же</button>
                        </div>
                        <div class="track-group__image">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/IT-video-studio-section-track-group.png"
                                alt="ИТ для видеостудии" loading="lazy" />
                        </div>
                        <button class="btn btn--primary track-group__button-mobile">Хочу так же</button>
                    </div>

                    <!-- Карточка 3: ИТ для Консалтинг Логистики -->
                    <div class="track-group__card">
                        <div class="track-group__content">
                            <h2>ИТ для Консалтинг Логистики</h2>
                            <p>
                                Защита сети и автоматизация процессов
                            </p>
                            <p>
                                Для компании была внедрена система защиты локальной сети с
                                установкой файервола, созданием защищённых каналов связи и
                                даже настроено централизованное файловое хранилище для рабочих
                                документов и данных. Внедрены решения для автоматизации
                                работы: 1С для учёта и финансов, Exchange для корпоративной
                                почты и Project Server для управления проектами.
                            </p>
                            <ul class="track-group__list">
                                <li>Обеспечена защита сети и хранение данных</li>
                                <li>Внедрены 1С, Exchange и Project Server</li>
                                <li>Ускорено управление проектами и документооборотом</li>
                            </ul>
                            <button class="btn btn--primary track-group__button">Хочу так же</button>
                        </div>
                        <div class="track-group__image">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/IT-consulting-logistics-section-track-group.png"
                                alt="ИТ для Консалтинг Логистики" loading="lazy" />
                        </div>
                        <button class="btn btn--primary track-group__button-mobile">Хочу так же</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- 9. Секция: Отзывы -->
        <section class="section section--reviews">
            <div class="reviews__container">
                <!-- Блок слева: Заголовок и кнопка -->
                <div class="reviews__left-block">
                    <h2>Отзывы</h2>
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
            <h2>
                Готовы начать? Узнайте, как мы можем помочь!
            </h2>
            <div class="ready-to-start__image">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/ready-to-start-img.png" alt="Готовы начать?"
                    loading="lazy" />
            </div>
            <div class="ready-to-start__content">
                <div class="ready-to-start__text">
                    <p>
                        Получите консультацию по автоматизации и внедрению ИТ-решений. Мы
                        подберём оптимальные инструменты для управления и роста.
                    </p>
                    <p>
                        Наши эксперты проанализируют задачи, предложат решения и покажут,
                        как технологии снизят издержки и ускорят бизнес. Начните цифровую
                        трансформацию.
                    </p>
                </div>
                <button class="btn btn--primary ready-to-start__button">Получить консультацию</button>
            </div>
            <button class="btn btn--primary ready-to-start__button-mobile">Получить консультацию</button>
        </section>

        <!-- 11. Секция: Специальные предложения -->
        <section class="section section--special-offers">
            <div class="special-offers__header">
                <div class="special-offers__header-text">
                    <h2>Специальные предложения</h2>
                    <p>
                        Скидки акции и предложения на ИТ-инфраструктуру
                    </p>
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
                <div class="special-offers__card">
                    <div class="special-offers__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/1c-section-special-offers.png"
                            alt="Готовая 1С за 2 дня" loading="lazy" />
                    </div>
                    <div class="special-offers__card-content">
                        <h3>Готовая 1С за 2 дня</h3>
                        <p>
                            Быстрое внедрение 1С под ключ
                        </p>
                        <a href="#" class="special-offers__card-link">Подробнее</a>
                    </div>
                </div>

                <!-- Карточка 2: Битрикс 24 со скидкой до 50% -->
                <div class="special-offers__card">
                    <div class="special-offers__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/24-bitrix-section-special-offers.png"
                            alt="Битрикс 24 со скидкой до 50%" loading="lazy" />
                    </div>
                    <div class="special-offers__card-content">
                        <h3>
                            Битрикс 24 со скидкой до 50%
                        </h3>
                        <p>
                            Внедрение CRM для автоматизации продаж
                        </p>
                        <a href="#" class="special-offers__card-link">Подробнее</a>
                    </div>
                </div>

                <!-- Карточка 3: Бесплатный аудит -->
                <div class="special-offers__card">
                    <div class="special-offers__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/free-audit-section-special-offers.png"
                            alt="Бесплатный аудит" loading="lazy" />
                    </div>
                    <div class="special-offers__card-content">
                        <h3>Бесплатный аудит</h3>
                        <p>
                            Анализ оборудования, серверов и сетей
                        </p>
                        <a href="#" class="special-offers__card-link">Подробнее</a>
                    </div>
                </div>

                <!-- Карточка 4: Установка в подарок -->
                <div class="special-offers__card">
                    <div class="special-offers__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/installation-section-special-offers.png"
                            alt="Установка в подарок" loading="lazy" />
                    </div>
                    <div class="special-offers__card-content">
                        <h3>Установка в подарок</h3>
                        <p>
                            Система видеонаблюдения — установка бесплатно
                        </p>
                        <a href="#" class="special-offers__card-link">Подробнее</a>
                    </div>
                </div>

            </div>
        </section>

        <!-- 12. Секция: Вопрос-ответ -->
        <section class="section section--faq">
            <div class="faq__container">
                <!-- Блок слева: Заголовок и кнопка -->
                <div class="faq__left-block">
                    <h2>Вопрос-ответ</h2>
                    <button class="btn btn--primary">Задать вопрос</button>
                </div>

                <!-- Блок справа: Карточки FAQ -->
                <div class="faq__cards-block">
                    <div class="faq__card">
                        <div class="faq__card-header">
                            <div class="faq__question-text">Зачем бизнесу нужна автоматизация процессов?</div>
                            <button class="faq__toggle-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                    loading="lazy" />
                            </button>
                        </div>
                        <div class="faq__answer">Автоматизация процессов помогает ускорить рабочие операции, уменьшить
                            вероятность ошибок, снизить затраты и повысить эффективность работы. Она позволяет бизнесу
                            сосредоточиться на ключевых задачах, улучшая скорость принятия решений и управление
                            ресурсами.</div>
                    </div>

                    <div class="faq__card">
                        <div class="faq__card-header">
                            <div class="faq__question-text">Как обеспечивается безопасность данных?</div>
                            <button class="faq__toggle-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                    loading="lazy" />
                            </button>
                        </div>
                        <div class="faq__answer">Безопасность данных обеспечивается с помощью фаерволов, шифрования
                            данных, настройки защищённых каналов связи и регулярного обновления программного
                            обеспечения. Мы применяем передовые технологии для защиты информации от внешних угроз и
                            утечек.</div>
                    </div>

                    <div class="faq__card">
                        <div class="faq__card-header">
                            <div class="faq__question-text">Сколько времени занимает внедрение ИТ-решений?</div>
                            <button class="faq__toggle-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                    loading="lazy" />
                            </button>
                        </div>
                        <div class="faq__answer">Время внедрения зависит от масштаба проекта и выбранных решений. Обычно
                            внедрение занимает от нескольких недель до нескольких месяцев, в зависимости от сложности
                            интеграции и необходимого обучения персонала.</div>
                    </div>

                    <div class="faq__card">
                        <div class="faq__card-header">
                            <div class="faq__question-text">Оказываете ли вы техническую поддержку после внедрения?
                            </div>
                            <button class="faq__toggle-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                    loading="lazy" />
                            </button>
                        </div>
                        <div class="faq__answer">Да, мы предоставляем техническую поддержку после внедрения. Мы
                            предлагаем различные уровни обслуживания, включая помощь по устранению неисправностей,
                            обновления и консультации по эксплуатации решений.</div>
                    </div>

                    <div class="faq__card">
                        <div class="faq__card-header">
                            <div class="faq__question-text">Можно ли интегрировать 1С и Битрикс 24?</div>
                            <button class="faq__toggle-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                    loading="lazy" />
                            </button>
                        </div>
                        <div class="faq__answer">Да, мы предоставляем услуги по интеграции 1С и Битрикс 24. Это
                            позволяет обеспечить бесперебойный обмен данными между системами и автоматизировать
                            различные бизнес-процессы в рамках одной платформы.</div>
                    </div>

                    <div class="faq__card">
                        <div class="faq__card-header">
                            <div class="faq__question-text">Можно ли получить бесплатную консультацию?</div>
                            <button class="faq__toggle-btn">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                    loading="lazy" />
                            </button>
                        </div>
                        <div class="faq__answer">Да, мы предлагаем бесплатную консультацию по вопросам автоматизации и
                            внедрения ИТ-решений. Наши эксперты помогут вам разобраться в ваших потребностях и предложат
                            оптимальные решения.</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 13. Секция: Получить ответ за 15 минут -->
        <section class="section section--quick-response">
            <div class="quick-response__content">
                <h2>Получить ответ за 15 минут</h2>
                <p>
                    Заполните форму с актуальными данными
                </p>
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
                    <p>
                        Отправляя форму, вы соглашаетесь с условиями
                        <a href="#">пользовательского соглашения</a> и
                        <a href="#">обработкой персональных данных</a>
                    </p>
                </form>
            </div>
            <div class="quick-response__image">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/get-answer-section-quick-response.png"
                    alt="Получить ответ за 15 минут" loading="lazy" />
            </div>
        </section>

        <!-- 14. Секция: Полезные статьи -->
        <section class="section section--blog">
            <div class="blog__header">
                <div class="blog__header-text">
                    <h2>Полезные статьи</h2>
                    <p>
                        Материалы об ИТ, автоматизации и развитии бизнеса
                    </p>
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
                <div class="blog__card">
                    <div class="blog__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/fast-1c-section-blog.png"
                            alt="Как ускорить работу в 1С" loading="lazy" />
                    </div>
                    <div class="blog__card-content">
                        <h3>Как ускорить работу в 1С</h3>
                        <p>
                            Оптимизация базы данных и настройка серверов
                        </p>
                        <a href="#" class="blog__card-link">Подробнее</a>
                        <div class="blog__card-meta">
                            <span class="blog__card-category">Услуги 1С</span>
                            <span class="blog__card-date">28 мая</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка 2: 5 инструментов Битрикс 24 -->
                <div class="blog__card">
                    <div class="blog__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/5-bitrixs-instruments-section-blog.png"
                            alt="5 инструментов Битрикс 24" loading="lazy" />
                    </div>
                    <div class="blog__card-content">
                        <h3>5 инструментов Битрикс 24</h3>
                        <p>
                            Разбираем функции, которые помогают в росте конверсии
                        </p>
                        <a href="#" class="blog__card-link">Подробнее</a>
                        <div class="blog__card-meta">
                            <span class="blog__card-category">Услуги Битрикс 24</span>
                            <span class="blog__card-date">12 июля</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка 3: Как выбрать ИТ-инфраструктуру -->
                <div class="blog__card">
                    <div class="blog__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/it-infrastructure-section-blog.png"
                            alt="Как выбрать ИТ-инфраструктуру" loading="lazy" />
                    </div>
                    <div class="blog__card-content">
                        <h3>Как выбрать ИТ-инфраструктуру</h3>
                        <p>Советы по подбору оборудования</p>
                        <a href="#" class="blog__card-link">Подробнее</a>
                        <div class="blog__card-meta">
                            <span class="blog__card-category">ИТ-инфраструктура и оборудование</span>
                            <span class="blog__card-date">5 июн</span>
                        </div>
                    </div>
                </div>

                <!-- Карточка 4: Безопасность: что нужно знать -->
                <div class="blog__card">
                    <div class="blog__card-image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/safety-section-blog.png"
                            alt="Безопасность: что нужно знать" loading="lazy" />
                    </div>
                    <div class="blog__card-content">
                        <h3>Безопасность: что нужно знать</h3>
                        <p>Как избежать утечек информации</p>
                        <a href="#" class="blog__card-link">Подробнее</a>
                        <div class="blog__card-meta">
                            <span class="blog__card-category">Серверные решения и сети</span>
                            <span class="blog__card-date">1 сен</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <!-- Конец обертки основного контента -->
</main>
<!-- Конец основного контента -->

<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>