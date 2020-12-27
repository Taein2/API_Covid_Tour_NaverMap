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


?>
<HTML>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=8w3da05u2l"></script>
<link rel=stylesheet href='style3.css' type='text/css'>
<script src="https://kit.fontawesome.com/2d323a629b.js" crossorigin="anonymous"></script>
<meta content="width=device-width, initial-scale=1" name="viewport" />
</head>
<body>
  <div class="header">
        <nav class="navbar">
                <div class="navbar_logo">
                        <i class = "fab fa-accusoft"></i>
                        <a href="main.html" style="text-decoration:none; color:white;">Covid-19 Tour Guide</a>
                </div>
  <ul class="navbar_menu">
                        <li><a href="main.html" style="text-decoration:none; color:white;">검색하기</a></li>
                        <li><a href="map.html" style="text-decoration:none; color:white;">지역별 정보</a></li>

                </ul>

                <ul class="navbar_icons">
			<li><i class="">DEVELOPER</i></li>
                        <li><i class="">20172134</i></li>
                        <li><i class="">KIM TAE IN</i></li>
                </ul>
                <a href="#" class="navbar_toogleBtn">
                        <i class="fas fa-bars"></i>
                </a>
    </div>



<div class="bodyd">
	
<?php

$al;

if(is_array($info1)){
        foreach(array_keys($info1) as $key){
?>


	<?php
		$dis = explode(' ',$info2[$key]);
		if($dis[0] === "충청북도"){
			$sql = "select today from korea where district = '충북';";
			$row = mysqli_query($conn,$sql);
			$today = mysqli_fetch_array($row);
			if($today[0] > 20 && $today[0] <50){
				$al = 2;
			}else if($today[0] >=50){
				$al = 3;
			}else{	
				$al = 1;
			}
		}
		$dis = explode(' ',$info2[$key]);
                if($dis[0] === "서울특별시"){
                        $sql = "select today from korea where district = '서울';";

			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }
                }
                if($dis[0] === "경기도"){
                        $sql = "select today from korea where district = '경기';";
                         $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }


                }
                if($dis[0] === "인천광역시"){
                        $sql = "select today from korea where district = '인천';";

 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

               	} 
                if($dis[0] === "강원도"){
                        $sql = "select today from korea where district = '강원';";

 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

                }
                if($dis[0] === "세종특별자치시"){
                        $sql = "select today from korea where district = '세종';";
 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }


		}
                
                if($dis[0] === "충청남도"){
                        $sql = "select today from korea where district = '충남';";

 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

                }

	 	if($dis[0] === "경상북도"){
                        $sql = "select today from korea where district = '경북';";

 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

                }
		 if($dis[0] === "대전광역시"){
                        $sql = "select today from korea where district = '대전';";

			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

                }
 		if($dis[0] === "전라북도"){
                        $sql = "select today from korea where district = '전북';";

			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }


              	}  
		 if($dis[0] === "광주광역시"){
                        $sql = "select today from korea where district = '광주';";

 			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

		}
                
		 if($dis[0] === "전라남도"){
                        $sql = "select today from korea where district = '전남';";
 			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }


                }
		 if($dis[0] === "제주특별자치시도"){
                        $sql = "select today from korea where district = '제주';";
			 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }


                }
		 if($dis[0] === "부산광역시"){
                        $sql = "select today from korea where district = '부산';";

			 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

                }
		 if($dis[0] === "울산광역시"){
                        $sql = "select today from korea where district = '울산';";
			 $row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }
		}	 
		if($dis[0] === "경상남도"){
                        $sql = "select today from korea where district = '경남';";
			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

		}
		 if($dis[0] === "대구광역시"){
                        $sql = "select today from korea where district = '대구';";
			$row = mysqli_query($conn,$sql);
                        $today = mysqli_fetch_array($row);
                        if($today[0] > 20 && $today[0] <50){
                                $al = 2;
                        }else if($today[0] >=50){
                                $al = 3;
                        }else{
                                $al = 1;
                        }

                }


		if($al === 1){
			$color = "green";
		}else if($al === 2){
			$color = "orange";

		}else{
			$color = "red";
			
		}
	
		echo "<ul style:'margin-top:10px;'><li>";
 		echo "<br><br><br><br>";
		echo "<font size=7>  위험도 : $al </font>";
		echo "<canvas id='canvas$key' width='40px' height='40px'></canvas>";
		echo "<script>";
		/*echo "window.onload = function(){";*/
		echo "var canvas = document.getElementById('canvas$key');";
    		echo "var ctx = canvas.getContext('2d');";
		echo "ctx.beginPath();";
		echo "ctx.arc(20, 20, 16, 0, Math.PI * 2);";
		echo "ctx.stroke();";	
		echo "ctx.fillStyle='$color';";
		echo "ctx.fill();";
		/*echo "}";*/
		echo "</script>";	
		echo "<br><br><font size=5>관광지명 : ".$info1[$key];
		echo "</font><br><br>";
                echo "<font size=4>주소 : ".$info2[$key];
		echo "</font><br><br>";
		$val1 = $info3[$key];
		$val2 = $info4[$key];
		$val3 = $info1[$key];
                echo "<font size=3>수용 인원 : ".$info5[$key];
		echo "</font><br><br>";
                echo "<font size=2>상세 설명 : ".$info6[$key];
		echo "</font><br><br>";
                echo "관리기관 전화번호 : ".$info7[$key];
		echo "<br><br>";
                echo "관리기관명 : ".$info8[$key];
		echo "<br>";
		echo "<br><font size=2>Marker 클릭시 네이버 지도로 이동합니다</font>";
		echo "<div id ='map$key' style='margin:0 auto; text-align:center; width:60%; height:60%;' ></div><br><br><br>";
		echo "<script>";
		echo "var map = new naver.maps.Map('map$key', {";
                echo "zoom: 10,";
                echo "center: new naver.maps.LatLng($val1,$val2)";
                echo "});";
                echo "var markers = new naver.maps.Marker({";
                echo "position: new naver.maps.LatLng($val1,$val2),";
                echo "map: map";
                echo "});";
		echo "naver.maps.Event.addListener(markers, 'click', function(e) {";
   		echo "var overlay = e.overlay,"; // marker
        	echo "position = overlay.getPosition(),";
        	echo "url = 'http://map.naver.com/index.nhn?enc=utf8&level=2&lng=$val2&lat=$val1&pinTitle=$val3&pinType=SITE';";

    		echo "window.open(url);";
		echo "});";
		echo "</script>";
		
		echo "</li></ul>";

        	}
	}
	?>

</div>
</body>
</HTML>
<script>

const toggleBtn = document.querySelector('.navbar_toogleBtn');
const menu = document.querySelector('.navbar_menu');
const icons = document.querySelector('.navbar_icons');

toggleBtn.addEventListener('click', ()=>{
        icons.classList.toggle('active');
        menu.classList.toggle('active');
});

</script>
