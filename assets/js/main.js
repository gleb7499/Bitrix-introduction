/**
 * Main JavaScript - Bitrix Introduction Landing Page
 * Handles mobile menu, sliders, modals, and interactive elements
 */

(function() {
  'use strict';

  // ==========================================================================
  // Mobile Menu
  // ==========================================================================

  const mobileMenuToggle = document.querySelector('.pg-header__burger');
  const mobileMenu = document.querySelector('.pg-mobile-menu');

  if (mobileMenuToggle && mobileMenu) {
    mobileMenuToggle.addEventListener('click', () => {
      const isExpanded = mobileMenuToggle.getAttribute('aria-expanded') === 'true';
      
      // Toggle aria-expanded
      mobileMenuToggle.setAttribute('aria-expanded', !isExpanded);
      
      // Toggle aria-hidden on menu
      mobileMenu.setAttribute('aria-hidden', isExpanded);
      
      // Prevent body scroll when menu is open
      document.body.style.overflow = isExpanded ? '' : 'hidden';
    });

    // Close menu when clicking on links
    const mobileMenuLinks = mobileMenu.querySelectorAll('.pg-mobile-menu__link');
    mobileMenuLinks.forEach(link => {
      link.addEventListener('click', () => {
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      });
    });

    // Close menu on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && mobileMenuToggle.getAttribute('aria-expanded') === 'true') {
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
        mobileMenuToggle.focus();
      }
    });
  }

  // ==========================================================================
  // Sliders (Stages, Reviews, Clients, Services)
  // ==========================================================================

  function initSlider(sliderSelector) {
    const slider = document.querySelector(sliderSelector);
    if (!slider) return;

    const track = slider.querySelector(`${sliderSelector}__track`);
    const prevBtn = slider.querySelector('.pg-slider-btn--prev');
    const nextBtn = slider.querySelector('.pg-slider-btn--next');

    if (!track || !prevBtn || !nextBtn) return;

    const scrollAmount = 320; // Width of one item + gap

    prevBtn.addEventListener('click', () => {
      track.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
      });
    });

    nextBtn.addEventListener('click', () => {
      track.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
      });
    });

    // Update button states based on scroll position
    function updateButtonStates() {
      const isAtStart = track.scrollLeft === 0;
      const isAtEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 10;

      prevBtn.disabled = isAtStart;
      nextBtn.disabled = isAtEnd;

      prevBtn.style.opacity = isAtStart ? '0.5' : '1';
      nextBtn.style.opacity = isAtEnd ? '0.5' : '1';
    }

    track.addEventListener('scroll', updateButtonStates);
    updateButtonStates();

    // Touch/swipe support
    let startX = 0;
    let scrollLeft = 0;

    track.addEventListener('touchstart', (e) => {
      startX = e.touches[0].pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });

    track.addEventListener('touchmove', (e) => {
      const x = e.touches[0].pageX - track.offsetLeft;
      const walk = (x - startX) * 2;
      track.scrollLeft = scrollLeft - walk;
    });
  }

  // Initialize all sliders
  initSlider('.pg-stages__slider');
  initSlider('.pg-reviews__slider');
  initSlider('.pg-clients__slider');
  initSlider('.pg-services__slider');

  // ==========================================================================
  // FAQ Accordion
  // ==========================================================================

  const faqItems = document.querySelectorAll('.pg-faq-item');

  faqItems.forEach(item => {
    const summary = item.querySelector('summary');
    
    summary.addEventListener('click', (e) => {
      // Close other items (optional - for single-item open behavior)
      // Uncomment the lines below if you want only one FAQ open at a time
      /*
      faqItems.forEach(otherItem => {
        if (otherItem !== item && otherItem.hasAttribute('open')) {
          otherItem.removeAttribute('open');
        }
      });
      */
    });

    // Keyboard navigation
    summary.addEventListener('keydown', (e) => {
      if (e.key === ' ' || e.key === 'Enter') {
        e.preventDefault();
        item.hasAttribute('open') ? item.removeAttribute('open') : item.setAttribute('open', '');
      }
    });
  });

  // ==========================================================================
  // Modal Placeholder (for buttons with data-modal attribute)
  // ==========================================================================

  const modalButtons = document.querySelectorAll('[data-modal]');

  modalButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const modalType = button.getAttribute('data-modal');
      
      // Placeholder alert - replace with actual modal implementation
      console.log(`Opening modal: ${modalType}`);
      alert(`Модальное окно "${modalType}" будет реализовано позже.\n\nЗдесь будет форма обратной связи.`);
      
      // TODO: Implement actual modal with form
      // Example:
      // openModal(modalType);
    });
  });

  // ==========================================================================
  // Smooth Scroll for Anchor Links
  // ==========================================================================

  const anchorLinks = document.querySelectorAll('a[href^="#"]');

  anchorLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      const href = link.getAttribute('href');
      
      // Skip if it's just "#" or empty
      if (href === '#' || href === '') return;

      const target = document.querySelector(href);
      
      if (target) {
        e.preventDefault();
        
        // Close mobile menu if open
        if (mobileMenu && mobileMenuToggle) {
          mobileMenuToggle.setAttribute('aria-expanded', 'false');
          mobileMenu.setAttribute('aria-hidden', 'true');
          document.body.style.overflow = '';
        }

        // Scroll to target with offset for fixed header
        const headerHeight = 100;
        const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });

        // Update focus for accessibility
        target.setAttribute('tabindex', '-1');
        target.focus();
      }
    });
  });

  // ==========================================================================
  // Header Scroll Effect (optional)
  // ==========================================================================

  const header = document.querySelector('.pg-header');
  let lastScroll = 0;

  if (header) {
    window.addEventListener('scroll', () => {
      const currentScroll = window.pageYOffset;

      // Add shadow on scroll
      if (currentScroll > 50) {
        header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
      } else {
        header.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
      }

      lastScroll = currentScroll;
    });
  }

  // ==========================================================================
  // Lazy Loading Images (if not using native lazy loading)
  // ==========================================================================

  if ('loading' in HTMLImageElement.prototype === false) {
    // Fallback for browsers that don't support native lazy loading
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');

    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src || img.src;
          img.removeAttribute('loading');
          imageObserver.unobserve(img);
        }
      });
    });

    lazyImages.forEach(img => imageObserver.observe(img));
  }

  // ==========================================================================
  // Form Validation Placeholder
  // ==========================================================================

  // This will be implemented when actual forms are added
  // For now, just a placeholder structure

  function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
  }

  function validatePhone(phone) {
    const re = /^[\d\s\+\-\(\)]+$/;
    return re.test(phone) && phone.replace(/\D/g, '').length >= 10;
  }

  // ==========================================================================
  // Console Info
  // ==========================================================================

  console.log('%c🚀 Bitrix Introduction Landing Page', 'font-size: 16px; font-weight: bold; color: #f42534;');
  console.log('%cDeveloped with ❤️ for Intez Group', 'font-size: 12px; color: #666;');
  console.log('%cVersion: 1.0.0', 'font-size: 12px; color: #666;');

})();
