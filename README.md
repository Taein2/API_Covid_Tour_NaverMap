# API_Covid_Tour_NaverMap  

![image](https://user-images.githubusercontent.com/66376774/105651345-f2e69f00-5ef9-11eb-9f8b-a2a195fba772.png)
![image](https://user-images.githubusercontent.com/66376774/105651355-f5e18f80-5ef9-11eb-9d2d-c94d3327ad25.png)
![image](https://user-images.githubusercontent.com/66376774/105651359-f9751680-5ef9-11eb-8f53-3f372918c753.png)
![image](https://user-images.githubusercontent.com/66376774/105651366-fbd77080-5ef9-11eb-9bb1-25d0d06106f0.png)
![image](https://user-images.githubusercontent.com/66376774/105651367-fd089d80-5ef9-11eb-9b66-adb0ee2ca7a2.png)
![image](https://user-images.githubusercontent.com/66376774/105651371-fe39ca80-5ef9-11eb-84ce-e92b694cc152.png)
![image](https://user-images.githubusercontent.com/66376774/105651379-098cf600-5efa-11eb-960a-f3900ca3e2d9.png)

  
   ## 메인 페이지 ( 검색 )
   ### http://cspro.sogang.ac.kr/~cse20172134/Project/main.html
   1.  jQuery를 이용하여 단어 자동 완성 기능
   2.  mp4 파일을 이용한 background 자동 재생으로 생동감 넘치는 메인 화면 구성
   3.  media query를 이용한 반응형 웹페이지 구성
     
     
     
     
   ## 네이버 api , 관광지 api , 코로나 Crawling
   ### http://cspro.sogang.ac.kr/~cse20172134/Project/map.html
   1.  공공데이터 api 에서 관광지 api를 받아 리스트로 표현
       공공데이터 API 로부터 다음의 정보를 얻음
       trrsrtNm, 관광지명
       rdnmadr	지역
       latitude	위도
       longitude경도
       aceptncCo 수용인원
       trrsrtIntrcn 관광지 소개
       phoneNumber 관리기관 전번
       institutionNm 관리기관명
   2.  Search2 ->  관광지명 , 주소 JSON을 통한 리스트 구성 완성
   3.  naver cloud platform(NCP) 에서  Web Dynamic Map 서비스 이용하여 map 객체 생성(javascript) 전국의 시,도별 좌표를 circle로 표시
   4.  click Listener를 통한 시,도별 테이블, 리스트 전환
   5.  mouseover mouseout Listener를 통한 fillOpacity 값 변경
   6.  코로나 확진자 정보를 각 시,도별로 테이블 표현
   7.  Crawling 을 통한 각 시,도 페이지 크롤링  (3가지 유형으로 나뉨)
   8.  Crawling 을 한번 더 가공한 CookingData를 만들어냄
   9.  Search -> 테이블 구성
   10. media query를 이용한 반응형 웹페이지 구성
         
          
          
          
   ## 검색 결과 페이지  
   ### http://cspro.sogang.ac.kr/~cse20172134/Project/ShowResult.php?search=%EA%B0%80
   1.  검색 결과를 통한 다음의 정보를 리스트 형태로 보여줌
        trrsrtNm, 관광지명
        rdnmadr	지역
        aceptncCo 수용인원
        trrsrtIntrcn 관광지 소개
        phoneNumber 관리기관 전번
        institutionNm 관리기관명
   2.  map 객체 생성(javascript)
   3.  click Listener를 통한 클릭시 latitude(위도), longitude(경도), trrsrtNm(관광지명) 를 통한 naver map으로 이동
   4.  media query를 이용한 반응형 웹페이지 구성
