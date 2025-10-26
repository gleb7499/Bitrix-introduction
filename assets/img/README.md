# Images Folder

Эта папка предназначена для хранения всех изображений сайта.

## Необходимые изображения

### Логотип
- `logo-invers.png` - Логотип компании (35x40px)

### Hero Section
- `hero-main.png` - Главное изображение баннера (1076x720px для desktop)

### About Section
- `about-illustration.png` - Иллюстрация о компании (600x400px для desktop)

### Stages Section
- `stage-1.png` - Аудит процессов
- `stage-2.png` - Настройка системы
- `stage-3.png` - Интеграция
- `stage-4.png` - Обучение команды
Размер: 260x180px для каждого

### Advantages Section
- `advantage-1.png` - Опыт 10+ лет
- `advantage-2.png` - Быстрое внедрение
- `advantage-3.png` - Постоянная поддержка
- `advantage-4.png` - Индивидуальный подход
Размер: по необходимости

### Reviews Section
- `avatar-1.png` - Аватар Ивана Петрова
- `avatar-2.png` - Аватар Марии Сидоровой
Размер: 60x60px (круглые)

### SEO Section
- `seo-illustration.png` - Иллюстрация CRM автоматизации (600x400px)

### Clients Section
- `client-1.svg` до `client-5.svg` - Логотипы клиентов
Формат: SVG (векторный)

### Services Section
- `service-1.png` - Внедрение CRM
- `service-2.png` - Интеграции
- `service-3.png` - Обучение
- `service-4.png` - Поддержка
Размер: 300x200px для каждого

## Рекомендации

### Форматы
- **PNG** - для логотипов и изображений с прозрачностью
- **JPG/WebP** - для фотографий и сложных изображений
- **SVG** - для иконок и простых логотипов

### Оптимизация
- Используйте TinyPNG или Squoosh для сжатия
- Создавайте версии для retina (@2x)
- Рассмотрите использование WebP с fallback на PNG/JPG

### Адаптивность
Для лучшей производительности создайте несколько версий:
```
hero-main-mobile.png   (640px)
hero-main-tablet.png   (1024px)
hero-main-desktop.png  (1920px)
```

Затем используйте `<picture>` и `srcset` в HTML.

## Временные плейсхолдеры

До добавления реальных изображений сайт будет показывать серые блоки (`.pg-gray-light`).
Это нормально и не влияет на функциональность.
