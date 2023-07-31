<?php
   include ("sessionhandler.php");
  include ('receival_header.php');
?>
<div class="container-fluid">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Goods Receival Status</h4> 
                </div>
                <div class="card-body">
                <?php
                    $connection = mysqli_connect("localhost", "root", "");
                    $db = mysqli_select_db($connection, 'parcelDB');
                    $query = "SELECT * FROM receival"; 
                    $query_run = mysqli_query($connection, $query);
                ?>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Parcel ID</th>
                        <th scope="col">Receival Date</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Receival Status</th>
                        <th scope="col">Edit Delete</th>
                        </tr>
                    </thead>

                    <?php
                        if($query_run)
                        {
                            foreach($query_run as $row)
                        {
                    ?>
                    <?php
                        while($row = mysqli_fetch_array($query_run)){

                        echo "<tr>";
                        //echo "<th>" .$row['id']."</th>";
                        echo "<th>" .$row['parcel_id']."</th>";
                        echo "<td>" .$row['date_receival']. "</td>";
                        echo "<td>" .$row['Feedbacks']. "</td>";
                        echo "<td>" .$row['Status']. "</td>";
                        echo "<td>"?> 
                            <!--EDIT-->
                            <a href="UpdateReceival.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="update" class="btn btn-primary editbtn"><i class="fas fa-edit"></i></button></a>

                            <!--DELETE-->
                            <a href="receival_delete.php?id=<?php echo $row['id'];?>">
                            <button type="button" name="delete" class="btn btn-danger deletebtn"><i class="fas fa-trash"></i></button></a>
                            <?php "</td>" ?>
                            <?php echo "</tr>"?>
                    <?php
                        }
                    ?>

                    <?php
                            }
                        }
                        else
                        {
                            echo "No Record Found";
                        }
                    ?>

                    <tbody>
                        <tr>
                        <td><a class="btn btn-primary" href="AddReceival.php" role="button">Add Parcel</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <?php
        include ('receival_footer.php');
    ?>
    