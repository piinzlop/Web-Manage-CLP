CREATE DATABASE CLP CHARACTER SET utf8 COLLATE utf8_general_ci;


CREATE TABLE IF NOT EXISTS member (
    member_id int NOT NULL AUTO_INCREMENT,
	fname varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	lname varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	username varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	pass varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createtimeMember timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (member_id) ) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_1 (
    news1_id int NOT NULL AUTO_INCREMENT,
	newsName1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note1 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createData1 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (news1_id) ) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_2 (
    news2_id int NOT NULL AUTO_INCREMENT,
	newsName2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note2 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createData2 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (news2_id) ) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_3 (
    news3_id int NOT NULL AUTO_INCREMENT,
	newsName3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note3 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createData3 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (news3_id) ) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_4 (
    news4_id int NOT NULL AUTO_INCREMENT,
	newsName4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note4 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createData4 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (news4_id) ) CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS news_5 (
    news5_id int NOT NULL AUTO_INCREMENT,
	newsName5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	img5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	NewsMsg5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	note5 text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	createData5 timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (news5_id) ) CHARACTER SET utf8 COLLATE utf8_general_ci;