<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <form action="">
            <div class="form-group">
            <select id="type" onchange="myFunction()" class="custom-select mb-4">
              <option value="studentid">Search by Student ID</option>
              <option value="courseid">Search by Course ID</option>
              <option value="exam">Search by Exam</option>
              <option value="garde">Search by Garde</option>
            </select>
                <input type="text" class="form-control p-3" id="filterInput" placeholder="Search">
            </div>
        </form>

    </div>
    
</body>
</html>

<?php 

require '../includes/dbh.php';

$sql = 'SELECT * from enrolls_in;';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-4 mx-auto text-center'>";
    echo "<div class='table-responsive'>";
    echo "<table  class='table table-borderless table-hover' id='myTable'>
                <thead >

                    <tr class='bg-warning'>
            
                    <th>Student ID</th>
            
                    <th>Course ID</th>
            
                    <th>Exam</th>

                    <th>Grade</th>
     
                    </tr>
                </thead>";
            

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tbody id='tBody'>";
            
            echo "<tr class='table-info'>";

            echo "<td class='firstName'>" . $row['student_id'] . "</td>";

            echo "<td>" . $row['course_id'] . "</td>";

            echo "<td>" . $row['exam'] . "</td>";

            echo "<td>" . $row['grade'] . "</td>";


            echo "</tr>";

            echo "</tbody>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
}

?>

<script src="js/enrolls_in.js"></script>