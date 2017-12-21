<?php

include 'conf.php';



$resp = json_decode(file_get_contents('https://api.vk.com/method/messages.search?q='.$_GET['q'].'&peer_id='.$_GET['id'].'&count=100&v=5.69&access_token='.$token),true);

echo '<pre>';
print_r($resp);
echo '</pre>';

?>