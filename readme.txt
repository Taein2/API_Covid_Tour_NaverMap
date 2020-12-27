------------------------------------------------------------------------------------------------------------
url
------------------------------------------------------------------------------------------------------------
http://cspro.sogang.ac.kr/~cse20172134/Project/main.html
http://cspro.sogang.ac.kr/~cse20172134/Project/map.html
------------------------------------------------------------------------------------------------------------
php 실행 명령어
------------------------------------------------------------------------------------------------------------
/usr/bin/php ./Crawling.php
/usr/bin/php ./CookingData.php
------------------------------------------------------------------------------------------------------------
date로 시간 확인
학교 서버가 17시간 더 느려서 crontab 시 03으로 설정 대한민국 20시 기준 진행 
crontab -e 등록
57 02 * * * /usr/bin/php -f /sogang/under/cse20172134/public_html/Project/Crawling.php
0 03 * * * /usr/bin/php -f /sogang/under/cse20172134/public_html/Project/CookingData.php
------------------------------------------------------------------------------------------------------------
네이버 지도 api 사용시 설정해놓은 해당 사이트만 api 사용이 가능하기에 제 경로의 map.html과 ShowResult.php에서만 실행이 가능합니다.
------------------------------------------------------------------------------------------------------------
DB 정보
------------------------------------------------------------------------------------------------------------
CREATE TABLE tour_table(
	id int not null AUTO_INCREMENT primary key,
	trrsrtNm VARCHAR(200) NOT NULL,
	rdnmadr VARCHAR(200) NOT NULL,
	latitude VARCHAR(200) NOT NULL,
	longitude VARCHAR(200) NOT NULL,
	aceptncCo VARCHAR(200),
	trrsrtIntrcn VARCHAR(1000),	
	phoneNumber VARCHAR(200),
	institutionNm VARCHAR(200),
	referenceDate VARCHAR(200)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_seoul(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	total int,
	today VARCHAR(30),
	day VARCHAR(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_busan(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	total int,
	today VARCHAR(30),	
	day VARCHAR(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_gyeongbuk(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	total int,
	today VARCHAR(30),	
	day VARCHAR(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_gyeonggido(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	total int,
	today VARCHAR(30),
	day VARCHAR(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_gangwon(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	total int,
	today VARCHAR(30),
	day VARCHAR(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_gyeongnam(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	total int,
	today VARCHAR(30),
	day VARCHAR(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_daejeon(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	day VARCHAR(50),
	identify varchar(200)	
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_incheon(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	day VARCHAR(50),
	identify varchar(200)	
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_daegu(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	day VARCHAR(50),
	identify varchar(200)	
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_ulsan(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	day VARCHAR(50),
	identify int	
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_sejong(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	day VARCHAR(50),
	identify varchar(200)	
)default character set utf8 collate utf8_general_ci;
CREATE TABLE city_jeonnam(
	id int not null AUTO_INCREMENT primary key,
	district VARCHAR(100),
	day VARCHAR(50),
	identify varchar(200)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE korea(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE chungbuk(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE chungnam(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE jeonbuk(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE gwangju(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE jeju(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE seoul(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE gyeongbuk(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE busan(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE gyeonggido(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE gangwon(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE gyeongnam(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE incheon(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE daegu(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE ulsan(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE sejong(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE jeonnam(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;
CREATE TABLE daejeon(
	id int not null AUTO_INCREMENT PRIMARY KEY,
	district VARCHAR(100),
	today int,
	day varchar(100)
)default character set utf8 collate utf8_general_ci;



