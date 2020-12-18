<?php
if(isset($_POST['submit'])){
    $pfname = $_POST['pfname'];
    $plname = $_POST['plname'];

    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($pfname) || empty($plname)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $pfname)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = 'INSERT into professors(first_name, last_name) values (?,?) ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 'ss', $pfname, $plname);
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
    $("#pfname, #plname").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#pfname, #plname").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#pfname, #plname").val("");

    }
</script> 
