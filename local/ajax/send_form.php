<?php
/**
 * AJAX-обработчик отправки форм обратной связи
 * Принимает данные из форм (имя, телефон, URL страницы) и отправляет email через Bitrix
 */

// Подключаем ядро Bitrix
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

// Проверяем, что запрос пришёл методом POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => 'Метод не поддерживается'
    ]);
    exit;
}

// Получаем данные из POST-запроса
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
$pageUrl = isset($_POST['page_url']) ? trim($_POST['page_url']) : '';

// Валидация данных
$errors = [];

if (empty($name)) {
    $errors[] = 'Имя обязательно для заполнения';
}

if (empty($phone)) {
    $errors[] = 'Телефон обязателен для заполнения';
} elseif (!preg_match('/^\+7\s?\d{3}\s?\d{3}\s?\d{2}\s?\d{2}$/', $phone)) {
    $errors[] = 'Некорректный формат телефона';
}

// Если есть ошибки валидации - возвращаем их
if (!empty($errors)) {
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'errors' => $errors
    ]);
    exit;
}

// Определяем название услуги из URL страницы
$serviceName = 'Главная страница';
if (!empty($pageUrl)) {
    // Парсим URL для определения услуги
    $urlParts = parse_url($pageUrl);
    $path = isset($urlParts['path']) ? trim($urlParts['path'], '/') : '';

    if (!empty($path) && strpos($path, 'services/') === 0) {
        // Это страница услуги
        $pathSegments = explode('/', $path);
        if (count($pathSegments) >= 3) {
            $category = $pathSegments[1];
            $service = $pathSegments[2];

            // Маппинг категорий
            $categoryMap = [
                '1c' => '1С',
                'bitrix24' => 'Битрикс 24',
                'IT-infrastructure-and-equipment' => 'ИТ-инфраструктура и оборудование',
                'server-solutions-and-networks' => 'Серверные решения и сети'
            ];

            // Маппинг услуг (можно расширить)
            $serviceMap = [
                'implementation' => 'Внедрение',
                'customization' => 'Доработка',
                'support' => 'Техническая поддержка',
                'maintenance' => 'Сопровождение',
                'update' => 'Обновление',
                'setup' => 'Настройка',
                'development' => 'Разработка',
                'rent' => 'Аренда',
                'configuration' => 'Настройка',
                'creation' => 'Создание ИТ инфраструктуры',
                'server-installation' => 'Установка серверного оборудования и ПО',
                'pc-support' => 'ИТ-обслуживание ПК и серверов',
                'lan' => 'Монтаж локальных сетей',
                'sks' => 'Монтаж СКС',
                'video-surveillance' => 'Установка систем видеонаблюдения',
                'implementation-of-data-storage-solutions' => 'Внедрение хранилищ данных',
                'mail-server' => 'Внедрение почтового сервера',
                'vpn' => 'Корпоративный VPN'
            ];

            $categoryName = isset($categoryMap[$category]) ? $categoryMap[$category] : $category;
            $serviceName = isset($serviceMap[$service]) ? $serviceMap[$service] : $service;
            $serviceName = $categoryName . ' - ' . $serviceName;
        }
    }
}

// Подключаем модуль для работы с почтой
\Bitrix\Main\Loader::includeModule('main');

// Формируем массив полей для почтового события
$arEventFields = [
    'NAME' => $name,
    'PHONE' => $phone,
    'PAGE_URL' => $pageUrl,
    'SERVICE_NAME' => $serviceName,
    'DATE_TIME' => date('d.m.Y H:i:s')
];

// Отправляем почтовое событие
// EVENT_NAME должен совпадать с типом события, созданным в админке Bitrix
$eventName = 'FEEDBACK_FORM';
$result = \CEvent::Send($eventName, SITE_ID, $arEventFields);

// Возвращаем результат
header('Content-Type: application/json; charset=utf-8');

if ($result) {
    echo json_encode([
        'success' => true,
        'message' => 'Спасибо! Ваш запрос принят. Мы свяжемся с вами в течение 15 минут.'
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ошибка при отправке сообщения. Попробуйте позже.'
    ]);
}
