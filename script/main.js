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
    initQuickResponseForm();
    initPortfolioItems();
    initFAQ();
    initServicesCarousel();
    initSpecialOffersCarousel();
    initTrackGroupCarousel();
    initBlogCarousel();
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

// Обработка формы Quick Response с валидацией
function initQuickResponseForm() {
    const form = document.querySelector('.quick-response__form');
    
    if (!form) return;
    
    const fields = form.querySelectorAll('.quick-response__field');
    const submitBtn = form.querySelector('.quick-response__btn');
    
    // Объект для отслеживания состояния полей
    const fieldStates = {};
    
    fields.forEach((field, index) => {
        const input = field.querySelector('.quick-response__input');
        const errorText = field.querySelector('.quick-response__error');
        
        if (!input || !errorText) return;
        
        const fieldId = `field_${index}`;
        fieldStates[fieldId] = {
            touched: false,
            valid: false,
            empty: true
        };
        
        // Обработка ввода
        input.addEventListener('input', function() {
            const value = this.value.trim();
            fieldStates[fieldId].empty = !value;
            
            if (value) {
                this.classList.add('active');
                fieldStates[fieldId].touched = true;
                const isValid = validateInput(this, field, errorText, true);
                fieldStates[fieldId].valid = isValid;
            } else {
                this.classList.remove('active');
                // Если поле пустое и пользователь его трогал - показываем ошибку
                if (fieldStates[fieldId].touched) {
                    this.classList.add('error');
                    field.classList.add('has-error');
                    errorText.textContent = 'Поле обязательно для заполнения';
                    fieldStates[fieldId].valid = false;
                } else {
                    // Если не трогал - просто убираем все ошибки
                    clearFieldErrors(this, field);
                    fieldStates[fieldId].valid = false;
                }
            }
            
            updateSubmitButton();
        });
        
        // Обработка потери фокуса
        input.addEventListener('blur', function() {
            const value = this.value.trim();
            
            if (!value) {
                // Если поле пустое при потере фокуса - показываем ошибку
                if (fieldStates[fieldId].touched) {
                    this.classList.add('error');
                    field.classList.add('has-error');
                    errorText.textContent = 'Поле обязательно для заполнения';
                    fieldStates[fieldId].valid = false;
                }
            } else {
                // Валидируем заполненное поле
                fieldStates[fieldId].touched = true;
                const isValid = validateInput(this, field, errorText, false);
                fieldStates[fieldId].valid = isValid;
            }
            
            updateSubmitButton();
        });
        
        // Обработка получения фокуса
        input.addEventListener('focus', function() {
            // Убираем ошибки только при фокусе, но не сообщения об успехе
            if (field.classList.contains('has-error') || field.classList.contains('has-warning')) {
                this.classList.remove('error', 'warning');
                field.classList.remove('has-error', 'has-warning');
            }
        });
    });
    
    // Функция обновления состояния кнопки
    function updateSubmitButton() {
        // Проверяем: все ли поля валидны и заполнены
        const allValid = Object.values(fieldStates).every(state => state.valid && !state.empty);
        
        if (submitBtn) {
            submitBtn.disabled = !allValid;
        }
    }
    
    // Функция очистки ошибок поля
    function clearFieldErrors(input, field) {
        input.classList.remove('error', 'warning', 'active');
        field.classList.remove('has-error', 'has-warning');
    }
    
    // Инициализация - кнопка disabled по умолчанию
    updateSubmitButton();
    
    // Валидация формы при отправке
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        
        fields.forEach((field, index) => {
            const input = field.querySelector('.quick-response__input');
            const errorText = field.querySelector('.quick-response__error');
            const fieldId = `field_${index}`;
            
            fieldStates[fieldId].touched = true;
            
            if (!validateInput(input, field, errorText, false)) {
                isValid = false;
                fieldStates[fieldId].valid = false;
            }
        });
        
        if (isValid) {
            console.log('Форма Quick Response отправлена');
            alert('Спасибо! Ваш запрос принят. Мы свяжемся с вами в течение 15 минут.');
            
            // Сброс формы
            form.reset();
            
            // Сброс всех состояний
            fields.forEach((field, index) => {
                const input = field.querySelector('.quick-response__input');
                const fieldId = `field_${index}`;
                
                input.classList.remove('active', 'error', 'warning');
                field.classList.remove('has-error', 'has-warning');
                
                fieldStates[fieldId] = {
                    touched: false,
                    valid: false,
                    empty: true
                };
            });
            
            updateSubmitButton();
        }
    });
}

// Функция валидации input
function validateInput(input, field, errorText, isTyping) {
    const value = input.value.trim();
    const type = input.type;
    
    // Очищаем предыдущие состояния
    input.classList.remove('error', 'warning');
    field.classList.remove('has-error', 'has-warning');
    
    if (!value) {
        return false;
    }
    
    // Валидация имени
    if (type === 'text') {
        if (value.length < 2) {
            input.classList.add('error');
            field.classList.add('has-error');
            errorText.textContent = 'Имя должно содержать минимум 2 символа';
            return false;
        }
        
        if (!/^[а-яА-ЯёЁa-zA-Z\s-]+$/.test(value)) {
            input.classList.add('error');
            field.classList.add('has-error');
            errorText.textContent = 'Имя может содержать только буквы';
            return false;
        }
        
        // Если всё корректно - убираем все сообщения
        field.classList.remove('has-error', 'has-warning');
        return true;
    }
    
    // Валидация телефона
    if (type === 'tel') {
        // Убираем все нецифровые символы
        const phoneDigits = value.replace(/\D/g, '');
        
        if (phoneDigits.length === 0) {
            return false;
        }
        
        // При вводе показываем warning если номер неполный
        if (phoneDigits.length < 11) {
            if (isTyping) {
                // При вводе не показываем ошибку, только если пользователь покинул поле
                return false;
            } else {
                input.classList.add('warning');
                field.classList.add('has-warning');
                errorText.textContent = 'Неполный номер телефона';
                return false;
            }
        }
        
        if (phoneDigits.length > 11) {
            input.classList.add('error');
            field.classList.add('has-error');
            errorText.textContent = 'Номер телефона слишком длинный';
            return false;
        }
        
        if (!phoneDigits.startsWith('7') && !phoneDigits.startsWith('8')) {
            input.classList.add('error');
            field.classList.add('has-error');
            errorText.textContent = 'Номер должен начинаться с +7 или 8';
            return false;
        }
        
        // Если всё корректно - убираем все сообщения
        field.classList.remove('has-error', 'has-warning');
        return true;
    }
    
    return true;
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
    const faqCards = document.querySelectorAll('.faq__card');
    
    faqCards.forEach(card => {
        const toggleBtn = card.querySelector('.faq__toggle-btn');
        const answer = card.querySelector('.faq__answer');
        const icon = toggleBtn ? toggleBtn.querySelector('img') : null;
        
        if (answer && icon) {
            // Клик по всей карточке
            card.addEventListener('click', (e) => {
                // Предотвращаем двойное срабатывание, если клик был по кнопке
                if (e.target.closest('.faq__toggle-btn') && e.target !== card) {
                    return;
                }
                
                const isActive = card.classList.contains('active');
                
                // Переключить текущую карточку
                if (isActive) {
                    card.classList.remove('active');
                    icon.src = 'assets/img/plus.png';
                    icon.alt = 'Показать ответ';
                } else {
                    card.classList.add('active');
                    icon.src = 'assets/img/minus.png';
                    icon.alt = 'Скрыть ответ';
                }
                
                console.log('FAQ карточка переключена');
            });
            
            // Добавляем курсор pointer для всей карточки
            card.style.cursor = 'pointer';
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

// Универсальная функция инициализации карусели
function initCarousel(config) {
    const { 
        prevBtnId, 
        nextBtnId, 
        gridSelector, 
        cardSelector, 
        cardsPerView = 4,
        name = 'carousel'
    } = config;
    
    const prevBtn = document.getElementById(prevBtnId);
    const nextBtn = document.getElementById(nextBtnId);
    const grid = document.querySelector(gridSelector);
    
    if (!prevBtn || !nextBtn || !grid) {
        console.log(`${name}: элементы не найдены`);
        return;
    }
    
    const cards = grid.querySelectorAll(cardSelector);
    
    if (cards.length === 0) {
        console.log(`${name}: карточки не найдены`);
        return;
    }
    
    let currentIndex = 0;
    const totalCards = cards.length;
    const hasMoreCards = totalCards > cardsPerView;
    
    // Функция обновления градиентов
    function updateGradients() {
        // Левый градиент: показываем, если не в начале и есть больше карточек
        if (currentIndex > 0 && hasMoreCards) {
            grid.classList.add('show-left-gradient');
        } else {
            grid.classList.remove('show-left-gradient');
        }
        
        // Правый градиент: показываем, если не в конце и есть больше карточек
        const isAtEnd = currentIndex >= totalCards - cardsPerView;
        if (!isAtEnd && hasMoreCards) {
            grid.classList.add('show-right-gradient');
        } else {
            grid.classList.remove('show-right-gradient');
        }
        
        console.log(`${name}: градиенты обновлены. Index: ${currentIndex}, Left: ${currentIndex > 0 && hasMoreCards}, Right: ${!isAtEnd && hasMoreCards}`);
    }
    
    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth;
        const gap = parseFloat(getComputedStyle(grid).columnGap) || 0;
        const offset = -(currentIndex * (cardWidth + gap));
        
        cards.forEach((card) => {
            card.style.transform = `translateX(${offset}px)`;
            card.style.transition = 'transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)';
        });
        
        // Обновляем состояние кнопок
        const isAtStart = currentIndex === 0;
        const isAtEnd = currentIndex >= totalCards - cardsPerView;
        
        prevBtn.disabled = isAtStart;
        nextBtn.disabled = isAtEnd;
        
        prevBtn.style.opacity = isAtStart ? '0.3' : '1';
        nextBtn.style.opacity = isAtEnd ? '0.3' : '1';
        
        prevBtn.style.cursor = isAtStart ? 'not-allowed' : 'pointer';
        nextBtn.style.cursor = isAtEnd ? 'not-allowed' : 'pointer';
        
        // Обновляем градиенты
        updateGradients();
        
        console.log(`${name}: показаны карточки ${currentIndex + 1}-${Math.min(currentIndex + cardsPerView, totalCards)} из ${totalCards}`);
    }
    
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
            console.log(`${name}: переход назад`);
        }
    });
    
    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalCards - cardsPerView) {
            currentIndex++;
            updateCarousel();
            console.log(`${name}: переход вперёд`);
        }
    });
    
    // Обновляем при изменении размера окна
    const resizeHandler = debounce(() => {
        // Сбрасываем индекс если он стал недопустимым
        if (currentIndex >= totalCards - cardsPerView && currentIndex > 0) {
            currentIndex = Math.max(0, totalCards - cardsPerView);
        }
        updateCarousel();
    }, 250);
    
    window.addEventListener('resize', resizeHandler);
    
    // Инициализация
    updateCarousel();
    
    console.log(`${name}: карусель инициализирована (${totalCards} карточек, показываем ${cardsPerView}, есть больше карточек: ${hasMoreCards})`);
}

// Инициализация карусели услуг
function initServicesCarousel() {
    initCarousel({
        prevBtnId: 'servicesPrev',
        nextBtnId: 'servicesNext',
        gridSelector: '.services__grid',
        cardSelector: '.services__card',
        cardsPerView: 4,
        name: 'Services'
    });
}

// Инициализация карусели специальных предложений
function initSpecialOffersCarousel() {
    initCarousel({
        prevBtnId: 'specialOffersPrev',
        nextBtnId: 'specialOffersNext',
        gridSelector: '.special-offers__grid',
        cardSelector: '.special-offers__card',
        cardsPerView: 4,
        name: 'Special Offers'
    });
}

// Инициализация карусели блога
function initBlogCarousel() {
    initCarousel({
        prevBtnId: 'blogPrev',
        nextBtnId: 'blogNext',
        gridSelector: '.blog__grid',
        cardSelector: '.blog__card',
        cardsPerView: 4,
        name: 'Blog'
    });
}
