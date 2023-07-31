<?php 
include "php/read.php";
include ("sessionhandler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>  
    <title>Read</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
    crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">



    <title>UMP PARCEL - Dashboard</title>

</head>
<body>
  
	<div class="container">
            <div class="box">
                 <h4 class="display-4 text-center">Read</h4><hr><br>
                 <?php if (isset($_GET['success'])) { ?>
			<div class="alert alert-success" role="alert">
				<?php echo $_GET['success']; ?>
			</div>
			<?php  }?>
                <table class="table table-striped">
                    <?php if (mysqli_num_rows($result)) { ?>

                  
                     <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i  = 0;
                        while($rows = mysqli_fetch_assoc($result)) {
                            $i++;
                         ?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$rows['name']?></td>
                            <td><?php echo $rows['email']; ?></td>
                            <td><?php echo $rows['password'];?></td>
                            <td><a href="update.php?id=<?=$rows['id']?>"
                                   class="btn btn-success">Update</a></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } ?>
                <div class="link-right">
                    <a href="dashboard.php" class="link-primary">Create</a>
                </div>
            </div>
    </div>
 	
</body>



  

