CREATE DATABASE restaurant_db;
USE restaurant_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(255)
);

CREATE TABLE meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price INT
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    meal_name VARCHAR(100),
    quantity INT,
    payment_method VARCHAR(50),
    total_price INT
);

INSERT INTO meals (name, price) VALUES
('Ndole', 2500),
('Eru', 3000),
('Achu', 3500),
('Koki', 2000);
