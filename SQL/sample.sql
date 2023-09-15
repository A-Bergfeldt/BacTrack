-- Create Tables

-- Create sample table
CREATE TABLE Sample (
    sample_id INT PRIMARY KEY AUTO_INCREMENT,
    date_taken DATE NOT NULL,
    prescription INT FOREIGN KEY REFERENCES(Antibiotics(antibiotic_id)),
    status_id INT FOREIGN KEY REFERENCES(Tracking(status_id)) NOT NULL, 
    strain INT FOREIGN KEY REFERENCES(Strain(strain_id)),
    hospital_location INT FOREIGN KEY REFERENCES(Hospitals(hospital_id)) NOT NULL,
    -- user_id INT FOREIGN KEY (user_id) REFERENCES(Users(user_id)) NOT NULL
);

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
    hospital_name VARCHAR(50) NOT NULL
);

-- Populate tables

-- Populate antibiotics table
INSERT INTO Antibiotics
VALUES 
(
    "Ampicillin"
),
(
    "Tetracyclin"
),
(
    "Erythromycin"
)

-- Populate tracking table
INSERT INTO Tracking 
VALUES
(
    "Hospital"
),
(
    "Laboratory"
),
(
    "Finished"
)

-- Populate strain table
INSERT INTO Strain 
VALUES
(
    "Escheria coli"
),
(
    "Pseudomonas aeruginosa"
),
(
    "Staphylococcus epidermis"
)

-- Populate hospital table
INSERT INTO Hospitals
VALUES 
(
    "Södersjukhuset"
),
(
    "Karolinska sjukhuset"
),
(
    "S:t Görans sjukhus"
)