CREATE TABLE Users (
    user_id VARCHAR(16) PRIMARY KEY,
    role INT CHECK (role BETWEEN 1 AND 3),
    salt CHAR(3),
    hashed_password VARCHAR(255)
);

CREATE TABLE User_roles (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(64)
);

LOAD DATA INFILE 'user_data_test.txt'
INTO TABLE Users
FIELDS TERMINATED BY ','
LINES TERMINATED BY '\n'
(user_id, role, salt, hashed_password);