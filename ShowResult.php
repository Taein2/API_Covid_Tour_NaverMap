<?php

$value = $_GET["search"];
$conn = mysqli_connect(
        "localhost",
        "cse20172134",
        "cse20172134",
        "db_cse20172134"
) or die("db fail");

mysqli_query($conn,"SET NAMES utf8");

$sql = "SELECT * from tour_table where trrsrtNm like '$value%';";

$info1 = array();
$info2 = array();
$info3 = array();
$info4 = array();
$info5 = array();
$info6 = array();
$info7 = array();
$info8 = array();
if ($result = mysqli_query($conn, $sql)) {
  while ($obj = mysqli_fetch_object($result)) {
	$info1[] = $obj->trrsrtNm;
	$info2[] = $obj->rdnmadr;
	$info3[] = $obj->latitude;
	$info4[] = $obj->longitude;
	$info5[] = $obj->aceptncCo;
	$info6[] = $obj->trrsrtIntrcn;
	$info7[] = $obj->phoneNumber;
	$info8[] = $obj->institutionNm;
	
  }
  mysqli_free_result($result);
}
if(is_array($info1)){
        foreach(array_keys($info1) as $key){

?>
<HTML>
<HEAD>
<link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=8w3da05u2l"></script>


</HEAD>
<BODY>
	<?php
		echo "<ul><li>"; 
 		echo $info1[$key];
		echo "<br>";
                echo $info2[$key];
		echo "<br>";
		$val1 = $info3[$key];
		$val2 = $info4[$key];
                echo $info5[$key];
		echo "<br>";
                echo $info6[$key];
		echo "<br>";
                echo $info7[$key];
		echo "<br>";
                echo $info8[$key];
		echo "<br>";
		echo "<div id ='map$key' style='width:30%; height:30%;' ></div>";
		echo "<script>";
		echo "var map = new naver.maps.Map('map$key', {";
                echo "zoom: 10,";
                echo "center: new naver.maps.LatLng($val1,$val2)";
                echo "});";
                echo "var markers = new naver.maps.Marker({";
                echo "position: new naver.maps.LatLng($val1,$val2),";
                echo "map: map";
                echo "});";
		echo "";
		echo "</script>";
		
		echo "</li></ul>";

        	}
	}
	?>
</BODY>
</HTML>
<script>
//	var maps = <?php echo json_encode($info3)?>;
//	var markers = <?php echo json_encode($info4)?>;
/*
$(document).ready(function(){
    		var map = new naver.maps.Map('map', {
        		zoom: 11,
       			center: new naver.maps.LatLng( '<?=$val1 ?>', '<?=$val2 ?>')
    		});

  	 	var markers = new naver.maps.Marker({ 
			position: new naver.maps.LatLng( '<?=$val1 ?>', '<?=$val2 ?>'),
      		 	map: map
   		 });
});

*/
</script>
