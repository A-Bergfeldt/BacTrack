-- Create Tables

-- Create antibiotic table
CREATE TABLE Antibiotics (
    antibiotic_id INT PRIMARY KEY AUTO_INCREMENT,
    antibiotic_name VARCHAR(50) NOT NULL
);

-- Create tracking table
CREATE TABLE Tracking (
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    status_name VARCHAR(50) NOT NULL
);

-- Create strain table
CREATE TABLE Strain (
    strain_id INT PRIMARY KEY AUTO_INCREMENT,
    strain_name VARCHAR(50) NOT NULL
);

-- Create hospital table
CREATE TABLE Hospital (
    hospital_id INT PRIMARY KEY AUTO_INCREMENT,
    hospital_name VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    country VARCHAR(50) NOT NULL
);

-- Create roles table
CREATE TABLE Roles (
    role_id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(64)
);

-- Create sample table
CREATE TABLE Sample (
    sample_id INT PRIMARY KEY AUTO_INCREMENT,
    date_taken DATE NOT NULL,
    prescription INT,
    status_id INT NOT NULL CHECK (0<4), 
    strain INT,
    hospital INT NOT NULL,
    FOREIGN KEY (prescription) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (status_id) REFERENCES Tracking(status_id),
    FOREIGN KEY (strain) REFERENCES Strain(strain_id),
    FOREIGN KEY (hospital) REFERENCES Hospital(hospital_id)
);

-- Create user table
CREATE TABLE Users (
    user_id VARCHAR(50) PRIMARY KEY,
    role_id INT NOT NULL CHECK (0<3),
    salt CHAR(3),
    hashed_password VARCHAR(255),
    FOREIGN KEY (role_id) REFERENCES Roles(role_id)
);

-- Populate tables

-- Populate antibiotics table
INSERT INTO Antibiotics(antibiotic_name)
VALUES 
(
    "Ampicillin"
),
(
    "Tetracyclin"
),
(
    "Erythromycin"
);

-- Populate tracking table
INSERT INTO Tracking(status_name)
VALUES
(
    "Hospital"
),
(
    "Laboratory"
),
(
    "Finished"
);

-- Populate strain table
INSERT INTO Strain(strain_name)
VALUES
(
    "Escheria coli"
),
(
    "Pseudomonas aeruginosa"
),
(
    "Staphylococcus epidermis"
);

-- Populate hospital table
INSERT INTO Hospital(hospital_name, city, country)
VALUES 
(
    "Sahlgrenska sjukhuset", "Göteborg", "Sweden"
),
(
    "Karolinska sjukhuset", "Stockholm", "Sweden"
),
(
    "Akademiska Sjukhuset", "Uppsala", "Sweden"
);

-- Populate roles table
INSERT INTO Roles(role_name)
VALUES 
(
    "Doctor"
),
(
    "Lab worker"
);

-- Populate user table
INSERT INTO Users(user_id, role_id, salt, hashed_password)
VALUES 
(
    "Simon_Oscarson","1","123","123"
),
(
    "Andreas_Bergfeldt","2","456","456"
);

-- Populate sample table
INSERT INTO Sample(date_taken, prescription, status_id, strain, hospital)
VALUES 
(
    "2023-01-01","1","1","1","1"
),
(
    "2022-06-20","2","2","2","2"
);
