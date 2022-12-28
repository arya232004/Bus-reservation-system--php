create database bus;
use bus;
create table admin(email varchar(50),password varchar(30));
create table buses(busname varchar(20),busdate date, startingtime time, completiontime time, seatsavailable int,resstops int,reststopsplaces varchar(120),
 busstart varchar(20),buspickadd varchar(80),
pincodepick long, destination varchar(30), busdropadd varchar(80), pincodedrop long);

drop table buses;

insert into buses values("World tour",'2022-11-11','20:10:00','12:20:00',20,4,'mulund,pune,ambernath','bandra','runwal greens',400081,'Goa','goa beach',200091);

select * from buses;
insert into admin values("arya232004@gmail.com","lol");

create table users(email varchar(30),name varchar(20),password varchar(30));
select * from users;

select busstart from buses;
