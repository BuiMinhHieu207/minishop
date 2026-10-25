-- Buoi 3: import vao phpMyAdmin. Khong xoa du lieu cu.
CREATE DATABASE IF NOT EXISTS minishop CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE minishop;
CREATE TABLE IF NOT EXISTS categories (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS products (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 category_id INT UNSIGNED NOT NULL,
 name VARCHAR(200) NOT NULL,
 description TEXT NOT NULL,
 price DECIMAL(12,2) UNSIGNED NOT NULL,
 image VARCHAR(255) NOT NULL,
 stock INT UNSIGNED NOT NULL DEFAULT 0,
 warranty_months INT UNSIGNED NOT NULL DEFAULT 12,
 created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS users (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 fullname VARCHAR(100) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL,
 role ENUM('customer','admin') NOT NULL DEFAULT 'customer',
 created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS orders (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 user_id INT UNSIGNED NOT NULL,
 total_amount DECIMAL(12,2) UNSIGNED NOT NULL,
 status ENUM('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
 created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;
CREATE TABLE IF NOT EXISTS order_items (
 id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 order_id INT UNSIGNED NOT NULL,
 product_id INT UNSIGNED NOT NULL,
 quantity INT UNSIGNED NOT NULL,
 unit_price DECIMAL(12,2) UNSIGNED NOT NULL,
 UNIQUE KEY uq_order_product (order_id, product_id),
 FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
 FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
) ENGINE=InnoDB;
INSERT INTO categories (id,name) VALUES (1,'Chuột') ON DUPLICATE KEY UPDATE id=id;
INSERT INTO categories (id,name) VALUES (2,'Bàn phím') ON DUPLICATE KEY UPDATE id=id;
INSERT INTO categories (id,name) VALUES (3,'Tai nghe') ON DUPLICATE KEY UPDATE id=id;
INSERT INTO categories (id,name) VALUES (4,'USB') ON DUPLICATE KEY UPDATE id=id;
INSERT INTO categories (id,name) VALUES (5,'Webcam') ON DUPLICATE KEY UPDATE id=id;
INSERT INTO categories (id,name) VALUES (6,'Đế tản nhiệt') ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (1,1,'Chuột không dây M1',250000,'images/sp01.jpg','Chuột không dây M1 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (2,2,'Bàn phím cơ K2',790000,'images/sp02.jpg','Bàn phím cơ K2 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (3,3,'Tai nghe Bluetooth T3',450000,'images/sp03.jpg','Tai nghe Bluetooth T3 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (4,4,'USB 64GB U4',150000,'images/sp04.jpg','USB 64GB U4 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (5,5,'Webcam Full HD W5',520000,'images/sp05.jpg','Webcam Full HD W5 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (6,6,'Đế tản nhiệt laptop D6',320000,'images/sp06.jpg','Đế tản nhiệt laptop D6 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (7,1,'Chuột Bluetooth M7',350000,'images/sp01.jpg','Chuột Bluetooth M7 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (8,2,'Bàn phím không dây K8',590000,'images/sp02.jpg','Bàn phím không dây K8 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (9,3,'Tai nghe chụp tai T9',650000,'images/sp03.jpg','Tai nghe chụp tai T9 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (10,4,'USB 128GB U10',250000,'images/sp04.jpg','USB 128GB U10 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (11,5,'Webcam 2K W11',790000,'images/sp05.jpg','Webcam 2K W11 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
INSERT INTO products (id,category_id,name,price,image,description,stock,warranty_months) VALUES (12,6,'Đế tản nhiệt D12',420000,'images/sp06.jpg','Đế tản nhiệt D12 - phụ kiện công nghệ phục vụ học tập và làm việc. Dữ liệu minh họa của MiniShop.',25,12) ON DUPLICATE KEY UPDATE id=id;
