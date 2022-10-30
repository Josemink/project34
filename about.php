 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mybooking.css">
    <title>My Booking</title>
 
 <body>
 <!DOCTYPE html>
<html lang="en">
    <!-- Masthead-->
    <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">การจองของฉัน</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>
</head>
<body>

    <table id="myTable" class="display" style="width: 100%;">
        <thead>
            <tr>
                <th>หมายเลขการจอง</th>
                <th>ชื่อผู้จอง</th>
                <th>รายละเอียดการจอง</th>
                <th>สถานะการจอง</th>
                <th>พิมพ์เอกสารการรจอง</th>
            </tr>
        </thead>
        <tbody>
        <!-- <?php
           
           include('admin/db_connect.php');
            $result = $dbconn->prepare("SELECT * FROM payment , booking ");
            $result->execute();
            for($i=0; $row = $result->fetch(); $i++){
        ?> -->

            <tr>
            <td><?php echo $row['BK_ID']; ?></td>
            <td><?php echo $row['PM_Name']; ?></td>
                <td>   <div class="detail-booking">
                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#detail-booking">รายละเอียดการจอง</button>
                    
                    </div>
                <td><?php echo $row['BK_Status']; ?></td>
                <td>
                <div class="print">
                        <button type="button" class="btn btn-success" style="width: 100px;"><i class='bx bxs-printer'></i>พิมพ์</button>
                    </div>
                </td>
                </tr>
            <?php
            }

            ?>
            </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $("#myTable").DataTable();
        });
    </script>


</body>

</html>
    
 </body>
 </html>
 
   