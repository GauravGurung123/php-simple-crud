<?php 
require_once "db_config.php"; 

if($_SERVER['REQUEST_METHOD'] == "GET")  {
    if(!empty($_GET['edit'])) {
        $query = "SELECT * FROM booking_details where id = {$_GET['edit']} ";
        $sel_booked_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($sel_booked_query)) {
            $id = $row['id'];
            $fullname = $row['fullname'];
            $mobileNo = $row['mobile'];
            $email = $row['email'];
            $location = $row['location'];
            $showDate = $row['show_date'];
            $showTime = $row['show_time'];
        }
    }

}

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
  <div class="container border border-secondary p-2 mt-5 ">

      <div class="row p-2" style="max-width: 50%">
            
            <p class="display-5">Update Booking Form</p> <hr>
            <form class="form-horizontal" method="post" action="update_booking_operation.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <div class="form-group p-2">
                  <label class="control-label col-sm-2 mb-1" for="fullname"
                    >Full Name:</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      id="fullname"
                      value="<?php echo $fullname; ?>"
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
                      value="<?php echo $mobileNo; ?>"
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
                      value="<?php echo $email; ?>"
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
                    <option value="<?php echo $location; ?>"><?php echo ucfirst($location);?></option>
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
                          value="<?php echo $showDate; ?>"
                      /></label>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                      <label class="control-label">Show Time: </label>
                      <select
                        class="form-select control-label"
                        aria-label="Default select time"
                        name="showTime"
                      >
                        <option value="<?php echo $showTime; ?>"><?php echo $showTime; ?></option>
                        <option value="06:30:00">06:30 AM</option>
                        <option value="10:30:00">10:30 AM</option>
                        <option value="14:30:00">02:30 PM</option>
                      </select>
                    </div>
                  </div>
                </div>
      
                <button type="submit" class="btn btn-success btn-add mt-2">
                <i class="fa fa-angle-double-up" aria-hidden="true"></i>
                &nbsp;Update
                </button>
              </form>
           
            </div>
</div>
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