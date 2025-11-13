// Глобальный менеджер overlay для отслеживания активных компонентов
const overlayManager = {
  activeComponents: new Set(),
  overlay: null,

  init() {
    this.overlay = document.getElementById("overlay");
  },

  show(componentName) {
    this.activeComponents.add(componentName);
    if (this.overlay && this.activeComponents.size > 0) {
      this.overlay.classList.add("open");
      document.body.classList.add("overlay-active"); // Добавляем класс на body
      console.log(
        `Overlay показан. Активные компоненты: ${Array.from(
          this.activeComponents
        ).join(", ")}`
      );
    }
  },

  hide(componentName) {
    this.activeComponents.delete(componentName);
    if (this.overlay && this.activeComponents.size === 0) {
      this.overlay.classList.remove("open");
      document.body.classList.remove("overlay-active"); // Убираем класс с body
      console.log("Overlay скрыт. Активных компонентов нет.");
    } else {
      console.log(
        `Overlay остаётся видимым. Активные компоненты: ${Array.from(
          this.activeComponents
        ).join(", ")}`
      );
    }
  },
};

// Инициализация при загрузке страницы
document.addEventListener("DOMContentLoaded", function () {
  console.log("Страница загружена");

  // Инициализируем менеджер overlay
  overlayManager.init();

  // Устанавливаем высоту header для корректного padding-top у body
  updateHeaderHeight();

  // Обновляем высоту при изменении размера окна
  window.addEventListener("resize", debounce(updateHeaderHeight, 250));

  // Проверяем URL на наличие параметра для показа 404
  checkPageMode();

  // Инициализация обработчика ошибок для изображений
  initImageErrorHandler();

  // Инициализация аккордеона футера (только для мобильной версии)
  initFooterAccordion();

  // Инициализация мобильного меню (footer как выпадающее меню)
  initMobileMenu();

  // Инициализация всех обработчиков
  initBurgerMenu();
  initSmoothScroll();
  initServicesButton();
  initAboutDropdown();
  initCallButton();
  initHeroButton();
  initContactForm();
  initQuickResponseForm(); // Инициализация формы в секции
  initPortfolioItems();
  initFAQ();
  initServicesCarousel();
  initSpecialOffersCarousel();
  initTrackGroupCarousel();
  initBlogCarousel();
  initWorkProcessCarousel();
  initPricingCarousel();
  initClientsCarousel();
  initReviewsCarousel();
});

// Функция для обновления высоты header
function updateHeaderHeight() {
  const header = document.querySelector(".header");
  if (header) {
    const headerHeight = header.offsetHeight;
    document.documentElement.style.setProperty(
      "--header-height",
      `${headerHeight}px`
    );
    console.log("Header height updated:", headerHeight + "px");
  }
}

// Бургер-меню
function initBurgerMenu() {
  const burger = document.getElementById("burger");
  const nav = document.querySelector(".nav");

  if (burger && nav) {
    burger.addEventListener("click", function () {
      this.classList.toggle("active");
      nav.classList.toggle("active");
      console.log("Бургер-меню переключено");
    });
  }
}

// Кнопка "Услуги"
function initServicesButton() {
  const servicesBtn = document.getElementById("servicesBtn");
  const servicesPopup = document.getElementById("servicesPopup");

  if (!servicesBtn || !servicesPopup) {
    console.log("Services button or popup not found");
    return;
  }

  let isPopupOpen = false;

  // Функция открытия меню
  function openPopup() {
    isPopupOpen = true;
    servicesPopup.classList.add("active");
    servicesBtn.classList.add("active");
    overlayManager.show("servicesPopup"); // Используем менеджер
    document.body.classList.add("menu-open"); // Блокируем прокрутку
    console.log("Services popup opened");
  }

  // Функция закрытия меню
  function closePopup() {
    isPopupOpen = false;
    servicesPopup.classList.remove("active");
    servicesBtn.classList.remove("active");
    overlayManager.hide("servicesPopup"); // Используем менеджер
    document.body.classList.remove("menu-open"); // Разблокируем прокрутку
    console.log("Services popup closed");
  }

  // Функция toggle (переключение)
  function togglePopup() {
    if (isPopupOpen) {
      closePopup();
    } else {
      openPopup();
    }
  }

  // Клик по кнопке переключает меню
  servicesBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    togglePopup();
  });

  // Клик по оверлею закрывает меню
  if (overlayManager.overlay) {
    overlayManager.overlay.addEventListener("click", closePopup);
  }

  // Клик вне меню закрывает его
  document.addEventListener("click", (e) => {
    if (
      isPopupOpen &&
      !servicesPopup.contains(e.target) &&
      !servicesBtn.contains(e.target)
    ) {
      closePopup();
    }
  });

  // Закрытие по Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && isPopupOpen) {
      closePopup();
    }
  });

  // Инициализация переключения категорий
  initServicesPopupCategories();
}

// Выпадающее меню "О компании"
function initAboutDropdown() {
  const navItem = document.querySelector(".nav__item--has-dropdown");
  const dropdown = document.getElementById("aboutDropdown");

  if (!navItem || !dropdown) {
    console.log("About dropdown elements not found");
    return;
  }

  let hideTimeout = null;

  // Функция для показа меню
  function showDropdown() {
    if (hideTimeout) {
      clearTimeout(hideTimeout);
      hideTimeout = null;
    }
    dropdown.classList.add("active");
    navItem.classList.add("active"); // ✅ Добавляем класс для анимации иконки
    overlayManager.show("aboutDropdown"); // Используем менеджер
  }

  // Функция для скрытия меню с задержкой
  function hideDropdown() {
    hideTimeout = setTimeout(() => {
      dropdown.classList.remove("active");
      navItem.classList.remove("active"); // ✅ Убираем класс для анимации иконки
      overlayManager.hide("aboutDropdown"); // Используем менеджер
    }, 150);
  }

  // Наведение на элемент навигации
  navItem.addEventListener("mouseenter", showDropdown);

  // Уход с элемента навигации
  navItem.addEventListener("mouseleave", hideDropdown);

  // Наведение на само меню (отменяет скрытие)
  dropdown.addEventListener("mouseenter", () => {
    if (hideTimeout) {
      clearTimeout(hideTimeout);
      hideTimeout = null;
    }
  });

  // Уход с меню
  dropdown.addEventListener("mouseleave", hideDropdown);

  console.log("About dropdown initialized");
}

// Кнопка "Заказать звонок"
function initCallButton() {
  const callBtn = document.getElementById("callBtn");
  const modal = document.getElementById("callModal");
  const modalOverlay = document.getElementById("modalOverlay");
  const modalClose = document.getElementById("modalClose");

  if (!callBtn || !modal || !modalOverlay) {
    console.log("Call button or modal elements not found");
    return;
  }

  let isModalOpen = false;

  // Функция открытия модального окна
  function openModal() {
    isModalOpen = true;
    modal.classList.add("open");
    modalOverlay.classList.add("open");
    overlayManager.show("callModal"); // Регистрируем в менеджере overlay
    document.body.classList.add("modal-open"); // Блокируем прокрутку
    console.log("Call modal opened");
  }

  // Функция закрытия модального окна
  function closeModal() {
    isModalOpen = false;
    modal.classList.remove("open");
    modalOverlay.classList.remove("open");
    overlayManager.hide("callModal"); // Удаляем из менеджера overlay
    document.body.classList.remove("modal-open"); // Разблокируем прокрутку

    // Возвращаем форму и скрываем сообщение об успехе
    const formContent = document.querySelector(".quick-response__content");
    const successContent = document.querySelector(".modal-success");

    if (formContent && successContent) {
      formContent.style.display = "block";
      successContent.style.display = "none";
    }

    console.log("Call modal closed");
  }

  // Открытие по клику на кнопку
  callBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    openModal();
  });

  // Закрытие по клику на кнопку закрытия
  if (modalClose) {
    modalClose.addEventListener("click", (e) => {
      e.stopPropagation();
      closeModal();
    });
  }

  // Закрытие по клику на overlay
  modalOverlay.addEventListener("click", closeModal);

  // Закрытие по Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && isModalOpen) {
      closeModal();
    }
  });

  // Предотвращаем закрытие при клике внутри модального окна
  modal.addEventListener("click", (e) => {
    if (e.target === modal) {
      // Клик был по backdrop внутри modal (не по container)
      closeModal();
    }
  });

  const modalContainer = modal.querySelector(".modal-popup__container");
  if (modalContainer) {
    modalContainer.addEventListener("click", (e) => {
      e.stopPropagation(); // Останавливаем всплытие, чтобы не закрывалось при клике внутри
    });
  }

  // Инициализация формы модального окна
  initCallModalForm();

  console.log("Call button and modal initialized");
}

// Плавная прокрутка к секциям
function initSmoothScroll() {
  const links = document.querySelectorAll('a[href^="#"]');

  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      const targetId = this.getAttribute("href");

      // Проверяем, что это не просто #
      if (targetId === "#") return;

      e.preventDefault();

      const targetSection = document.querySelector(targetId);

      if (targetSection) {
        // Учитываем высоту фиксированной шапки
        const headerHeight = 100;
        const targetPosition = targetSection.offsetTop - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });

        // Закрываем мобильное меню, если открыто
        const nav = document.querySelector(".nav");
        const burger = document.getElementById("burger");
        if (nav && burger) {
          nav.classList.remove("active");
          burger.classList.remove("active");
        }

        console.log("Прокрутка к секции:", targetId);
      }
    });
  });
}

// Кнопка в главном баннере
function initHeroButton() {
  const heroBtn = document.getElementById("heroBtn");

  if (heroBtn) {
    heroBtn.addEventListener("click", function () {
      console.log("Кнопка главного баннера нажата");

      // Например, прокрутка к форме контактов
      const contactsSection = document.getElementById("contacts");
      if (contactsSection) {
        contactsSection.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }

      // Или показать модальное окно
      // showModal();
    });
  }
}

// Обработка формы контактов
function initContactForm() {
  const contactForm = document.getElementById("contactForm");

  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();

      // Получаем данные формы
      const formData = new FormData(this);
      const data = {};

      // Собираем данные из инпутов
      const inputs = this.querySelectorAll("input, textarea");
      inputs.forEach((input) => {
        if (input.type !== "submit") {
          data[input.placeholder] = input.value;
        }
      });

      console.log("Форма отправлена с данными:", data);

      // Здесь можно добавить отправку данных на сервер
      // fetch('/api/contact', {
      //     method: 'POST',
      //     headers: {
      //         'Content-Type': 'application/json',
      //     },
      //     body: JSON.stringify(data)
      // })

      // Показываем сообщение об успехе
      alert("Спасибо! Ваше сообщение отправлено.");

      // Очищаем форму
      this.reset();
    });
  }
}

// Обработка формы Quick Response с валидацией
/**
 * 📝 Инициализация формы Quick Response в секции (НЕ модальное окно!)
 * Модальное окно инициализируется отдельно в initCallModal()
 */
function initQuickResponseForm() {
  // Выбираем форму именно в секции, а не в модальном окне
  const section = document.querySelector(".section--quick-response");
  if (!section) {
    console.warn("Секция .section--quick-response не найдена");
    return;
  }

  const form = section.querySelector(".quick-response__form");
  if (!form) {
    console.warn("Форма в секции .section--quick-response не найдена");
    return;
  }

  const fields = form.querySelectorAll(".quick-response__field");
  const submitBtn = form.querySelector(".btn[type='submit']"); // Исправлен селектор кнопки

  // Объект для отслеживания состояния полей
  const fieldStates = {};

  fields.forEach((field, index) => {
    const input = field.querySelector(".quick-response__input");
    const errorText = field.querySelector(".quick-response__error");

    if (!input || !errorText) return;

    const fieldId = `field_${index}`;
    fieldStates[fieldId] = {
      touched: false,
      valid: false,
      empty: true,
    };

    // Обработка ввода
    input.addEventListener("input", function () {
      const value = this.value.trim();
      fieldStates[fieldId].empty = !value;

      if (value) {
        this.classList.add("active");
        fieldStates[fieldId].touched = true;
        const isValid = validateInput(this, field, errorText, true);
        fieldStates[fieldId].valid = isValid;
      } else {
        this.classList.remove("active");
        // Если поле пустое и пользователь его трогал - показываем ошибку
        if (fieldStates[fieldId].touched) {
          this.classList.add("error");
          field.classList.add("has-error");
          errorText.textContent = "Поле обязательно для заполнения";
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
    input.addEventListener("blur", function () {
      const value = this.value.trim();

      if (!value) {
        // Если поле пустое при потере фокуса - показываем ошибку
        if (fieldStates[fieldId].touched) {
          this.classList.add("error");
          field.classList.add("has-error");
          errorText.textContent = "Поле обязательно для заполнения";
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
    input.addEventListener("focus", function () {
      // Убираем ошибки только при фокусе, но не сообщения об успехе
      if (
        field.classList.contains("has-error") ||
        field.classList.contains("has-warning")
      ) {
        this.classList.remove("error", "warning");
        field.classList.remove("has-error", "has-warning");
      }
    });
  });

  // Функция обновления состояния кнопки
  function updateSubmitButton() {
    // Проверяем: все ли поля валидны и заполнены
    const allValid = Object.values(fieldStates).every(
      (state) => state.valid && !state.empty
    );

    if (submitBtn) {
      submitBtn.disabled = !allValid;
    }
  }

  // Функция очистки ошибок поля
  function clearFieldErrors(input, field) {
    input.classList.remove("error", "warning", "active");
    field.classList.remove("has-error", "has-warning");
  }

  // Инициализация - кнопка disabled по умолчанию
  updateSubmitButton();

  // Валидация формы при отправке
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    let isValid = true;

    fields.forEach((field, index) => {
      const input = field.querySelector(".quick-response__input");
      const errorText = field.querySelector(".quick-response__error");
      const fieldId = `field_${index}`;

      fieldStates[fieldId].touched = true;

      if (!validateInput(input, field, errorText, false)) {
        isValid = false;
        fieldStates[fieldId].valid = false;
      }
    });

    if (isValid) {
      console.log("Форма Quick Response отправлена");
      alert(
        "Спасибо! Ваш запрос принят. Мы свяжемся с вами в течение 15 минут."
      );

      // Сброс формы
      form.reset();

      // Сброс всех состояний
      fields.forEach((field, index) => {
        const input = field.querySelector(".quick-response__input");
        const fieldId = `field_${index}`;

        input.classList.remove("active", "error", "warning");
        field.classList.remove("has-error", "has-warning");

        fieldStates[fieldId] = {
          touched: false,
          valid: false,
          empty: true,
        };
      });

      updateSubmitButton();
    }
  });
}

/**
 * 🔐 Жёсткая валидация полей формы с защитой от всех возможных случаев
 * @param {HTMLInputElement} input - Поле ввода
 * @param {HTMLElement} field - Родительский контейнер поля
 * @param {HTMLElement} errorText - Элемент для вывода ошибки
 * @param {boolean} isTyping - Флаг процесса ввода (true = в процессе, false = потеря фокуса)
 * @returns {boolean} - Валидность поля
 */
function validateInput(input, field, errorText, isTyping) {
  const value = input.value.trim();
  const type = input.type;

  // Очищаем предыдущие состояния
  input.classList.remove("error", "warning");
  field.classList.remove("has-error", "has-warning");

  // Пустое поле - не валидно
  if (!value) {
    return false;
  }

  // ==================== ВАЛИДАЦИЯ ИМЕНИ ====================
  if (type === "text") {
    return validateName(value, input, field, errorText);
  }

  // ==================== ВАЛИДАЦИЯ ТЕЛЕФОНА ====================
  if (type === "tel") {
    return validatePhone(value, input, field, errorText, isTyping);
  }

  return true;
}

/**
 * 📝 Строгая валидация имени пользователя
 */
function validateName(value, input, field, errorText) {
  // 1. Защита от XSS - проверка на опасные символы
  if (/<|>|&lt;|&gt;|script|javascript|onerror|onclick/i.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя содержит недопустимые символы";
    return false;
  }

  // 2. Минимальная длина
  if (value.length < 2) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя должно содержать минимум 2 символа";
    return false;
  }

  // 3. Максимальная длина
  if (value.length > 50) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя не может быть длиннее 50 символов";
    return false;
  }

  // 4. Только буквы (кириллица/латиница), пробелы и дефисы
  if (!/^[а-яА-ЯёЁa-zA-Z\s-]+$/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent =
      "Имя может содержать только буквы, пробелы и дефисы";
    return false;
  }

  // 5. Запрет цифр
  if (/\d/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя не может содержать цифры";
    return false;
  }

  // 6. Запрет спецсимволов (кроме дефиса)
  if (/[!@#$%^&*()_+=\[\]{}|\\:;"'<>,.?/~`№]/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя содержит недопустимые спецсимволы";
    return false;
  }

  // 7. Запрет множественных пробелов подряд
  if (/\s{2,}/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя не может содержать множественные пробелы";
    return false;
  }

  // 8. Запрет множественных дефисов подряд
  if (/-{2,}/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя не может содержать множественные дефисы";
    return false;
  }

  // 9. Запрет начала/конца с пробела или дефиса
  if (/^[\s-]|[\s-]$/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent =
      "Имя не может начинаться или заканчиваться пробелом/дефисом";
    return false;
  }

  // 10. Запрет только одной буквы с дефисом (например: "А-")
  if (/^[а-яА-ЯёЁa-zA-Z]-?$/.test(value)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Имя слишком короткое";
    return false;
  }

  // ✅ Все проверки пройдены
  field.classList.remove("has-error", "has-warning");
  return true;
}

/**
 * 📞 Строгая валидация российского номера телефона
 */
function validatePhone(value, input, field, errorText, isTyping) {
  // Убираем все нецифровые символы
  const phoneDigits = value.replace(/\D/g, "");

  // 1. Пустой номер
  if (phoneDigits.length === 0) {
    return false;
  }

  // 2. Длина номера должна быть ровно 11 цифр
  if (phoneDigits.length < 11) {
    if (isTyping) {
      // При вводе не показываем ошибку
      return false;
    } else {
      input.classList.add("warning");
      field.classList.add("has-warning");
      errorText.textContent = "Неполный номер телефона";
      return false;
    }
  }

  if (phoneDigits.length > 11) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Номер телефона слишком длинный";
    return false;
  }

  // 3. Номер должен начинаться с +7 или 8
  if (!phoneDigits.startsWith("7") && !phoneDigits.startsWith("8")) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Номер должен начинаться с +7 или 8";
    return false;
  }

  // 4. Проверка кода оператора (второй, третий, четвёртый символы после 7/8)
  // Российские мобильные коды: 9XX (900-999)
  const operatorCode = phoneDigits.substring(1, 4);

  // Код оператора должен начинаться с 9
  if (!operatorCode.startsWith("9")) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent =
      "Некорректный код оператора (должен начинаться с 9)";
    return false;
  }

  // 5. Запрет на полностью одинаковые цифры (например: 77777777777)
  const uniqueDigits = new Set(phoneDigits).size;
  if (uniqueDigits === 1) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Номер телефона выглядит нереалистично";
    return false;
  }

  // 6. Запрет на подозрительные паттерны (типа 79111111111)
  // Проверяем основную часть номера (7 последних цифр)
  const mainPart = phoneDigits.substring(4);
  const uniqueInMain = new Set(mainPart).size;

  if (uniqueInMain === 1) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent = "Номер телефона выглядит нереалистично";
    return false;
  }

  // 7. Запрет на последовательные одинаковые цифры (более 4 подряд)
  if (/(\d)\1{4,}/.test(phoneDigits)) {
    input.classList.add("error");
    field.classList.add("has-error");
    errorText.textContent =
      "Номер содержит слишком много повторяющихся цифр подряд";
    return false;
  }

  // 8. Запрет на простые последовательности (123456, 987654)
  const sequences = [
    "012345",
    "123456",
    "234567",
    "345678",
    "456789",
    "567890",
    "098765",
    "987654",
    "876543",
    "765432",
    "654321",
    "543210",
  ];
  for (let seq of sequences) {
    if (phoneDigits.includes(seq)) {
      input.classList.add("error");
      field.classList.add("has-error");
      errorText.textContent = "Номер телефона выглядит нереалистично";
      return false;
    }
  }

  // ✅ Все проверки пройдены
  field.classList.remove("has-error", "has-warning");
  return true;
}

// Инициализация формы модального окна (переиспользуем логику валидации)
function initCallModalForm() {
  const form = document.getElementById("callModalForm");

  if (!form) {
    console.log("Call modal form not found");
    return;
  }

  const fields = form.querySelectorAll(".quick-response__field");
  const submitBtn = form.querySelector(".btn");

  // Объект для отслеживания состояния полей
  const fieldStates = {};

  fields.forEach((field, index) => {
    const input = field.querySelector(".quick-response__input");
    const errorText = field.querySelector(".quick-response__error");

    if (!input || !errorText) return;

    const fieldId = `modal_field_${index}`;
    fieldStates[fieldId] = {
      touched: false,
      valid: false,
      empty: true,
    };

    // Обработка ввода
    input.addEventListener("input", function () {
      const value = this.value.trim();
      fieldStates[fieldId].empty = !value;

      if (value) {
        this.classList.add("active");
        fieldStates[fieldId].touched = true;
        const isValid = validateInput(this, field, errorText, true);
        fieldStates[fieldId].valid = isValid;
      } else {
        this.classList.remove("active");
        if (fieldStates[fieldId].touched) {
          this.classList.add("error");
          field.classList.add("has-error");
          errorText.textContent = "Поле обязательно для заполнения";
          fieldStates[fieldId].valid = false;
        } else {
          clearFieldErrors(this, field);
          fieldStates[fieldId].valid = false;
        }
      }

      updateSubmitButton();
    });

    // Обработка потери фокуса
    input.addEventListener("blur", function () {
      const value = this.value.trim();

      if (!value) {
        if (fieldStates[fieldId].touched) {
          this.classList.add("error");
          field.classList.add("has-error");
          errorText.textContent = "Поле обязательно для заполнения";
          fieldStates[fieldId].valid = false;
        }
      } else {
        fieldStates[fieldId].touched = true;
        const isValid = validateInput(this, field, errorText, false);
        fieldStates[fieldId].valid = isValid;
      }

      updateSubmitButton();
    });

    // Обработка получения фокуса
    input.addEventListener("focus", function () {
      if (
        field.classList.contains("has-error") ||
        field.classList.contains("has-warning")
      ) {
        this.classList.remove("error", "warning");
        field.classList.remove("has-error", "has-warning");
      }
    });
  });

  // Функция обновления состояния кнопки
  function updateSubmitButton() {
    const allValid = Object.values(fieldStates).every(
      (state) => state.valid && !state.empty
    );

    if (submitBtn) {
      submitBtn.disabled = !allValid;
    }
  }

  // Функция очистки ошибок поля
  function clearFieldErrors(input, field) {
    input.classList.remove("error", "warning", "active");
    field.classList.remove("has-error", "has-warning");
  }

  // Инициализация - кнопка disabled по умолчанию
  updateSubmitButton();

  // Валидация формы при отправке
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    let isValid = true;

    fields.forEach((field, index) => {
      const input = field.querySelector(".quick-response__input");
      const errorText = field.querySelector(".quick-response__error");
      const fieldId = `modal_field_${index}`;

      fieldStates[fieldId].touched = true;

      if (!validateInput(input, field, errorText, false)) {
        isValid = false;
        fieldStates[fieldId].valid = false;
      }
    });

    if (isValid) {
      console.log("Форма модального окна отправлена");

      // Скрываем форму и показываем сообщение об успехе
      const formContent = document.querySelector(".quick-response__content");
      const successContent = document.querySelector(".modal-success");

      if (formContent && successContent) {
        formContent.style.display = "none";
        successContent.style.display = "flex";
      }

      // Сброс формы
      form.reset();

      // Сброс всех состояний
      fields.forEach((field, index) => {
        const input = field.querySelector(".quick-response__input");
        const fieldId = `modal_field_${index}`;

        input.classList.remove("active", "error", "warning");
        field.classList.remove("has-error", "has-warning");

        fieldStates[fieldId] = {
          touched: false,
          valid: false,
          empty: true,
        };
      });

      updateSubmitButton();
    }
  });

  console.log("Call modal form initialized");
}

// Интерактивность для элементов портфолио
function initPortfolioItems() {
  const portfolioItems = document.querySelectorAll(".portfolio-item");

  portfolioItems.forEach((item) => {
    item.addEventListener("click", function () {
      const title = this.querySelector("h4").textContent;
      console.log("Клик по проекту:", title);

      // Здесь можно открыть модальное окно с деталями проекта
      // showProjectModal(title);

      // Или перейти на страницу проекта
      // window.location.href = '/project/' + title;
    });
  });
}

// Инициализация FAQ аккордеона
/**
 * 🎯 Инициализация FAQ аккордеона
 * Поддерживает клик как по всей карточке, так и по кнопке внутри
 */
function initFAQ() {
  const faqCards = document.querySelectorAll(".faq__card");

  faqCards.forEach((card) => {
    const toggleBtn = card.querySelector(".faq__toggle-btn");
    const answer = card.querySelector(".faq__answer");
    const icon = toggleBtn ? toggleBtn.querySelector("img") : null;

    if (!answer || !icon || !toggleBtn) return;

    /**
     * Функция переключения состояния карточки
     */
    function toggleCard() {
      const isActive = card.classList.contains("active");

      if (isActive) {
        card.classList.remove("active");
        icon.src = "assets/img/icons/plus.svg";
        icon.alt = "Показать ответ";
      } else {
        card.classList.add("active");
        icon.src = "assets/img/icons/minus.svg";
        icon.alt = "Скрыть ответ";
      }

      console.log("FAQ карточка переключена");
    }

    // ✅ Клик по кнопке
    toggleBtn.addEventListener("click", (e) => {
      e.stopPropagation(); // Предотвращаем всплытие к card
      toggleCard();
    });

    // ✅ Клик по всей карточке (но не по кнопке, чтобы избежать двойного срабатывания)
    card.addEventListener("click", (e) => {
      // Если клик был непосредственно по кнопке или её содержимому - игнорируем
      if (e.target.closest(".faq__toggle-btn")) {
        return;
      }
      toggleCard();
    });

    // Добавляем курсор pointer
    card.style.cursor = "pointer";
    toggleBtn.style.cursor = "pointer";
  });
}

// Инициализация карусели услуг
function initServicesCarousel() {
  const track = document.getElementById("servicesTrack");
  const prevBtn = document.getElementById("servicesPrev");
  const nextBtn = document.getElementById("servicesNext");

  if (!track || !prevBtn || !nextBtn) return;

  const cards = track.querySelectorAll(".services-final__card");
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
    const cardWidth = track.querySelector(".services-final__card").offsetWidth;
    const gap = 20;
    const offset = -(currentIndex * (cardWidth + gap));
    track.style.transform = `translateX(${offset}px)`;

    // Обновляем состояние кнопок
    prevBtn.disabled = currentIndex === 0;
    nextBtn.disabled = currentIndex >= cards.length - cardsPerView;
  }

  prevBtn.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  });

  nextBtn.addEventListener("click", () => {
    if (currentIndex < cards.length - cardsPerView) {
      currentIndex++;
      updateCarousel();
    }
  });

  // Обновляем при изменении размера окна
  window.addEventListener(
    "resize",
    debounce(() => {
      updateCardsPerView();
    }, 250)
  );

  // Инициализация
  updateCardsPerView();

  console.log("Карусель услуг инициализирована");
}

// Инициализация карусели Track Group
function initTrackGroupCarousel() {
  // Используем универсальную систему карусели
  initUniversalCarousel({
    prevBtnId: "trackGroupPrev",
    nextBtnId: "trackGroupNext",
    gridSelector: ".track-group__cards",
    cardSelector: ".track-group__card",
    desktopCardsPerView: 1, // Всегда показываем только 1 карточку
    name: "Track Group",
  });

  // Обновляем счетчик навигации (1/3, 2/3, и т.д.)
  const navCurrent = document.querySelector(".track-group__nav-current");
  const navTotal = document.querySelector(".track-group__nav-total");
  const grid = document.querySelector(".track-group__cards");
  const cards = document.querySelectorAll(".track-group__card");

  if (navTotal && cards.length > 0) {
    navTotal.textContent = cards.length;
  }

  if (grid && navCurrent) {
    /**
     * Функция для подсчета текущего индекса
     * Работает как для Desktop (transform), так и для Mobile (scrollLeft)
     */
    const updateCounter = () => {
      if (!grid || cards.length === 0) return;

      const gridStyle = getComputedStyle(grid);
      const isMobileMode =
        gridStyle.overflowX === "auto" || gridStyle.overflowX === "scroll";

      let currentIndex = 0;

      if (isMobileMode) {
        // Mobile: считаем индекс по scrollLeft
        const firstCard = cards[0];
        if (!firstCard) return;

        const cardWidth = firstCard.offsetWidth;
        const gap = 20; // Стандартный gap для мобилки
        const itemWidth = cardWidth + gap;

        // Вычисляем индекс с учетом половины ширины карточки для правильного округления
        currentIndex = Math.round(grid.scrollLeft / itemWidth);

        // Ограничиваем индекс максимальным значением
        currentIndex = Math.min(currentIndex, cards.length - 1);
      } else {
        // Desktop: считаем индекс по transform
        const firstCard = cards[0];
        if (!firstCard) return;

        const transform = firstCard.style.transform;
        if (transform) {
          // Извлекаем значение translateX из transform
          const match = transform.match(/translateX\((-?\d+(?:\.\d+)?)px\)/);
          if (match) {
            const offset = parseFloat(match[1]);
            const cardWidth = firstCard.offsetWidth;
            currentIndex = Math.round(Math.abs(offset) / cardWidth);
          }
        }
      }

      navCurrent.textContent = currentIndex + 1;
    };

    // Обновляем счетчик при клике на кнопки
    const prevBtn = document.getElementById("trackGroupPrev");
    const nextBtn = document.getElementById("trackGroupNext");

    if (prevBtn) {
      prevBtn.addEventListener("click", () => {
        setTimeout(updateCounter, 50);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", () => {
        setTimeout(updateCounter, 50);
      });
    }

    // Для мобильной версии добавляем слушатель на scroll событие
    // (так как scrollBy не вызывает transitionend)
    if (grid) {
      let scrollTimeout;
      grid.addEventListener("scroll", () => {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(updateCounter, 50);
      });
    }

    // Начальное обновление
    updateCounter();

    console.log("Track Group carousel counter initialized");
  }
}

// Дополнительные функции, которые можно использовать

// Показать/скрыть элемент
function toggleElement(element) {
  if (element) {
    element.style.display = element.style.display === "none" ? "block" : "none";
  }
}

// Анимация появления элементов при скролле
function initScrollAnimation() {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -100px 0px",
  };

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        console.log("Элемент появился на экране");
      }
    });
  }, observerOptions);

  const animatedElements = document.querySelectorAll(
    ".service-card, .portfolio-item"
  );
  animatedElements.forEach((el) => observer.observe(el));
}

// Модальное окно (пример функции)
function showModal(content) {
  console.log("Показать модальное окно:", content);
  // Здесь можно добавить логику для показа модального окна
}

// Закрытие модального окна
function closeModal() {
  console.log("Закрыть модальное окно");
  // Здесь можно добавить логику для закрытия модального окна
}

// Валидация формы
function validateForm(formElement) {
  const inputs = formElement.querySelectorAll(
    "input[required], textarea[required]"
  );
  let isValid = true;

  inputs.forEach((input) => {
    if (!input.value.trim()) {
      isValid = false;
      input.classList.add("error");
    } else {
      input.classList.remove("error");
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
window.addEventListener(
  "resize",
  debounce(function () {
    console.log("Размер окна изменен");
    // Здесь можно добавить логику при изменении размера окна
  }, 250)
);

// ========================================
//    УНИВЕРСАЛЬНАЯ УМНАЯ КАРУСЕЛЬ
//    Автоматически определяет режим работы:
//    - Desktop: transform + индекс карточек
//    - Mobile: нативный scroll + scrollLeft
// ========================================

function initUniversalCarousel(config) {
  const {
    prevBtnId,
    nextBtnId,
    gridSelector,
    cardSelector,
    desktopCardsPerView = 4,
    infiniteLoop = false, // Бесконечная прокрутка (только для Mobile)
    name = "carousel",
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
  let isMobileMode = false;
  let isDesktopInteractive = true; // Флаг: можно ли управлять каруселью на desktop
  let scrollHandler = null;
  let isInfiniteScrolling = false; // Флаг для предотвращения множественных срабатываний

  /**
   * Настройка бесконечной прокрутки (клонирование карточек для мобилки)
   */
  function setupInfiniteLoop() {
    if (!infiniteLoop || !isMobileMode) return;

    // Клонируем первые и последние карточки
    const clonesToAdd = 3; // Количество клонов с каждой стороны
    const originalCards = Array.from(cards);

    // Клонируем последние карточки в начало
    for (
      let i = originalCards.length - clonesToAdd;
      i < originalCards.length;
      i++
    ) {
      const clone = originalCards[i].cloneNode(true);
      clone.classList.add("clone-start");
      grid.insertBefore(clone, grid.firstChild);
    }

    // Клонируем первые карточки в конец
    for (let i = 0; i < clonesToAdd; i++) {
      const clone = originalCards[i].cloneNode(true);
      clone.classList.add("clone-end");
      grid.appendChild(clone);
    }

    // Устанавливаем начальную позицию (после клонов в начале)
    const cardWidth = originalCards[0].offsetWidth;
    const gap = 20;
    grid.scrollLeft = clonesToAdd * (cardWidth + gap);
  }

  /**
   * Удаление клонов при переходе в desktop режим
   */
  function removeInfiniteLoop() {
    const clones = grid.querySelectorAll(".clone-start, .clone-end");
    clones.forEach((clone) => clone.remove());
    grid.scrollLeft = 0;
  }

  /**
   * Обработчик для бесконечной прокрутки
   */
  function handleInfiniteScroll() {
    if (!infiniteLoop || !isMobileMode || isInfiniteScrolling) return;

    const scrollLeft = grid.scrollLeft;
    const scrollWidth = grid.scrollWidth;
    const clientWidth = grid.clientWidth;
    const cardWidth = cards[0].offsetWidth;
    const gap = 20;
    const clonesToAdd = 3;
    const threshold = cardWidth / 2;

    // Прокрутили в начало (видим клоны слева)
    if (scrollLeft < threshold) {
      isInfiniteScrolling = true;
      const originalStart = clonesToAdd * (cardWidth + gap);
      grid.scrollLeft = originalStart + scrollLeft;
      setTimeout(() => {
        isInfiniteScrolling = false;
      }, 50);
    }
    // Прокрутили в конец (видим клоны справа)
    else if (scrollLeft + clientWidth > scrollWidth - threshold) {
      isInfiniteScrolling = true;
      const originalStart = clonesToAdd * (cardWidth + gap);
      const offset = scrollLeft + clientWidth - scrollWidth;
      grid.scrollLeft = originalStart + offset;
      setTimeout(() => {
        isInfiniteScrolling = false;
      }, 50);
    }
  }

  /**
   * Определяет режим работы карусели на основе CSS
   * Mobile: overflow-x: auto
   * Desktop: grid или другой layout (или CSS animation для clients)
   */
  function detectMode() {
    const gridStyle = getComputedStyle(grid);
    const hasOverflowScroll =
      gridStyle.overflowX === "auto" || gridStyle.overflowX === "scroll";

    const previousMode = isMobileMode;
    isMobileMode = hasOverflowScroll;

    // Проверяем интерактивность десктопа (нет animation/column-count)
    if (!isMobileMode) {
      // animation возвращает полную строку типа "none 0s ease..." или "40s linear ... clientsScroll"
      // Проверяем, что анимация НЕ начинается с "none" (то есть реально задана)
      const hasAnimation =
        gridStyle.animation && !gridStyle.animation.startsWith("none");
      const hasColumnCount =
        gridStyle.columnCount !== "auto" && gridStyle.columnCount !== "1";
      isDesktopInteractive = !hasAnimation && !hasColumnCount;
    } else {
      // На мобилке всегда интерактивно
      isDesktopInteractive = true;
    }

    // Если режим изменился, нужно сбросить стили
    if (previousMode !== isMobileMode) {
      if (isMobileMode) {
        // Переход в мобильный режим - убираем transform и animation
        cards.forEach((card) => {
          card.style.transform = "";
          card.style.transition = "";
        });
        // Останавливаем CSS animation (для clients)
        grid.style.animation = "none";
        currentIndex = 0;

        // Убираем градиенты на мобилке
        grid.classList.remove("show-left-gradient", "show-right-gradient");

        // Настраиваем бесконечную прокрутку для мобилки
        setupInfiniteLoop();
      } else {
        // Переход в десктоп режим - сбрасываем scroll
        removeInfiniteLoop();
        grid.scrollLeft = 0;
        currentIndex = 0;

        // Убираем inline стиль animation, чтобы вернулась CSS animation
        grid.style.animation = "";
      }

      // Обновляем состояние кнопок и градиентов
      updateButtonStates();
    }

    return isMobileMode;
  }

  /**
   * Desktop режим: использует transform для прокрутки
   * Для неинтерактивных каруселей (animation/column-count) только обновляет кнопки
   */
  function updateDesktopCarousel() {
    // Если десктоп не интерактивен (есть CSS animation или column-count)
    if (!isDesktopInteractive) {
      // Просто обновляем кнопки (они скрыты через CSS display: none)
      updateButtonStates();
      return;
    }

    // Стандартная логика с transform для интерактивных каруселей
    const cardWidth = cards[0].offsetWidth;
    const gridComputedStyle = getComputedStyle(grid);
    const gap =
      parseFloat(gridComputedStyle.gap) ||
      parseFloat(gridComputedStyle.columnGap) ||
      0;
    const offset = -(currentIndex * (cardWidth + gap));

    cards.forEach((card) => {
      card.style.transform = `translateX(${offset}px)`;
      card.style.transition = "transform 0.5s cubic-bezier(0.4, 0, 0.2, 1)";
    });

    updateButtonStates();
  }

  /**
   * Mobile режим: использует нативный scrollLeft
   */
  function updateMobileCarousel() {
    updateButtonStates();
  }

  /**
   * Обновление состояния кнопок (универсально для обоих режимов)
   */
  function updateButtonStates() {
    let isAtStart, isAtEnd;

    if (isMobileMode) {
      // Для бесконечной прокрутки кнопки всегда активны
      if (infiniteLoop) {
        isAtStart = false;
        isAtEnd = false;
      } else {
        // Mobile: проверяем scrollLeft
        isAtStart = grid.scrollLeft <= 1;
        isAtEnd = grid.scrollLeft >= grid.scrollWidth - grid.clientWidth - 1;
      }
    } else {
      // Desktop: проверяем индекс
      isAtStart = currentIndex === 0;
      isAtEnd = currentIndex >= totalCards - desktopCardsPerView;
    }

    prevBtn.disabled = isAtStart;
    nextBtn.disabled = isAtEnd;

    prevBtn.style.opacity = isAtStart ? "0.3" : "1";
    nextBtn.style.opacity = isAtEnd ? "0.3" : "1";

    prevBtn.style.cursor = isAtStart ? "not-allowed" : "pointer";
    nextBtn.style.cursor = isAtEnd ? "not-allowed" : "pointer";

    // Обновляем градиенты
    updateGradients(isAtStart, isAtEnd);
  }

  /**
   * Управление градиентами по бокам карусели (только Desktop + Interactive)
   * @param {boolean} isAtStart - находимся ли в начале
   * @param {boolean} isAtEnd - находимся ли в конце
   */
  function updateGradients(isAtStart, isAtEnd) {
    // Градиенты только для Desktop интерактивных каруселей
    if (isMobileMode || !isDesktopInteractive) {
      grid.classList.remove("show-left-gradient", "show-right-gradient");
      return;
    }

    // Левый градиент: показываем, если НЕ в начале
    if (isAtStart) {
      grid.classList.remove("show-left-gradient");
    } else {
      grid.classList.add("show-left-gradient");
    }

    // Правый градиент: показываем, если НЕ в конце
    if (isAtEnd) {
      grid.classList.remove("show-right-gradient");
    } else {
      grid.classList.add("show-right-gradient");
    }
  }

  /**
   * Обработчик кнопки "Назад"
   */
  function handlePrev() {
    if (isMobileMode) {
      // Mobile: прокручиваем на одну карточку влево
      const cardWidth = cards[0].offsetWidth;
      const gap = 20; // стандартный gap для мобилки
      const scrollDistance = cardWidth + gap;

      grid.scrollBy({
        left: -scrollDistance,
        behavior: "smooth",
      });

      // Обновляем состояние кнопок после анимации
      setTimeout(updateButtonStates, 300);
    } else {
      // Desktop: проверяем, интерактивна ли карусель
      if (!isDesktopInteractive) {
        return;
      }

      // Desktop: уменьшаем индекс
      if (currentIndex > 0) {
        currentIndex--;
        updateDesktopCarousel();
      }
    }
  }

  /**
   * Обработчик кнопки "Вперёд"
   */
  function handleNext() {
    if (isMobileMode) {
      // Mobile: прокручиваем на одну карточку вправо
      const cardWidth = cards[0].offsetWidth;
      const gap = 20; // стандартный gap для мобилки
      const scrollDistance = cardWidth + gap;

      grid.scrollBy({
        left: scrollDistance,
        behavior: "smooth",
      });

      // Обновляем состояние кнопок после анимации
      setTimeout(updateButtonStates, 300);
    } else {
      // Desktop: проверяем, интерактивна ли карусель
      if (!isDesktopInteractive) {
        return;
      }

      // Desktop: увеличиваем индекс
      if (currentIndex < totalCards - desktopCardsPerView) {
        currentIndex++;
        updateDesktopCarousel();
      }
    }
  }

  /**
   * Инициализация карусели
   */
  function init() {
    // Определяем режим
    detectMode();

    // Настраиваем обработчики кнопок
    prevBtn.addEventListener("click", handlePrev);
    nextBtn.addEventListener("click", handleNext);

    // В мобильном режиме отслеживаем событие scroll
    if (isMobileMode) {
      scrollHandler = debounce(updateButtonStates, 100);
      grid.addEventListener("scroll", scrollHandler);

      // Добавляем обработчик бесконечной прокрутки
      if (infiniteLoop) {
        grid.addEventListener("scroll", handleInfiniteScroll);
        setupInfiniteLoop();
      }

      updateMobileCarousel();
    } else {
      updateDesktopCarousel();
    }

    // Обработчик изменения размера окна
    const resizeHandler = debounce(() => {
      const wasMobile = isMobileMode;
      detectMode();

      // Если режим изменился, переинициализируем
      if (wasMobile !== isMobileMode) {
        if (scrollHandler) {
          grid.removeEventListener("scroll", scrollHandler);
          scrollHandler = null;
        }

        // Удаляем обработчик бесконечной прокрутки если он был
        if (infiniteLoop) {
          grid.removeEventListener("scroll", handleInfiniteScroll);
        }

        if (isMobileMode) {
          scrollHandler = debounce(updateButtonStates, 100);
          grid.addEventListener("scroll", scrollHandler);

          // Добавляем обработчик бесконечной прокрутки
          if (infiniteLoop) {
            grid.addEventListener("scroll", handleInfiniteScroll);
          }

          updateMobileCarousel();
        } else {
          updateDesktopCarousel();
        }
      } else {
        // Режим не изменился, просто обновляем
        if (isMobileMode) {
          updateMobileCarousel();
        } else {
          // Проверяем корректность индекса для desktop
          if (
            currentIndex >= totalCards - desktopCardsPerView &&
            currentIndex > 0
          ) {
            currentIndex = Math.max(0, totalCards - desktopCardsPerView);
          }
          updateDesktopCarousel();
        }
      }
    }, 250);

    window.addEventListener("resize", resizeHandler);

    console.log(
      `${name}: карусель инициализирована (${totalCards} карточек, режим: ${
        isMobileMode ? "Mobile" : "Desktop"
      }, интерактивность: ${isDesktopInteractive})`
    );
  }

  // Запускаем инициализацию
  init();
}

// Старая функция для обратной совместимости (использует новую универсальную)
function initCarousel(config) {
  initUniversalCarousel({
    ...config,
    desktopCardsPerView: config.cardsPerView || 4,
  });
}

// Инициализация переключения категорий во всплывающем меню услуг
function initServicesPopupCategories() {
  const categories = document.querySelectorAll(
    ".services-popup__categories > h3"
  );
  const allLinks = document.querySelectorAll(".services-popup__link");
  const photos = document.querySelectorAll(".services-popup__photo");

  if (categories.length === 0 || allLinks.length === 0 || photos.length === 0) {
    console.log("Services popup elements not found");
    return;
  }

  categories.forEach((category) => {
    category.addEventListener("mouseenter", function () {
      const categoryType = this.dataset.category;

      // Убираем active класс у всех категорий
      categories.forEach((cat) => cat.classList.remove("active"));

      // Добавляем active класс к текущей категории
      this.classList.add("active");

      // Показываем/скрываем ссылки в зависимости от категории
      allLinks.forEach((link) => {
        const linkCategory = link.dataset.category;
        if (linkCategory === categoryType) {
          link.style.display = "flex";
          // Добавляем небольшую анимацию появления
          link.style.opacity = "0";
          setTimeout(() => {
            link.style.transition = "opacity 0.3s ease";
            link.style.opacity = "1";
          }, 10);
        } else {
          link.style.display = "none";
        }
      });

      // Переключаем фотографии
      photos.forEach((photo) => {
        if (photo.dataset.image === categoryType) {
          photo.classList.add("active");
        } else {
          photo.classList.remove("active");
        }
      });

      console.log(`Switched to category: ${categoryType}`);
    });
  });

  console.log("Services popup categories initialized");
}

// Инициализация карусели услуг
function initServicesCarousel() {
  initCarousel({
    prevBtnId: "servicesPrev",
    nextBtnId: "servicesNext",
    gridSelector: ".services__grid",
    cardSelector: ".services__card",
    cardsPerView: 4,
    name: "Services",
  });
}

// Инициализация карусели специальных предложений
function initSpecialOffersCarousel() {
  initCarousel({
    prevBtnId: "specialOffersPrev",
    nextBtnId: "specialOffersNext",
    gridSelector: ".special-offers__grid",
    cardSelector: ".special-offers__card",
    cardsPerView: 4,
    name: "Special Offers",
  });
}

// Инициализация карусели блога
function initBlogCarousel() {
  initCarousel({
    prevBtnId: "blogPrev",
    nextBtnId: "blogNext",
    gridSelector: ".blog__grid",
    cardSelector: ".blog__card",
    cardsPerView: 4,
    name: "Blog",
  });
}

// Инициализация карусели процесса работы
function initWorkProcessCarousel() {
  initUniversalCarousel({
    prevBtnId: "workProcessPrev",
    nextBtnId: "workProcessNext",
    gridSelector: ".work-process__grid",
    cardSelector: ".work-process-card",
    desktopCardsPerView: 4,
    name: "Work Process",
  });
}

// Инициализация карусели тарифов
function initPricingCarousel() {
  initUniversalCarousel({
    prevBtnId: "pricingPrev",
    nextBtnId: "pricingNext",
    gridSelector: ".pricing__cards-container",
    cardSelector: ".pricing-card",
    desktopCardsPerView: 3,
    name: "Pricing",
  });
}

// Инициализация карусели клиентов
function initClientsCarousel() {
  initUniversalCarousel({
    prevBtnId: "clientsPrev",
    nextBtnId: "clientsNext",
    gridSelector: ".clients__grid",
    cardSelector: ".clients__logo",
    desktopCardsPerView: 4,
    infiniteLoop: true, // Бесконечная прокрутка на мобилке
    name: "Clients",
  });
}

// Инициализация карусели отзывов
function initReviewsCarousel() {
  initUniversalCarousel({
    prevBtnId: "reviewsPrev",
    nextBtnId: "reviewsNext",
    gridSelector: ".reviews__cards-block",
    cardSelector: ".reviews__card",
    desktopCardsPerView: 3,
    name: "Reviews",
  });
}

// ========================================
//    СИСТЕМА УПРАВЛЕНИЯ СТРАНИЦЕЙ 404
// ========================================

/**
 * Проверка URL на наличие параметра для показа страницы 404
 * При загрузке страницы проверяет ?mode=404 в URL
 */
function checkPageMode() {
  const urlParams = new URLSearchParams(window.location.search);
  const mode = urlParams.get("mode");

  if (mode === "404") {
    show404Page();
  } else {
    showMainContent();
  }
}

/**
 * Показывает страницу 404 вместо основного контента
 */
function show404Page() {
  const mainContent = document.getElementById("mainContent");
  const page404Content = document.getElementById("page404Content");

  if (mainContent && page404Content) {
    mainContent.style.display = "none";
    page404Content.style.display = "block";
    console.log("Показана страница 404");
  }
}

/**
 * Показывает основной контент (скрывает 404)
 */
function showMainContent() {
  const mainContent = document.getElementById("mainContent");
  const page404Content = document.getElementById("page404Content");

  if (mainContent && page404Content) {
    mainContent.style.display = "block";
    page404Content.style.display = "none";
    console.log("Показан основной контент");
  }
}

/**
 * Возврат на главную страницу с страницы 404
 * Используется в кнопке "На главную"
 */
function goToHome() {
  // Удаляем параметр mode из URL
  const url = new URL(window.location);
  url.searchParams.delete("mode");
  window.history.pushState({}, "", url);

  // Показываем основной контент
  showMainContent();

  // Прокручиваем страницу наверх
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });

  console.log("Возврат на главную страницу");
}

/**
 * Переключение на страницу 404 (для тестирования)
 * Можно вызвать из консоли браузера: toggle404Mode()
 */
function toggle404Mode() {
  const urlParams = new URLSearchParams(window.location.search);
  const currentMode = urlParams.get("mode");

  if (currentMode === "404") {
    // Если уже на 404, переключаемся на обычную страницу
    goToHome();
  } else {
    // Переключаемся на 404
    const url = new URL(window.location);
    url.searchParams.set("mode", "404");
    window.history.pushState({}, "", url);
    show404Page();

    // Прокручиваем страницу наверх
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  }
}

// Делаем функции доступными глобально для вызова из HTML
window.goToHome = goToHome;
window.toggle404Mode = toggle404Mode;

// ========================================
//    ОБРАБОТЧИК ОШИБОК ДЛЯ ИЗОБРАЖЕНИЙ
// ========================================

/**
 * Инициализация обработчика ошибок загрузки изображений
 * При ошибке загрузки изображение заменяется на error.png
 */
function initImageErrorHandler() {
  const images = document.querySelectorAll("img");

  images.forEach((img) => {
    img.addEventListener("error", function () {
      // Проверяем, что это не уже fallback изображение
      if (!this.src.includes("error.png")) {
        console.warn(`Ошибка загрузки изображения: ${this.src}`);

        // Заменяем на error.png
        this.src = "assets/img/content/error.png";
        this.alt = "Ошибка загрузки изображения";

        // Добавляем класс для стилизации
        this.classList.add("image-error");
      }
    });
  });

  console.log(
    `Инициализирован обработчик ошибок для ${images.length} изображений`
  );
}

// ========================================
//    АККОРДЕОН ФУТЕРА (МОБИЛЬНАЯ ВЕРСИЯ)
// ========================================

/**
 * Инициализация аккордеона в футере для мобильной версии
 * Работает как для оригинального footer, так и для клонированного в overlay
 * При клике на заголовок секции происходит плавное раскрытие/закрытие списка
 */
function initFooterAccordion() {
  // Проверяем, что мы в мобильной версии (ширина <= 1023px)
  const isMobile = window.innerWidth <= 1023;

  if (!isMobile) {
    return; // На десктопе аккордеон не нужен
  }

  const sectionTitles = document.querySelectorAll(
    ".footer__section > h4, .footer__column > h4"
  );

  sectionTitles.forEach((title) => {
    // Удаляем предыдущие обработчики (если были)
    title.replaceWith(title.cloneNode(true));
  });

  // Получаем обновленные элементы после replaceWith
  const updatedTitles = document.querySelectorAll(
    ".footer__section > h4, .footer__column > h4"
  );

  updatedTitles.forEach((title) => {
    title.addEventListener("click", function () {
      // Сначала ищем footer__section (для нормальной структуры)
      let section = this.closest(".footer__section");
      let contentElement = null;

      // Если footer__section не найден (колонки 3 и 4),
      // ищем следующий элемент с классом footer__list
      if (!section) {
        // Создаём виртуальную "секцию" из заголовка и следующего списка
        contentElement = this.nextElementSibling;

        // Проверяем, что это действительно footer__list или footer__contact-info
        if (
          contentElement &&
          (contentElement.classList.contains("footer__list") ||
            contentElement.classList.contains("footer__contact-info"))
        ) {
          // Используем родительский элемент (footer__column) как контейнер
          section = this.parentElement;
        }
      } else {
        // Для нормальной структуры ищем контент внутри секции
        contentElement = section.querySelector(
          ".footer__list, .footer__contact-info"
        );
      }

      if (!section || !contentElement) {
        console.warn(
          "Не удалось найти секцию или контент для аккордеона",
          this
        );
        return;
      }

      const isActive = section.classList.contains("active");

      // 🔑 ВАЖНО: Получаем контейнер (оригинальный footer или мобильный overlay)
      // чтобы закрывать только секции в пределах одного контейнера
      const footerContainer =
        this.closest(".footer") || this.closest(".mobile-menu-content");

      if (footerContainer) {
        // Закрываем все остальные секции ТОЛЬКО в этом контейнере
        footerContainer
          .querySelectorAll(".footer__section, .footer__column")
          .forEach((s) => {
            if (s !== section && s.classList.contains("active")) {
              s.classList.remove("active");
            }
          });
      }

      // Переключаем текущую секцию (класс active на родителе, не на h4)
      if (isActive) {
        section.classList.remove("active");
      } else {
        section.classList.add("active");
      }
    });
  });

  console.log(
    `Инициализирован аккордеон футера для ${updatedTitles.length} секций`
  );
}

// Инициализируем аккордеон при загрузке и при изменении размера окна
window.addEventListener(
  "resize",
  debounce(function () {
    initFooterAccordion();
  }, 250)
);

/* ========================================
   МОБИЛЬНОЕ МЕНЮ (FOOTER КАК ВЫПАДАЮЩЕЕ МЕНЮ)
   ======================================== */

/**
 * Инициализация мобильного меню
 * - #mobileMenuBtn показывает полный контент футера в overlay с анимацией гамбургер→крестик
 * - #mobileServicesBtn показывает контент футера БЕЗ первой колонки
 * - #mobileCallBtn показывает модальное окно звонка
 * - Контент клонируется из footer в overlay
 * - Все слои появляются с плавной анимацией
 */
function initMobileMenu() {
  const mobileMenuBtn = document.getElementById("mobileMenuBtn");
  const mobileServicesBtn = document.getElementById("mobileServicesBtn");
  const mobileCallBtn = document.getElementById("mobileCallBtn");
  const mobileMenuOverlay = document.getElementById("mobileMenuOverlay");
  const mobileMenuContent = document.getElementById("mobileMenuContent");
  const footer = document.querySelector(".footer");
  const modalOverlay = document.getElementById("modalOverlay");
  const callModal = document.getElementById("callModal");
  const mobileMenuBack = document.getElementById("mobileMenuBack");

  console.log("🔍 Инициализация мобильного меню:");
  console.log("mobileMenuBtn:", mobileMenuBtn);
  console.log("mobileServicesBtn:", mobileServicesBtn);
  console.log("mobileCallBtn:", mobileCallBtn);
  console.log("mobileMenuOverlay:", mobileMenuOverlay);
  console.log("mobileMenuContent:", mobileMenuContent);
  console.log("footer:", footer);
  console.log("mobileMenuBack:", mobileMenuBack);

  if (!footer || !mobileMenuOverlay || !mobileMenuContent) {
    console.warn("Элементы мобильного меню не найдены");
    return;
  }

  if (!mobileMenuBtn || !mobileServicesBtn || !mobileCallBtn) {
    console.warn("Кнопки мобильного меню не найдены");
    return;
  }

  // 🔑 АРХИТЕКТУРА: Типы контента для мобильного оверлея
  const CONTENT_TYPES = {
    MENU: "menu", // Полное меню (footer)
    SERVICES: "services", // Только услуги (footer без первой колонки)
    FORM: "form", // Форма обратной связи (quick-response__content)
  };

  // 🔑 Переменная для отслеживания текущего типа контента
  let currentContentType = null; // null = закрыто, или один из CONTENT_TYPES

  /**
   * 🎯 АРХИТЕКТУРНАЯ ФУНКЦИЯ: Открывает мобильное меню с указанным типом контента
   * @param {string} contentType - Тип контента из CONTENT_TYPES
   */
  function openMobileMenuWithContent(contentType) {
    // Очищаем предыдущий контент
    mobileMenuContent.innerHTML = "";

    // 🔑 РАЗДЕЛЕНИЕ ОТВЕТСТВЕННОСТИ: Выбор контента в зависимости от типа
    switch (contentType) {
      case CONTENT_TYPES.MENU:
        renderFullMenu();
        break;

      case CONTENT_TYPES.SERVICES:
        renderServicesMenu();
        break;

      case CONTENT_TYPES.FORM:
        renderCallForm();
        break;

      default:
        console.warn("Неизвестный тип контента:", contentType);
        return;
    }

    // Показываем overlay с плавной анимацией
    mobileMenuOverlay.classList.add("active");

    // Анимируем кнопку меню (гамбургер → крестик) только для полного меню
    if (contentType === CONTENT_TYPES.MENU && mobileMenuBtn) {
      mobileMenuBtn.classList.add("menu-active");
    }

    // 🔑 Сохраняем текущий тип контента
    currentContentType = contentType;

    // Блокируем прокрутку body
    document.body.style.overflow = "hidden";

    console.log(`Мобильное меню открыто. Тип контента: ${contentType}`);
  }

  /**
   * 📋 РЕНДЕР: Полное меню (footer целиком)
   */
  function renderFullMenu() {
    const footerClone = footer.cloneNode(true);
    mobileMenuContent.appendChild(footerClone);
    initFooterAccordion();
  }

  /**
   * 📋 РЕНДЕР: Меню только с услугами (footer без первой колонки)
   */
  function renderServicesMenu() {
    const footerClone = footer.cloneNode(true);

    // Удаляем первую колонку "О компании"
    const firstColumn = footerClone.querySelector(
      ".footer__column:first-child"
    );
    if (firstColumn) {
      firstColumn.remove();
    }

    // 🔑 АРХИТЕКТУРНОЕ РЕШЕНИЕ: Реорганизация порядка элементов
    // После удаления первой колонки нужно переупорядочить секции
    const columns = footerClone.querySelectorAll(".footer__column");

    if (columns.length >= 3) {
      // Колонка 1 (бывшая 2): Услуги 1С + Серверные решения
      // Колонка 2 (бывшая 3): Услуги Битрикс 24
      // Колонка 3 (бывшая 4): IT-инфраструктура

      const col1 = columns[0]; // Услуги (с заголовком)
      const col2 = columns[1]; // Битрикс 24
      const col3 = columns[2]; // IT-инфраструктура

      // Получаем заголовок "Услуги" из первой колонки
      const servicesTitle = col1.querySelector(".footer__column > h3");

      // Получаем все секции из первой колонки
      const allSections = col1.querySelectorAll(".footer__section");
      const services1CSection = allSections[0]; // Первая секция - Услуги 1С
      const serversSection = allSections[1]; // Вторая секция - Серверные решения

      // Получаем секцию Битрикс 24 (у неё нет обёртки footer__section)
      const bitrix24Title = col2.querySelector("h4");
      const bitrix24List = col2.querySelector(".footer__list");

      // Получаем секцию IT-инфраструктуры
      const itTitle = col3.querySelector("h4");
      const itList = col3.querySelector(".footer__list");

      // Создаём новую структуру в правильном порядке
      const footerColumns = footerClone.querySelector(".footer__columns");
      if (footerColumns && servicesTitle) {
        // Очищаем существующие колонки
        footerColumns.innerHTML = "";

        // Создаём единую колонку с правильным порядком
        const newColumn = document.createElement("div");
        newColumn.className = "footer__column";

        // 1. Заголовок "Услуги"
        newColumn.appendChild(servicesTitle.cloneNode(true));

        // 2. Услуги 1С (первая секция из col1)
        if (services1CSection) {
          newColumn.appendChild(services1CSection.cloneNode(true));
        }

        // 3. Услуги Битрикс 24 (создаём секцию с правильной структурой)
        if (bitrix24Title && bitrix24List) {
          const bitrixSection = document.createElement("div");
          bitrixSection.className = "footer__section";
          bitrixSection.appendChild(bitrix24Title.cloneNode(true));
          bitrixSection.appendChild(bitrix24List.cloneNode(true));
          newColumn.appendChild(bitrixSection);
        }

        // 4. IT-инфраструктура (создаём секцию с правильной структурой)
        if (itTitle && itList) {
          const itSection = document.createElement("div");
          itSection.className = "footer__section";
          itSection.appendChild(itTitle.cloneNode(true));
          itSection.appendChild(itList.cloneNode(true));
          newColumn.appendChild(itSection);
        }

        // 5. Серверные решения (вторая секция из col1)
        if (serversSection) {
          newColumn.appendChild(serversSection.cloneNode(true));
        }

        // Добавляем новую колонку в контейнер
        footerColumns.appendChild(newColumn);
      }
    }

    // Вставляем обработанный клон в контейнер
    mobileMenuContent.appendChild(footerClone);
    initFooterAccordion();
  }

  /**
   * 📋 РЕНДЕР: Форма обратной связи (quick-response__content)
   */
  function renderCallForm() {
    // Находим оригинальную форму в секции quick-response
    const originalForm = document.querySelector(
      ".section--quick-response .quick-response__content"
    );

    if (!originalForm) {
      console.warn("Форма quick-response__content не найдена");
      return;
    }

    // Клонируем форму
    const formClone = originalForm.cloneNode(true);

    // Добавляем специальный класс для мобильной адаптации
    formClone.classList.add("quick-response__content--mobile");

    // Вставляем клонированную форму
    mobileMenuContent.appendChild(formClone);

    // 🔑 ВАЖНО: Инициализируем обработчик формы в мобильном оверлее
    initMobileCallForm(formClone);
  }

  /**
   * 🎯 Инициализация обработчика формы в мобильном оверлее
   * @param {HTMLElement} formContainer - Контейнер с формой (.quick-response__content--mobile)
   */
  function initMobileCallForm(formContainer) {
    const form = formContainer.querySelector(".quick-response__form");

    if (!form) {
      console.warn("Форма внутри мобильного меню не найдена");
      return;
    }

    const fields = form.querySelectorAll(".quick-response__field");
    const submitBtn = form.querySelector(".btn");

    // Объект для отслеживания состояния полей
    const fieldStates = {};

    fields.forEach((field, index) => {
      const input = field.querySelector(".quick-response__input");
      const errorText = field.querySelector(".quick-response__error");

      if (!input || !errorText) return;

      const fieldId = `mobile_form_field_${index}`;
      fieldStates[fieldId] = {
        touched: false,
        valid: false,
        empty: true,
      };

      // Обработка ввода
      input.addEventListener("input", function () {
        const value = this.value.trim();
        fieldStates[fieldId].empty = !value;

        if (value) {
          this.classList.add("active");
          fieldStates[fieldId].touched = true;
          const isValid = validateInput(this, field, errorText, true);
          fieldStates[fieldId].valid = isValid;
        } else {
          this.classList.remove("active");
          if (fieldStates[fieldId].touched) {
            this.classList.add("error");
            field.classList.add("has-error");
            errorText.textContent = "Поле обязательно для заполнения";
            fieldStates[fieldId].valid = false;
          } else {
            clearFieldErrors(this, field);
            fieldStates[fieldId].valid = false;
          }
        }

        updateSubmitButton();
      });

      // Обработка потери фокуса
      input.addEventListener("blur", function () {
        const value = this.value.trim();

        if (!value) {
          if (fieldStates[fieldId].touched) {
            this.classList.add("error");
            field.classList.add("has-error");
            errorText.textContent = "Поле обязательно для заполнения";
            fieldStates[fieldId].valid = false;
          }
        } else {
          fieldStates[fieldId].touched = true;
          const isValid = validateInput(this, field, errorText, false);
          fieldStates[fieldId].valid = isValid;
        }

        updateSubmitButton();
      });

      // Обработка получения фокуса
      input.addEventListener("focus", function () {
        if (
          field.classList.contains("has-error") ||
          field.classList.contains("has-warning")
        ) {
          this.classList.remove("error", "warning");
          field.classList.remove("has-error", "has-warning");
        }
      });
    });

    // Функция обновления состояния кнопки
    function updateSubmitButton() {
      const allValid = Object.values(fieldStates).every(
        (state) => state.valid && !state.empty
      );

      if (submitBtn) {
        submitBtn.disabled = !allValid;
      }
    }

    // Функция очистки ошибок поля
    function clearFieldErrors(input, field) {
      input.classList.remove("error", "warning", "active");
      field.classList.remove("has-error", "has-warning");
    }

    // Инициализация - кнопка disabled по умолчанию
    updateSubmitButton();

    // 🎯 КЛЮЧЕВАЯ ЛОГИКА: Обработка отправки формы в мобильном оверлее
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      let isValid = true;

      fields.forEach((field, index) => {
        const input = field.querySelector(".quick-response__input");
        const errorText = field.querySelector(".quick-response__error");
        const fieldId = `mobile_form_field_${index}`;

        fieldStates[fieldId].touched = true;

        if (!validateInput(input, field, errorText, false)) {
          isValid = false;
          fieldStates[fieldId].valid = false;
        }
      });

      if (isValid) {
        console.log("Форма мобильного оверлея успешно отправлена");

        // 🔑 АРХИТЕКТУРНОЕ РЕШЕНИЕ: Заменяем форму на сообщение об успехе
        showMobileSuccessMessage();
      }
    });

    console.log("Обработчик мобильной формы инициализирован");
  }

  /**
   * 🎉 Показывает сообщение об успешной отправке формы в мобильном оверлее
   * Заменяет содержимое #mobileMenuContent на блок .modal-success из #callModal
   */
  function showMobileSuccessMessage() {
    // Находим оригинальное сообщение об успехе в модальном окне
    const originalSuccess = document.querySelector("#callModal .modal-success");

    if (!originalSuccess) {
      console.warn("Блок .modal-success не найден в #callModal");
      // Fallback: показываем простое сообщение
      mobileMenuContent.innerHTML = `
        <div class="modal-success" style="display: flex;">
          <div class="modal-success__content">
            <h2>Спасибо за обращение!</h2>
            <p>Мы уже получили вашу заявку. Ожидайте звонка — специалист свяжется с вами в ближайшее время</p>
          </div>
        </div>
      `;
      return;
    }

    // Клонируем сообщение об успехе
    const successClone = originalSuccess.cloneNode(true);

    // Убираем inline style display: none (если есть)
    successClone.style.display = "flex";

    // 🔑 БЕЗОПАСНОСТЬ: Плавная замена контента с анимацией
    // 1. Добавляем класс для fade-out текущего контента
    mobileMenuContent.style.opacity = "0";
    mobileMenuContent.style.transition = "opacity 0.3s ease";

    // 2. После анимации заменяем контент
    setTimeout(() => {
      mobileMenuContent.innerHTML = "";
      mobileMenuContent.appendChild(successClone);

      // 3. Плавно показываем новый контент
      requestAnimationFrame(() => {
        mobileMenuContent.style.opacity = "1";
      });

      console.log("Сообщение об успехе показано в мобильном оверлее");
    }, 300); // Совпадает с transition
  }

  /**
   * 🔒 Закрывает мобильное меню
   */
  function closeMobileMenu() {
    // Скрываем overlay с плавной анимацией
    mobileMenuOverlay.classList.remove("active");

    // Анимируем кнопку меню обратно (крестик → гамбургер)
    if (mobileMenuBtn) {
      mobileMenuBtn.classList.remove("menu-active");
    }

    // 🔑 Очищаем тип контента
    currentContentType = null;

    // Восстанавливаем прокрутку body
    document.body.style.overflow = "";

    // Очищаем контент после завершения анимации
    setTimeout(() => {
      mobileMenuContent.innerHTML = "";
    }, 300); // Совпадает с CSS transition

    console.log("Мобильное меню закрыто");
  }

  // 🎯 Обработчик кнопки "Меню" - показывает полное меню
  if (mobileMenuBtn) {
    mobileMenuBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // Закрываем если уже открыто полное меню, иначе открываем
      if (currentContentType === CONTENT_TYPES.MENU) {
        closeMobileMenu();
      } else {
        // Закрываем текущее содержимое (если открыто) и открываем новое
        if (currentContentType !== null) {
          closeMobileMenu();
          // Небольшая задержка для плавности
          setTimeout(() => {
            openMobileMenuWithContent(CONTENT_TYPES.MENU);
          }, 350);
        } else {
          openMobileMenuWithContent(CONTENT_TYPES.MENU);
        }
      }
    });
  }

  // 🎯 Обработчик кнопки "Услуги" - показывает меню услуг
  if (mobileServicesBtn) {
    mobileServicesBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // Закрываем текущее содержимое (если открыто) и открываем услуги
      if (
        currentContentType !== null &&
        currentContentType !== CONTENT_TYPES.SERVICES
      ) {
        closeMobileMenu();
        setTimeout(() => {
          openMobileMenuWithContent(CONTENT_TYPES.SERVICES);
        }, 350);
      } else if (currentContentType === null) {
        openMobileMenuWithContent(CONTENT_TYPES.SERVICES);
      }
      // Если уже открыты услуги - ничего не делаем
    });
  }

  // 🎯 Обработчик кнопки "Позвонить" - показывает форму
  if (mobileCallBtn) {
    mobileCallBtn.addEventListener("click", function (e) {
      e.preventDefault();

      // Закрываем текущее содержимое (если открыто) и открываем форму
      if (
        currentContentType !== null &&
        currentContentType !== CONTENT_TYPES.FORM
      ) {
        closeMobileMenu();
        setTimeout(() => {
          openMobileMenuWithContent(CONTENT_TYPES.FORM);
        }, 350);
      } else if (currentContentType === null) {
        openMobileMenuWithContent(CONTENT_TYPES.FORM);
      }
      // Если уже открыта форма - ничего не делаем
    });
  }

  // 🎯 Обработчик кнопки "Назад" - всегда закрывает меню
  if (mobileMenuBack) {
    mobileMenuBack.addEventListener("click", function (e) {
      e.preventDefault();
      closeMobileMenu();
    });
  }

  // 🎯 Обработчик клика по overlay - закрывает ТОЛЬКО полное меню
  mobileMenuOverlay.addEventListener("click", function (e) {
    // Закрываем только если:
    // 1. Клик по самому overlay (не по контенту)
    // 2. Открыто полное меню (не услуги и не форма)
    if (
      e.target === mobileMenuOverlay &&
      currentContentType === CONTENT_TYPES.MENU
    ) {
      closeMobileMenu();
    }
  });

  // 🎯 Закрытие по Escape - только для полного меню
  document.addEventListener("keydown", function (e) {
    if (
      e.key === "Escape" &&
      mobileMenuOverlay.classList.contains("active") &&
      currentContentType === CONTENT_TYPES.MENU
    ) {
      closeMobileMenu();
    }
  });

  console.log("Мобильное меню инициализировано");
}
