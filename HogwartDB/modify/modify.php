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

          $(".form-message").load("includesModify/modEnrolls_in.php", {
            id: id,
            submit: submit,
          });
        });
        $("#form2").submit(function (event) {
          event.preventDefault();

          var id = $("#ID2").val();
          var submit = $("#submit").val();

          $(".form-message2").load("includesModify/modHeadOf.php", {
            id: id,
            submit: submit,
          });
        });
        $("#form3").submit(function (event) {
          event.preventDefault();

          var id = $("#ID3").val();
          var submit = $("#submit").val();

          $(".form-message3").load("includesModify/modTeaches.php", {
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
    <div class="container">
      <div class="d-flex flex-row justify-content-center">
        <div class="p-2">
          <div class="p-3 my-5">
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
        </div>
        <div class="p-2">
          <div class="p-3 my-5">
            <h2 class="text-center text-secondary">Modify Head_Of</h2>
            <form action="includesModify/modHeadOf.php" class="" id="form2">
              <div class="card-body form-group text-center">
                <input
                  type="text"
                  class="form-control mb-2"
                  placeholder="Professor ID"
                  id="ID2"
                  name="ID2"
                />
                <button
                  class="btn btn-outline-secondary btn-lg btn-block"
                  name="submit"
                  type="submit"
                  id="submit"
                >
                  Submit
                </button>
                <p class="font-weight-light form-message2"></p>
              </div>
            </form>
          </div>
        </div>
        <div class="p-2">
          <div class="p-3 my-5">
            <h2 class="text-center text-secondary">Modify Teaches</h2>
            <form action="includesModify/modTeaches.php" class="" id="form3">
              <div class="card-body form-group text-center">
                <input
                  type="text"
                  class="form-control mb-2"
                  placeholder="Professor ID"
                  id="ID3"
                  name="ID3"
                />
                <button
                  class="btn btn-outline-secondary btn-lg btn-block"
                  name="submit"
                  type="submit"
                  id="submit"
                >
                  Submit
                </button>
                <p class="font-weight-light form-message3"></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
