
<?php

header("Content-Type: application/json");

$value = $_POST["id"];
$conn = mysqli_connect(
        "localhost",
        "cse20172134",
        "cse20172134",
        "db_cse20172134"
) or die("db fail");

mysqli_query($conn,"SET NAMES utf8");

 $sql = "SELECT trrsrtNm,rdnmadr from tour_table where rdnmadr like '%$value%';";

 $tours = mysqli_query($conn,$sql);


$result = [];

foreach($tours as $tour) {
    if(strpos($tour, $term) !== false) {
        $result[] = array("trrsrtNm" => $tour['trrsrtNm'], "rdnmadr" => $tour['rdnmadr']);
        //$result[] = $tour['trrstrNm'];
    }
}

exit(json_encode($result, JSON_UNESCAPED_UNICODE));



?>





~

