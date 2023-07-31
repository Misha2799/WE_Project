<?php
  include ("sessionhandler.php");
  include ('receival_header.php');
?>
<?php
    $connection =  mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,'parcelDB');
    $id = $_GET['id'];
    $query = "SELECT * FROM receival WHERE id=$id";
    $query_run = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($query_run)){
        $parcel_id = $row['parcel_id'];
        $image = $row['Proof'];
        $Feedbacks = $row['Feedbacks'];
        $Status = $row['Status'];
    }
?>
<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Goods Receival Status</h4> 
            </div>
            <div class="card-body">
                <form action="receival_update.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="ParcelID" class="col-sm-2 col-form-label">Parcel ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="parcel_id" name="parcel_id" value="<?php echo $parcel_id ?>" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Proof" class="col-sm-2 col-form-label">Proof Image</label>
                        <div class="col-sm-10">
                        <img src="uploads/<?php echo $image;?>" height="160" width="250" class="img-responsive">
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="Feedbacks" class="col-sm-2 col-form-label">Feedbacks</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="Feedbacks" rows="3" name="Feedbacks"><?php echo $Feedbacks?></textarea>
                        </div>
                    </div>  

                    <div class="row mb-3">
                        <label for="Status" class="col-sm-2 col-form-label">Receival Status</label>
                        <div class="col-sm-10">
                            <select id="Status" name="Status">
                                <option value="Received">Received</option>
                                <option value="Not Received">Not Received</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id?>"><button type="submit" name="update" class="btn btn-primary">Update</button> 
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="card-footer text-muted">
    Copyright 2021. All Rights Reserved
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    

    <script>
    $(document).ready(function () {
        $('.editbtn').on('click', function() {
            $('#editmodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#ParcelID').val(data[0]);
                $('#Proof').val(data[1]);
                $('#Feedbacks').val(data[2]);
                $('#Status').val(data[3]);
        });
    });

    </script>
    
</body>
</html>