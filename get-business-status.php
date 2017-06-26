<?

    $api_key = "YOUR_API_KEY";
    $url = "https://mudogroup.com/api/v1/status/get";

    $post = [
        
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('apikey:'.$api_key));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);

    if($info['http_code'] == 200) {
        
        $response = json_decode($response);
        echo 'Status retrieved successfully!';
        
    } elseif($info['http_code'] == 403) {
        
        echo 'API Key Not Found!';
        
    } elseif($info['http_code'] == 404) {
        
      echo 'Please check your URL';
        
    }

    echo '<pre>'; print_r($response); echo '</pre>';

    curl_close($ch);
?>
