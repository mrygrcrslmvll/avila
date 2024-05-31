<?php
session_start();
require 'Connections.php';
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Job Edit</title>
  </head>
  <body>
    

    <div class="modal-xxl">

        <?php 
            include('message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee Edit
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">

                        <?php
                            if(isset($_GET['id']))
                            {
                                $resource_id = mysqli_real_escape_string($con, $_GET['id']);
                                $query = "SELECT * FROM resources WHERE id='$resource_id' ";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    $resource = mysqli_fetch_array($query_run);
                                    ?>

                        <form action="code.php" method="POST">
                            <input type="hidden" name="resource_id" value="<?= $resource['id']; ?>">   
                                    
                            <div class="mb-2">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $resource['name'];?>" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Contact</label>
                                <input type="text" name="contact" value="<?= $resource['contact'];?>" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Department</label>
                                <input type="text" name="department" value="<?= $resource['department'];?>" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Position</label>
                                <input type="text" name="position" value="<?= $resource['position'];?>" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Gender</label>
                                <input type="text" name="gender" value="<?= $resource['gender'];?>" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Salary</label>
                                <input type="text" name="salary" value="<?= $resource['salary'];?>" class="form-control">
                            </div>

                            <div class="mb-1">
                                <button type="submit" name="update_hr" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                        <?php   
                                }
                                else
                                {
                                    echo "<h4>No Applicant ID Found!</h4>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>