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



DROP VIEW appointments_with_status;
CREATE VIEW appointments_with_status
as 
SELECT a.id,a.date,a.userId,a.collectorId,s.name as status,u.firstName,u.address from appointments a
JOIN status s
on a.status = s.id
JOIN users u 
on u.id = a.userId;


DROP view user_report;
CREATE VIEW user_report 
as 
SELECT u.id as UserId ,c.date ,u.firstName,u.lastName,u.address,SUM(weight) as totalWeight ,SUM(weight*price) as totalAmount
FROM collected_scrap c 
JOIN users u ON
u.id = c.userId
GROUP BY c.userId;


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


CREATE VIEW adminDashboard as 
SELECT (SELECT COUNT(*) FROM scrap_items WHERE status = 1) as totalItems,
(SELECT COUNT(*) FROM users WHERE status = 1) as totalUsers,
(SELECT COUNT(*) FROM appointments WHERE status = 1) as pendingAppointments,
(SELECT SUM(weight)*SUM(price) FROM collected_scrap WHERE EXTRACT(MONTH FROM date) = EXTRACT(MONTH  FROM CURRENT_DATE())) as purchasedMaterials