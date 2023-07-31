<?php
 include ("sessionhandler.php");
  include ('receival_header.php');
?>
<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'parcelDB');
    $query = "SELECT * FROM receival";
    $query_run = mysqli_query($connection, $query);
?>
<div class="container-fluid">
    <div class="jumbotron">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Goods Receival Status</h4> 
            </div>
            <div class="card-body">
                <form action="receival_insert.php" method="POST" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="ParcelID" class="col-sm-2 col-form-label">Parcel ID</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="parcel_id" name="parcel_id">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Proof" class="col-sm-2 col-form-label">Proof Image</label>
                        <div class="col-sm-10">
                        <input class="form-control" type="file" id="Proof" name="Proof">
                        </div>
                    </div>
                        
                    <div class="row mb-3">
                        <label for="Feedbacks" class="col-sm-2 col-form-label">Feedbacks</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" id="Feedbacks" rows="3" name="Feedbacks"></textarea>
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
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
  include ('receival_footer.php');
?>
    