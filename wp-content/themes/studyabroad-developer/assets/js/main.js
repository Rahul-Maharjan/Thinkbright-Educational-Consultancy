/**
 * StudyAbroad Developer Theme - Main JavaScript
 *
 * @package StudyAbroad_Developer
 */

(function () {
  "use strict";

  // DOM Ready
  document.addEventListener("DOMContentLoaded", function () {
    initMobileMenu();
    initStickyHeader();
    initSmoothScroll();
    initFAQAccordion();
    initTestimonialSlider();
    initCounterAnimation();
    initFormHandling();
    initBackToTop();
  });

  /**
   * Mobile Menu Toggle
   */
  function initMobileMenu() {
    const menuToggle = document.querySelector(".mobile-menu-toggle");
    const primaryMenu = document.querySelector(".main-nav");

    if (!menuToggle || !primaryMenu) return;

    menuToggle.addEventListener("click", function () {
      this.classList.toggle("active");
      primaryMenu.classList.toggle("active");
      document.body.classList.toggle("menu-open");

      // Toggle aria-expanded
      const expanded = this.getAttribute("aria-expanded") === "true";
      this.setAttribute("aria-expanded", !expanded);
    });

    // Close menu when clicking on nav links (mobile)
    const navLinks = primaryMenu.querySelectorAll("a");
    navLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        if (window.innerWidth <= 991) {
          menuToggle.classList.remove("active");
          primaryMenu.classList.remove("active");
          document.body.classList.remove("menu-open");
          menuToggle.setAttribute("aria-expanded", "false");
        }
      });
    });

    // Close menu when clicking outside
    document.addEventListener("click", function (e) {
      if (!primaryMenu.contains(e.target) && !menuToggle.contains(e.target)) {
        menuToggle.classList.remove("active");
        primaryMenu.classList.remove("active");
        document.body.classList.remove("menu-open");
        menuToggle.setAttribute("aria-expanded", "false");
      }
    });

    // Close menu on escape key
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && primaryMenu.classList.contains("active")) {
        menuToggle.classList.remove("active");
        primaryMenu.classList.remove("active");
        document.body.classList.remove("menu-open");
        menuToggle.setAttribute("aria-expanded", "false");
      }
    });

    // Handle resize - close menu if resized to desktop
    window.addEventListener("resize", function () {
      if (window.innerWidth > 991 && primaryMenu.classList.contains("active")) {
        menuToggle.classList.remove("active");
        primaryMenu.classList.remove("active");
        document.body.classList.remove("menu-open");
        menuToggle.setAttribute("aria-expanded", "false");
      }
    });
  }

  /**
   * Sticky Header on Scroll
   */
  function initStickyHeader() {
    const header = document.querySelector(".site-header");
    if (!header) return;

    let lastScroll = 0;
    const headerHeight = header.offsetHeight;

    window.addEventListener("scroll", function () {
      const currentScroll = window.pageYOffset;

      if (currentScroll > 100) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }

      // Hide/show header on scroll direction (optional)
      if (currentScroll > lastScroll && currentScroll > headerHeight) {
        // Scrolling down
        // header.classList.add('header-hidden');
      } else {
        // Scrolling up
        // header.classList.remove('header-hidden');
      }

      lastScroll = currentScroll;
    });
  }

  /**
   * Smooth Scroll for Anchor Links
   */
  function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");

        if (href === "#") return;

        const target = document.querySelector(href);
        if (!target) return;

        e.preventDefault();

        const headerOffset = 80;
        const elementPosition = target.getBoundingClientRect().top;
        const offsetPosition =
          elementPosition + window.pageYOffset - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: "smooth",
        });

        // Close mobile menu if open
        const menuToggle = document.querySelector(".menu-toggle");
        const primaryMenu = document.querySelector(".primary-menu");
        if (
          menuToggle &&
          primaryMenu &&
          primaryMenu.classList.contains("active")
        ) {
          menuToggle.classList.remove("active");
          primaryMenu.classList.remove("active");
          document.body.classList.remove("menu-open");
        }
      });
    });
  }

  /**
   * FAQ Accordion
   */
  function initFAQAccordion() {
    const faqItems = document.querySelectorAll(".faq-item");

    if (!faqItems.length) return;

    faqItems.forEach(function (item) {
      const question = item.querySelector(".faq-question");
      const answer = item.querySelector(".faq-answer");

      if (!question || !answer) return;

      question.addEventListener("click", function () {
        const isOpen = item.classList.contains("active");

        // Close all other FAQ items (optional - for single open behavior)
        // faqItems.forEach(function(otherItem) {
        //     otherItem.classList.remove('active');
        //     otherItem.querySelector('.faq-answer').style.maxHeight = null;
        // });

        // Toggle current item
        if (isOpen) {
          item.classList.remove("active");
          answer.style.maxHeight = null;
        } else {
          item.classList.add("active");
          answer.style.maxHeight = answer.scrollHeight + "px";
        }
      });

      // Keyboard accessibility
      question.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          this.click();
        }
      });
    });
  }

  /**
   * Testimonial Slider (Simple Auto-rotate)
   */
  function initTestimonialSlider() {
    const testimonials = document.querySelectorAll(".testimonial-card");
    if (testimonials.length <= 1) return;

    // For CSS grid based display, we don't need JS slider
    // This is placeholder for future carousel implementation
  }

  /**
   * Counter Animation (Stats Section)
   */
  function initCounterAnimation() {
    const counters = document.querySelectorAll(".stat-number");
    if (!counters.length) return;

    const animateCounter = function (counter) {
      const target = parseInt(
        counter.getAttribute("data-count") ||
          counter.textContent.replace(/[^0-9]/g, ""),
      );
      const duration = 2000;
      const increment = target / (duration / 16);
      let current = 0;

      const updateCounter = function () {
        current += increment;
        if (current < target) {
          counter.textContent = Math.ceil(current);
          requestAnimationFrame(updateCounter);
        } else {
          // Add suffix if exists
          const suffix = counter.getAttribute("data-suffix") || "";
          counter.textContent = target + suffix;
        }
      };

      updateCounter();
    };

    // Intersection Observer for triggering animation
    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 },
    );

    counters.forEach(function (counter) {
      observer.observe(counter);
    });
  }

  /**
   * Form Handling
   */
  function initFormHandling() {
    const consultationForm = document.querySelector(".consultation-form form");

    if (!consultationForm) return;

    consultationForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.textContent;

      // Simple validation
      const requiredFields = this.querySelectorAll("[required]");
      let isValid = true;

      requiredFields.forEach(function (field) {
        if (!field.value.trim()) {
          isValid = false;
          field.classList.add("error");
        } else {
          field.classList.remove("error");
        }
      });

      if (!isValid) {
        alert("Please fill in all required fields.");
        return;
      }

      // Show loading state
      submitBtn.textContent = "Sending...";
      submitBtn.disabled = true;

      // Collect form data
      const formData = new FormData(this);
      formData.append("action", "studyabroad_consultation_form");
      formData.append("nonce", studyabroadData ? studyabroadData.nonce : "");

      // AJAX submission
      fetch(
        studyabroadData ? studyabroadData.ajaxurl : "/wp-admin/admin-ajax.php",
        {
          method: "POST",
          body: formData,
        },
      )
        .then(function (response) {
          return response.json();
        })
        .then(function (data) {
          if (data.success) {
            alert(
              "Thank you! Your consultation request has been submitted successfully. We will contact you shortly.",
            );
            consultationForm.reset();
          } else {
            alert(
              "There was an error submitting your request. Please try again or contact us directly.",
            );
          }
        })
        .catch(function (error) {
          console.error("Form submission error:", error);
          alert(
            "There was an error submitting your request. Please try again.",
          );
        })
        .finally(function () {
          submitBtn.textContent = originalText;
          submitBtn.disabled = false;
        });
    });

    // Real-time validation feedback
    consultationForm
      .querySelectorAll("input, select, textarea")
      .forEach(function (field) {
        field.addEventListener("blur", function () {
          if (this.hasAttribute("required") && !this.value.trim()) {
            this.classList.add("error");
          } else {
            this.classList.remove("error");
          }
        });

        // Email validation
        if (field.type === "email") {
          field.addEventListener("blur", function () {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
              this.classList.add("error");
            }
          });
        }

        // Phone validation
        if (field.type === "tel") {
          field.addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9+\-\s()]/g, "");
          });
        }
      });
  }

  /**
   * Back to Top Button
   */
  function initBackToTop() {
    // Create back to top button
    const backToTop = document.createElement("button");
    backToTop.className = "back-to-top";
    backToTop.innerHTML =
      '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>';
    backToTop.setAttribute("aria-label", "Back to top");
    backToTop.style.cssText = `
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color, #0B3C91);
            color: white;
            border: none;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 998;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        `;
    document.body.appendChild(backToTop);

    // Show/hide on scroll
    window.addEventListener("scroll", function () {
      if (window.pageYOffset > 500) {
        backToTop.style.opacity = "1";
        backToTop.style.visibility = "visible";
      } else {
        backToTop.style.opacity = "0";
        backToTop.style.visibility = "hidden";
      }
    });

    // Scroll to top on click
    backToTop.addEventListener("click", function () {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });

    // Hover effect
    backToTop.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-3px)";
    });
    backToTop.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)";
    });
  }

  /**
   * Utility: Debounce Function
   */
  function debounce(func, wait) {
    let timeout;
    return function executedFunction() {
      const context = this;
      const args = arguments;
      const later = function () {
        timeout = null;
        func.apply(context, args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  /**
   * Utility: Throttle Function
   */
  function throttle(func, limit) {
    let inThrottle;
    return function () {
      const args = arguments;
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(function () {
          inThrottle = false;
        }, limit);
      }
    };
  }
})();
