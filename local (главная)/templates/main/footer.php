<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;
?>
</main>
<!-- Конец основного контента -->

<!-- Подвал -->
<footer class="footer">
    <!-- Секция: Ссылки и информация -->
    <section class="section section--footer-info">
        <div class="footer__columns">
            <!-- Колонка 1: О компании -->
            <div class="footer__column">
                <h3>О компании</h3>

                <div class="footer__section">
                    <h4>Компания</h4>
                    <ul class="footer__list">
                        <li><a href="/about/" class="footer__link">О компании</a></li>
                        <li><a href="/careers/" class="footer__link">Вакансии</a></li>
                        <li><a href="/reviews/" class="footer__link">Отзывы</a></li>
                        <li><a href="/faq/" class="footer__link">FAQ</a></li>
                        <li><a href="/promotions/" class="footer__link">Акции и скидки</a></li>
                        <li><a href="/prices/" class="footer__link">Цены</a></li>
                        <li><a href="/projects/" class="footer__link">Проекты</a></li>
                        <li><a href="/contacts/" class="footer__link">Контакты</a></li>
                    </ul>
                </div>

                <div class="footer__section">
                    <h4>Контакты</h4>
                    <div class="footer__contact-info">
                        <a href="tel:+74954765464" class="footer__phone">+7 495 476-54-64</a>
                        <a href="mailto:sales@intezgroup.ru" class="footer__email">sales@intezgroup.ru</a>
                        <div class="footer__social">
                            <a href="#" class="footer__social-link footer__social-link--telegram" aria-label="Telegram">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/TG.svg" alt="Telegram" loading="lazy" />
                            </a>
                            <a href="#" class="footer__social-link footer__social-link--whatsapp" aria-label="WhatsApp">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/image/icons/WA.svg" alt="WhatsApp" loading="lazy" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Колонка 2: Услуги -->
            <div class="footer__column">
                <h3>Услуги</h3>

                <div class="footer__section">
                    <h4>Услуги 1С</h4>
                    <ul class="footer__list">
                        <li><a href="/services/1c/implementation/" class="footer__link">Внедрение 1С</a></li>
                        <li><a href="/services/1c/customization/" class="footer__link">Доработка 1С</a></li>
                        <li><a href="/services/1c/support/" class="footer__link">Техническая поддержка 1С</a></li>
                        <li><a href="/services/1c/maintenance/" class="footer__link">Сопровождение 1С</a></li>
                        <li><a href="/services/1c/update/" class="footer__link">Обновление 1С</a></li>
                        <li><a href="/services/1c/configuration/" class="footer__link">Настройка 1С</a></li>
                        <li><a href="/services/1c/development/" class="footer__link">Разработка 1С</a></li>
                        <li><a href="/services/1c/rent/" class="footer__link">Аренда 1С</a></li>
                    </ul>
                </div>

                <div class="footer__section">
                    <h4>Серверные решения и сети</h4>
                    <ul class="footer__list">
                        <li><a href="/services/server-solutions/storage/" class="footer__link">Внедрение хранилищ
                                данных</a></li>
                        <li><a href="/services/server-solutions/mail-server/" class="footer__link">Внедрение почтового
                                сервера</a></li>
                        <li><a href="/services/server-solutions/vpn/" class="footer__link">Корпоративный ВПН</a></li>
                    </ul>
                </div>
            </div>

            <!-- Колонка 3: Услуги Битрикс 24 -->
            <div class="footer__column">
                <h3 class="footer__column-title--placeholder" aria-hidden="true">Placeholder</h3>
                <h4>Услуги Битрикс 24</h4>
                <ul class="footer__list">
                    <li><a href="/services/bitrix24/implementation/" class="footer__link">Внедрение Битрикс 24</a></li>
                    <li><a href="/services/bitrix24/maintenance/" class="footer__link">Обслуживание Битрикс 24</a></li>
                    <li><a href="/services/bitrix24/configuration/" class="footer__link">Настройка Битрикс 24</a></li>
                    <li><a href="/services/bitrix24/development/" class="footer__link">Разработка Битрикс 24</a></li>
                </ul>
            </div>

            <!-- Колонка 4: IT-инфраструктура -->
            <div class="footer__column">
                <h3 class="footer__column-title--placeholder" aria-hidden="true">Placeholder</h3>
                <h4>IT-инфраструктура и оборудование</h4>
                <ul class="footer__list">
                    <li><a href="/services/it-infrastructure/creation/" class="footer__link">Создание ИТ
                            инфраструктуры</a></li>
                    <li><a href="/services/it-infrastructure/server-installation/" class="footer__link">Установка
                            серверного оборудования и ПО</a></li>
                    <li><a href="/services/it-infrastructure/pc-support/" class="footer__link">ИТ-обслуживание ПК и
                            серверов</a></li>
                    <li><a href="/services/it-infrastructure/lan/" class="footer__link">Монтаж локальных сетей</a></li>
                    <li><a href="/services/it-infrastructure/sks/" class="footer__link">Монтаж СКС</a></li>
                    <li><a href="/services/it-infrastructure/video-surveillance/" class="footer__link">Установка систем
                            видеонаблюдения</a></li>
                </ul>
            </div>
        </div>
    </section>

    <div class="footer__container">
        <p>© <?= date('Y') ?> «Intez Group» Все права защищены.</p>
        <div class="footer__legal">
            <a href="/terms/" class="footer__legal-link">Пользовательское соглашение</a>
            <a href="/privacy/" class="footer__legal-link">Политика обработки персональных данных</a>
        </div>
    </div>
</footer>

<?php
// Подключение JavaScript
$asset = Asset::getInstance();
$asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
?>

</body>

</html>