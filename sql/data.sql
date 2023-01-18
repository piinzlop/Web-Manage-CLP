CREATE DATABASE CLP CHARACTER SET character_set COLLATE collation_name;

CREATE VIEW IF NOT EXISTS latest_News1 AS
SELECT img1 as img, newsName1 as newsName, note1 as note, modi_user1 as modi_user, updated_at1 as updated FROM News_1 
ORDER BY updated_at1 DESC;

CREATE VIEW IF NOT EXISTS latest_News2 AS
SELECT img2 as img, newsName2 as newsName, note2 as note, modi_user2 as modi_user, updated_at2 as updated FROM News_2 
ORDER BY updated_at2 DESC;

CREATE VIEW IF NOT EXISTS latest_News3 AS
SELECT img3 as img, newsName3 as newsName, note3 as note, modi_user3 as modi_user, updated_at3 as updated FROM News_3 
ORDER BY updated_at3 DESC;

CREATE VIEW IF NOT EXISTS latest_News4 AS
SELECT img4 as img, newsName4 as newsName, note4 as note, modi_user4 as modi_user, updated_at4 as updated FROM News_4 
ORDER BY updated_at4 DESC;

CREATE VIEW IF NOT EXISTS latest_News5 AS
SELECT img5 as img, newsName5 as newsName, note5 as note, modi_user5 as modi_user, updated_at5 as updated FROM News_5 
ORDER BY updated_at5 DESC;

CREATE VIEW latest_News AS
SELECT * FROM latest_News1
UNION 
SELECT * FROM latest_News2
UNION 
SELECT * FROM latest_News3
UNION 
SELECT * FROM latest_News4
UNION 
SELECT * FROM latest_News5
ORDER BY updated DESC;

CREATE TABLE IF NOT EXISTS visitors (
    visitors_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ip_address text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	visi_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	latest_enter timestamp DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS member (
	fname varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	lname varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	username varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL PRIMARY KEY,
	pass text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createtimeMember timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_1 (
    news1_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note1 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at1 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at1 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_user1 varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  ,
	CONSTRAINT fk_user1 FOREIGN KEY (modi_user1) REFERENCES member(username) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_2 (
    news2_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note2 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at2 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at2 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_user2 varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  ,
	CONSTRAINT fk_user2 FOREIGN KEY (modi_user2) REFERENCES member(username) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_3 (
    news3_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note3 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at3 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at3 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_user3 varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  ,
	CONSTRAINT fk_user3 FOREIGN KEY (modi_user3) REFERENCES member(username) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_4 (
    news4_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note4 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at4 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at4 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_user4 varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  ,
	CONSTRAINT fk_user4 FOREIGN KEY (modi_user4) REFERENCES member(username) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_5 (
    news5_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note5 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at5 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at5 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_user5 varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL  ,
	CONSTRAINT fk_user5 FOREIGN KEY (modi_user5) REFERENCES member(username) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;