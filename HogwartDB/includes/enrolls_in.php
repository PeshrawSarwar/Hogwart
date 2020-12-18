<?php
if(isset($_POST['submit'])){
    $stId = $_POST['stId'];
    $cId = $_POST['cId'];
    $exam = $_POST['exam'];
    $grade = $_POST['grade'];

    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($stId) || empty($cId) || empty($exam) || empty($grade)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $stId)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = 'SELECT student_id from students where student_id=?';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
           
        }else{
            mysqli_stmt_bind_param($stmt,"i",$stId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            $sql1 = 'SELECT course_id from courses where course_id=?';
            $stmt1 = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                header("Location: ../index.php?error=sqlerror");
            }else{
                mysqli_stmt_bind_param($stmt1,"i",$cId);
                mysqli_stmt_execute($stmt1);
                mysqli_stmt_store_result($stmt1);
                $resultCheck1 = mysqli_stmt_num_rows($stmt1);
                if($resultCheck > 0 && $resultCheck1 > 0){
                    $sql2 = 'SELECT student_id from enrolls_in where student_id=?';
                    $stmt2 = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                        header("Location: ../index.php?error=sqlerror");
                    }else{
                        mysqli_stmt_bind_param($stmt2,"i",$stId);
                        mysqli_stmt_execute($stmt2);
                        mysqli_stmt_store_result($stmt2);
                        $resultCheck2 = mysqli_stmt_num_rows($stmt2);
                        if($resultCheck2 > 0 ){
                            echo "<span style='color:red;'>This Student Has Already Enrolled in a course!</span>";
                        }else{
                            $sql = 'INSERT into enrolls_in(student_id, course_id, exam, grade) values (?,?,?,?) ';
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("Location: ../index.php?error=sqlerror");
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt, 'iisi', $stId, $cId, $exam, $grade);
                                mysqli_stmt_execute($stmt);
                                // header("Location: ../index.php?signup=success");
                                echo "<span style='color:green;'>Success!</span>";
                                }
                            
                        }

                    }
                }else{
                    echo "<span style='color:red;'>This Student OR Course Don't Exist!</span>";
                }
                
            }
            
        }
        
        
    }
}else {
    echo 'There was an error!';
}
?>

<script>
    $("#stId, #cId, #exam, #grade").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#stId, #cId, #exam, #grade").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#stId, #cId, #exam, #grade").val("");

    }
</script> 
