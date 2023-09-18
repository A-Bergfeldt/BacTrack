-- Create Tables

-- Create sample table
CREATE TABLE Sample (
    sample_id INT PRIMARY KEY AUTO_INCREMENT,
    date_taken DATE NOT NULL,
    prescription INT ,
    status_id INT NOT NULL, 
    strain INT ,
    hospital_location INT  NOT NULL,
    FOREIGN KEY (prescription) REFERENCES antibiotics(antibiotic_id),
    FOREIGN KEY (status_id) REFERENCES tracking(status_id),
    FOREIGN KEY (strain) REFERENCES strain(strain_id),
    FOREIGN KEY (hospital_location) REFERENCES hospital(hospital_id)
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
