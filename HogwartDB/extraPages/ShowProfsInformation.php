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
              <option value="professor">Search by Professors name</option>
              <option value="course">Search by Course name</option>
              <option value="classroom">Search by Classroom</option>
              <option value="headof">Search by Head of</option>
            </select>
                <input type="text" class="form-control p-3" id="filterInput" placeholder="Search">
            </div>
        </form>

    </div>
    
</body>
</html>

<?php 

require '../includes/dbh.php';

$sql = 'SELECT professors.first_name AS Professor_name , courses.name Course_name, teaches.classroom, head_of.house_name Head_of
from teaches 
join  professors
on professors.professor_id = teaches.professor_id
join courses
on teaches.course_id = courses.course_id
join head_of
on professors.professor_id = head_of.professor_id;';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-4 mx-auto text-center'>";
    echo "<div class='table-responsive'>";
    echo "<table  class='table table-borderless table-hover' id='myTable'>
                <thead >

                    <tr class='bg-warning'>
            
                    <th>Professor Name</th>
            
                    <th>Course Name</th>
            
                    <th>Classroom</th>

                    <th>Head of</th>
     
                    </tr>
                </thead>";
            

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tbody id='tBody'>";
            
            echo "<tr class='table-info'>";

            echo "<td class='firstName'>" . $row['Professor_name'] . "</td>";

            echo "<td>" . $row['Course_name'] . "</td>";

            echo "<td>" . $row['classroom'] . "</td>";

            echo "<td>" . $row['Head_of'] . "</td>";

            echo "</tr>";

            echo "</tbody>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
}

?>

<script src="js/ShowProfsInfo.js"></script>