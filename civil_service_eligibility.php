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

    /* Added custom style to align checkbox with input field */
    .checkbox-container {
      display: flex;
      align-items: center;
    }

    .checkbox-container .form-check-label {
      margin-left: 10px;
    }

    /* Added margin between checkbox and input */
    .checkbox-container input[type="text"] {
      margin-left: 10px;
    }

    /* Added margin to paragraph tag */
    .paragraph-margin {
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <div class="container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
      <?php
      include_once "sidebar1.php";
      ?>
      <div class="col-10">
        <div class="logo">
          <img src="PSA Vector.png" height="128">
        </div>
        <div class="image-container">
          <img src="april.jpg" height="100">
          <div>
            <h6><strong>FIRST NAME MI. LAST NAME</strong></h6>
            <!-- Added margin to paragraph tag -->
            <p class="paragraph-margin">Position Title</p>
          </div>
        </div>
        <?php include_once "topnav.php"; ?>
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
            <!-- ukjg -->
            <div class="row row-row mt-3">
              <div class="col-4">
                <div class="checkbox-container">
                  <input class="form-check-input" type="checkbox" id="null_ext" onclick="checkNA(this)">
                  <label class="form-check-label" for="null_ext">N/A</label>
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
          }

          function checkNA(checkbox) {
            var inputs = document.querySelectorAll('.form-control');
            if (checkbox.checked) {
              inputs.forEach(function (input) {
                input.value = "N/A";
                input.disabled = true;
              });
            } else {
              inputs.forEach(function (input) {
                input.value = "";
              });
            }
          }

          // function addRow() {
          //   // Retrieve the widths of the input boxes in column 10
          //   var column10Inputs = document.querySelectorAll('.col-10 .form-control');
          //   var inputWidths = [];
          //   column10Inputs.forEach(function (input, index) {
          //     // Limit to only six inputs
          //     if (index < 6) {
          //       inputWidths.push(input.offsetWidth);
          //     }
          //   });

          //   // Create a new row container
          //   var newRow = document.createElement('div');
          //   newRow.className = 'row input-row';

          //   // Iterate over the input widths and create input boxes with corresponding widths
          //   inputWidths.forEach(function (width, index) {
          //     // Create column div
          //     var colDiv = document.createElement('div');
          //     colDiv.className = 'col';

          //     // Create input element
          //     var input = document.createElement('input');
          //     input.type = 'text';
          //     input.className = 'form-control';

          //     // Set the width of the input box
          //     input.style.width = width + 'px';

          //     // Align input boxes within their respective columns
          //     if (index > 0) {
          //       input.style.marginLeft = '10px'; // Adjust as needed
          //     }

          //     // Append input to column div
          //     colDiv.appendChild(input);

          //     // Append column div to row
          //     newRow.appendChild(colDiv);
          //   });

          //   // Insert the new row before the "Add Row" button
          //   var addRowButton = document.querySelector('.add-row-button').parentNode;
          //   addRowButton.parentNode.insertBefore(newRow, addRowButton);
          // }

        </script>

      </div>
    </div>
</body>

</html>