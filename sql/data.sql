CREATE DATABASE CLP CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS member (
    member_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	fname varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	lname varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	username varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	pass varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
    modi_userid1 int NOT NULL,
	CONSTRAINT fk_userid1 FOREIGN KEY (modi_userid1) REFERENCES member(member_id) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_2 (
    news2_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note2 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at2 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at2 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_userid2 int NOT NULL,
	CONSTRAINT fk_userid2 FOREIGN KEY (modi_userid2) REFERENCES member(member_id) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_3 (
    news3_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note3 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at3 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at3 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_userid3 int NOT NULL,
	CONSTRAINT fk_userid3 FOREIGN KEY (modi_userid3) REFERENCES member(member_id) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_4 (
    news4_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note4 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at4 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at4 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_userid4 int NOT NULL,
	CONSTRAINT fk_userid4 FOREIGN KEY (modi_userid4) REFERENCES member(member_id) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_5 (
    news5_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	newsName5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note5 text CHARACTER SET utf8 COLLATE utf8_general_ci,
	created_at5 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  	updated_at5 TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    modi_userid5 int NOT NULL,
	CONSTRAINT fk_userid5 FOREIGN KEY (modi_userid5) REFERENCES member(member_id) ON UPDATE CASCADE    
) CHARACTER SET utf8 COLLATE utf8_general_ci;