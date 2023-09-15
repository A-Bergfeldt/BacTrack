-- Create sample table
CREATE TABLE Sample (
    sample_id INT PRIMARY KEY AUTO_INCREMENT,
    date_taken date,
    prescription INT FOREIGN KEY REFERENCES(Antibiotics(antibiotic_id)),
    status_id INT FOREIGN KEY REFERENCES(Tracking(status_id)), 
    strain INT FOREIGN KEY REFERENCES(Strain(strain_id)),
    hospital_location INT FOREIGN KEY REFERENCES(Hospitals(hospital_id)),
    user_id INT FOREIGN KEY (user_id) REFERENCES(Users(user_id))
);

-- Create antibiotic table
CREATE TABLE Antibiotics (
    antibiotic_id INT PRIMARY KEY AUTO_INCREMENT,
    antibiotic_name VARCHAR(50)
);

-- Create tracking table
CREATE TABLE Tracking (
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    status_name VARCHAR(50)
);

-- Create strain table
CREATE TABLE Strain (
    strain_id INT PRIMARY KEY AUTO_INCREMENT,
    strain_name VARCHAR(50)
);

-- Create hospital table
CREATE TABLE Hospital (
    hospital_id INT PRIMARY KEY AUTO_INCREMENT,
    hospital_name VARCHAR(50)
);

