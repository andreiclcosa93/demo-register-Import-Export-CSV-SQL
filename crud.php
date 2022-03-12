<?php
// Load the database configuration file
include_once 'dbConfig.php';

// Get status message
if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusType = 'alert-success';
            $statusMsg = 'Datele membrilor au fost importate cu succes.';
            break;
        case 'err':
            $statusType = 'alert-danger';
            $statusMsg = 'A apărut o problemă, vă rugăm să încercați din nou.';
            break;
        case 'invalid_file':
            $statusType = 'alert-danger';
            $statusMsg = 'Vă rugăm să încărcați un fișier CSV valid.';
            break;
        default:
            $statusType = '';
            $statusMsg = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap library -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
 
<!-- Stylesheet file -->
<link rel="stylesheet" href="assets/css/style.css">


<!-- =================================================== -->
<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet" >

	<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" >

	<link href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css" rel="stylesheet" >

	<link href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css" rel="stylesheet" >

	<link href="../../extensions/Editor/css/editor.dataTables.min.css" rel="stylesheet" >

	<!-- <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet" > -->

	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css" rel="stylesheet" />

    <link href="../../media/css/dataTables.material.css" rel="stylesheet" /> -->
</head>
<body>
    
<!-- Display status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="col-xs-12">
    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
</div>
<?php } ?>

    <div class="container-fluid">
        <div class="row">
            <!-- Import & Export link -->
            <div class="col-md-12 head">
                <div class="float-right">
                <a href="welcome.php"><button type="submit" href="welcome.php" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn btn-lg"><i class="fa fa-home" aria-hidden="true"></i> Acasa</button></a>
                    <a href="javascript:void(0);"><button onclick="formToggle('importFrm');" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  btn-lg"><i class="plus"></i> IMPORT</button></a>
                  
                    <a href="exportData.php"><button style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  btn-lg"><i class="exp"></i> Export</button></a>
    
                   
                </div>
            </div>
            <!-- CSV file upload form -->
            <div class="col-md-12" id="importFrm" style="display: none;">
                <form action="importData.php" method="post" enctype="multipart/form-data">
                <br>

                    <input type="file" name="file" />
                    <input type="submit"  style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  btn-lg" name="importSubmit" value="IMPORT">
                  
                </form>
            </div><br><br><br>

       
    <!-- Data list table --> 
    <table class="table table-striped table-bordered display"  id="example"  style="width:100%">
        <thead class="thead-dark">
            <br>
            <tr>
                
                <th>ID</th>
                <th>DENUMIRE FURNIZOR</th>
                <th>NR/DATA FACTURA</th>
                <th>VALOARE(LEI)</th>
                <th>SCADENTA</th>
                <th>OBSERVATII(SOLICITANTUL)</th>
                <th>ULTIMA ACTUALIZARE</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Get member rows
        //de sters ========================================================$result
        $result = $db->query("SELECT * FROM borderou ORDER BY id DESC");
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
        ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['denumire_furnizor']; ?></td>
                <td><?php echo $row['nr_data_factura']; ?></td>
                <td><?php echo $row['valoare']; ?></td>
                <td><?php echo $row['scadenta']; ?></td>
                <td><?php echo $row['observatii_solicitant']; ?></td>
                <td><?php echo $row['ultima_actualizare']; ?></td>
            </tr>
        <?php } }else{ ?>
            <tr><td colspan="7">No member(s) found...</td></tr>
        <?php } ?>
        </tbody>
    </table>

    </div>
    </div>

<!-- Show/hide CSV upload form -->
<script>
function formToggle(ID){
    var element = document.getElementById(ID);
    if(element.style.display === "none"){
        element.style.display = "block";
    }else{
        element.style.display = "none";
    }
}

$(document).ready(function() {
    $('#example').DataTable();

    
        
} );


</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="../../media/js/jquery.dataTables.js"></script>
    <script src="../../media/js/dataTables.material.js"></script> -->
<!-- =========================================================================== -->

    
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>

<script src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>

<script src="../../extensions/Editor/js/dataTables.editor.min.js"></script>

<script src="https://cdn.datatables.net/colreorder/1.5.5/js/dataTables.colReorder.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>

<!-- <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script> -->

<script src="js/scripts.js"></script>
<script src="assets/demo/datatables-demo.js"></script>
<script src="assets/demo/datatables-second.js"></script>
<script src="js/custom.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>



<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>




</body>
</html>