<?php
 $ch = curl_init();

 $apiUrl = 'http://localhost:3000/api/v1/getData/encounters';

 curl_setopt($ch, CURLOPT_URL, $apiUrl);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_TIMEOUT, 10);

 $response = curl_exec($ch);

 if (curl_errno($ch)) {
  echo 'cURL error: ' . curl_error($ch);
  curl_close($ch);
  exit;
}

curl_close($ch);

$data = json_decode($response, true);

if (!is_array($data)) {
  echo 'Unexpected data structure';
  exit;
}

foreach ($data as $item) {
  echo 'Encounter ID: ' . $item['id'] . "\n";
  echo 'Encounter Name: ' . $item['name'] . "\n";
}

echo "Hello from WSL!";
?>
