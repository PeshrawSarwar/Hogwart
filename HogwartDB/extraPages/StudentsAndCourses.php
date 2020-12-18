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
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>

    <script>
        $(document).ready(function () {
        $("#form1").submit(function (event) {
          event.preventDefault();

          var id = $("#ID").val();
          var submit = $("#submit").val();

          $(".form-message").load("../modify/includesModify/modEnrolls_in.php", {
            id: id,
            submit: submit,
          });
        });
    });
    </script>

    <style>
      .input-error {
        box-shadow: 0px 0px 5px red;
      }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <form action="">
            <div class="form-group">
            <select id="type" onchange="myFunction()" class="custom-select mb-4">
              <option value="student">Search by Student ID</option>
              <option value="studentName">Search by Student Name</option>
              <option value="course">Search by Course Name</option>
            </select>
                <input type="text" class="form-control p-3" id="filterInput" placeholder="Search">
            </div>
        </form>
        <h2 class="text-center text-secondary">Modify Enrolls_in</h2>
            <form action="includesModify/modEnrolls_in.php" class="" id="form1">
              <div class="card-body form-group text-center">
                <input
                  type="text"
                  class="form-control mb-2"
                  placeholder="Student ID"
                  id="ID"
                  name="ID"
                />
                <button
                  class="btn btn-outline-secondary btn-lg btn-block"
                  name="submit"
                  type="submit"
                  id="submit"
                >
                  Submit
                </button>
                <p class="font-weight-light form-message"></p>
              </div>
            </form>

    </div>
    
</body>
</html>

<?php 

require '../includes/dbh.php';

$sql = 'SELECT students.student_id, students.first_name, courses.name
from students 
join enrolls_in 
on students.student_id = enrolls_in.student_id
join courses 
on enrolls_in.course_id = courses.course_id;
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
            
                    <th>Course Name</th>

     
                    </tr>
                </thead>";
            

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tbody id='tBody'>";
            
            echo "<tr class='table-info'>";

            echo "<td>" . $row['student_id'] . "</td>";

            echo "<td>" . $row['first_name'] . "</td>";

            echo "<td>" . $row['name'] . "</td>";

            echo "</tr>";

            echo "</tbody>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
}

?>

<script src="js/StudentsAndCourses.js"></script>