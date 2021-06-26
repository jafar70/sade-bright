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
  /* 
  * Hamburger 
  */
  var hamburgerIcon = document.querySelector('.gm02__grid__hamburger');
  var menu = document.querySelector('.gm02__grid__menu');
  var background = document.querySelector('.background-overlay');
  var closeButton = document.querySelector('.gm02__grid__closebtn');

  var toggle = function toggle(event) {
    event.stopPropagation();
    hamburgerIcon.classList.toggle('active');

    if (!event.target.closest('.gm02__grid__menu')) {
      menu.classList.toggle('active');
      background.classList.toggle('active');
      closeButton.classList.toggle('active');
      menu.classList.contains('active') ? document.addEventListener('click', toggle) : document.removeEventListener('click', toggle);
    } else {}
  };

  hamburgerIcon.addEventListener('click', toggle);
})();