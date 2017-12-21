<link rel="stylesheet" type="text/css" href="t.css">
<?php

include 'conf.php';
$uid = $_GET['id'];

$response = json_decode(file_get_contents('https://api.vk.com/method/messages.getHistory?count=200&user_id='.$uid.'&v=5.69&access_token='.$token.'&offset='.$_GET['offset']), true);
$response = $response['response']['items'];
foreach ($response as $key) {

	$timestamp=$key['date'];
	

	echo '<a href="http://vk.com/id'.$key['from_id'].'">'.$key['from_id'].'</a>&nbsp;&nbsp;<b>|</b><strong>'.gmdate("Y-m-d 	H:i:s", $timestamp).'</strong><b>|</b>&nbsp;&nbsp;<b>'.$key['body'].'</b> <br>';
	if ($key['attachments'])
	{
		foreach ($key['attachments'] as $key1) {
			if ($key1['type'] == 'photo')
			{
				$key1 = $key1['photo'];
				if($key1['photo_2560'])
					echo '<img src="'.$key1['photo_2560'].'" onclick="window.open('."'".$key1['photo_2560']."'".');">';
				elseif($key1['photo_1280'])
					echo '<img src="'.$key1['photo_1280'].'" onclick="window.open('."'".$key1['photo_1280']."'".');">';
				elseif($key1['photo_807'])
					echo '<img src="'.$key1['photo_807'].'" onclick="window.open('."'".$key1['photo_807']."'".');">';
				elseif($key1['photo_604'])
					echo '<img src="'.$key1['photo_604'].'" onclick="window.open('."'".$key1['photo_604']."'".');">';
				echo '<br>';
			}
			elseif ($key1['type'] == 'doc') {
				echo '<b style="color:blue"><a href="'.$key1['doc']['url'].'">DOCUMENT</a></b>';
				echo '<hr>';
			}elseif($key1['type'] == 'sticker')
			{
				echo '<img class="stick" src="'.$key1['sticker']['photo_256'].'" width="250" height="250"><br>';
			}
		}
	}
}
echo '<pre>';
print_r($response);
echo '</pre>';


?>