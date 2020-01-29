CREATE DATABASE scrap_collector;
use scrap_collector;

CREATE TABLE users(
    id         int PRIMARY KEY AUTO_INCREMENT,
    firstName  varchar(50),
    lastName   varchar(50),
    email      varchar(100),
    password   varchar(255),
    phone      varchar(50),
    address    varchar(200)   
);

CREATE TABLE roles(
    id         int PRIMARY KEY AUTO_INCREMENT,
    roleName   varchar(50)
);

CREATE TABLE user_roles(
    id       int PRIMARY KEY AUTO_INCREMENT,
    userId   int ,FOREIGN KEY(userId) REFERENCES users(id),
    roleId   int ,FOREIGN KEY(roleId) REFERENCES roles(id)
);


CREATE view user_with_role
as 
SELECT u.id,u.firstName,u.lastName,u.email,U.password,u.address,r.roleName FROM users u
JOIN user_roles ur on 
u.id = ur.userId 
JOIN roles r on 
ur.roleId = r.id;

SELECT *from user_with_role;



CREATE TABLE item_types(
    id    int PRIMARY KEY AUTO_INCREMENT,
    name  varchar(50) 
);

CREATE TABLE scrap_items(
    id     int PRIMARY KEY AUTO_INCREMENT,
    name   varchar(50),
    price  int,
    itemTypeId int,FOREIGN KEY(itemTypeId) REFERENCES item_types(id)
    
);
