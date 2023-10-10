<?php
require_once '../db_connection.php';
require_once 'weighted_gaussian.php';

// Generate and insert 240 sample instances for each year
for ($x = 0; $x <= 0; $x++) {
    for ($year = 2000; $year <= 2023; $year++) {
        for ($month = 1; $month <=1; $month++){
            // Generate a random combination of antibiotic IDs where all three IDs are different
            $antibiotic_ids = [];
            $w = ((2023-$year)/2023)*1000;
            $antibiotics = [
                "1" => 50 + 15*$w,
                "2" => 1 + 9*$w,
                "3" => 30 + 1*$w,
                "4" => 1 + 7*$w,
                "5" => 1 + 2*$w,
                "6" => 10 + 20*$w,
            ];
            echo json_encode($antibiotics);

                // Randomly select three distinct antibiotics
            while (count($antibiotic_ids) < 3) {
                $randomAntibiotic = array_keys($antibiotics)[random_int(0, count($antibiotics) - 1)];
                if (!in_array($randomAntibiotic, $antibiotic_ids)) {
                    $antibiotic_ids[] = $randomAntibiotic;
                }
            }
            // Create a sample record
            $date_taken = $year . '-' . '01' . '-01'; // Change the date format as needed
            $status_id = rand(1, 3); // Assuming status IDs are in the range 1-3
            $hospital_id = generateGaussianRandom(3, 1, 5, $year);
            $strain_id = rand(1, 3); // Assuming strain IDs are in the range 1-5
            $doctor_id = 'Simon_Oscarson'; // Assuming doctor IDs are in the format 'doctorX'
            $lab_technician_id = 'Andreas_Bergfeldt'; // Assuming lab technician IDs are in the format 'labtechX'

            // Insert the sample record into the Sample table
            $insert_sample_query = "INSERT INTO Sample (date_taken, status_id, hospital_id, strain_id, doctor_id, lab_technician_id)
                                    VALUES ('$date_taken', $status_id, $hospital_id, $strain_id, '$doctor_id', '$lab_technician_id')";
            
            if ($db_connection->query($insert_sample_query) === FALSE) {
                echo "Error inserting sample record: " . $db_connection->error;
            }

            // Get the sample_id of the inserted sample
            $sample_id = $db_connection->insert_id;

            // Insert the results record with the generated antibiotic IDs
            $insert_results_query = "INSERT INTO Results (sample_id, antibiotic_id1, antibiotic_id2, antibiotic_id3, synergy_result, prescribed)
                                    VALUES ($sample_id, $antibiotic_ids[0], $antibiotic_ids[1], $antibiotic_ids[2], 1, TRUE)";
            
            if ($db_connection->query($insert_results_query) === FALSE) {
                echo "Error inserting results record: " . $db_connection->error;
            }
        }
    }
}
// Close the database connection
$db_connection->close();
?>