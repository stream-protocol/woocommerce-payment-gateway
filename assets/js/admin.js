(function($) {
    'use strict';

    /**
     * All of the code for your admin-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    $(window).load(function() {
        setting_stream($);
    });


})(jQuery);


function setting_stream($) {

    $(document.body).on('input', '#woocommerce_stream_usdc_gateway_store_address', async function() {
        check_validation($);
    });

    check_validation($);
}

async function check_validation($) {

    let store_address = $('#woocommerce_stream_usdc_gateway_store_address').val();
    $('.wallet_message').remove();
    try {
        // Connect to cluster
        var connection = await new solanaWeb3.Connection(
            solanaWeb3.clusterApiUrl('mainnet-beta'),
            'confirmed',
        );
        // Generate a new wallet keypair and airdrop SOL
        var wallet = await new solanaWeb3.PublicKey(store_address);
        $('#woocommerce_stream_usdc_gateway_store_address').after('<span class="wallet_message success" style="vertical-align: sub; margin-left: 10px; color: green;">Valid address</span>');
        $('.woocommerce-save-button').attr('disabled', false);
        $('#woocommerce_stream_usdc_gateway_valid_store_address').val('valid');
    } catch (e) {
        $('#woocommerce_stream_usdc_gateway_store_address').after('<span class="wallet_message error" style="vertical-align: sub; margin-left: 10px; color: red;">' + e.message + '</span>');
        $('.woocommerce-save-button').attr('disabled', true);
        $('#woocommerce_stream_usdc_gateway_valid_store_address').val('invalid');
    }
}