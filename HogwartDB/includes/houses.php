<?php
if(isset($_POST['submit'])){
    $hname = $_POST['hname'];
    $mascot = $_POST['mascot'];
    $motto = $_POST['motto'];
    $houseGhost = $_POST['houseGhost'];

    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($hname) || empty($mascot) || empty($motto) || empty($houseGhost)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $hname)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = 'INSERT into houses(house_name, mascot, motto, house_ghost) values (?,?,?,?) ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 'ssss', $hname, $mascot, $motto, $houseGhost);
            mysqli_stmt_execute($stmt);
            // header("Location: ../index.php?signup=success");
            echo "<span style='color:green;'>Success!</span>";
        }
        
    }
}else {
    echo 'There was an error!';
}
?>

<script>
    $("#hname1, #mascot, #motto, #houseGhost").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#hname1, #mascot, #motto, #houseGhost").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#hname1, #mascot, #motto, #houseGhost").val("");

    }
</script> 
