<?php
  include ("sessionhandler.php");
  include_once 'receival_header.php';
?>
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Goods Collection Status</h4> 
                </div>
            <div class="card-body">
                <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'parcelDB');

                    $query = "SELECT * FROM parcel";
                    $query_run = mysqli_query($connection, $query);
                ?>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Parcel ID</th>
                        <th scope="col">Collection Status</th>
                        <th scope="col">Date Received</th>
                        </tr>
                    </thead>

                    <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                        {
                    ?>

                    <tbody>
                        <tr>
                        <td><?php echo $row['parcel_id']; ?></td>
                        <td><?php echo $row['status']; ?></td> 
                        <td><?php echo $row['date_collect']; ?></td>
                        </tr>
                    </tbody>

                    <?php
                        }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>

<?php
    include_once 'receival_footer.php';
?>
    