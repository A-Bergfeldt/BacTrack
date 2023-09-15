CREATE TABLE Users (
    user_id VARCHAR(16) PRIMARY KEY,
    role INT CHECK (0<4),
    salt CHAR(3),
    hashed_password VARCHAR(255)
);

CREATE TABLE User_roles (
    role_id INT PRIMARY KEY,
    role_name VARCHAR(64)
);