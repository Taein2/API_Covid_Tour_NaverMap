
<?php



$conn = mysqli_connect(
        "localhost",
        "cse20172134",
        "cse20172134",
        "db_cse20172134"
) or die("db fail");

$whenToday = date("Y.m.d");


mysqli_query($conn,"SET NAMES utf8");

$url1 = array("city_seoul","city_busan","city_gyeongbuk","city_gyeonggido","city_gangwon","city_gyeongnam");
$url_in = array("seoul","busan","gyeongbuk","gyeonggido","gangwon","gyeongnam");
$url2 = array("city_daejeon","city_incheon","city_daegu","city_ulsan","city_sejong","city_jeonnam");
$url_in2 = array("daejeon","incheon","daegu","ulsan","sejong","jeonnam");

$url_in3 = array("chungbuk","chungnam","jeonbuk","gwangju","jeju");
$url3 = array("충북","충남","전북","광주","제주");

if(is_array($url1)){
        foreach(array_keys($url1) as $key){
                $val1 = $url1[$key];
                $val2 = $url_in[$key];
		echo $val1." ".$val2."\n";	
        	$sql = "truncate table $val2;";
		mysqli_query($conn,$sql);
		$sql = "INSERT INTO $val2(district,today,day) select district,sum(today),day from $val1 where day = '".$whenToday."' group by district;";
		mysqli_query($conn,$sql);
	}
}

if(is_array($url2)){
        foreach(array_keys($url2) as $key){
                $val1 = $url2[$key];
                $val2 = $url_in2[$key];
 		echo $val1." ".$val2."\n";

        	$sql = "truncate table $val2;";
                mysqli_query($conn,$sql);
                $sql = "INSERT INTO $val2(district,today,day) select district,count(id),day from $val1 where day = '".$whenToday."' group by district;";
                mysqli_query($conn,$sql);
        }
}



if(is_array($url_in3)){
        foreach(array_keys($url_in3) as $key){
                $val = $url_in3[$key];
		$val2 = $url3[$key];
                echo $val."\n";

                $sql = "truncate table $val;";
                mysqli_query($conn,$sql);
                $sql = "INSERT INTO $val(district,today,day) select district,today,day from korea where day = '".$whenToday."' and district = '".$val2."';";
                mysqli_query($conn,$sql);
        }
}




?>
