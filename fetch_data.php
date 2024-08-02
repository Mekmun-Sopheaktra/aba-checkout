<?php
require_once 'PayWayApiCheckout.php';

// Initialize variables
$req_time = time();
$merchant_id = "ec000262";
$url = PayWayApiCheckout::getTransactionApiUrl();

// Initialize cURL
$ch = curl_init($url);

// Setup request to send JSON via POST
$data = array(
    'merchant_id' => $merchant_id,
    'req_time' => $req_time,
    'hash' => PayWayApiCheckout::getHash($req_time . $merchant_id),
);
$payload = json_encode($data);

// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Execute the cURL request and handle errors
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$error_msg = curl_error($ch);
curl_close($ch);

// Decode the JSON response
$response_data = json_decode($response, true);

if ($http_code == 200 && json_last_error() === JSON_ERROR_NONE) {
    foreach ($response_data['data'] as $transaction) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($transaction['transaction_id']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['transaction_date']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['apv']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['payment_status']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['payment_status_code']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['payment_type']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['original_amount']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['original_currency']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['total_amount']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['discount_amount']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['refund_amount']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['payment_amount']) . '</td>';
        echo '<td>' . htmlspecialchars($transaction['payment_currency']) . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="13">No data available.</td></tr>';
}
?>
