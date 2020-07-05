
<?php 
    $weblink = "http://localhost/chatbox/";
    $weblinka = "";
    $conn = mysqli_connect("localhost:3306","root","","chatbox") or die("could not connect to the database");
	mysqli_set_charset( $conn, 'utf8');

    date_default_timezone_set( "Asia/kolkata" );
    
    $apiurl = "api.php";
	
    function request($url, $headers, $postParams = '') {
			
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            // this headers required for all requests
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, 1);
            if ($postParams) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postParams);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close($ch);
            return $server_output;
    }

    function request_api($url) {
			
        
        $handle = curl_init();
         
        // Set the url
        curl_setopt($handle, CURLOPT_URL, $url);
        // Set the result output to be a string.
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
         
        $output = curl_exec($handle);
         
        curl_close($handle);
         
        echo $output;
      
}


?>

