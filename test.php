<?php
for ($i = 1; $i <= 12; $i++) {

    $url = "https://jsonplaceholder.typicode.com/users/$i";
    $jsonfile = @file_get_contents($url);
    $jsondump = json_decode($jsonfile, true);
    if (!empty($jsondump) ) {
        echo "<pre>";
        print_r($jsondump);
    } else {
        break;
    }
}

