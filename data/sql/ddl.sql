CREATE TABLE tours(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    title VARCHAR(200),
    price_id int,
    FOREIGN KEY(price_id) REFERENCES money(id)
) ;
CREATE TABLE money(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT 'Primary Key',
amount int,
currency VARCHAR(3)
);

CREATE TABLE reviews(
id int NOT NULL PRIMARY KEY AUTO_INCREMENT 'Primary Key',
author_name VARCHAR(200),
body VARCHAR(1000)
);