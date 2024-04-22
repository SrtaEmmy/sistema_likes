create database likes_system;

use likes_system;

create table users(
    id int auto_increment primary key,
    nombre varchar(50)
);

create table images(
    id int auto_increment primary key,
    url_image varchar(255), 
);

CREATE TABLE liked(
    id int auto_increment primary key,
    id_user int,
    id_image int,
    CONSTRAINT FOREIGN KEY (id_user) REFERENCES users(id),
    CONSTRAINT FOREIGN KEY (id_image) REFERENCES images(id)

);

-- datos de prueba
insert into users values(null, 'Emmily');
insert into users values(null, 'Noexi');
insert into users values(null, 'Gloxi');

insert into images (url_image) values('arte.jpg'), ('mar.jpg'), ('seat.jpg');

insert into liked (id_user, id_image) VALUES(2, 3), (3, 3), (3, 2), (1, 3);