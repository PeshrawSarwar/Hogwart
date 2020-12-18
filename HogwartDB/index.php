<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <!-- Ajax Script -->
    <script>
         $(document).ready(function() {
             $("#form1").submit(function(event) {
                 event.preventDefault();

                 var name = $("#name").val();
                 var lname = $("#last").val();
                 var hname = $("#hname").val();
                 var year = $("#year").val();
                 var submit = $("#submit").val();

                 $(".form-message").load("includes/form.php", {
                     name: name,
                     lname: lname,
                     hname: hname,
                     year: year,
                     submit: submit
                 });
             });


             $("#form2").submit(function(event) {
                 event.preventDefault();

                 var hname = $("#hname1").val();
                 var mascot = $("#mascot").val();
                 var motto = $("#motto").val();
                 var houseGhost = $("#houseGhost").val();
                 var submit = $("#submit").val();

                 $(".form-message1").load("includes/houses.php", {
                     hname: hname,
                     mascot: mascot,
                     motto: motto,
                     houseGhost: houseGhost,
                     submit: submit
                 });
             });
            

             $("#form3").submit(function(event) {
                 event.preventDefault();

                 var pfname = $("#pfname").val();
                 var plname = $("#plname").val();
                 var submit = $("#submit").val();

                 $(".form-message3").load("includes/professors.php", {
                     pfname: pfname,
                     plname: plname,
                     submit: submit
                 });
             });
             

             $("#form4").submit(function(event) {
                 event.preventDefault();

                 var cName = $("#cName").val();
                 var desc = $("#desc").val();
                 var reqText = $("#reqText").val();
                 var reqEquip = $("#reqEquip").val();


                 var submit = $("#submit").val();

                 $(".form-message4").load("includes/courses.php", {
                     cName: cName,
                     desc: desc,
                     reqText: reqText,
                     reqEquip: reqEquip,
                     submit: submit
                 });
             });
             


             $("#form5").submit(function(event) {
                 event.preventDefault();

                 var stId = $("#stId").val();
                 var cId = $("#cId").val();
                 var exam = $("#exam").val();
                 var grade = $("#grade").val();


                 var submit = $("#submit").val();

                 $(".form-message5").load("includes/enrolls_in.php", {
                    stId: stId,
                    cId: cId,
                    exam: exam,
                    grade: grade,
                    submit: submit
                 });
             });

             $("#form6").submit(function(event) {
                 event.preventDefault();

                 var pfID = $("#pfID").val();
                 var crID = $("#crID").val();
                 var classroom = $("#class").val();
                 


                 var submit = $("#submit").val();

                 $(".form-message6").load("includes/teaches.php", {
                    pfID: pfID,
                    crID: crID,
                    classroom: classroom,
                    submit: submit
                 });
             });

             $("#form7").submit(function(event) {
                 event.preventDefault();

                 var PfId = $("#PfId").val();
                 var HsName = $("#HsName").val();
                 


                 var submit = $("#submit").val();

                 $(".form-message7").load("includes/head_of.php", {
                    PfId: PfId,
                    HsName: HsName,
                    submit: submit
                 });
             });

             
         });

    </script>
    <style>
      .container-fluid {
  /* The image used */
        background-image: url("img/img1.jpg");

  /* Full height */
        height: 100%;

  /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
}
        .input-error {
            box-shadow: 0px 0px 5px red;
        }
    </style>

    <title>Document</title>
    </head>
  <body>
  
    <?php include 'nav.php' ?>

    <div class="container-fluid">
      <div class="row mt-3 mx-auto">
        <div class="col-md-4 bg-trasparent mt-5  rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-secondary">Students</h2>
              <form id="form1" action="includes/form.php" method="POST">
                <div class="card-body form-group text-center ">
                  <input
                    type="text"
                    class="form-control mb-2 "
                    placeholder="First_name"
                    id="name"
                    name="name"
                    
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Last_name"
                    id="last"
                    name="lname"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Class_year"
                    id="year"
                    name="year"
                    
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="House_name"
                    id="hname"
                    name="hname"
                    
                  />
                  <button class="btn btn-outline-secondary btn-lg btn-block" name="submit" type="submit" id="submit">
                    Submit
                  </button>
                  <p class="font-weight-light form-message"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4 bg-transparent mt-5  rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-secondary">Houses</h2>
              <form id="form2" action="includes/houses.php" method="POST">
                <div class="card-body form-group text-center">
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="House_name"
                    name="hname"
                    id="hname1"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Mascot"
                    name="mascot"
                    id="mascot"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Motto"
                    name="motto"
                    id="motto"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="House_ghost"
                    name="houseGhost"
                    id="houseGhost"
                  />
                  <button class="btn btn-outline-secondary btn-lg btn-block" type="submit" name="submit" id="submit">
                    Submit
                  </button>
                  <p class="form-message1 font-weight-light"></p>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-4 bg-transparent mt-5 rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-secondary">Professors</h2>
              <form id="form3" action="includes/professors.php" method="POST">
                <div class="card-body form-group text-center">
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="First_name"
                    id="pfname"
                    name="pfname"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Last_name"
                    id="plname"
                    name="plname"
                  />

                  <button class="btn btn-outline-secondary btn-lg btn-block" type="submit" name="submit" id="submit">
                    Submit
                  </button>
                  <p class="form-message3 font-weight-light"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 bg-transparent mt-5  rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-danger">Courses</h2>
              <form id="form4" action="includes/courses.php" method="POST">
                <div class="card-body form-group text-center">
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Course_name"
                    name="cName"
                    id="cName"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Description"
                    name="desc"
                    id="desc"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Required_textbook"
                    name="reqText"
                    id="reqText"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Required_equipment"
                    name="reqEquip"
                    id="reqEquip"
                  />
                  <button class="btn btn-outline-danger btn-lg btn-block" name="submit" id="submit" type="submit">
                    Submit
                  </button>
                  <p class="form-message4 font-weight-light"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 bg-transparent mt-5  rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-success">Enrolls_In</h2>
              <form id="form5" action="includes/enrolls_in.php" method="POST">
                <div class="card-body form-group text-center">
                  <input
                    type="number"
                    class="form-control mb-2"
                    placeholder="Student_id"
                    name="stId"
                    id="stId"
                  />
                  <input
                    type="number"
                    class="form-control mb-2"
                    placeholder="Course_id"
                    name="cId"
                    id="cId"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Exam"
                    name="exam"
                    id="exam"
                  />
                  <input
                    type="number"
                    class="form-control mb-2"
                    placeholder="Grade"
                    name="grade"
                    id="grade"
                  />
                  <button class="btn btn-outline-success btn-lg btn-block" name="submit" id="submit" type="submit">
                    Submit
                  </button>
                  <p class="form-message5 font-weight-light"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 bg-transparent mt-5  rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-info">Teaches</h2>
              <form id="form6" action="includes/teaches.php" method="POST">
                <div class="card-body form-group text-center">
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Professor_id"
                    name="pfID"
                    id="pfID"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Course_id"
                    name="crID"
                    id="crID"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Classroom"
                    name="class"
                    id="class"
                  />

                  <button class="btn btn-outline-info btn-lg btn-block" name="submit" id="submit" type="submit">
                    Submit
                  </button>
                  <p class="form-message6 font-weight-light"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 bg-transparent mt-5 rounded-lg">
          <div class="p-3">
            <div class=" p-3 my-5">
              <h2 class="text-center text-warning">Head_of</h2>
              <form id="form7" action="includes/head_of.php" method="POST">
                <div class="card-body form-group text-center">
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="Professor_id"
                    name="PfId"
                    id="PfId"
                  />
                  <input
                    type="text"
                    class="form-control mb-2"
                    placeholder="House_name"
                    name="HsName"
                    id="HsName"
                  />

                  <button class="btn btn-outline-warning btn-lg btn-block" type="submit" name="submit" id="submit">
                    Submit
                  </button>
                  <p class="form-message7 font-weight-light"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark mt-3">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">
        © 2020 Copyright:
        <span class="text-light">Hogwarts DB</span>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </body>
</html>
