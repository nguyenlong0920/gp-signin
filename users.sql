CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password, role) VALUES
('Long', '123', 'admin'),
('Nhan', '123', 'teacher'),
('Son', '123', 'student');

ALTER TABLE users
ADD COLUMN email VARCHAR(255);

UPDATE users
SET email = 'nguyenlong0920@gmail.com'
WHERE username = 'Long';

UPDATE users
SET email = 'nhan@example.com'
WHERE username = 'Nhan';

UPDATE users
SET email = 'son@example.com'
WHERE username = 'Son';

ALTER TABLE users
ADD COLUMN reset_token VARCHAR(255),
ADD COLUMN reset_token_expiration TIMESTAMP;