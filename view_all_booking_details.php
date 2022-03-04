<?php require_once "db_config.php"; ?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Mobile no.</th>
            <th>Email</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM booking_details";
        
        $sel_details = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($sel_details)) {
            global $sno;
            ++$sno;

            $bookId = $row['id'];
            $mobileNo = $row['mobile'];
            $fullname = $row['fullname'];
            $email = $row['email'];
            $location = $row['location'];
            echo "<tr>";
            echo "<td>{$sno}</td>";
            echo "<td>{$fullname}</td>";
            echo "<td>{$mobileNo}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$location}</td>";
            echo "<td><a class='btn btn-sm btn-outline-primary' href='edit_booking.php?edit={$bookId}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i>&nbsp;Edit</a>
            <a class='btn btn-sm btn-outline-danger' href='delete_booking_operation.php?delete={$bookId}'><i class='fa fa-trash-o' aria-hidden='true'></i>&nbsp;Del</a></td>";
            echo "</tr>";
        }

        ?>

    </tbody>
</table>

