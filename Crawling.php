

<?php


include "simplehtmldom_1_9_1/simple_html_dom.php";

$pageNo = 1;
$Service_Key = 'xHa9EbCYOexoRX%2F1U469tH6Wje773SARQzERJeKZQQb%2BAPFg%2B%2F1DCSMGTm5%2FTGNjpzVwWesxccldgg8%2Bq6CaEw%3D%3D';
$conn = mysqli_connect(
        "localhost",
        "cse20172134",
        "cse20172134",
        "db_cse20172134"
) or die("db fail");


mysqli_query($conn,"SET NAMES utf8");

$whenToday = date("Y.m.d");
$whenTodayYear = date("Y");

for($pageNo=1;$pageNo<=6;$pageNo++){

	
  $url = 'http://api.data.go.kr/openapi/tn_pubr_public_trrsrt_api?serviceKey='.$Service_Key.'&pageNo='.$pageNo.'&numOfRows=100&type=xml';
  $html = file_get_html($url);
  
  foreach($html->find('item') as $value){
	$trrsrtNm = $value->find('trrsrtNm',0)->plaintext;	//관광지명
	$trrsrtNm = trim($trrsrtNm);
	//$trrsrtNm = trim(preg_replace('/\s+/','',$trrsrtNm));
  	$rdnmadr = $value->find('rdnmadr',0)->plaintext;	//주소
	$rdnmadr = trim($rdnmadr);
	//$rdnmadr = trim(preg_replace('/\s+/','',$rdnmadr));
	//$lnmadr = $value->find('lnmadr',0)->plaintext;		//주소
	//$lnmadr = trim($lnmadr);
	//$lnmadr = trim(preg_replace('/\s+/','',$lnmadr));
	$latitude = $value->find('latitude',0)->plaintext;	//위도
	$latitude = trim($latitude);
	//$latitude = trim(preg_replace('/\s+/','',$latitude));
	$longitude = $value->find('longitude',0)->plaintext;	//경도
	$longitude = trim($longitude);
 	//$longitude = trim(preg_replace('/\s+/','',$longitude));
	$aceptncCo = $value->find('aceptncCo',0)->plaintext;	//수용인원
	$aceptncCo = trim($aceptncCo);
 	//$aceptncCo = trim(preg_replace('/\s+/','',$aceptncCo));
	$trrsrtIntrcn = $value->find('trrsrtIntrcn',0)->plaintext; // 상세내용
	$trrsrtIntrcn = trim($trrsrtIntrcn);
	//$trrsrtIntrcn = trim(preg_replace('/\s+/','',$trrsrtIntrcn));
	$phoneNumber = $value->find('phoneNumber',0)->plaintext; //폰번호
	$phoneNumber = trim($phoneNumber);
	//$phoneNumber = trim(preg_replace('/\s+/','',$phoneNumber));
	$institutionNm = $value->find('institutionNm',0)->plaintext;//관리기관
	$institutionNm = trim($institutionNm);
	//$institutionNm = trim(preg_replace('/\s+/','',$institutionNm));
	$referenceDate = $value->find('referenceDate',0)->plaintext;//데이터기준일자
	$referenceDate = trim($referenceDate);
	//$referenceDate = trim(preg_replace('/\s+/','',$referenceDate));
	preg_replace("()", "", $trrsrtNm);

	$sql = "INSERT INTO tour_table(trrsrtNm,rdnmadr,latitude,longitude,aceptncCo,trrsrtIntrcn,phoneNumber,institutionNm,referenceDate) select '".$trrsrtNm."','".$rdnmadr."','".$latitude."','".$longitude."','".$aceptncCo."','".$trrsrtIntrcn."','".$phoneNumber."','".$institutionNm."','".$referenceDate."' from dual where not exists (select trrsrtNm,rdnmadr,latitude,longitude,aceptncCo,trrsrtIntrcn,phoneNumber,institutionNm,referenceDate from tour_table where trrsrtNm = '".$trrsrtNm."' and rdnmadr = '".$rdnmadr."' and latitude = '".$latitude."' and longitude = '".$longitude."' and aceptncCo = '".$aceptncCo."' and trrsrtIntrcn = '".$trrsrtIntrcn."' and phoneNumber = '".$phoneNumber."' and institutionNm = '".$institutionNm."' and referenceDate = '".$referenceDate."');";
       
//	  $sql = "INSERT INTO tour_table(trrsrtNm,rdnmadr,lnmadr,latitude,longitude,aceptncCo,trrsrtIntrcn,phoneNumber,institutionNm,referenceDate) 
//values ('".$trrsrtNm."','".$rdnmadr."','".$lnmadr."','".$latitude."','".$longitude."','".$aceptncCo."','".$trrsrtIntrcn."','".$phoneNumber."','".$institutionNm."','".$referenceDate."')";
	
	mysqli_query($conn,$sql);
	
	$sql = "DELETE FROM tour_table where rdnmadr ='';";
	mysqli_query($conn,$sql);
	
  }
	echo $pageNo." page 저장 완료!\n";

}
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);


$urlGyeongnam = "http://xn--19-q81ii1knc140d892b.kr/main/main.do";
$html = file_get_html($urlGyeongnam,false, stream_context_create($arrContextOptions));
$district = array();
$total = array();
$today = array();
$temp = array();
foreach($html->find('div.cont.corona_map') as $html2){
	foreach($html2->find('div.city_board') as $html3){
		foreach($html3->find('div.table.type1.pt10') as $element){
			foreach($element->find('thead') as $row){
				foreach($row->find('th') as $val){
					$val = $val->plaintext;
					$val = preg_replace('/\s+/','',$val);
					$district[] = $val;	
				}
			}
			foreach($element->find('tbody') as $row){
				foreach($row->find('td.point') as $val){
					$val = $val->plaintext;
	 			        $val = preg_replace('/\s+/','',$val);	
					$total[] = $val;
				}
				foreach($row->find('td[!point]') as $val){
					$val = $val->plaintext;
 			        	$val = preg_replace('/\s+/','',$val);
					$temp[] = $val;
				}
				
			}
		}
	}
}
for($i= 20; $i<sizeof($temp); $i++){
	$today[] = $temp[$i];
}

if(is_array($district)){
        for($j = 2; $j < sizeof($district) ; $j++){
                $val1 = $district[$j];
                $val2 = $total[$j];
                $val3 = $today[$j];
                $sql = "INSERT INTO city_gyeongnam(district,total,today,day) select '".$val1."','".$val2."','".$val3."','".$whenToday."' from dual where not exists (select district,total,today,day from city_gyeongnam where district = '".$val1."' and total = '".$val2."' and today = '".$val3."' and day = '".$whenToday."' );";
                mysqli_query($conn,$sql);
        }
        echo "gyeongnam 저장 완료!\n";
}


$urlJeonNam = "https://www.jeonnam.go.kr/coronaMainPage.do";
$html = file_get_html($urlJeonNam,false, stream_context_create($arrContextOptions));

$district = array();
$day = array();
$identify = array();
foreach($html->find('div.patients-way.patients-wayB') as $html2){

	foreach($html2->find('table.tbl02.waterStatic.corona_path') as $element){
		foreach($element->find('tbody') as $val){
			foreach($val->find('tr') as $row){
				$district[] = $row->find('td',1)->plaintext;
				$identify[] = $row->find('td',0)->plaintext;
				$val = $row->find('td',2)->plaintext;
    				$val = str_replace("월",".",$val);
                		$val = str_replace("일","",$val);
                		$day[] = $whenTodayYear.".".$val;
			}	
		}
	}
}
if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
		$val1 = trim($val1);
		$val2 = $day[$key];
		$val2 = trim($val2);
                $val3 = $identify[$key];
		$val3 = trim($val3);
                $sql = "INSERT INTO city_jeonnam(district,day,identify) select '".$val1."','".$val2."','".$val3."' from dual where not exists (select district,day,identify from city_jeonnam where district = '".$val1."' and day = '".$val2."' and identify = '".$val3."' );";
                mysqli_query($conn,$sql);
        }
        echo "jeonnam 저장 완료!\n";
}












$urlSeoul = "https://www.seoul.go.kr/coronaV/coronaStatus.do";
$html = file_get_html($urlSeoul);

$district = array();
$total = array();
$today = array();
foreach($html->find('table.tstyle-status.pc.pc-table') as $element){
	foreach($element->find('tr') as $row){
		foreach($row->find('th') as $value){
			$district[] = $value->plaintext;
		}
		foreach($row->find('td.today') as $value){
			$value = $value->plaintext;
			$value = preg_replace("/[^0-9]/","",$value);
			$today[] = $value;	
		}
		foreach($row->find('td[!class]') as $value){
				$total[] = $value->plaintext;	
		}
	}
}
if(is_array($district)){
	
	foreach(array_keys($district) as $key){
		$val1 = $district[$key];
		$val2 = $total[$key];
		$val3 = $today[$key];
		$sql = "INSERT INTO city_seoul(district,total,today,day) select '".$val1."','".$val2."','".$val3."','".$whenToday."' from dual where not exists (select district,total,today,day from city_seoul where district = '".$val1."' and total = '".$val2."' and today = '".$val3."' and day = '".$whenToday."' );";
		mysqli_query($conn,$sql);	
	}
	echo "seoul 저장 완료!\n";
}

$urlBusan = "http://www.busan.go.kr/covid19/Corona19.do";
$html = file_get_html($urlBusan);

$district = array();
$total = array();
$today = array();
foreach($html->find('div.covid-state-table') as $element){
	
	$val1 = $element->find('thead',0)->plaintext;
	$val2 = $element->find('tbody tr',0)->plaintext;
	$val3 = $element->find('tbody tr',1)->plaintext;
	$district = explode(' ', trim($val1));
	$today = explode(' ', trim($val2));
	$total = explode(' ', trim($val3));

}

if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
		$val1 = preg_replace("/\s+/", "", $val1);
                $val2 = $total[$key];
		$val2 = trim($val2);
                $val3 = $today[$key];
		$val3 = trim($val3);
		$val3 = str_replace("-","",$val3);
                $sql = "INSERT INTO city_busan(district,total,today,day) select '".$val1."','".$val2."','".$val3."','".$whenToday."' from dual where not exists (select district,total,today,day from city_busan where district = '".$val1."' and total = '".$val2."' and today = '".$val3."' and day = '".$whenToday."' );";
                mysqli_query($conn,$sql);
        }
        echo "busan 저장 완료!\n";
}

$urlDaejeon = "https://www.daejeon.go.kr/corona19/index.do?menuId=0002";
$html = file_get_html($urlDaejeon);

$district = array();
$day = array();
$identify = array();
foreach($html->find('table.corona') as $element){
	foreach($element->find('tbody') as $row){
		foreach($row->find('tr') as $value){
			$val2 = $value->find('td',2)->plaintext;
			$val1 = $value->find('td',4)->plaintext;	
			$val1 = preg_replace('/\r\n|\r|\n/','',$val1);	
			$val1 = preg_replace('/^(&nbsp;)+/', '', $val1);
			$val2 = preg_replace('/\r\n|\r|\n/','',$val2);
			$val2 = $whenTodayYear.".".$val2;
			$val3 = $value->find('td',0)->plaintext;
			$val1 = explode("&",$val1);
			$district[] = $val1[0];
			$val2 = explode("&",$val2);
			$day[] = $val2[0];
			$val3 = explode("&",$val3);
			$identify[] = $val3[0];
		}
	}	
}
if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
		$val1 = trim($val1);
		$val2 = $day[$key];
		$val2 = trim($val2);
                $val3 = $identify[$key];
		$val3 = trim($val3);
		$sql = "INSERT INTO city_daejeon(district,day,identify) select '".$val1."','".$val2."','".$val3."' from dual where not exists (select district,day,identify from city_daejeon where district = '".$val1."' and day = '".$val2."' and identify = '".$val3."' );";
                mysqli_query($conn,$sql);
        }
}

echo "daejeon 저장 완료!\n";	


$urlIncheon = "https://www.incheon.go.kr/health/HE020409";
$html = file_get_html($urlIncheon);

$district = array();
$day = array();
$id = array();
foreach($html->find('div.patient-profile-route-group') as $element){
	foreach($element->find('p.patinet-profile') as $row){
		$val1 = $row->plaintext;
		$val1 = explode('.',$val1);
		$id[] = $val1[0];
		foreach($row->find('strong[!style]') as $val){
			$district[] = $val->plaintext;
		}
		$row = strstr($row->plaintext, '(');
		$day[] = substr($row,1,10);
		
	}
}


if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
                $val2 = $day[$key];
		$val2 = trim($val2);
		$val3 = $id[$key];
		$val3 = trim($val3);
                $sql = "INSERT INTO city_incheon(district,day,identify) select '".$val1."','".$val2."','".$val3."' from dual where not exists (select district,day,identify from city_incheon where district = '".$val1."' and day = '".$val2."' and identify = '".$val3."' );";
                mysqli_query($conn,$sql);
        }
        echo "incheon 저장 완료!\n";
}

$urlGyeongbuk = "https://gb.go.kr/corona_main.htm";
$html = file_get_html($urlGyeongbuk);

$district = array();
$total = array();
$today = array();

foreach($html->find('div.city_corona') as $element){
	foreach($element->find('dl') as $row){
		foreach($row->find('dt') as $val){
			$district[] = $val->plaintext;
		}
		foreach($row->find('strong') as $val){
			$total[] = $val->plaintext;
		}
		foreach($row->find('span') as $val){
			$val = $val->plaintext;
			$val = preg_replace("/[^0-9]/","",$val);
			$today[] = $val;
		}
	}
}

if(is_array($district)){
        foreach(array_keys($district) as $key){
		if($key != 1){
                	$val1 = $district[$key];
                	$val2 = $total[$key];
                	$val3 = $today[$key];
               	 	$sql = "INSERT INTO city_gyeongbuk(district,total,today,day) select '".$val1."','".$val2."','".$val3."','".$whenToday."' from dual where not exists (select district,total,today,day from city_gyeongbuk where district = '".$val1."' and total = '".$val2."' and today = '".$val3."' and day = '".$whenToday."');";
                	mysqli_query($conn,$sql);
		}
        }
        echo "gyeongbuk 저장 완료!\n";
}
//////////////////////////////////////////////////////////////////////////////////경기도///////////////////////////////////////////////////////////
$urlGyeonggido = "https://www.gg.go.kr/contents/contents.do?ciIdx=1150&menuId=2909";
$html = file_get_html($urlGyeonggido);

$district = array();
$total = array();
$today = array();

foreach($html->find('div.mt-4.zone') as $element){
	foreach($element->find('dt') as $row){
		$district[] = $row->plaintext;
	}
	foreach($element->find('strong') as $row){
		$total[] = $row->plaintext;
	}
	foreach($element->find('small.count') as $row){
			$val = strstr($row->plaintext,':');
			$val = preg_replace("/[^0-9]/","",$val);
			$today[] = trim(str_replace(":","",$val));
			
	}
}

if(is_array($today)){
        foreach(array_keys($today) as $key){
                $val1 = $district[$key+1];
                $val2 = $total[$key+1];
                $val3 = $today[$key];
                $sql = "INSERT INTO city_gyeonggido(district,total,today,day) select '".$val1."','".$val2."','".$val3."','".$whenToday."' from dual where not exists (select district,total,today,day from city_gyeonggido where district = '".$val1."' and total = '".$val2."' and today = '".$val3."' and day = '".$whenToday."' );";
                mysqli_query($conn,$sql);
        }
        echo "gyeonggido 저장 완료!\n";
}
///////////////////////////////////////////////////////////////////////////////////대구///////////////////////////////////////////////////////////
$urlDaegu = "http://covid19.daegu.go.kr/00936590View1.html";
$html = file_get_html($urlDaegu);

$identify = array();
$district = array();
foreach($html->find('tbody') as $element){
	foreach($element->find('tr') as $row){
		foreach($row->find('p[style=font-size: 12pt;]') as $val){
			$district[] = $val->plaintext;
		}
		foreach($row->find('p[style=letter-spacing: 0pt; font-size: 12pt;]') as $val){
			$identify[] = $val->plaintext;	
		}
		
	}
}


if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
                $val3 = $identify[$key];
                $sql = "INSERT INTO city_daegu(district,day,identify) select '".$val1."','".$whenToday."','".$val3."' from dual where not exists (select district,day,identify from city_daegu where district = '".$val1."' and day = '".$whenToday."' and identify = '".$val3."' );";
                mysqli_query($conn,$sql);
        }
        echo "daegu 저장 완료!\n";
}

/////////////////////////////////////////////////////////////////////////////울산/////////////////////////////////////////////////////////

$urlUlsan = "https://www.ulsan.go.kr/u/health/contents.ulsan?mId=001002003000000000";
$html = file_get_html($urlUlsan);


$district = array();
$day = array();
$identify = array();

foreach($html->find('div.h4wrap.coronaConfir') as $element){
	foreach($element->find('tr.patient') as $row){
		$val = $row->find('td',0)->plaintext;
		if(strpos($val,"#") !== false){
			$strTok = explode('#',$val);
			$identify[] = $strTok[1];
		}
		$district[] = $row->find('td',1)->plaintext;
		$val = $row->find('td',3)->plaintext;
		$val = str_replace("/",".",$val);
		$day[] = $whenTodayYear.".".$val;
	}
}

if(is_array($day)){
        foreach(array_keys($day) as $key){
                $val1 = $district[$key];
                $val3 = $identify[$key];
		$val2 = $day[$key];
		$val1 = trim($val1);
		$val2 = trim($val2);
		$val3 = trim($val3);
                
                $sql = "INSERT INTO city_ulsan(district,day,identify) select '".$val1."','".$val2."','".$val3."' from dual where not exists (select district,day,identify from city_ulsan where district = '".$val1."' and day = '".$val2."' and identify = '".$val3."');";


		mysqli_query($conn,$sql);
        }
        echo "ulsan 저장 완료!\n";
}

$urlSejong = "https://www.sejong.go.kr/bbs/R3620/list.do";
$html = file_get_html($urlSejong);

$district = array();
$day = array();
$identify = array();

foreach($html->find('tr.covidNotice') as $element){
	$val = $element->find('td',2)->plaintext;
		$val = str_replace("월",".",$val);
		$val = str_replace("일","",$val);
		//$val = $whenTodayYear.".".$val;
		$day[] = $whenTodayYear.".".$val;
		$identify[] = $element->find('td',1)->plaintext;
		$district[] = $element->find('td',3)->plaintext;
}

if(is_array($day)){
        foreach(array_keys($day) as $key){
                $val1 = $district[$key];
		$val1 = trim($val1);
		$val2 = $day[$key];
		$val2 = trim($val2);
                $val3 = $identify[$key];
		$val3 = trim($val3);

                $sql = "INSERT INTO city_sejong(district,day,identify) select '".$val1."','".$val2."','".$val3."' from dual where not exists (select district,day,identify from city_ulsan where district = '".$val1."' and day = '".$val2."' and identify = '".$val3."' );";


                mysqli_query($conn,$sql);
		
        }
        echo "sejong 저장 완료!\n";
}


$urlGangwon = "http://www.provin.gangwon.kr/covid-19.html";
$html = file_get_html($urlGangwon);
$district = array();
$today = array();
$total = array();
$str2 = array();

foreach($html->find('table.skinTb.width768') as $element){
	
	$val = $element->find('td.txt-c',0)->plaintext;
	$str = explode(']',$val);
	$str2 = explode(',',(string)$str[1]);
	foreach($element->find('th.c_blue') as $row){
		$district[] = $row->plaintext;
	}
					
		
}
$cnt = count($str2);

for($i=1; $i<19; $i++){
	$val = $html->find('td.txt-c',$i)->plaintext;
	$total[] = $val;
}

for($i =0; $i < 18; $i++){
	$string = $district[$i];
	$b = false;
	for($j = 0; $j < $cnt ; $j++){
		$val = $str2[$j];	
		if(strpos($val,$string) !== false){
			$result = explode($string,$val);
			$today[$i] = $result[1];
			$b = true;
		}
	}
	if($b==false){
		$today[$i] = 0;
	}
}

if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
                $val2 = $total[$key];
                $val3 = $today[$key];
                $sql = "INSERT INTO city_gangwon(district,total,today,day) select '".$val1."','".$val2."','".$val3."','".$whenToday."' from dual where not exists (select district,total,today,day from city_gangwon where district = '".$val1."' and total = '".$val2."' and today = '".$val3."' and day = '".$whenToday."' );";
                mysqli_query($conn,$sql);
        }
        echo "gangwon 저장 완료!\n";
}





$urlAll = "http://ncov.mohw.go.kr/bdBoardList_Real.do?brdId=1&brdGubun=13&ncvContSeq=&contSeq=&board_id=&gubun=";
$html = file_get_html($urlAll);
$district = array();
$today = array();

foreach($html->find('div.data_table.midd.mgt24') as $element){
        foreach($element->find('tbody') as $val){
        	foreach($val->find('th') as $row){
			$district[] = $row->plaintext;	
		}	
        	foreach($val->find('td[headers=status_level l_type1]') as $row){
                	$today[] = $row->plaintext;
        	}
	}


}

                $sql = "truncate table korea;";
                mysqli_query($conn,$sql);

if(is_array($district)){
        foreach(array_keys($district) as $key){
                $val1 = $district[$key];
                $val2 = $today[$key];
                $sql = "INSERT INTO korea(district,today,day) select '".$val1."','".$val2."','".$whenToday."' from dual where not exists (select district,today,day from korea where district = '".$val1."' and today = '".$val2."' and day = '".$whenToday."' );";
                mysqli_query($conn,$sql);
        }
        echo "korea 저장 완료!\n";
}





?>
