"use strict";

(function () {
  var hamburgerIcon = document.querySelector('.gm02__grid__hamburger');
  var menu = document.querySelector('.gm02__grid__menu');
  var background = document.querySelector('.background-overlay');
  var closeButton = document.querySelector('.gm02__grid__closebtn');
  var navSearchButton = document.querySelector('.gm01__list__link--search');
  var searchDropdown = document.querySelector('.gm04');

  var toggle = function toggle(event) {
    event.stopPropagation();
    hamburgerIcon.classList.toggle('active');
    navSearchButton.classList.toggle('active');
    searchDropdown.classList.remove('is-active');
    background.classList.remove('is-active');

    if (!event.target.closest('.gm02__grid__menu')) {
      menu.classList.toggle('active');
      background.classList.toggle('active');
      closeButton.classList.toggle('active');
      menu.classList.contains('active') ? document.addEventListener('click', toggle) : document.removeEventListener('click', toggle);
    } else {}
  };

  hamburgerIcon.addEventListener('click', toggle);
})();
"use strict";

(function () {
  var navSearchButton = document.querySelector('.gm01__list__link--search');
  var searchDropdown = document.querySelector('.gm04');
  var background = document.querySelector('.background-overlay');
  var closeButton = document.querySelector('.gm04__close');
  closeButton.addEventListener('click', function () {
    navSearchButton.classList.toggle('active');
    searchDropdown.classList.toggle('is-active');
    background.classList.toggle('is-active');
  });

  var toggleSearch = function toggleSearch(event) {
    event.stopPropagation();
    navSearchButton.classList.toggle('active');

    if (!event.target.closest('.gm04')) {
      searchDropdown.classList.toggle('is-active');
      background.classList.toggle('is-active');
      searchDropdown.classList.contains('is-active') ? document.addEventListener('click', toggleSearch) : document.removeEventListener('click', toggleSearch);
    } else {
      console.log('yoo');
    }
  };

  navSearchButton.addEventListener('click', toggleSearch);
})();
"use strict";

/**
 * LazyLoad
 * Animated scroll to a hashed element on the page.
 * Fallbacks to default hash links when JS is disabled.
 *
 * Usage:
 * See official docs https://github.com/verlok/lazyload
 *
 * Basic Example:
 * <img class="lazy" data-src="https://via.placeholder.com/150" alt="">
 * <div class="lazy" data-bg="https://via.placeholder.com/150"></div>
 */
(function () {
  var lazyLoadInstance = new LazyLoad({// Your custom settings go here
  });
})();
"use strict";

(function () {
  /**
   * Search results Form
   * Used in search-form.php
   */
  var searchField = document.getElementById("search");
  var clearFieldButton = document.querySelector(".search-form__close");

  if (searchField) {
    searchField.addEventListener('keyup', function () {
      if (searchField.value == '') {
        clearFieldButton.style.display = 'none';
      } else {
        clearFieldButton.style.display = 'flex';
      }
    });
  }

  if (clearFieldButton) {
    clearFieldButton.addEventListener('click', function (e) {
      e.preventDefault();
      searchField.value = "";
      clearFieldButton.style.display = 'none';
    }, false);
  }
})();