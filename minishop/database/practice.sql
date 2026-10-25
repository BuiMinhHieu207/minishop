-- Chay tung buoc de hoc SELECT, INSERT, UPDATE, DELETE; ROLLBACK hoan tac.
USE minishop;
SELECT id, name, price FROM products ORDER BY id;
START TRANSACTION;
INSERT INTO products (category_id,name,description,price,image,stock)
VALUES (1,'Sản phẩm thực hành','Dòng thử nghiệm',100000,'images/sp01.jpg',10);
SET @practice_id = LAST_INSERT_ID();
UPDATE products SET price=120000 WHERE id=@practice_id;
SELECT * FROM products WHERE id=@practice_id;
DELETE FROM products WHERE id=@practice_id;
ROLLBACK;
