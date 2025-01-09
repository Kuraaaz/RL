CREATE DATABASE repair_lycee;

USE repair_lycee;
ALTER TABLE users AUTO_INCREMENT = 1;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);