<?php
if(isset($_POST['submit'])){
    $cName = $_POST['cName'];
    $desc = $_POST['desc'];
    $reqText = $_POST['reqText'];
    $reqEquip = $_POST['reqEquip'];

    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($cName) || empty($desc) || empty($reqText) || empty($reqEquip)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $cName)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = 'INSERT into courses(name, description, required_textbook, required_equipment) values (?,?,?,?) ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 'ssss', $cName, $desc, $reqText, $reqEquip);
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
    $("#cName, #desc, #reqText, #reqEquip").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#cName, #desc, #reqText, #reqEquip").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#cName, #desc, #reqText, #reqEquip").val("");

    }
</script> 
