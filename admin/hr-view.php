<?php
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
    

    <div class="container-sm">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Employee View Details
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
 
                                    
                            <div class="mb-2">
                                <label>Name</label>
                                <p class="form-control">
                                <?= $resource['name'];?>
                                </p>
                            </div>

                            <div class="mb-2">
                                <label>Contact</label>
                                <p class="form-control">
                                <?= $resource['contact'];?>
                                </p>
                            </div>

                            <div class="mb-2">
                                <label>Department</label>
                                <p class="form-control">
                                <?= $resource['department'];?>
                                </p>
                            </div>

                            <div class="mb-2">
                                <label>Position</label>
                                <p class="form-control">
                                <?= $resource['position'];?>
                                </p>
                            </div>
                            <div class="mb-2">
                                <label>Gender</label>
                                <p class="form-control">
                                <?= $resource['gender'];?>
                                </p>
                            </div>

                            <div class="mb-2">
                                <label>Salary</label>
                                <p class="form-control">
                                <?= $resource['salary'];?>
                                </p>
                            </div>

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