
<?php
$phan_logo = "data:image/svg+xml;base64,PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjM0IiB3aWR0aD0iMzQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGxpbmVhckdyYWRpZW50IGlkPSJhIiB4MT0iLjUiIHgyPSIuNSIgeTE9IjAiIHkyPSIxIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiM1MzRiYjEiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM1NTFiZjkiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYiIgeDE9Ii41IiB4Mj0iLjUiIHkxPSIwIiB5Mj0iMSI+PHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjZmZmIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjZmZmIiBzdG9wLW9wYWNpdHk9Ii44MiIvPjwvbGluZWFyR3JhZGllbnQ+PGNpcmNsZSBjeD0iMTciIGN5PSIxNyIgZmlsbD0idXJsKCNhKSIgcj0iMTciLz48cGF0aCBkPSJtMjkuMTcwMiAxNy4yMDcxaC0yLjk5NjljMC02LjEwNzQtNC45NjgzLTExLjA1ODE3LTExLjA5NzUtMTEuMDU4MTctNi4wNTMyNSAwLTEwLjk3NDYzIDQuODI5NTctMTEuMDk1MDggMTAuODMyMzctLjEyNDYxIDYuMjA1IDUuNzE3NTIgMTEuNTkzMiAxMS45NDUzOCAxMS41OTMyaC43ODM0YzUuNDkwNiAwIDEyLjg0OTctNC4yODI5IDEzLjk5OTUtOS41MDEzLjIxMjMtLjk2MTktLjU1MDItMS44NjYxLTEuNTM4OC0xLjg2NjF6bS0xOC41NDc5LjI3MjFjMCAuODE2Ny0uNjcwMzggMS40ODQ3LTEuNDkwMDEgMS40ODQ3LS44MTk2NCAwLTEuNDg5OTgtLjY2ODMtMS40ODk5OC0xLjQ4NDd2LTIuNDAxOWMwLS44MTY3LjY3MDM0LTEuNDg0NyAxLjQ4OTk4LTEuNDg0Ny44MTk2MyAwIDEuNDkwMDEuNjY4IDEuNDkwMDEgMS40ODQ3em01LjE3MzggMGMwIC44MTY3LS42NzAzIDEuNDg0Ny0xLjQ4OTkgMS40ODQ3LS44MTk3IDAtMS40OS0uNjY4My0xLjQ5LTEuNDg0N3YtMi40MDE5YzAtLjgxNjcuNjcwNi0xLjQ4NDcgMS40OS0xLjQ4NDcuODE5NiAwIDEuNDg5OS42NjggMS40ODk5IDEuNDg0N3oiIGZpbGw9InVybCgjYikiLz48L3N2Zz4K";
$sol_logo = "data:image/svg+xml;base64,PHN2ZyBmaWxsPSJub25lIiBoZWlnaHQ9IjUwIiB2aWV3Qm94PSIwIDAgNTAgNTAiIHdpZHRoPSI1MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGxpbmVhckdyYWRpZW50IGlkPSJhIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiNmZmMxMGIiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNmYjNmMmUiLz48L2xpbmVhckdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYiIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSI2LjQ3ODM1IiB4Mj0iMzQuOTEwNyIgeGxpbms6aHJlZj0iI2EiIHkxPSI3LjkyIiB5Mj0iMzMuNjU5MyIvPjxyYWRpYWxHcmFkaWVudCBpZD0iYyIgY3g9IjAiIGN5PSIwIiBncmFkaWVudFRyYW5zZm9ybT0ibWF0cml4KDQuOTkyMTg4MzIgMTIuMDYzODc5NjMgLTEyLjE4MTEzNjU1IDUuMDQwNzEwNzQgMjIuNTIwMiAyMC42MTgzKSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHI9IjEiIHhsaW5rOmhyZWY9IiNhIi8+PHBhdGggZD0ibTI1LjE3MDggNDcuOTEwNGMuNTI1IDAgLjk1MDcuNDIxLjk1MDcuOTQwM3MtLjQyNTcuOTQwMi0uOTUwNy45NDAyLS45NTA3LS40MjA5LS45NTA3LS45NDAyLjQyNTctLjk0MDMuOTUwNy0uOTQwM3ptLTEuMDMyOC00NC45MTU2NWMuNDY0Ni4wMzgzNi44Mzk4LjM5MDQuOTAyNy44NDY4MWwxLjEzMDcgOC4yMTU3NGMuMzc5OCAyLjcxNDMgMy42NTM1IDMuODkwNCA1LjY3NDMgMi4wNDU5bDExLjMyOTEtMTAuMzExNThjLjI3MzMtLjI0ODczLjY5ODktLjIzMTQ5Ljk1MDcuMDM4NTEuMjMwOS4yNDc3Mi4yMzc5LjYyNjk3LjAxNjEuODgyNzdsLTkuODc5MSAxMS4zOTU4Yy0xLjgxODcgMi4wOTQyLS40NzY4IDUuMzY0MyAyLjI5NTYgNS41OTc4bDguNzE2OC44NDAzYy40MzQxLjA0MTguNzUxNy40MjM0LjcwOTMuODUyNC0uMDM0OS4zNTM3LS4zMDc0LjYzOTUtLjY2MjguNjk0OWwtOS4xNTk0IDEuNDMwMmMtMi42NTkzLjM2MjUtMy44NjM2IDMuNTExNy0yLjEzMzkgNS41NTc2bDMuMjIgMy43OTYxYy4yNTk0LjMwNTguMjE4OC43NjE1LS4wOTA4IDEuMDE3OC0uMjYyMi4yMTcyLS42NDE5LjIyNTYtLjkxMzguMDIwM2wtMy45Njk0LTIuOTk3OGMtMi4xNDIxLTEuNjEwOS01LjIyOTctLjI0MTctNS40NTYxIDIuNDI0M2wtLjg3NDcgMTAuMzk3NmMtLjAzNjIuNDI5NS0uNDE3OC43NDg3LS44NTI1LjcxMy0uMzY5LS4wMzAzLS42NjcxLS4zMDk3LS43MTcxLS42NzIxbC0xLjM4NzEtMTAuMDQzN2MtLjM3MTctMi43MTQ0LTMuNjQ1NC0zLjg5MDQtNS42NzQzLTIuMDQ1OWwtMTIuMDUxOTUgMTAuOTc0Yy0uMjQ5NDcuMjI3MS0uNjM4MDkuMjExNC0uODY4LS4wMzUtLjIxMDk0LS4yMjYyLS4yMTczNS0uNTcyNC0uMDE0OTMtLjgwNmwxMC41MTgxOC0xMi4xMzg1YzEuODE4Ny0yLjA5NDIuNDg0OS01LjM2NDQtMi4yODc2LTUuNTk3OGwtOC43MTg3Mi0uODQwNWMtLjQzNDEzLS4wNDE4LS43NTE3Mi0uNDIzNS0uNzA5MzYtLjg1MjQuMDM0OTMtLjM1MzcuMzA3MzktLjYzOTQuNjYyNy0uNjk1bDkuMTUzMzgtMS40Mjk5YzIuNjU5NC0uMzYyNSAzLjg3MTgtMy41MTE3IDIuMTQyMS01LjU1NzZsLTIuMTkyLTIuNTg0MWMtLjMyMTctLjM3OTItLjI3MTMtLjk0NDMuMTEyNi0xLjI2MjEuMzI1My0uMjY5NC43OTYzLS4yNzk3IDEuMTMzNC0uMDI0OWwyLjY5MTggMi4wMzQ3YzIuMTQyMSAxLjYxMDkgNS4yMjk3LjI0MTcgNS40NTYxLTIuNDI0M2wuNzI0MS04LjU1OTk4Yy4wNDU3LS41NDA4LjUyNjUtLjk0MjU3IDEuMDczOS0uODk3Mzd6bS0yMy4xODczMyAyMC40Mzk2NWMuNTI1MDQgMCAuOTUwNjcuNDIxLjk1MDY3Ljk0MDNzLS40MjU2My45NDAzLS45NTA2Ny45NDAzYy0uNTI1MDQxIDAtLjk1MDY3LS40MjEtLjk1MDY3LS45NDAzcy40MjU2MjktLjk0MDMuOTUwNjctLjk0MDN6bTQ3LjY3OTczLS45NTQ3Yy41MjUgMCAuOTUwNy40MjEuOTUwNy45NDAzcy0uNDI1Ny45NDAyLS45NTA3Ljk0MDItLjk1MDctLjQyMDktLjk1MDctLjk0MDIuNDI1Ny0uOTQwMy45NTA3LS45NDAzem0tMjQuNjI5Ni0yMi40Nzk3Yy41MjUgMCAuOTUwNi40MjA5NzMuOTUwNi45NDAyNyAwIC41MTkzLS40MjU2Ljk0MDI3LS45NTA2Ljk0MDI3LS41MjUxIDAtLjk1MDctLjQyMDk3LS45NTA3LS45NDAyNyAwLS41MTkyOTcuNDI1Ni0uOTQwMjcuOTUwNy0uOTQwMjd6IiBmaWxsPSJ1cmwoI2IpIi8+PHBhdGggZD0ibTI0LjU3MSAzMi43NzkyYzQuOTU5NiAwIDguOTgwMi0zLjk3NjUgOC45ODAyLTguODgxOSAwLTQuOTA1My00LjAyMDYtOC44ODE5LTguOTgwMi04Ljg4MTlzLTguOTgwMiAzLjk3NjYtOC45ODAyIDguODgxOWMwIDQuOTA1NCA0LjAyMDYgOC44ODE5IDguOTgwMiA4Ljg4MTl6IiBmaWxsPSJ1cmwoI2MpIi8+PC9zdmc+";
?>

<div class="main_body">
    <div class="content__pair">
        <div class="content__pair--wide">
            <div>
                <?php echo __('In order to finalize your order you must finish the payment process. Please follow these instructions:', 'stream_usdc');?>
            </div>
            <br>
            <div>
                <?php echo _e('1. Open StreamPay application on your mobile device
                <br>
                2. Click “Pay” on the home screen
                <br>
                3. Scan the QR-code
                <br>
                4. Swipe to confirm the payment
                <br>
                5. Wait for payment verification', 'stream_usdc');?>
            </div>
            <br>
            <div>
                <?php echo __('After payment is complete your order will be handled and sent.', 'stream_usdc');?>
            </div>
        </div>
        <div class="content__pair--narr">
            <h4>
                <?php echo __('Scan this code to pay', 'stream_usdc');?>
            </h4>
            <div class="stream_qr">
                <img src="<?php echo STREAM_PLUGIN_URL.'/assets/images/tmp_stream_qrcode.png';?>">
            </div>
        </div>
    </div>
    <div class="content__pair">
        <div class="content__pair--header">
            <div><?php echo __('or pay with browser wallet', 'stream_usdc');?></div>
        </div>

        <div class="content__pair--content">
            <div class="content__pair--half">
                <button class="pay_browser_button phan">
                    <i class="wc-wallet-button-icon">
                        <img src="<?php echo esc_attr($phan_logo) ?>">
                    </i>
                    <?php echo __('Phantom', 'stream_usdc'); ?>
                </button>
            </div>
            <div class="content__pair--half">
                <button class="pay_browser_button sol">
                    <i class="wc-wallet-button-icon">
                        <img src="<?php echo esc_attr($sol_logo) ?>">
                    </i>
                    <?php echo __('Solflare', 'stream_usdc'); ?>
                </button>
            </div>
        </div>

    </div>
    <div class="content__pair">
        <div class="content__pair--header">
            <h4><?php echo __('Waiting for payment', 'stream_usdc');?></h4>
        </div>
        <div class="content__pair--content">
            <div class="content__pair--subheader">
                <?php echo __('Receivers wallet address', 'stream_usdc'); ?>
            </div>
            <div class="content__pair--subcontent">
                <strong>
                        <span class="woocommerce-Price-amount amount">
                            <?php echo '<span class="all-copy ">' . esc_html($store_address) . ' <span class="storewalletaddress clipboard far fa-copy" title="Copy to clipboard" data-value="' . esc_html($store_address) . ' "></span></span>' ?>
                        </span>
                </strong>
            </div>

            <div class="content__pair--subheader">
                <?php echo __('Payment amount', 'stream_usdc'); ?>
            </div>

            <div class="content__pair--subcontent">
                <?php
                echo '<img style="display:inline;height:18px;width:18px;vertical-align:middle;" src="' . $usdc_logo_url. '" />';
                echo '<strong><span class="all-copy">&nbsp;&nbsp;' . esc_html($order_total_price) . ' </span>'. '<span class="no-copy">' . __('USDC', 'stream_usdc') . '</span></strong>';
                ?>
            </div>
            <div class="content__pair--subheader"></div>
            <div class="content__pair--subcontent">
                <div class="processing_image loading" id="streamBtn">
                <img src="<?php echo STREAM_PLUGIN_URL.'/assets/images/payment_processing_animation.gif';?>">
                </div>
            </div>
            <div class="content__pair--subheader">
                <?php echo __('[click to see confirmation]', 'stream_usdc'); ?>
            </div>
        </div>
    </div>
    <div class="content__pair">
        <div class="content__pair--header">
            <h4><?php echo __('Don\'t have StreamPay?', 'stream_usdc');?></h4>
            <p><?php echo __('Download the application for mobile device', 'stream_usdc');?></p>
        </div>
        <div class="content__pair--content">
            <div class="content__pair--subheader">
                <a class="app_browser_link apple" href="https://apps.apple.com/us/genre/ios/id36">
                    <img width="150" src="<?php echo STREAM_PLUGIN_URL.'/assets/images/apple-app-store.png';?>">
                </a>
            </div>

            <div class="content__pair--subheader">
                <a class="app_browser_link google" href="https://play.google.com/store/apps/">
                    <img width="150" src="<?php echo STREAM_PLUGIN_URL.'/assets/images/google-app-store.png';?>">
                </a>
            </div>
        </div>
    </div>
</div>

<div id="streammodal" class="stream_modal">
    <!-- Modal content -->
    <div class="modal-content">
        <p class="modal-header">Payment verified</p>
        <div class="processing_image">
            <img width="100" src="<?php echo STREAM_PLUGIN_URL.'/assets/images/payment_confirmation_animation.gif';?>">
        </div>
        <p class="modal-text">Your order is now being handled and will be on its way soon! <br> You can now close his window.</p>
        <div class="modal-footer">
            <a href="<?php echo home_url(); ?>">&#60; Back to home page</a>
        </div>
    </div>

</div>

<script>
    var storeWalletAddress = "<?php echo !empty($store_address)? $store_address:''; ?>";
    var contractaddress = "<?php echo !empty($usdc_contract_address)? $usdc_contract_address:''; ?>";
    var amount = <?php echo !empty($order_total_price)? $order_total_price:0; ?>;
    var order_id = <?php echo !empty($order_id)? $order_id:0; ?>;
</script>