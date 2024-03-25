<!DOCTYPE html>
<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voluntary Work</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="icons/bootstrap-icons.css">
  <link rel="stylesheet" href="hris_style.css">
  <link rel="stylesheet" href="style.css">
  <style>
    nav {
      background-color: #283872;
      width: 100%;
    }

    nav a {
      text-decoration: none;
      color: #e4e9ff;
    }

    nav a:hover {
      color: #0f1636;
    }

    /* Added custom style to align checkbox with input field */
    .checkbox-container {
      display: flex;
      align-items: center;
    }

    .checkbox-container .form-check-label {
      margin-left: 10px;
    }

    .checkbox-container input[type="text"] {
      margin-left: 10px;
    }

    .paragraph-margin {
      margin-bottom: 10px;
    }

    p {
      text-align: center;
    }
  </style>
</head>

<body style="background-color: #80A1F5">
  <div class="container-fluid">
    <div class="row vh-100">

      <!-- SIDEBAR -->
      <?php
      include_once 'sidebar1.php';
      ?>

      <!-- CONTENT -->
      <div class="col-10 pb-5">
        <!-- Profile -->
        <div class="row mt-2 mb-2">
          <div class="col-2">
            <img src="images/Bercilla.jpg" alt="profile" style="height:150px; width:auto" class="img-fluid float-end">
          </div>
          <div class="col-6 align-items-center">
            <p class="display-6"><strong>FIRST NAME MI. LAST NAME</strong></p>
            <h4><strong>POSITION</strong></h4>
          </div>
          <div class="col-4">
            <img src="images/PSA Vector.png" alt="profile" style="height:150px; width:auto"
              class="img-fluid mb-3 float-end">
          </div>
        </div>
        <?php include_once 'topnav.php'; ?>

        <div class="row mt-3 text-center align-items-center">
          <div class="col-4">
            <p class="ms-5">NAME & ADDRESS OF ORGANIZATION</p>
          </div>
          <div class="col-3">
            <div class="row">
              <p>INCLUSIVE DATES <br>(mm/dd/yy)</p>
            </div>
            <div class="row">
              <div class="col-6">
                <p>FROM</p>
              </div>
              <div class="col-6">
                <p>TO</p>
              </div>
            </div>
          </div>
          <div class="col-1">
            <p>NUMBER OF HOURS</p>
          </div>
          <div class="col-4">
            <p>POSITION/NATURE OF WORK</p>
          </div>
        </div>
        <div class="row-container text-center">
          <div class="row row-row mt-3">
            <div class="col-4">
              <div class="checkbox-container">
                <input class="form-check-input" type="checkbox" id="null_ext" onclick="checkNA(this)">
                <label class="form-check-label">N/A</label>
                <input type="text" name="name&address" id="name&address" class="form-control group_na">
              </div>
            </div>
            <div class="col-3">
              <div class="row">
                <div class="col-6 px-1 mx-0">
                  <input type="date" required name="from_date" id="from_date" class="form-control group_na">
                </div>
                <div class="col-6 px-1 mx-0">
                  <input type="date" required name="to_date" id="to_date" class="form-control group_na">
                </div>
              </div>
            </div>
            <div class="col-1">
              <input type="text" name="numberOfhours" id="numberOfhours" class="form-control group_na">
            </div>
            <div class="col-4">
              <input type="text" name="position/natureOfwork" id="position/natureOfwork" class="form-control group_na">
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" onclick="addRow()">ADD ROW</button>
          </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
          function addRow() {
            // Clone the input-row element
            var newRow = document.querySelector('.row-row').cloneNode(true);

            // Clear input values in the cloned row
            newRow.querySelectorAll('input').forEach(input => {
              input.value = '';
            });

            // Append the cloned row to the container
            document.querySelector('.row-container').appendChild(newRow);

            // Change the N/A checkbox to a delete button
            var checkbox = newRow.querySelector('.form-check-input');
            checkbox.checked = false; // Uncheck the checkbox
            checkbox.id = ""; // Remove id to avoid duplication
            checkbox.removeAttribute("onclick"); // Remove onclick event
            checkbox.setAttribute("type", "button"); // Change type to button
            checkbox.setAttribute("onclick", "deleteRow(this)"); // Add delete function
            checkbox.nextElementSibling.textContent = "Delete"; // Change label text
          }

          function checkNA(checkbox) {
            var inputs = document.querySelectorAll('.group_na');
            var vw_addrow = document.getElementById('vw_addrow');
            if (checkbox.checked) {
              inputs.forEach(function (input) {
                input.value = "N/A";
                input.disabled = true;
              });
              vw_addrow.disabled = true;

            } else {
              inputs.forEach(function (input) {
                input.value = "";
                input.disabled = false;
              });
              vw_addrow.disabled = false;

            }
          }

          function deleteRow(button) {
            var row = button.closest('.row-row');
            row.remove();
          }
        </script>
      </div>
    </div>
  </div>
</body>

</html>
