CREATE TABLE tours(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    title VARCHAR(200),
    price int
) ;

CREATE TABLE reviews(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT 'Primary Key',
author_name VARCHAR(200),
body VARCHAR(1000)
);