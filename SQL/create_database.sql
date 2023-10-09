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
    country VARCHAR(50) NOT NULL,
    longitude FLOAT (8) NOT NULL,
    latitude FLOAT (8) NOT NULL
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
    FOREIGN KEY (role_id) REFERENCES Roles(role_id),
    email VARCHAR(255)
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
    status_id INT NOT NULL CHECK (0<4), 
    hospital_id INT NOT NULL,
    strain_id INT,
    doctor_id VARCHAR(32) NOT NULL,
    lab_technician_id VARCHAR(32),
    FOREIGN KEY (status_id) REFERENCES Tracking(status_id),
    FOREIGN KEY (hospital_id) REFERENCES Hospital(hospital_id),
    FOREIGN KEY (strain_id) REFERENCES Strain(strain_id),
    FOREIGN KEY (doctor_id) REFERENCES Users(user_id),
    FOREIGN KEY (lab_technician_id) REFERENCES Users(user_id)
);

-- Create results table
CREATE TABLE Results (
    sample_id INT NOT NULL,
    antibiotic_id1 INT NOT NULL CHECK (0<4),
    antibiotic_id2 INT NOT NULL CHECK (0<4),
    antibiotic_id3 INT NOT NULL CHECK (0<4),
    synergy_result INT NOT NULL CHECK (0<4),
    prescribed BOOL DEFAULT FALSE,
    PRIMARY KEY (sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3),
    FOREIGN KEY (sample_id) REFERENCES Sample(sample_id),
    FOREIGN KEY (antibiotic_id1) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (antibiotic_id2) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (antibiotic_id3) REFERENCES Antibiotics(antibiotic_id),
    FOREIGN KEY (synergy_result) REFERENCES Synergy(synergy_id)
);
-- Create passwor reset tokens table
CREATE TABLE password_reset_tokens (
    user_id VARCHAR(32) NOT NULL,
    token VARCHAR(255) NOT NULL,
    expiration_timestamp DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

-- Populate tables

-- Populate antibiotics table
INSERT INTO Antibiotics(antibiotic_name)
VALUES 
(
    "No antibiotic"
),
(
    "Penicillin"
),
(
    "Amoxicillin"
),
(
    "Ciprofloxacin"
),
(
    "Azithromycin"
),
(
    "Doxycycline"
),
(
    "Erythromycin"
),
(
    "Vancomycin"
),
(
    "Gentamicin"
),
(
    "Metronidazole"
),
(
    "Clarithromycin"
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
    "Analyzed"
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
INSERT INTO Hospital(hospital_name, city, country, longitude, latitude)
VALUES 
(
    "Sahlgrenska sjukhuset", "Göteborg", "Sweden", "11.96", "57.68"
),
(
    "Karolinska sjukhuset", "Stockholm", "Sweden", "18.03", "59.35"
),
(
    "Östersunds sjukhus", "Östersund", "Sweden", "14.63", "63.18"
),
(
    "Rigshospitalet", "Copenhagen", "Denmark", "12.56", "55.69"
),
(
    "Akademiska Sjukhuset", "Uppsala", "Sweden", "17.63", "59.84" 

);

-- Populate roles table
INSERT INTO Roles(role_name)
VALUES 
(
    "Doctor"
),
(
    "Lab worker"
),
(
    "Administrator"
);

-- Populate user table
INSERT INTO Users(user_id, role_id, hashed_password, email)
VALUES 
(
    "Simon_Oscarson","1","$2a$12$v4cdgG7VM8g4GOJYbzbuuO/d7ApdJJiY8NK30P5he8uQpbwb77Dfi","simon.oscarson.2633@student.uu.se"
),
(
    "Andreas_Bergfeldt","2","$2a$12$.AMjUxzi00/rC.86gf8L/OrwEyjNxPzW.FTCMil4EQD6PNL2wbY3q","andreas.bergfeldt.0189@student.uu.se"
),
(
    "Corinne_Olivero","1","$2a$12$41lnFsvpAL1VVIh2c1ioUeWZON6PHrxx5sZSc6UJWCrFH43pZVfdi","corinne.olivero@gmail.com"
),
(
    "Hanna_Malmvall","2","$2a$12$tljP0iz3xMZwFEsS0sgScuwWyjS9wK9ifBEzAOE4zGTQsvdZidx6i","hanna.malmvall@gmail.com"
),
(
    "Matilda_Styfberg","1","$2a$12$6iKzUrJE9eYOuNJWfPqzBeV.RQ1Ly75ZQ23/2wzKWbd7QWobqrWY.","matilda.styfberg.4481@student.uu.se"
),
(
    "Sethuraman","2","$2a$12$LxVr0Xofc4tVFy/yrk2Kb.RwzzKUKx0K.Ml2GqaioWOKSF.BTrsWG","sethuraman2001.ind@gmail.com"
),
(
    "Minna","1","$2a$12$lYOD/8qOI9MUHtzC.wSVqefR/0QuIwa5/S7ipf99VeFg0ko8hg6se","minna.sayehban.1224@student.uu.se"
),
(
    "Praissy_Zefi","2","$2a$12$OaDZf7rj74QNBWNcMp428e3qq/U32HD55p1yyaehJDNu1eQLCrYrq","praissy.zefi@gmail.com"
),
(
    "Victor","1","$2a$12$2eqzljxLYNlI5y.DZ6f/g.VYvaA2kSsicMpmYeIZHMLYtm5f0NHB.","victor.ju.hin.wong@gmail.com"
),
(
    "Admin", "3", "$2y$10$o5bf3GmTZ2nWDLHD09Q9HOswpy5LlVQhKZyahZgDaTA29LFFsxrGy", "bactrack2023@gmail.com"
);

-- Populate sample table
INSERT INTO Sample(date_taken, status_id, strain_id, hospital_id, doctor_id)
VALUES 
(
    "2023-01-01","1",NULL,"1", "Simon_Oscarson"
),
(
    "2022-06-20","2","2","2", "Simon_Oscarson"
),
(
    "2022-02-15","3","3","3", "Andreas_Bergfeldt"
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
-- antibiotics must come in sorted order from smallest to largest ID
INSERT INTO Results(sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3, synergy_result)
VALUES 
(
    "2", "1", "2", "3", "1"
),
(
    "3", "1", "3", "4", "3"
);
