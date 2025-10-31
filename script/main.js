// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    console.log('Страница загружена');
    
    // Устанавливаем высоту header для корректного padding-top у body
    updateHeaderHeight();
    
    // Обновляем высоту при изменении размера окна
    window.addEventListener('resize', debounce(updateHeaderHeight, 250));
    
    // Инициализация всех обработчиков
    initBurgerMenu();
    initSmoothScroll();
    initServicesButton();
    initCallButton();
    initHeroButton();
    initContactForm();
    initPortfolioItems();
    initFAQ();
    initServicesCarousel();
    initTrackGroupCarousel();
});

// Функция для обновления высоты header
function updateHeaderHeight() {
    const header = document.querySelector('.header');
    if (header) {
        const headerHeight = header.offsetHeight;
        document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
        console.log('Header height updated:', headerHeight + 'px');
    }
}

// Бургер-меню
function initBurgerMenu() {
    const burger = document.getElementById('burger');
    const nav = document.querySelector('.nav');

    if (burger && nav) {
        burger.addEventListener('click', function() {
            this.classList.toggle('active');
            nav.classList.toggle('active');
            console.log('Бургер-меню переключено');
        });
    }
}

// Кнопка "Услуги"
function initServicesButton() {
    const servicesBtn = document.getElementById('servicesBtn');
    
    if (servicesBtn) {
        servicesBtn.addEventListener('click', function() {
            console.log('Кнопка "Услуги" нажата');
            
            // Прокрутка к секции услуг
            const servicesSection = document.getElementById('services');
            if (servicesSection) {
                servicesSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
            // Здесь можно добавить показ выпадающего меню
            // showServicesDropdown();
        });
    }
}

// Кнопка "Заказать звонок"
function initCallButton() {
    const callBtn = document.getElementById('callBtn');
    
    if (callBtn) {
        callBtn.addEventListener('click', function() {
            console.log('Кнопка "Заказать звонок" нажата');
            
            // Прокрутка к форме контактов
            const contactsSection = document.getElementById('contacts');
            if (contactsSection) {
                contactsSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
            // Или показать модальное окно с формой
            // showCallModal();
        });
    }
}

// Плавная прокрутка к секциям
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            // Проверяем, что это не просто #
            if (targetId === '#') return;
            
            e.preventDefault();
            
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                // Учитываем высоту фиксированной шапки
                const headerHeight = 100;
                const targetPosition = targetSection.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Закрываем мобильное меню, если открыто
                const nav = document.querySelector('.nav');
                const burger = document.getElementById('burger');
                if (nav && burger) {
                    nav.classList.remove('active');
                    burger.classList.remove('active');
                }
                
                console.log('Прокрутка к секции:', targetId);
            }
        });
    });
}

// Кнопка в главном баннере
function initHeroButton() {
    const heroBtn = document.getElementById('heroBtn');
    
    if (heroBtn) {
        heroBtn.addEventListener('click', function() {
            console.log('Кнопка главного баннера нажата');
            
            // Например, прокрутка к форме контактов
            const contactsSection = document.getElementById('contacts');
            if (contactsSection) {
                contactsSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
            
            // Или показать модальное окно
            // showModal();
        });
    }
}

// Обработка формы контактов
function initContactForm() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Получаем данные формы
            const formData = new FormData(this);
            const data = {};
            
            // Собираем данные из инпутов
            const inputs = this.querySelectorAll('input, textarea');
            inputs.forEach(input => {
                if (input.type !== 'submit') {
                    data[input.placeholder] = input.value;
                }
            });
            
            console.log('Форма отправлена с данными:', data);
            
            // Здесь можно добавить отправку данных на сервер
            // fetch('/api/contact', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify(data)
            // })
            
            // Показываем сообщение об успехе
            alert('Спасибо! Ваше сообщение отправлено.');
            
            // Очищаем форму
            this.reset();
        });
    }
}

// Интерактивность для элементов портфолио
function initPortfolioItems() {
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    portfolioItems.forEach(item => {
        item.addEventListener('click', function() {
            const title = this.querySelector('h4').textContent;
            console.log('Клик по проекту:', title);
            
            // Здесь можно открыть модальное окно с деталями проекта
            // showProjectModal(title);
            
            // Или перейти на страницу проекта
            // window.location.href = '/project/' + title;
        });
    });
}

// Инициализация FAQ аккордеона
function initFAQ() {
    const faqItems = document.querySelectorAll('.faq__item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq__question');
        const answer = item.querySelector('.faq__answer');
        const icon = item.querySelector('.faq__icon');
        
        if (question && answer && icon) {
            question.addEventListener('click', () => {
                const isActive = item.classList.contains('faq__item--active');
                
                // Закрыть все остальные пункты
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('faq__item--active');
                        const otherAnswer = otherItem.querySelector('.faq__answer');
                        const otherIcon = otherItem.querySelector('.faq__icon');
                        if (otherAnswer) otherAnswer.style.display = 'none';
                        if (otherIcon) otherIcon.textContent = '+';
                    }
                });
                
                // Переключить текущий пункт
                if (isActive) {
                    item.classList.remove('faq__item--active');
                    answer.style.display = 'none';
                    icon.textContent = '+';
                } else {
                    item.classList.add('faq__item--active');
                    answer.style.display = 'block';
                    icon.textContent = '−';
                }
                
                console.log('FAQ пункт переключен');
            });
        }
    });
}

// Инициализация карусели услуг
function initServicesCarousel() {
    const track = document.getElementById('servicesTrack');
    const prevBtn = document.getElementById('servicesPrev');
    const nextBtn = document.getElementById('servicesNext');
    
    if (!track || !prevBtn || !nextBtn) return;
    
    const cards = track.querySelectorAll('.services-final__card');
    let currentIndex = 0;
    let cardsPerView = 4;
    
    // Определяем количество карточек в зависимости от ширины экрана
    function updateCardsPerView() {
        if (window.innerWidth <= 480) {
            cardsPerView = 1;
        } else if (window.innerWidth <= 768) {
            cardsPerView = 2;
        } else {
            cardsPerView = 4;
        }
        updateCarousel();
    }
    
    function updateCarousel() {
        const cardWidth = track.querySelector('.services-final__card').offsetWidth;
        const gap = 20;
        const offset = -(currentIndex * (cardWidth + gap));
        track.style.transform = `translateX(${offset}px)`;
        
        // Обновляем состояние кнопок
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= cards.length - cardsPerView;
    }
    
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    nextBtn.addEventListener('click', () => {
        if (currentIndex < cards.length - cardsPerView) {
            currentIndex++;
            updateCarousel();
        }
    });
    
    // Обновляем при изменении размера окна
    window.addEventListener('resize', debounce(() => {
        updateCardsPerView();
    }, 250));
    
    // Инициализация
    updateCardsPerView();
    
    console.log('Карусель услуг инициализирована');
}

// Инициализация карусели Track Group
function initTrackGroupCarousel() {
    const prevBtn = document.getElementById('trackGroupPrev');
    const nextBtn = document.getElementById('trackGroupNext');
    const navCurrent = document.querySelector('.track-group__nav-current');
    const cards = document.querySelectorAll('.track-group__card');
    
    if (!prevBtn || !nextBtn || !navCurrent || cards.length === 0) {
        console.log('Track Group carousel elements not found');
        return;
    }
    
    let currentIndex = 0;
    
    function updateCarousel() {
        // Скрываем все карточки
        cards.forEach(card => {
            card.classList.remove('track-group__card--active');
        });
        
        // Показываем текущую карточку
        cards[currentIndex].classList.add('track-group__card--active');
        
        // Обновляем текст навигации
        navCurrent.textContent = currentIndex + 1;
        
        // Обновляем состояние кнопок
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex === cards.length - 1;
        
        console.log(`Track Group carousel updated: card ${currentIndex + 1}/${cards.length}`);
    }
    
    prevBtn.addEventListener('click', () => {
        console.log('Prev button clicked');
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
    
    nextBtn.addEventListener('click', () => {
        console.log('Next button clicked');
        if (currentIndex < cards.length - 1) {
            currentIndex++;
            updateCarousel();
        }
    });
    
    // Инициализация - показываем первую карточку
    updateCarousel();
    
    console.log('Карусель Track Group инициализирована');
}

// Дополнительные функции, которые можно использовать

// Показать/скрыть элемент
function toggleElement(element) {
    if (element) {
        element.style.display = element.style.display === 'none' ? 'block' : 'none';
    }
}

// Анимация появления элементов при скролле
function initScrollAnimation() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                console.log('Элемент появился на экране');
            }
        });
    }, observerOptions);

    const animatedElements = document.querySelectorAll('.service-card, .portfolio-item');
    animatedElements.forEach(el => observer.observe(el));
}

// Модальное окно (пример функции)
function showModal(content) {
    console.log('Показать модальное окно:', content);
    // Здесь можно добавить логику для показа модального окна
}

// Закрытие модального окна
function closeModal() {
    console.log('Закрыть модальное окно');
    // Здесь можно добавить логику для закрытия модального окна
}

// Валидация формы
function validateForm(formElement) {
    const inputs = formElement.querySelectorAll('input[required], textarea[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });
    
    return isValid;
}

// Дебаунс для оптимизации событий (например, resize, scroll)
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Пример использования дебаунса для события resize
window.addEventListener('resize', debounce(function() {
    console.log('Размер окна изменен');
    // Здесь можно добавить логику при изменении размера окна
}, 250));
