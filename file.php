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
</head>
<style>

</style>
<body>

    <div class="container">
        <?php echo "<h1>Bun venit, " . $_SESSION['username'] . "</h1>"; ?>
        <a href="logout.php" ><button type="submit" href="logout.php" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  float-right mt-3 btn-lg">Delogare</button></a>
        
        <!-- <button type="submit" href="logout.php" class="btn btn-secondary mt-3 align-self-center">Logout</button><br> -->
        
        <a href="welcome.php"><button type="submit" href="welcome.php" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  float-right mt-3 btn-lg"><i class="fa fa-home" aria-hidden="true"></i> Acasa</button></a>
    
        <a href="#"><button type="submit" href="#" style="background: #6f42c1; color:white; justify-content: flex-end; text-align: center;" class="btn  float-right mt-3 btn-lg">IMPORT/EXPORT Fisier</button></a>
    </div>
   
    <?php require_once 'home.php'; ?>
</body>
</html>