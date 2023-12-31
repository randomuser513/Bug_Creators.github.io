-- database creation
drop database if exists upcycletext;  
create database upcycletext;
use upcycletext;

-- userinfo table
create table userinfo (
	uid varchar(256) not null , 
    hashed_pw varchar(256) not null,
    password varchar(256) not null,
    email varchar(256) not null,
    address varchar(256) not null,
    primary key (uid)
);

insert into userinfo values ('buggy','$2y$10$nUQdEZoAkx1gXTI5albcJOzd9wieD2vaIhqwjK1x7gq9axUG3XDeW', 'buggy1234', 'buggy@email.com','21 North Canal Road 048833');
insert into userinfo values ('anna', '$2y$10$2uguxDlAEbmFvQVmVaFKA.RYni1FlhEoNrg4VFmD0kQcBQz2abAa6', 'anna1984','anna@email.com','6 Raffles Boulevard, #02-201 Marina Square 039594');


select * from userinfo;

-- calendar table
create table calendar (
	event_name varchar(256) not null,
    event_date datetime not null,
    event_desc varchar(1000) not null,
    event_instructor varchar(256) not null,
    primary key (event_name)
);


insert into calendar(event_name, event_date, event_desc, event_instructor) values ('DIY Home Decor Class', '2023-08-28 09:30:00', 'Learn how to create DIY Home Decor with upcycling.', 'Kelly Kok');
insert into calendar(event_name, event_date, event_desc, event_instructor) values ('Stitching Workshop', '2023-08-30 14:00:00', 'Learn basic stitching techniques', 'May Lee');
insert into calendar(event_name, event_date, event_desc, event_instructor) values ('Upcycling Workshop Part 1', '2023-09-01 10:00:00', 'Learn upcycling techniques from experts!', 'Christian Tan');
insert into calendar(event_name, event_date, event_desc, event_instructor) values ('Colour Theory Workshop', '2023-09-07 11:00:00', 'Learn the basics of colour theory!', 'Avery Quek');
insert into calendar(event_name, event_date, event_desc, event_instructor) values ('Upcycling Workshop Part 2', '2023-09-10 13:30:00', 'Learn upcycling techniques from expert, Lily.', 'Lily Quek');

select * from calendar;

-- forum table
create table forum (
	uid varchar(256) not null,
	post_name varchar(256) not null,
    post_content varchar(5000) not null,
    post_datetime datetime not null,
    primary key(uid, post_datetime)
);


insert into forum(uid, post_name, post_content, post_datetime) values ('anna', 'Crocheting 101 Workshop', "Hey everyone! I'm thinking of joining the crocheting workshop! Is anyone else looking to join too? Tele me @anna", '2023-08-25 13:25:42');

select * from forum;

create table textile_trading (
	uid varchar(256) not null,
    textile_name varchar(256) not null,
    textile_desc varchar(1000),
    textile_datetime datetime not null,
    traded_with varchar(256),
    textile_materials varchar(500),
    primary key (uid, textile_name, textile_datetime)
);


insert into textile_trading(uid,textile_name,textile_desc, textile_datetime, textile_materials) values ('anna', 'Chiffon Royal Blue 25m', 'Bought it at Spotlight for outerlayer of a dress, but I did not need it. Tele @anna for enquiries.', '2023-08-25 11:11:11', 'chiffon');

select * from textile_trading;


-- tutorial library table
create table tutorial_lib (
	uid varchar(256) not null,
    tut_name varchar(256) not null,
    tut_desc varchar(1000),
    tut_link varchar(500) not null,
    tut_datetime datetime not null,
    tut_image_path varchar(1000),
    primary key (uid, tut_name, tut_datetime)
);

insert into tutorial_lib(uid,
    tut_name,
    tut_desc,
    tut_link ,
    tut_datetime) values ('anna', 'Stitching Techniques', 'Learn how to do basic stitches with me! #easy #stitching', 'www.youtube.com','2023-08-26 12:34:56');

select * from tutorial_lib;

-- rsvp table
create table event_rsvp (
	uid varchar(250) not null,
    event_name varchar(250) not null,
    event_datetime datetime not null,
    primary key (uid, event_name, event_datetime)
);

insert into event_rsvp values ('anna', 'Crocheting 101', '2023-09-23 16:00:00');

select * from event_rsvp;

-- trading_platform 

create table tradinginfo (
	email varchar(256) not null, 
    item_name varchar(256) not null, 
    description varchar(1000) not null, 
    size varchar(256) not null, 
    item_image varchar(256) not null,
    primary key ( email, item_name, size, item_image)
); 

select * from tradinginfo; 

CREATE TABLE discussions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL, 
    username varchar(256) NOT NULL
);

select * from discussions;  

CREATE TABLE comments (
    
    discussion_title varchar (256) not null, 
    id varchar(256) not null, 
    username varchar(256) not null, 
    description varchar(1000) not null, 
    primary key (discussion_title)
    
);

select * from comments; 
