<?php
// $_POST['form-field-currency'];
// $_POST['form-field-card'];
if(isset($_POST['send_form'])){
    echo "isdjksd skdjsd sldkjsd ";
    if (!isset($_POST['form_fields[amount]'])){
    echo "isdjksd skdjsd sldkjsd  3433333332333332 ";
        
    }
}
$amount = $_POST['form_fields[amount]'];
$rempno = $_POST['form-field-redemption'];
// $_POST['form-field-card_number'];
// $_POST['form-field-exp_mm'];
// $_POST['form-field-exp_yy"'];
// $_POST['form-field-cvv'];
echo $amount, $rempno;
?>