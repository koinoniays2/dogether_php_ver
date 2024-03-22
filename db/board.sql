create table board (
   num int not null auto_increment,
   name char(10) not null,
   subject char(200) not null,
   content text not null,        
   regist_day char(20) not null,
   primary key(num)
);