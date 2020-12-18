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
<style>
    body {
  /* The image used */
        background-image: url("../img/img1.jpg");

  /* Full height */
        height: 100%;

  /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size:auto;
}
</style>
<body>
    <div class="container mt-4">
        <form action="">
            <div class="form-group">
            <select id="type" onchange="myFunction()" class="custom-select bg-transparent text-warning mb-4">
              <option value="student">Search by student name</option>
              <option value="house">Search by house name</option>
              <option value="course">Search by course name</option>
              <option value="lecturer">search by lecturer name</option>
            </select>
                <input type="text" class="form-control bg-transparent  p-3" id="filterInput" placeholder="Search">
            </div>
        </form>

    </div>
    
</body>
</html>

<?php 

require '../includes/dbh.php';

$sql = 'SELECT students.first_name, houses.house_name, courses.name AS course_name, professors.first_name AS Courses_Lecturer
from houses
join students
on students.house_name = houses.house_name
join enrolls_in 
on students.student_id = enrolls_in.student_id 
join courses 
on enrolls_in.course_id = courses.course_id
join teaches 
on courses.course_id = teaches.course_id
join professors 
on teaches.professor_id = professors.professor_id;';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-4 mx-auto text-center'>";
    echo "<div class='table-responsive'>";
    echo "<table  class='table table-borderless table-hover' id='myTable'>
                <thead >

                    <tr class='bg-warning'>
            
                    <th>Student Name</th>
            
                    <th>House</th>
            
                    <th>Course Name</th>

                    <th>Lecturer</th>
     
                    </tr>
                </thead>";
            

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tbody id='tBody'>";
            
            echo "<tr class='table-light'>";

            echo "<td class='firstName'>" . $row['first_name'] . "</td>";

            echo "<td>" . $row['house_name'] . "</td>";

            echo "<td>" . $row['course_name'] . "</td>";

            echo "<td>" . $row['Courses_Lecturer'] . "</td>";

            echo "</tr>";

            echo "</tbody>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
}

?>

<script src="js/ShowStudentsInfo.js"></script>