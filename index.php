<!DOCTYPE html>
<html lang="en">

<head>
    <title>MSPT | PayWay Checkout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="PayWay">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <link rel="stylesheet" href="/style.css">
</head>

<body>
<div id="aba_main_modal" class="aba-modal">
    <div class="aba-modal-content">
        <?php
        require_once 'PayWayApiCheckout.php';
        $req_time = time();
        $merchant_id = "ec000262";
        $transactionId = time();
        $amount = '0.01';
        $firstName = 'Makara';
        $lastName = 'Prom';
        $phone = '093630466';
        $email = 'prom.makara@ababank.com';
        $return_params = "Hello World!";
        ?>
        <form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getCheckoutApiUrl(); ?>"
              id="aba_merchant_request">
            <input type="hidden" name="hash"
                   value="<?php echo PayWayApiCheckout::getHash($req_time . ABA_PAYWAY_MERCHANT_ID . $transactionId . $amount . $firstName . $lastName . $email . $phone . $return_params); ?>"
                   id="hash"/>
            <input type="hidden" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
            <input type="hidden" name="amount" value="<?php echo $amount; ?>" id="amount"/>
            <input type="hidden" name="firstname" value="<?php echo $firstName; ?>"/>
            <input type="hidden" name="lastname" value="<?php echo $lastName; ?>"/>
            <input type="hidden" name="phone" value="<?php echo $phone; ?>"/>
            <input type="hidden" name="email" value="<?php echo $email; ?>"/>
            <input type="hidden" name="return_params" value="<?php echo $return_params; ?>"/>
            <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>"/>
            <input type="hidden" name="req_time" value="<?php echo $req_time; ?>"/>
        </form>
    </div>
</div>

<div class="container">
    <h1>💲Sponsor Me to Fishing🙏</h1>
    <p>Your donation can make a difference. Click the button below to proceed with your contribution.</p>
    <button class="checkout_button" id="checkout_button">Donate Now</button>
</div>


<script src="https://checkout.payway.com.kh/plugins/checkout2-0.js"></script>
<link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
<script>
    $(document).ready(function () {
        $('#checkout_button').click(function () {
            AbaPayway.checkout();
        });
    });
</script>
</body>
</html>
