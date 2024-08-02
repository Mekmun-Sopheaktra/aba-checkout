<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e2e2e2;
        }

        .error, .success {
            padding: 10px;
            margin-bottom: 20px;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Transaction ID</th>
        <th>Transaction Date</th>
        <th>APV</th>
        <th>Payment Status</th>
        <th>Payment Status Code</th>
        <th>Payment Type</th>
        <th>Original Amount</th>
        <th>Original Currency</th>
        <th>Total Amount</th>
        <th>Discount Amount</th>
        <th>Refund Amount</th>
        <th>Payment Amount</th>
        <th>Payment Currency</th>
    </tr>
    </thead>
    <tbody id="transactionTableBody">
    <!-- Data will be inserted here via JavaScript -->
    </tbody>
</table>

<script>
    function fetchData() {
        fetch('fetch_data.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('transactionTableBody').innerHTML = data;
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Initial fetch
    fetchData();
</script>

<script src="https://checkout.payway.com.kh/plugins/checkout2-0.js"></script>
<!-- These JavaScript files are using for only production -->
<link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
<script>
    $(document).ready(function () {
        $('#checkout_button').click(function () {
            $('#aba_merchant_request').submit();
        });
    });
</script>
</body>
</html>
