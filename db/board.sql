create table board (
   num int not null auto_increment,
   id varchar(255),
   name varchar(255),
   subject text,
   content text,        
   regist_day char(20) not null,
   primary key(num)
);