CREATE DATABASE repair_lycee;

USE repair_lycee;
# ALTER TABLE emails AUTO_INCREMENT = 1;

CREATE TABLE emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);