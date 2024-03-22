<!DOCTYPE html>
<html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>

<head>
  <title>Civil Service Eligibility</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="icons/bootstrap-icons.css" />
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

    .logo {
      float: right;
      padding: 30px;
    }

    @media (max-width: 576px) {
      .logo {
        float: none;
        text-align: center;
        margin-top: 20px;
      }
    }

    .image-container {
      display: flex;
      align-items: center;
      padding: 30px;
    }

    .image-container img {
      margin-right: 20px;
    }

    .image-container h6,
    .image-container p {
      margin: 0;
    }

    .edit-link {
      float: right;
      margin-right: 20px;
      color: #007bff;
    }

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
        <div>
        </div>
        <!-- Moved "Edit" link to a new line -->
        <!-- <div class="row">
          <div class="paragraph-margin">
            <br> <a href="edit" class="edit-link"> Edit<i class="bi bi-pencil-square"></i></a>
          </div>
        </div> -->

        <div class="row mt-5">
          <div class="col-4">
            <p>CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES CSEE BARANGAY
              ELIGIBILITY/DRIVER'S LICENSE</p>
          </div>
          <div class="col-1">
            <p>RATING (if applicable)</p>
          </div>
          <div class="col-2">
            <p>DATE OF EXAMINATION/CONFERMENT</p>
          </div>
          <div class="col-3">
            <p>PLACE OF EXAMINATION/CONFERMENT</p>
          </div>
          <div class="col-2">
            <div class="row">
              <p>LICENSE (if applicable)</p>
            </div>
            <div class="row">
              <div class="col-6">
                <p>NUMBER</p>
              </div>
              <div class="col-6">
                <p>DATE OF VALIDITY</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row-container">
          <div class="row row-row mt-3">
            <div class="col-4">
              <div class="checkbox-container">
                <input class="form-check-input" type="checkbox" id="null_ext" onclick="checkNA(this)">
                <label class="form-check-label">N/A</label>
                <input type="text" name="careerservice" id="careerservice" class="form-control">
              </div>
            </div>
            <div class="col-1">
              <input type="text" name="rating" id="rating" class="form-control">
            </div>
            <div class="col-2">
              <input type="text" name="dateofexamination" id="dateofexamination" class="form-control">
            </div>
            <div class="col-3">
              <input type="text" name="placeofexamination" id="placeofexamination" class="form-control">
            </div>
            <div class="col-2">
              <div class="row">
                <div class="col-6">
                  <input type="text" name="number" id="number" class="form-control">
                </div>
                <div class="col-6">
                  <input type="text" name="dateofvalidity" id="dateofvalidity" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-3">
            <br><button type="button" class="btn btn-primary add-row-button" id="cse_addrow" name="cse_addrow"
              onclick="addRow()">ADD ROW</button>
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
            var inputs = document.querySelectorAll('.form-control');
            var cse_addrow = document.getElementById('cse_addrow');
            if (checkbox.checked) {
              inputs.forEach(function (input) {
                input.value = "N/A";
                input.disabled = true;
                cse_addrow.disabled = true;
              });
            } else {
              inputs.forEach(function (input) {
                input.value = "";
                input.disabled = false;
                cse_addrow.disabled = false;
              });
            }
          }

          function deleteRow(button) {
            var row = button.closest('.row-row');
            row.remove();
          }
        </script>
      </div>
    </div>
</body>
</html>