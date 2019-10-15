jQuery( document ).ready( function( $ ) {
	var checkoutBillingFields = $( '.woocommerce-billing-fields__field-wrapper .form-row' );

	var checkoutShippingFields = $( '.woocommerce-shipping-fields__field-wrapper .form-row' );

	if ( checkoutBillingFields.length ) {
		checkoutBillingFields.each( function( index, element ) {
			
			var fieldId = $(element).attr('id');

			if ( fieldId == 'billing_address_1_field' || fieldId == 'billing_address_2_field' || fieldId == 'billing_email_field' ) {
				$( this ).addClass('col-12 mb-20');
			} else {
				$( this ).addClass('col-lg-6 mb-20');
			}
		});
	}

	if ( checkoutShippingFields.length ) {
		checkoutShippingFields.each( function( index, element ) {
			
			var fieldId = $(element).attr('id');

			if ( fieldId == 'shipping_address_1_field' || fieldId == 'shipping_address_2_field' ) {
				$( this ).addClass('col-12 mb-20');
			} else {
				$( this ).addClass('col-lg-6 mb-20');
			}
		});
	}
});
