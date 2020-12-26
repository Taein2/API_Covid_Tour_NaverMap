# API_Covid_Tour_NaverMap  
  
  
   ## 메인 페이지 ( 검색 )
   - http://cspro.sogang.ac.kr/~cse20172134/Project/main.html
    - jQuery를 이용하여 단어 자동 완성 기능
    - mp4 파일을 이용한 background 자동 재생으로 생동감 넘치는 메인 화면 구성
    - media query를 이용한 반응형 웹페이지 구성
     
   ## 네이버 api , 관광지 api , 코로나 Crawling
   *** http://cspro.sogang.ac.kr/~cse20172134/Project/map.html<br>
    ** 공공데이터 api 에서 관광지 api를 받아 리스트로 표현<br>
      * 공공데이터 API 로부터 다음의 정보를 얻음<br>
        trrsrtNm, 관광지명<br>
        rdnmadr	지역<br>
        latitude	위도<br>
        longitude경도<br>
        aceptncCo 수용인원<br>
        trrsrtIntrcn 관광지 소개<br>
        phoneNumber 관리기관 전번<br>
        institutionNm 관리기관명<br>
      * Search2 ->  관광지명 , 주소 JSON을 통한 리스트 구성 완성<br> 
    ** naver cloud platform(NCP) 에서  Web Dynamic Map 서비스 이용하여 map 객체 생성(javascript) 전국의 시,도별 좌표를 circle로 표시<br>
      * click Listener를 통한 시,도별 테이블, 리스트 전환<br>
      2. mouseover mouseout Listener를 통한 fillOpacity 값 변경<br>
    ** 코로나 확진자 정보를 각 시,도별로 테이블 표현<br>
      1. Crawling 을 통한 각 시,도 페이지 크롤링  (3가지 유형으로 나뉨)<br>
      2. Crawling 을 한번 더 가공한 CookingData를 만들어냄<br>
      3. Search -> 테이블 구성<br>
    ** media query를 이용한 반응형 웹페이지 구성<br>
      <br><br><br>
   ## 검색 결과 페이지  
   - http://cspro.sogang.ac.kr/~cse20172134/Project/ShowResult.php
    - 검색 결과를 통한 다음의 정보를 리스트 형태로 보여줌
        trrsrtNm, 관광지명
        rdnmadr	지역
        aceptncCo 수용인원
        trrsrtIntrcn 관광지 소개
        phoneNumber 관리기관 전번
        institutionNm 관리기관명
    - map 객체 생성(javascript)
    - click Listener를 통한 클릭시 latitude(위도), longitude(경도), trrsrtNm(관광지명) 를 통한 naver map으로 이동
    - media query를 이용한 반응형 웹페이지 구성
