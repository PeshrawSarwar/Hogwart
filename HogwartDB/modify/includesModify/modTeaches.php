<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];

    require '../../includes/dbh.php';

    $errorEmpty = false;
    $errorEmail = false;

    if(empty($id)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[0-9]*$/", $id)) {
        header("Location: ../../index.php?error=invalidID");
        $errorEmpty = true;
    }else{
        $sql = 'DELETE from teaches where professor_id = ?';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../modify.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);
            // header("Location: ../index.php?signup=success");
            echo "<span style='color:green;'>Success!</span>";
        }
    }
}


?>

<script>
    $("#ID3").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#ID3").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#ID3").val("");

    }
</script> 
