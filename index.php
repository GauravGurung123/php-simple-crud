<?php 

/**
 * Create a simple form using html for movies ticket booking system where user can book qfx ticket adding their phone number, 
 * schedule time, schedule shift, name, mobile(must be unique), email(must be unique) selecting location on dropdown. 
 * Using insert mysqli_query add data to database using mysqli_query. Use mysqli_connect create database, 
 * create table if not exists
 */

// connect database 
require "db_config.php";

// create table 'booking_details'
include "create_tbl_booking_details.php";

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container-fluid p-4">
      <div class="row border border-secondary mb-2 p-2">
        <h5>Tasks: </h5>
      <?php include "readfile.php"; ?>
      </div>
    <div class="row">
      <div class="col-lg-6 col-sm-6 border border-secondary p-5">
      <p class="display-5">Booking Form</p> <hr>
      <form class="form-horizontal" method="post" action="create_booking_operation.php">
          <div class="form-group p-2">
            <label class="control-label col-sm-2 mb-1" for="fullname"
              >Full Name:</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="fullname"
                placeholder="Enter fullname"
                name="fullname"
                required
              />
            </div>
          </div>
          <div class="form-group p-2">
            <label class="control-label mb-1 col-sm-2" for="mobile"
              >Mobile No:</label
            >
            <small style="color: red;"><?php echo isset($error['mobileNo']) ? $error['mobileNo'] : '' ?></small>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="mobileno"
                placeholder="Enter mobile no"
                name="mobile_no"
                required
              />
            </div>
          </div>
          <div class="form-group p-2">
            <label class="control-label mb-1 col-sm-2" for="email">Email:</label>
            <small style="color: red;"><?php echo isset($error['email']) ? $error['email'] : '' ?></small>
            <div class="col-sm-10">
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Enter email"
                name="email"
                required
              />
            </div>
          </div>
          <div class="form-group p-2" style="max-width: 83%">
            <label class="control-label mb-1" for="location">Location:</label>
            <small style="color: red;"><?php echo isset($error['location']) ? $error['location'] : '' ?></small>
            <select
              class="form-select control-label"
              name="location"
              aria-label="Default select location"
            >
              <option value="">-- Select location --</option>
              <option value="baneshwor">Baneshwor</option>
              <option value="samakhusi">Samakhusi</option>
              <option value="thapathali">Thapathali</option>
            </select>
          </div>
          <small style="color: red;"><?php echo isset($error['time']) ? $error['time'] : '' ?></small>
          <div class="form-group p-2">
            <div class="row">
              <div class="col-lg-4 col-sm-6">
                <label class="control-label mb-1"
                  >Show Date:
                  <input
                    type="text"
                    class="form-control"
                    id="datepicker"
                    name="showDate"
                /></label>
              </div>
              <div class="col-lg-6 col-sm-6">
                <label class="control-label">Show Time: </label>
                <select
                  class="form-select control-label"
                  aria-label="Default select time"
                  name="showTime"
                >
                  <option value="">-- Select show time --</option>
                  <option value="06:30:00">06:30 AM</option>
                  <option value="10:30:00">10:30 AM</option>
                  <option value="14:30:00">02:30 PM</option>
                </select>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-success btn-add mt-2">
          <i class="fa fa-plus" aria-hidden="true"></i>
          &nbsp;Book Now
          </button>
        </form>

      
      
      </div>

      <div class="col-lg-6 col-sm-6 border border-secondary p-5" style="overflow-x:auto;">
      <p class="display-5">Booking Details <a class='btn btn-danger pull-right mt-2' href='delete_booking_operation.php?action=truncate'>
        <i class='fa fa-recycle' aria-hidden='true'></i>&nbsp;Reset table</a></p><hr>
      <?php include "view_all_booking_details.php";?>
      </div>

      </div>

    </div>
  </body>
  <!-- jquery cdn -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"
  ></script>

  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
  ></script>
  <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"
  />
  <script src="https://use.fontawesome.com/c4f7173640.js"></script>
  <script>
    // text validation
    $("#mobileno").keypress(function (e) {
      if (isNaN(String.fromCharCode(e.which))) e.preventDefault();
    });

    $(function () {
      $('input[name="showDate"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2022,
        maxYear: 2022,
        locale: {
          format: "YYYY-MM-DD",
        },
      });
    });
  </script>
</html>

