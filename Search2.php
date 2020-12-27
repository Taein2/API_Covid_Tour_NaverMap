
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

if( $value === '광주'){
	$value = "광주광역시";
}
if ($value === '대구'){
	$value = "대구광역시";
}
if ($value === '서울'){
	$value = "서울특별시";
}
if($value === '경기'){
	$value = "경기도";
}
if($value === '강원'){
	$value = "강원";
}
if($value ==='충북'){
	$value ="충청북도";
}
if($value === '충남'){
	$value ="충청남도";
}
if($value === '경북'){
	$value ="경상북도";
}
if($value === '부산'){
	$value ="부산광역시";
}

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

