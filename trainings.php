<!DOCTYPE html>
<?php
include_once "db_conn.php";
$_SESSION['user_type'] = 'V';
?>
<html lang="en">

<head>
  <title>HRIS - Trainings</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="hris_style.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="local_style.css">

  <style>
    .tile {
      width: 320px;
      height: 310px;
      background-color: #80A1F5;
      border-radius: 12px;
      padding: 10px;
    }

    .titletext {
      color: #E4E9FF;
      text-align: center;
      margin: 0;
    }

    .custom-btn {
      background-color: #B8B8B8;
      color: black;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      padding: 9px 18px;
    }

    .search-input {
      border: 1px solid #727272;
      background-color: #F2F2F2;
      border-radius: 12px;
      padding: 9px;
      width: 100%;
    }

    /* Modal */
    .modal-content {
      border-radius: 17px;
      background-color: #86a7fc;
    }

    .size {
      height: 350px;
    }

    .titletext {
      color: #E4E9FF;
      text-align: center;
      margin: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
      text-align: center;
      /* Center the text */
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row vh-100">
      <?php
      include_once "sidebar1.php";
      ?>
      <!-- Logo and content -->
      <div class="col-10 px-5 pt-3 pb-5">
        <img src="images/PSA banner.jpg" alt="PSA Banner" height="auto" width="100%" class="img-fluid">
        <div class="col-10 mt-5px d-none d-sm-inline" style="margin-top: 20px;">
          <div class="row mt-3"
            style="background-color: #283872; height: 100px; align-items: center; border-radius: 12px;">
            <h4 class="titletext"><strong>TRAININGS</strong></h4>
          </div>
        </div>
        <!-- Input box for search and Add button -->
        <div class="row">
          <div class="col"></div>
          <div class="col-1 mt-5 search-add">
            <button class="btn-add btn-primary custom-btn" data-bs-toggle="modal"
              data-bs-target="#addModal">+ADD</button>
          </div>
          <div class="col-4 mt-5 search-add">
            <input type="text" name="search" class="search-input form-control" placeholder="Search..." />
          </div>
        </div>

        <div class="col 10"></div>
        <div class="mt-3">
          <table>
            <thead>
              <tr>
                <th class=col-8>Title</th>
                <th class=col-2>Type of LD</th>
                <th class=col-2>Las Updated</th>

              <tr>
                <td>Webinar on Health and Wellness: Recognizing Common Signs and Symptoms and its Management</td>
                <td>Managerial</td>
                <td>02/02/2023</td>
              </tr>
              <tr>
                <td>Data Management in Excel Part 1</td>
                <td>Managerial</td>
                <td>04/10/2023</td>
              </tr>
              <tr>
                <td>Data Mangement in Excel Part 2</td>
                <td>Managerial</td>
                <td>04/10/2023</td>
              </tr>
              <tr>
                <td>2022 Census Something Something</td>
                <td>Supervisory</td>
                <td>04/20/2023</td>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content size">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body align-top">
            <form>
              <div class="mb-3">
                <label for="title" class="form-label">TITLE:</label>
                <input type="text" class="form-control" id="titleInput">
              </div>
              <div class="mb-3">
                <label for="type_of_ld" class="form-label">TYPE OF LD:</label>
                <input type="text" class="form-control" id="typeOfLdInput">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div class="me-auto">
              <button type="button" class="btn btn-secondary custom-btn" data-bs-dismiss="modal"
                style="background-color: #FFA51F;">Cancel</button>
            </div>
            <div>
              <button type="button" class="btn btn-primary custom-btn" style="background-color: #1243EF;">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>