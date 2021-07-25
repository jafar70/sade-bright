"use strict";

jQuery(document).ready(function ($) {
  $('.single_add_to_cart_button').on('click', function (e) {
    e.preventDefault();
    var currentValue = parseInt($('.gm01__list__link--basket > span').text());
    var currentProductTitle = $('.product_title').text();
    $thisbutton = $(this), $form = $thisbutton.closest('form.cart'), id = $thisbutton.val(), product_qty = $form.find('input[name=quantity]').val() || 1, product_id = $form.find('input[name=product_id]').val() || id, variation_id = $form.find('input[name=variation_id]').val() || 0;
    var data = {
      action: 'ql_woocommerce_ajax_add_to_cart',
      product_id: product_id,
      product_sku: '',
      quantity: product_qty,
      variation_id: variation_id
    };
    $.ajax({
      type: 'post',
      url: wc_add_to_cart_params.ajax_url,
      data: data,
      beforeSend: function beforeSend(response) {
        $thisbutton.removeClass('added').addClass('loading');
      },
      complete: function complete(response) {
        $thisbutton.addClass('added').removeClass('loading');
        var newNumber = currentValue + parseInt(product_qty);
        $('.gm01__list__link--basket > span').text(newNumber);
        $('.woocommerce-message').css('display', 'block');
        $('.woocommerce-message__text').text(product_qty + ' x ' + '"' + currentProductTitle + '"' + ' is added to your basket.');
      },
      success: function success(response) {
        if (response.error & response.product_url) {
          window.location = response.product_url;
          return;
        } else {
          $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
        }
      }
    });
  });
});
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
  /**
  * Search results Form
  * Used in search-form-page.php
  */


  var pageSearchField = document.getElementById("search-page");
  var pageClearFieldButton = document.querySelector(".search-form__close-page");

  if (pageSearchField) {
    pageSearchField.addEventListener('keyup', function () {
      if (pageSearchField.value == '') {
        pageClearFieldButton.style.display = 'none';
      } else {
        pageClearFieldButton.style.display = 'flex';
      }
    });
  }

  if (pageSearchField) {
    pageClearFieldButton.addEventListener('click', function (e) {
      e.preventDefault();
      pageSearchField.value = "";
      pageClearFieldButton.style.display = 'none';
    }, false);
  }
})();