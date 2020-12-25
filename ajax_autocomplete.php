
<?php
header("Content-Type: application/json");

$conn = mysqli_connect(
        "localhost",
        "cse20172134",
        "cse20172134",
        "db_cse20172134"
) or die("db fail");

mysqli_query($conn,"SET NAMES utf8");

//term으로 사용자 입력값 받아옴
 $term = $_GET['term'];
 $sql = "SELECT trrsrtNm from tour_table where trrsrtNm Like '".$term."%'";


 $tours = mysqli_query($conn,$sql);


$result = [];

foreach($tours as $tour) {
    if(strpos($tour, $term) !== false) {
        $result[] = array("label" => $tour['trrsrtNm'], "value" => $tour['trrsrtNm']);
	//$result[] = $tour['trrstrNm'];
    }
}

exit(json_encode($result, JSON_UNESCAPED_UNICODE));
	
	

?>
