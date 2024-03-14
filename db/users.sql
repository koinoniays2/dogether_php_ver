CREATE TABLE users (
id VARCHAR(20) PRIMARY KEY, -- 아이디
password VARCHAR(20) NOT NULL, -- 비밀번호
password_check VARCHAR(20) NOT NULL, -- 비밀번호 확인
name VARCHAR(255) NOT NULL, -- 이름
email VARCHAR(255) NOT NULL, -- 이메일
mobile_tel VARCHAR(20) NOT NULL, -- 휴대폰 번호
address TEXT NOT NULL, -- 주소
login_div VARCHAR(20), -- 가입 유형
);
