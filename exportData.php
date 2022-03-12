<?php 
// Load the database configuration file 
include_once 'dbConfig.php'; 
 
$filename = "members_" . date('Y-m-d') . ".csv"; 

$delimiter = ","; 
 
// Create a file pointer 
$f = fopen('php://memory', 'w'); 
 
// Set column headers 
$fields = array('ID', 'DENUMIRE FURNIZOR', 'NR / DATA FACTURA', 'VALOARE(LEI)', 'SCADENTA', 'OBSERVATII (SOLICITANTUL)', 'ULTIMA ACTUALIZARE'); 
fputcsv($f, $fields, $delimiter); 
 
// Get records from the database 
$result = $db->query("SELECT * FROM borderou ORDER BY id DESC"); 
if($result->num_rows > 0){ 
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $result->fetch_assoc()){ 
        $lineData = array($row['id'], $row['denumire_furnizor'], $row['nr_data_factura'], $row['valoare'], $row['scadenta'], $row['observatii_solicitant']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
} 
 
// Move back to beginning of file 
fseek($f, 0); 
 
// Set headers to download file rather than displayed 
header('Content-Type: text/csv'); 
header('Content-Disposition: attachment; filename="' . $filename . '";'); 
 
// Output all remaining data on a file pointer 
fpassthru($f); 
 
// Exit from file 
exit();