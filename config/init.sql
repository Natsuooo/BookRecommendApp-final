create table users(
	id int not null auto_increment primary key,
	firstName varchar(255),
	lastName varchar(255),
	sei varchar(255),
	mei varchar(255),
	professionalCategory varchar(255),
	email varchar(255),
	password varchar(255),
	created datetime,
	modified datetime
);

create table profiles(
	id int,
	firstName varchar(255),
	lastName varchar(255),
	sei varchar(255),
	mei varchar(255),
	professionalCategory varchar(255),
	department varchar(255),
	professional varchar(255),
	message text,
	created datetime,
	modified datetime
);

create table posts(
	postId int not null auto_increment primary key,
	id int,
	firstName varchar(255),
	lastName varchar(255),
	title text,
	author varchar(255),
	publishDate varchar(255),
	publisher varchar(255),
	url text,
	img text,
	text text,
	category varchar(255),
	difficulty varchar(255),
	created datetime,
	modified datetime
);

create table comments(
	commentId int not null auto_increment primary key,
	postId int,
	name varchar(255),
	comment text,
	created datetime
);

create table words(
	wordsId int not null auto_increment primary key,
	words text,
	person varchar(255)
);

insert into words (words, person) values
('Be hungry, be crazy.', 'Steve Jobs'),
('Be smart, be crazy.', 'Natsuo Yamashita')
;

