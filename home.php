

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arhiva Doc</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        footer {
            margin-top: 380px;
            background-color: #6f42c1;
        }
    </style>
</head>
<body>
<br><br><br>
    
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">

                <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-header text-center">
                        <h4> Importa Fisier </h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" enctype="multipart/form-data" class="d-grid gap-2 col-6 mx-auto">

                            <input type="file" name="import_file" class="form-control" />
                            <button type="submit" name="save_excel_data" style="background: #6f42c1; color:white;" class="btn  mt-3">Import <i class="fa fa-paper-plane" aria-hidden="true"></i></button>

                        </form>

                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4 >Exporta Fisier</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST" class="d-grid gap-2 col-6 mx-auto">

                           <select name="export_file_type" class="form-control">
                               <option value="xlsx">XLSX</option>
                               <option value="xls">XLS</option>
                               <option value="csv">CSV</option>
                           </select>
                           
                            <button type="submit" name="export_excel_btn" class="btn btn-outline-success mt-3 ">Export <i class="fa fa-download" aria-hidden="true"></i></button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class=" text-center text-white ">
    <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="https://www.agricola.ro/" target="_blank" role="button"
                ><i class="fab fa-facebook-f"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            &copy; 2022 Copyright | Arhiva Doc
        </div>
        <!-- Copyright -->
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>