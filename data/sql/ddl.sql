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
CREATE TABLE clients{
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    fullName VARCHAR(100),
    contactEmail VARCHAR(100),
    contactPhone VARCHAR(20)
};
CREATE TABLE orders{
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    state ENUM('draft', 'booked', 'completed', 'canceled'),
    cost_id int,
    client_id int,
    FOREIGN KEY(cost_id) REFERENCES money(id),
    FOREIGN KEY(client_id) REFERENCES clients (id)
};

CREATE TABLE orders_items{
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    order_id int,
    tour_id int,
    cost_id int,
    touristCount int CHECK (touristCount BETWEEN 1 AND 100),
    FOREIGN KEY(cost_id) REFERENCES money (id),
    FOREIGN KEY(order_id) REFERENCES orders (id),
    FOREIGN KEY(tour_id) REFERENCES tours (id)
};