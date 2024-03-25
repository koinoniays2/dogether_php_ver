create table board (
   num int not null auto_increment,
   id varchar(255),
   name varchar(255) not null,
   subject text not null,
   content text not null,        
   regist_day char(20) not null,
   primary key(num)
);