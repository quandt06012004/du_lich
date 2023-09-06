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
-- tạo account trước favorite

CREATE TABLE favorite
(
    id int primary key AUTO_INCREMENT,
    account_id int NOT NULL,
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
('Xe bán tải', 150000, 1, 'https://static.carmudi.vn/wp-content/uploads/2022-06/KYAd817GJ2_760_570.jpg'),
('Xe 7 chỗ', 150000, 1, 'https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2022/10/25/1109025/Toyota-Bz4x.jpeg'),
('Xe 5 chỗ', 150000, 1, 'https://media-cdn-v2.laodong.vn/Storage/NewsPortal/2023/1/30/1142340/Honda-Wr-V.jpeg');

-- delete
-- DELETE FROM category WHERE id = 1