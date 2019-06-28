
CREATE DATABASE codecraddle;



CREATE TABLE users(
    id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    firstname varchar(256) NOT NULL,
    lastname varchar(256) NOT NULL,
    middlename varchar(256) NOT NULL,
    username varchar(256) NOT NULL,
    email varchar(256) NOT NULL,
    phonenumber varchar(256) NOT NULL,
    occupation varchar(256) NOT NULL,
    location varchar(256) NOT NULL,
    skill varchar(256) NOT NULL,
    password varchar(256) NOT NULL
)



