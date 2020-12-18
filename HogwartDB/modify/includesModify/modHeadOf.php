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
        $sql = 'DELETE from head_of where professor_id = ?';
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
    $("#ID2").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#ID2").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#ID2").val("");

    }
</script> 
