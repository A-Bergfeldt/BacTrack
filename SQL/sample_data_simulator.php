<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "BacTrack";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if connection is established
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Generate and insert 30 sample instances
for ($x = 0; $x <= 9; $x++) {
    for ($year = 2021; $year <= 2023; $year++) {
        // Generate a random combination of antibiotic IDs where all three IDs are different
        $antibiotic_ids = range(1, 4);
        shuffle($antibiotic_ids);
        $antibiotic_ids = array_slice($antibiotic_ids, 1);

        // Create a sample record
        $date_taken = $year . '-01-01'; // Change the date format as needed
        $status_id = rand(1, 3); // Assuming status IDs are in the range 1-3
        $hospital_id = 1; // Assuming hospital IDs are in the range 1-10
        $strain_id = rand(1, 3); // Assuming strain IDs are in the range 1-5
        $doctor_id = 'Simon_Oscarson'; // Assuming doctor IDs are in the format 'doctorX'
        $lab_technician_id = 'Andreas_Bergfeldt'; // Assuming lab technician IDs are in the format 'labtechX'

        // Insert the sample record into the Sample table
        $insert_sample_query = "INSERT INTO Sample (date_taken, status_id, hospital_id, strain_id, doctor_id, lab_technician_id)
                                VALUES ('$date_taken', $status_id, $hospital_id, $strain_id, '$doctor_id', '$lab_technician_id')";
        
        if ($conn->query($insert_sample_query) === FALSE) {
            echo "Error inserting sample record: " . $conn->error;
        }

        // Get the sample_id of the inserted sample
        $sample_id = $conn->insert_id;

        // Insert the results record with the generated antibiotic IDs
        $insert_results_query = "INSERT INTO Results (sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3, synergy_result, prescribed)
                                VALUES ($sample_id, $antibiotic_ids[0], $antibiotic_ids[1], $antibiotic_ids[2], 1, TRUE)";
        
        if ($conn->query($insert_results_query) === FALSE) {
            echo "Error inserting results record: " . $conn->error;
        }
    }
}
// Close the database connection
$conn->close();
?>