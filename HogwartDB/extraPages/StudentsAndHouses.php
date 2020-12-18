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
              <option value="student">Search by Student ID</option>
              <option value="studentName">Search by Student Name</option>
              <option value="house">Search by House Name</option>
            </select>
                <input type="text" class="form-control p-3" id="filterInput" placeholder="Search">
            </div>
        </form>

    </div>
    
</body>
</html>

<?php 

require '../includes/dbh.php';

$sql = 'SELECT students.student_id, students.first_name, houses.house_name
from students 
join houses 
on students.house_name = houses.house_name;
';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-4 mx-auto text-center'>";
    echo "<div class='table-responsive'>";
    echo "<table  class='table table-borderless table-hover' id='myTable'>
                <thead >

                    <tr class='bg-warning'>
            
                    <th>Students ID</th>
            
                    <th>Students Name</th>
            
                    <th>House Name</th>

     
                    </tr>
                </thead>";
            

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tbody id='tBody'>";
            
            echo "<tr class='table-info'>";

            echo "<td>" . $row['student_id'] . "</td>";

            echo "<td>" . $row['first_name'] . "</td>";

            echo "<td>" . $row['house_name'] . "</td>";

            echo "</tr>";

            echo "</tbody>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
}

?>

<script src="js/StudentsAndHouses.js"></script>