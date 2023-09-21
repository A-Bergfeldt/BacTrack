-- Remove and recreate detabase
DROP DATABASE bactrack
CREATE DATABASE bactrack

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

-- Create user table
CREATE TABLE Users (
    user_id VARCHAR(32) PRIMARY KEY,
    role_id INT NOT NULL CHECK (0<3),
    hashed_password VARCHAR(255),
    FOREIGN KEY (role_id) REFERENCES Roles(role_id)
);

-- Create synergy table
CREATE TABLE Synergy (
    synergy_id INT PRIMARY KEY AUTO_INCREMENT,
    synergy_name VARCHAR(64)
);

-- Create sample table
CREATE TABLE Sample (
    sample_id INT PRIMARY KEY AUTO_INCREMENT,
    date_taken DATE NOT NULL,
    prescription_id INT,
    status_id INT NOT NULL CHECK (0<4), 
    hospital_id INT NOT NULL,
    FOREIGN KEY (prescription_id) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (status_id) REFERENCES Tracking(status_id),
    FOREIGN KEY (hospital_id) REFERENCES Hospital(hospital_id)
);

-- Create results table
CREATE TABLE Results (
    sample_id INT NOT NULL,
    antibiotic_id1 INT NOT NULL CHECK (0<4),
    antibiotic_id2 INT NOT NULL CHECK (0<4),
    antibiotic_id3 INT NOT NULL CHECK (0<4),
    synergy_result INT NOT NULL CHECK (0<4),
    strain_id INT NOT NULL,
    PRIMARY KEY (sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3),
    FOREIGN KEY (sample_id) REFERENCES Sample(sample_id),
    FOREIGN KEY (antibiotic_id1) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (antibiotic_id2) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (antibiotic_id3) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (synergy_result) REFERENCES Synergy(synergy_id),
    FOREIGN KEY (strain_id) REFERENCES Strain(strain_id),
);

-- Populate tables

-- Populate antibiotics table
INSERT INTO Antibiotics(antibiotic_name)
VALUES 
(
    "No antibiotic"
),
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
    "Simon_Oscarson","1","$2a$12$v4cdgG7VM8g4GOJYbzbuuO/d7ApdJJiY8NK30P5he8uQpbwb77Dfi"
),
(
    "Andreas_Bergfeldt","2","$2a$12$.AMjUxzi00/rC.86gf8L/OrwEyjNxPzW.FTCMil4EQD6PNL2wbY3q"
);

-- Populate sample table
INSERT INTO Sample(date_taken, prescription_id, status_id, strain_id, hospital_id)
VALUES 
(
    "2023-01-01","1","1","1","1"
),
(
    "2022-06-20","2","2","2","2"
);

-- Populate synergy table
INSERT INTO Synergy(synergy_name)
VALUES 
(
    "Additive"
),
(
    "Synergy"
),
(
    "Antagonistic"
);

-- Populate Results table
INSERT INTO Results(sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3, synergy_result)
VALUES 
(
    "1", "2", "3", "1", "1"
),
(
    "2", "3", "4", "1", "3"
);
