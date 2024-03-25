create table board (
   num INT NOT NULL auto_increment,
   id VARCHAR(255),
   name VARCHAR(255),
   subject TEXT,
   content TEXT,        
   regist_day VARCHAR(20),
   primary key(num)
);