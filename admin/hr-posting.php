<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>HR ANALYTICS SYSTEM</title>
  </head>
  <body>
    

  <div class="container-sm">

        <?php 
            include('message.php');
        ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>New Employee
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-2">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Contact</label>
                                <input type="text" name="contact" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Department</label>
                                <input type="text" name="department" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Position</label>
                                <input type="text" name="position" class="form-control">
                            </div>

                            <div class="mb-2">
                                <label>Gender</label>
                                <input type="text" name="gender" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Salary</label>
                                <input type="text" name="salary" class="form-control">
                            </div>

                            <div class="mb-1">
                                <button type="submit" name="save_hr" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>