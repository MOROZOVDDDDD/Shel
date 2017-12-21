<?php
include 'conf.php';


$resp = json_decode(file_get_contents('https://api.vk.com/method/messages.getDialogs?count=200&v=5.69&access_token='.$token),true);
echo '<pre>';
print_r($resp);
echo '</pre>';
?>