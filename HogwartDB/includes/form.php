<?php
if(isset($_POST['submit'])){
    $fname = $_POST['name'];
    $lname = $_POST['lname'];
    $hname = $_POST['hname'];
    $year = $_POST['year'];

    require 'dbh.php';

    $errorEmpty = false;
    $errorEmail = false;


    if(empty($fname) || empty($lname) || empty($hname) || empty($year)){
        echo "<span style='color:red;'>Fill in all fields!</span>";
        $errorEmpty = true;
    }else if (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
        header("Location: ../index.php?error=invalidname");
        $errorEmpty = true;
    }else {
        $sql = "SELECT house_name from houses where house_name = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
           
        }else{
            mysqli_stmt_bind_param($stmt, "s", $hname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0 ){
                $sql = 'INSERT into students(first_name, last_name, class_year, house_name) values (?,?,?,?) ';
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, 'ssss', $fname, $lname, $year, $hname);
                    mysqli_stmt_execute($stmt);
                    // header("Location: ../index.php?signup=success");
                    echo "<span style='color:green;'>Success!</span>";
                }

            }else{
                echo "<span style='color:red;'>This House Doesn't Exist!</span>";
                // header("Location: index.php?error=thisIDdoesntExist");
            }
        }
       
        
    }
}else {
    echo 'There was an error!';
}
?>

<script>
    $("#name, #last, #hname, #year").removeClass("input-error");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";


    if (errorEmpty == true) {
        $("#name, #last, #hname, #year").addClass("input-error");
    }

    if (errorEmpty == false) {
        $("#name, #last, #hname, #year").val("");

    }
</script> 

