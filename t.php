<link rel="stylesheet" type="text/css" href="t.css">
<?php

include 'conf.php';

$response = json_decode(file_get_contents('https://api.vk.com/method/messages.getHistoryAttachments?peer_id='.$_GET['id'].'&media_type=photo&access_token='.$token.'&count=200&v=5.69'), true);
$response = $response['response'];

foreach ($response['items'] as $key) {
	if($key['attachment']['photo']['photo_2560'])
		echo '<img src="'.$key['attachment']['photo']['photo_2560'].'" onclick="window.open('."'".$key['attachment']['photo']['photo_2560']."'".');">';
	elseif($key['attachment']['photo']['photo_1280'])
		echo '<img src="'.$key['attachment']['photo']['photo_1280'].'" onclick="window.open('."'".$key['attachment']['photo']['photo_1280']."'".');">';
	elseif($key['attachment']['photo']['photo_807'])
		echo '<img src="'.$key['attachment']['photo']['photo_807'].'" onclick="window.open('."'".$key['attachment']['photo']['photo_807']."'".');">';
	elseif($key['attachment']['photo']['photo_604'])
		echo '<img src="'.$key['attachment']['photo']['photo_604'].'" onclick="window.open('."'".$key['attachment']['photo']['photo_604']."'".');">';

	//photo_604
	echo '<br>';

}
?>