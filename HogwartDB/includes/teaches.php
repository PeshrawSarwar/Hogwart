<?php
if(isset($_POST['submit'])){
    $pfID = $_POST['pfID'];
    $crID = $_POST['crID'];
    $classroom = $_POST['classroom'];


    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($pfID) || empty($crID) || empty($classroom)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $pfID)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = 'SELECT professor_id from professors where professor_id=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
           
        }else{
            mysqli_stmt_bind_param($stmt,"i",$pfID);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            $sql1 = 'SELECT course_id from courses where course_id=?';
            $stmt1 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                header("Location: ../index.php?error=sqlerror");
            }else{
                mysqli_stmt_bind_param($stmt1,"i",$crID);
                mysqli_stmt_execute($stmt1);
                mysqli_stmt_store_result($stmt1);
                $resultCheck1 = mysqli_stmt_num_rows($stmt1);
                if($resultCheck > 0 && $resultCheck1 > 0){
                    $sql = 'INSERT into teaches(professor_id, course_id, classroom) values (?,?,?) ';
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_bind_param($stmt, 'iis', $pfID, $crID, $classroom);
                        mysqli_stmt_execute($stmt);
                        // header("Location: ../index.php?signup=success");
                        echo "<span style='color:green;'>Success!</span>";
                        }

                }else{
                    echo "<span style='color:red;'>This Professor OR Course Don't Exist!</span>";
                }
            }
        }
        
        
    }
}else {
    echo 'There was an error!';
}
?>

<script>
    $("#pfID, #crID, #class").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#pfID, #crID, #class").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#pfID, #crID, #class").val("");

    }
</script> 
