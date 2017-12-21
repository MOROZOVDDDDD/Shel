<?

include 'conf.php';
$uid = $_GET['id'];
ini_set('display_errors', 'Off');
$count = json_decode(file_get_contents('https://api.vk.com/method/messages.getHistory?count=200&user_id='.$uid.'&v=5.69&access_token='.$token.'&offset='.$i), true);

$messages = array('count' => $count['response']['count'], 'messages' => array());
$count =  intdiv($count['response']['count'], 200) + 1;
//$count = 2;
for ($i=0; $i < $count; $i++) { 
	$response = json_decode(file_get_contents('https://api.vk.com/method/messages.getHistory?count=200&rev=1&user_id='.$uid.'&v=5.69&access_token='.$token.'&offset='.$i * 200), true);
	$response = $response['response']['items'];
	foreach ($response as $message) {
		array_push($messages['messages'], $message);
	}
}
echo (decodeUnicode(json_encode($messages), 'utf-8'));

function decodeUnicode($s, $output = 'utf-8') 
{ 
    return preg_replace_callback('#\\\\u([a-fA-F0-9]{4})#', function ($m) use ($output) { 
        return iconv('ucs-2be', $output, pack('H*', $m[1])); 
    }, $s); 
} 


//$response = json_decode(file_get_contents('https://api.vk.com/method/messages.getHistory?count=200&user_id='.$uid.'&v=5.69&access_token='.$token.'&offset='.$_GET['offset']), true);

//echo '<pre>';
//print_r($response);