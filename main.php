<?php
$servername = "localhost";
$database = "db1";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function GetFile()
{
        $jsonfile = file_get_contents("https://jsonplaceholder.typicode.com/users/$i");
        $mydump = json_decode($jsonfile, true);
        if (empty($mydump)) {
            echo "<pre>";
        else {
                break;
            }
        }

}
echo "Connected successfully<br/><br/>";
for ($i = 1; $i <= 12; $i++) {
$json = "https://jsonplaceholder.typicode.com/users/$i";
$jsonfile = file_get_contents($json);

$mydump = json_decode($jsonfile, true);
    if (!empty($mydump) ) {
        echo "<pre>";
//echo "<br/> result of decode:<br/><br/>";
//echo "<pre>";
$userName = $mydump['name']; //user
$userNick = $mydump['username']; //user
$eMail = $mydump['email']; //user
$street = $mydump['address']['street']; //address
$apartment = $mydump['address']['suite']; //address
$city = $mydump['address']['city']; //address
$zipCode = $mydump['address']['zipcode']; //address
$lat = $mydump['address']['geo']['lat']; //address
$lng = $mydump['address']['geo']['lng']; //address
$phone = $mydump['phone']; //address
$website = $mydump['website']; //address
$companyName = $mydump['company']['name']; //business
$catchPhrase = $mydump['company']['catchPhrase']; //business
$bs = $mydump['company']['bs']; //business

//$array_name = [$userName, $userNick, $eMail];
//$array_address = [$street, $apartment, $city, $zipCode, $lat, $lng, $phone,$website];
//$array_company = [$companyName, $catchPhrase, $bs];

//print_r($mydump);
//echo "<br/>";
//print_r($array_name);
//echo "<br/>";
//print_r($array_address);
echo "<br/>";
//print_r($array_company);
$business = "INSERT INTO business (`company_name`,`phrase`,`bs`) VALUES ('$companyName','$catchPhrase','$bs')";
$conn->query($business);
$businessLastId = $conn->insert_id;

$address = "INSERT INTO address (`street`,`suite`,`city`,`zipcode`,`geo_lat`,`geo_lng`,`phone`,`website`) VALUES ('$street','$apartment','$city','$zipCode','$lat','$lng','$phone','$website')";
$conn->query($address);
$addressLastId = $conn->insert_id;

$user = "INSERT INTO users (`name`,`username`,`email`,`address_id`,`company_id`) VALUES ('$userName','$userNick','$eMail','$addressLastId','$businessLastId')";
$conn->query($user);
$userLastId = $conn->insert_id;
printf("ID новой записи: %d.\n", $conn->insert_id);
//if (mysqli_query($conn, $sql)) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//}

echo "<br/>";
echo "<br/>";
$getAll = "SELECT * FROM users LEFT JOIN address ON users.address_id = address.id LEFT JOIN business ON users.company_id = business.id";
//$conn->query($getAll);
$result = $conn->query($getAll);
foreach($result as $row) {
    echo $row['column_name'];
    print_r($row);
}
} else {
    break;
}
}
mysqli_close($conn);
?>
