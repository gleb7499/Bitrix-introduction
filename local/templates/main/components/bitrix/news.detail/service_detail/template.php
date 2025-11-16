<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<!-- Обертка для основного контента -->
<div id="mainContent">
    <!-- 1. Секция: Hero (Главный экран) -->
    <section class="section section--hero">
        <div class="hero__content">
            <div class="hero__text-group">
                <!-- Хлебные крошки -->
                <div class="breadcrumbs">
                    <a href="/" class="breadcrumbs__logo-link">
                        <div class="breadcrumbs__logo-wrapper">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/logo-small.svg" alt="Logo"
                                class="breadcrumbs__logo" loading="lazy" />
                        </div>
                    </a>
                    <?php if (!empty($arResult['SECTION']['PATH'])): ?>
                        <?php foreach ($arResult['SECTION']['PATH'] as $section): ?>
                            <div class="breadcrumbs__separator-wrapper">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/next.svg" alt=">" class="breadcrumbs__separator"
                                    loading="lazy" />
                            </div>
                            <a href="<?= $section['SECTION_PAGE_URL'] ?>" class="breadcrumbs__link"><?= $section['NAME'] ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <div class="breadcrumbs__separator-wrapper">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/next.svg" alt=">" class="breadcrumbs__separator"
                            loading="lazy" />
                    </div>
                    <a href="#" class="breadcrumbs__link"><?= $arResult['NAME'] ?></a>
                </div>

                <h1><?= $arResult['PROPERTIES']['HERO_TITLE']['VALUE'] ?: 'ИТ-инфраструктура нового уровня' ?></h1>
                <p><?= $arResult['PROPERTIES']['HERO_DESCRIPTION']['VALUE'] ?: 'Мы помогаем бизнесу автоматизировать процессы, обеспечивать безопасность и создавать ИТ-инфраструктуру' ?>
                </p>
            </div>
            <button class="btn btn--primary hero__button">Заказать консультацию</button>
        </div>
        <div class="hero__image">
            <?php if ($arResult['PROPERTIES']['HERO_IMAGE']['VALUE']): ?>
                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['HERO_IMAGE']['VALUE']) ?>"
                    alt="<?= $arResult['NAME'] ?>" loading="lazy" />
            <?php else: ?>
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/a-new-level-of-IT-infrastructure.png"
                    alt="<?= $arResult['NAME'] ?>" loading="lazy" />
            <?php endif; ?>
        </div>
        <button class="btn btn--primary hero__button-mobile">Заказать консультацию</button>
    </section>

    <!-- 2. Секция: Узнайте больше об услуге -->
    <section class="section section--about-company">
        <h2><?= $arResult['PROPERTIES']['ABOUT_TITLE']['VALUE'] ?: 'Узнайте больше о ' . $arResult['NAME'] ?></h2>
        <div class="about-company__image">
            <?php if ($arResult['PROPERTIES']['ABOUT_IMAGE']['VALUE']): ?>
                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['ABOUT_IMAGE']['VALUE']) ?>"
                    alt="<?= $arResult['NAME'] ?>" loading="lazy" />
            <?php else: ?>
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/section-learn-more.png" alt="<?= $arResult['NAME'] ?>"
                    loading="lazy" />
            <?php endif; ?>
        </div>
        <div class="about-company__content">
            <div class="about-company__text">
                <?php if (!empty($arResult['PROPERTIES']['ABOUT_DESCRIPTION']['~VALUE']['TEXT'])): ?>
                    <?= $arResult['PROPERTIES']['ABOUT_DESCRIPTION']['~VALUE']['TEXT'] ?>
                <?php else: ?>
                    <p>Узнайте больше о наших услугах. Мы предлагаем комплексные решения для автоматизации бизнес-процессов.
                    </p>
                    <p>Наши специалисты помогут настроить систему под ваши задачи и обучат сотрудников эффективной работе.
                    </p>
                <?php endif; ?>
            </div>
            <button class="btn btn--primary about-company__button">Связаться с нами</button>
        </div>
        <button class="btn btn--primary about-company__button-mobile">Связаться с нами</button>
    </section>

    <!-- 3. Секция: Как происходит внедрение -->
    <section class="section section--work-process">
        <h2><?= $arResult['PROPERTIES']['PROCESS_TITLE']['VALUE'] ?: 'Как проходит внедрение?' ?></h2>
        <p><?= $arResult['PROPERTIES']['PROCESS_SUBTITLE']['VALUE'] ?: 'Анализ, настройка, интеграция и обучение для эффективности' ?>
        </p>

        <div class="work-process__grid">
            <?php if (!empty($arResult['PROPERTIES']['PROCESS_STEPS']['VALUE'])): ?>
                <?php foreach ($arResult['PROPERTIES']['PROCESS_STEPS']['VALUE'] as $key => $step): ?>
                    <div class="work-process-card">
                        <div class="work-process-card__image">
                            <?php
                            // Проверяем, загружены ли кастомные картинки
                            if (!empty($arResult['PROPERTIES']['PROCESS_STEPS_IMAGES']['VALUE'][$key])) {
                                $imageUrl = CFile::GetPath($arResult['PROPERTIES']['PROCESS_STEPS_IMAGES']['VALUE'][$key]);
                            } else {
                                // Используем дефолтные картинки
                                $defaultImages = [
                                    '/local/templates/main/image/content/audit-section-crm-proces.png',
                                    '/local/templates/main/image/content/implem-section-crm-proces.png',
                                    '/local/templates/main/image/content/integration-section-crm-proces.png',
                                    '/local/templates/main/image/content/escort-section-crm-proces.png'
                                ];
                                $imageUrl = $defaultImages[$key] ?? $defaultImages[0];
                            }
                            ?>
                            <img src="<?= $imageUrl ?>" alt="<?= $step ?>" loading="lazy" />
                        </div>
                        <div class="work-process-card__content">
                            <h3><?= $step ?></h3>
                            <p><?= $arResult['PROPERTIES']['PROCESS_STEPS_DESC']['VALUE'][$key] ?? '' ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Дефолтные карточки, если не заполнено -->
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/audit-section-crm-proces.png" alt="Аудит"
                            loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Аудит</h3>
                        <p>Проводим максимально подробный анализ текущего бизнеса</p>
                    </div>
                </div>
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/implem-section-crm-proces.png"
                            alt="Внедрение и настройка" loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Внедрение и настройка</h3>
                        <p>Настройка в соответствии с написанным ТЗ</p>
                    </div>
                </div>
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/integration-section-crm-proces.png"
                            alt="Интеграция" loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Интеграция</h3>
                        <p>Мессенджеры, телефония, социальные сети, 1С, МойСклад</p>
                    </div>
                </div>
                <div class="work-process-card">
                    <div class="work-process-card__image">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/escort-section-crm-proces.png" alt="Сопровождение"
                            loading="lazy" />
                    </div>
                    <div class="work-process-card__content">
                        <h3>Сопровождение</h3>
                        <p>Сопровождение, развитие и добавление нового функционала</p>
                    </div>
                </div>
            <?php endif; ?>
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

    <!-- 4. Секция: Тарифы -->
    <section class="section section--pricing">
        <div class="pricing__text-container">
            <h2>Тарифы</h2>
            <p><?= $arResult['PROPERTIES']['TARIFFS_DESCRIPTION']['VALUE'] ?: 'От базовой настройки до полного внедрения и поддержки' ?>
            </p>
        </div>

        <div class="pricing__cards-container">
            <?php if (!empty($arResult['PROPERTIES']['TARIFFS']['~VALUE'])): ?>
                <?php foreach ($arResult['PROPERTIES']['TARIFFS']['~VALUE'] as $key => $tariff): ?>
                    <?php
                    // Декодируем JSON (используем ~VALUE для получения неэкранированных данных)
                    $tariffData = json_decode($tariff, true);
                    $colorClass = ['green', 'orange', 'red'][$key % 3];
                    ?>
                    <div class="pricing-card pricing-card--<?= $colorClass ?>">
                        <div class="pricing-card__header">
                            <div class="pricing-card__title"><?= $tariffData['name'] ?? 'Базовый' ?></div>
                            <div class="pricing-card__price"><?= $tariffData['price'] ?? 'От 29 900 ₽' ?>
                            </div>
                            <?php if (!empty($tariffData['badge']) || !empty($tariffData['old_price'])): ?>
                                <div class="pricing-card__badge-wrapper">
                                    <?php if (!empty($tariffData['badge'])): ?>
                                        <div class="pricing-card__badge pricing-card__badge--<?= $colorClass ?>">
                                            <span><?= $tariffData['badge'] ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pricing-card__strikethrough"><?= $tariffData['old_price'] ?? '' ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pricing-card__features">
                            <?php if (!empty($tariffData['features']) && is_array($tariffData['features'])): ?>
                                <?php foreach ($tariffData['features'] as $feature): ?>
                                    <div class="pricing-card__feature"><?= $feature ?></div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <button class="btn btn--primary">Оставить заявку</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="pricing__navigation">
            <button class="pricing__nav-btn pricing__nav-btn--prev" id="pricingPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="pricing__nav-btn pricing__nav-btn--next" id="pricingNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий" loading="lazy" />
            </button>
        </div>
    </section>

    <!-- 5. Секция: Преимущества работы с нами (одинаковая для всех) -->
    <section class="section section--advantages">
        <h2>Преимущества работы с нами</h2>
        <p>Надёжность, скорость, контроль и безопасность ваших бизнес-процессов</p>

        <div class="advantages__grid">
            <div class="advantage-card">
                <div class="advantage-card__image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/protection-data-section-advantages.png"
                        alt="Защита данных" loading="lazy" />
                </div>
                <div class="advantage-card__content services">
                    <h3>Защита данных</h3>
                    <p>Храним данные на закрытых серверах</p>
                </div>
            </div>
            <div class="advantage-card">
                <div class="advantage-card__image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/fast-solution-section-advantages.png"
                        alt="Оперативность" loading="lazy" />
                </div>
                <div class="advantage-card__content services">
                    <h3>Оперативность</h3>
                    <p>Устраняем неисправности и внедряем ПО под задачи</p>
                </div>
            </div>
            <div class="advantage-card">
                <div class="advantage-card__image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/full-control-section-advantages.png"
                        alt="Полный контроль" loading="lazy" />
                </div>
                <div class="advantage-card__content services">
                    <h3>Полный контроль</h3>
                    <p>Каждый этап работы документирован и подтвержден</p>
                </div>
            </div>
            <div class="advantage-card">
                <div class="advantage-card__image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/audit-section-advantages.png" alt="Аудит и подход"
                        loading="lazy" />
                </div>
                <div class="advantage-card__content services">
                    <h3>Аудит и подход</h3>
                    <p>Предлагаем решения после аудита процессов</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Секция: Отзывы (одинаковая для всех) -->
    <section class="section section--reviews">
        <div class="reviews__container">
            <div class="reviews__left-block">
                <h2>Отзывы</h2>
                <button class="btn btn--primary">Все отзывы</button>
            </div>
            <div class="reviews__cards-block">
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
                    <p>Потрясающая компания! Работать с вами — одно удовольствие. Быстрое реагирование на запросы,
                        качественная работа и внимание к деталям. Рек..</p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>
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
                    <p>Мы в полном восторге от вашего сервиса!</p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>
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
                    <p>Компания, которая всегда находит время для каждого клиента. Качество услуг всегда на высоте!</p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>
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
                    <p>С вами легко работать! Приятно видеть, как компания заботится о клиентах, постоянно улучшая
                        сервис и предлагая гибкие решен..</p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>
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
                    <p>Не раз обращались к вам, и каждый раз убеждаемся..</p>
                    <a href="#" class="reviews__card-link">Весь отзыв</a>
                </div>
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
                    <p>каждый раз удивляемся качеству работы и оперативности)</p>
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

    <!-- 7. Секция: Внедрение и настройка (ready-to-start) -->
    <section class="section section--ready-to-start section--ready-to-start-alt">
        <h2><?= $arResult['PROPERTIES']['READY_TITLE']['VALUE'] ?: 'Внедрение и настройка под бизнес' ?></h2>
        <div class="ready-to-start__image">
            <?php if ($arResult['PROPERTIES']['READY_IMAGE']['VALUE']): ?>
                <img src="<?= CFile::GetPath($arResult['PROPERTIES']['READY_IMAGE']['VALUE']) ?>"
                    alt="<?= $arResult['NAME'] ?>" loading="lazy" />
            <?php else: ?>
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/content/ready-to-start-img.png" alt="Внедрение и настройка"
                    loading="lazy" />
            <?php endif; ?>
        </div>
        <div class="ready-to-start__content">
            <div class="ready-to-start__text">
                <?php if ($arResult['PROPERTIES']['READY_DESCRIPTION']['VALUE']): ?>
                    <p><?= $arResult['PROPERTIES']['READY_DESCRIPTION']['VALUE'] ?></p>
                <?php endif; ?>
                <?php if (!empty($arResult['PROPERTIES']['READY_LIST']['VALUE'])): ?>
                    <ul>
                        <?php foreach ($arResult['PROPERTIES']['READY_LIST']['VALUE'] as $listItem): ?>
                            <li><?= $listItem ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <button class="btn btn--primary ready-to-start__button">Получить консультацию</button>
        </div>
        <button class="btn btn--primary ready-to-start__button-mobile">Получить консультацию</button>
    </section>

    <!-- 8. Секция: Постоянные клиенты (одинаковая для всех) -->
    <section class="section section--clients">
        <div class="clients__header">
            <h2>Более 50 постоянных клиентов с нами</h2>
            <p>Доверие 50+ клиентов подтверждает качество нашего обслуживания</p>
        </div>
        <div class="clients__grid">
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/kessebohmer.png"
                    alt="Kessebohmer" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/ternus.png" alt="Ternus"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/trans-atlantic.png"
                    alt="Trans Atlantic" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/eka-center.png"
                    alt="Eka Center" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/city-krovla.png"
                    alt="City Krovla" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/belka.png" alt="Belka"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/abs-service.png"
                    alt="ABS Service" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/chapurin.png" alt="Chapurin"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/geomon.png" alt="Geomon"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/lsc.png" alt="LSC"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/mediacontact.png"
                    alt="Media Contact" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/presna-finans.png"
                    alt="Presna Finans" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/smartlamps.png"
                    alt="Smart Lamps" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/tract-group.png"
                    alt="Tract Group" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/kessebohmer.png"
                    alt="Kessebohmer" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/ternus.png" alt="Ternus"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/trans-atlantic.png"
                    alt="Trans Atlantic" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/eka-center.png"
                    alt="Eka Center" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/city-krovla.png"
                    alt="City Krovla" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/belka.png" alt="Belka"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/abs-service.png"
                    alt="ABS Service" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/chapurin.png" alt="Chapurin"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/geomon.png" alt="Geomon"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/lsc.png" alt="LSC"
                    loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/mediacontact.png"
                    alt="Media Contact" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/presna-finans.png"
                    alt="Presna Finans" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/smartlamps.png"
                    alt="Smart Lamps" loading="lazy" /></div>
            <div class="clients__logo"><img src="<?= SITE_TEMPLATE_PATH ?>/image/partners/tract-group.png"
                    alt="Tract Group" loading="lazy" /></div>
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

    <!-- 9. Секция: FAQ (Вопрос-ответ) -->
    <section class="section section--faq">
        <div class="faq__container">
            <div class="faq__left-block">
                <h2>Вопрос-ответ</h2>
                <button class="btn btn--primary">Задать вопрос</button>
            </div>
            <div class="faq__cards-block">
                <?php if (!empty($arResult['PROPERTIES']['FAQ_QUESTIONS']['VALUE'])): ?>
                    <?php foreach ($arResult['PROPERTIES']['FAQ_QUESTIONS']['VALUE'] as $key => $question): ?>
                        <div class="faq__card">
                            <div class="faq__card-header">
                                <div class="faq__question-text"><?= $question ?></div>
                                <button class="faq__toggle-btn">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/plus.svg" alt="Показать ответ"
                                        loading="lazy" />
                                </button>
                            </div>
                            <div class="faq__answer">
                                <?= $arResult['PROPERTIES']['FAQ_ANSWERS']['VALUE'][$key] ?? '' ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- 10. Секция: Услуги из той же категории (кроме текущей) -->
    <section class="section section--services-opportunities">
        <div class="services-opportunities__header">
            <div class="services-opportunities__header-text">
                <h2>Услуги, открывающие новые возможности</h2>
                <p>Откройте новые возможности с нашими услугами</p>
            </div>
        </div>

        <div class="services-opportunities__navigation">
            <button class="services-opportunities__nav-btn services-opportunities__nav-btn--prev"
                id="servicesOpportunitiesPrev">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Предыдущий"
                    style="transform: rotate(180deg)" loading="lazy" />
            </button>
            <button class="services-opportunities__nav-btn services-opportunities__nav-btn--next"
                id="servicesOpportunitiesNext">
                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/arrow-left.svg" alt="Следующий"
                    style="transform: rotate(0deg)" loading="lazy" />
            </button>
        </div>

        <div class="services-opportunities__grid">
            <?php
            // Устанавливаем фильтр для выборки услуг из той же категории (исключая текущую)
            global $arRelatedFilter;
            $arRelatedFilter = array(
                "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"], // Только текущий раздел (например, 1С)
                "!ID" => $arResult["ID"] // Исключаем текущую страницу
            );

            // Получаем услуги из той же категории, исключая текущую
            $APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "related_services",
                array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "NEWS_COUNT" => "999",
                    "SORT_BY1" => "SORT",
                    "SORT_ORDER1" => "ASC",
                    "FILTER_NAME" => "arRelatedFilter",
                    "FIELD_CODE" => array("NAME", "PREVIEW_TEXT"),
                    "PROPERTY_CODE" => array("HERO_DESCRIPTION"),
                    "SET_TITLE" => "N",
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "3600",
                    "CACHE_FILTER" => "Y",
                    "CACHE_GROUPS" => "Y",
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );
            ?>
        </div>
    </section>

</div>