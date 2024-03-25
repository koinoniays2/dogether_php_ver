CREATE TABLE users (
num INT NOT NULL auto_increment PRIMARY KEY,
id VARCHAR(100), -- 아이디
password VARCHAR(255), -- 비밀번호
password_check VARCHAR(255), -- 비밀번호 확인
name VARCHAR(255), -- 이름
email VARCHAR(255), -- 이메일
mobile_tel VARCHAR(20), -- 휴대폰 번호
address TEXT, -- 주소
address_detail TEXT,
level INT DEFAULT 9,
regist_day VARCHAR(20),
login_div VARCHAR(20) -- 가입 유형
);

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON dogether.* TO 'admin'@'localhost';
FLUSH PRIVILEGES;

ALTER TABLE users
ADD COLUMN regist_day VARCHAR(20);