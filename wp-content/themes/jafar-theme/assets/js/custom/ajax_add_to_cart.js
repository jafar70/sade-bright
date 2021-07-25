jQuery(document).ready(function ($) {
	$('.single_add_to_cart_button').on('click', function (e) {
		e.preventDefault();
		const currentValue = parseInt($('.gm01__list__link--basket > span').text());
		const currentProductTitle = $('.product_title').text();
		$thisbutton = $(this),
			$form = $thisbutton.closest('form.cart'),
			id = $thisbutton.val(),
			product_qty = $form.find('input[name=quantity]').val() || 1,
			product_id = $form.find('input[name=product_id]').val() || id,
			variation_id = $form.find('input[name=variation_id]').val() || 0;
		var data = {
			action: 'ql_woocommerce_ajax_add_to_cart',
			product_id: product_id,
			product_sku: '',
			quantity: product_qty,
			variation_id: variation_id,
		};
		$.ajax({
			type: 'post',
			url: wc_add_to_cart_params.ajax_url,
			data: data,
			beforeSend: function (response) {
				$thisbutton.removeClass('added').addClass('loading');
			},
			complete: function (response) {
				$thisbutton.addClass('added').removeClass('loading');
				const newNumber = currentValue + parseInt(product_qty);

				$('.gm01__list__link--basket > span').text(newNumber);
				$('.woocommerce-message').css('display', 'block');
				$('.woocommerce-message__text').text( product_qty + ' x ' + '"' + currentProductTitle + '"' + ' is added to your basket.')
			},
			success: function (response) {
				if (response.error & response.product_url) {
					window.location = response.product_url;
					return;
				} else {
					$(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
				}
			},
		});
	});
});