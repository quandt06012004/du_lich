drop DATABASE ql_ban_hang;
CREATE DATABASE ql_ban_hang;
USE ql_ban_hang;

CREATE TABLE category
(
    id int primary key AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE
);

CREATE TABLE product
(
    id int primary key AUTO_INCREMENT,
    name varchar(100) NOT NULL UNIQUE,
    price float not null,
    image varchar(150) NULL,
    category_id int NOT NULL,
    FOREIGN KEY (category_id) REFERENCES category(id)
);

CREATE TABLE account
(
    id int primary key AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL
);
create TABLE customer
(
    id int primary key AUTO_INCREMENT,
    name varchar(100) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    password varchar(100) NOT NULL,
    phone varchar(100) NOT NULL UNIQUE,
    address varchar(100) NOT NULL

);
-- tạo account trước favorite

CREATE TABLE favorite
(
    id int primary key AUTO_INCREMENT,
    customer_id int NOT NULL,
    product_id int NOT NULL,
    created_at date default CURRENT_TIMESTAMP,
    FOREIGN KEY (account_id) REFERENCES account(id),
    FOREIGN KEY (product_id) REFERENCES product(id)
);

INSERT INTO account SET name = 'Admin Manager', email='admin@gmail.com', password = '123456';

INSERT INTO category(name) VALUES
('Toyota'),
('Huyndai'),
('Suzuki'),
('Yamaha');

INSERT INTO product(name, price, category_id, image) VALUES
('Xe bán tải', 180000, 1, 'assets/image/room1.jpg'),
('Xe 7 chỗ', 170000, 2, 'assets/image/room2.jpg'),
('Xe 5 chỗ', 190000, 3, 'assets/image/room3.jpg');
('Xe 10 chỗ', 250000, 1, 'assets/image/room4.jpg');

-- delete
-- DELETE FROM category WHERE id = 1