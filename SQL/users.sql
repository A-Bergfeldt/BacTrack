CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    role INT CHECK (role BETWEEN 1 AND 3),
    salt CHAR(3),
    hashed_password VARCHAR(255)
);

CREATE TABLE User_roles (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(64)
);