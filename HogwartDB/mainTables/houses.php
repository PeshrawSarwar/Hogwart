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
              <option value="name">Search by House Name</option>
              <option value="mascot">Search by Mascot</option>
              <option value="motto">Search by Motto</option>
              <option value="hghost">Search by House Ghost</option>
            </select>
                <input type="text" class="form-control p-3" id="filterInput" placeholder="Search">
            </div>
        </form>

    </div>
    
</body>
</html>

<?php 

require '../includes/dbh.php';

$sql = 'SELECT * from houses;';

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container mt-4 mx-auto text-center'>";
    echo "<div class='table-responsive'>";
    echo "<table  class='table table-borderless table-hover' id='myTable'>
                <thead >

                    <tr class='bg-warning'>
            
                    <th>House Name</th>
            
                    <th>Mascot</th>
            
                    <th>Motto</th>

                    <th>House Ghost</th>
     
                    </tr>
                </thead>";
            

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tbody id='tBody'>";
            
            echo "<tr class='table-info'>";

            echo "<td class='firstName'>" . $row['house_name'] . "</td>";

            echo "<td>" . $row['mascot'] . "</td>";

            echo "<td>" . $row['motto'] . "</td>";

            echo "<td>" . $row['house_ghost'] . "</td>";


            echo "</tr>";

            echo "</tbody>";
        }

        echo "</table>";
        echo "</div>";
        echo "</div>";
}

?>

<script src="js/houses.js"></script>