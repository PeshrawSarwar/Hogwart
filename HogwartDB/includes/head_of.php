<?php
if(isset($_POST['submit'])){
    $PfId = $_POST['PfId'];
    $HsName = $_POST['HsName'];



    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($PfId) || empty($HsName)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $PfId)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = 'SELECT professor_id from professors where professor_id=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
           
        }else{
            mysqli_stmt_bind_param($stmt,"i",$PfId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            $sql1 = 'SELECT house_name from houses where house_name=?';
            $stmt1 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                header("Location: ../index.php?error=sqlerror");
            }else{
                mysqli_stmt_bind_param($stmt1,"s",$HsName);
                mysqli_stmt_execute($stmt1);
                mysqli_stmt_store_result($stmt1);
                $resultCheck1 = mysqli_stmt_num_rows($stmt1);
                if($resultCheck > 0 && $resultCheck1 > 0 ){
                    $sql = 'INSERT into head_of(professor_id, house_name) values (?,?) ';
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, 'is', $PfId, $HsName);
                        mysqli_stmt_execute($stmt);
                        // header("Location: ../index.php?signup=success");
                        echo "<span style='color:green;'>Success!</span>";
                    }

                }else{
                    echo "<span style='color:red;'>This Professor OR House Don't Exist!</span>";
                }
            }
        }
       
        
    }
}else {
    echo 'There was an error!';
}
?>

<script>
    $("#PfId, #HsName").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#PfId, #HsName").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#PfId, #HsName").val("");

    }
</script> 
