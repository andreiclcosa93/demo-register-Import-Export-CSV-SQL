
<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arhiva Doc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="container">
        <?php echo "<h1>Bun venit, " . $_SESSION['username'] . "</h1>"; ?>
        <a href="logout.php" ><button type="submit" href="logout.php" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  float-right mt-3 btn-lg"> Delogare</button></a>
    
        <a href="file.php"><button type="submit" href="file.php" target="_self" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  float-right mt-3 btn-lg">IMPORT/EXPORT Fisier</button></a>
    </div>
    
   
    <br> <br> <br>


   <?php require_once 'crud.php'; ?>

   <?php require_once 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   
      
</body>
</html>