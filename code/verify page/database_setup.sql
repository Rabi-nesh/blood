CREATE DATABASE user_details;

USE user_details;

CREATE TABLE user_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobileno VARCHAR(15) NOT NULL,
    otp VARCHAR(6) NOT NULL
);
