<?php
// Load the database configuration file
include_once 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id   = $line[0];
                $denumire_furnizor   = $line[1];
                $nr_data_factura  = $line[2];
                $valoare  = $line[3];
                $scadenta = $line[4];
                $observatii_solicitant = $line[5];
                $ultima_actualizare = $line[6];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT id FROM borderou WHERE id = '".$id."'";
                
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $db->query("UPDATE borderou SET denumire_furnizor = '".$denumire_furnizor."', nr_data_factura = '".$nr_data_factura."', valoare = '".$valoare."', scadenta = '".$scadenta."', observatii_solicitant = '".$observatii_solicitant."', ultima_actualizare = '".$ultima_actualizare."'");
                    // modified = NOW() WHERE email = '".$email."'
                }else{
                    
                    // Insert member data in the database
                    $db->query("INSERT INTO borderou (id, denumire_furnizor, nr_data_factura, valoare, scadenta, observatii_solicitant, ultima_actualizare) VALUES ('".$id."', '".$denumire_furnizor."', '".$nr_data_factura."', '".$valoare."', '".$scadenta."', '".$observatii_solicitant."', NOW())");
                }

            // return $prevResult;
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirect to the listing page
header("Location: crud.php".$qstring);