<?php
session_start();
require 'Connections.php';

$query = "SELECT * FROM resources";
$query_run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR ANALYTICS SYSTEM</title>
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <link rel="stylesheet" href="fontawsome/css/fontawesome.min.css">
    <link rel="stylesheet" href="avi2.css"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="container-xxl">
        <?php include('message.php'); ?>
        <div class="row">
        <div class="col-md-13 d-flex justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <h4>HR ANALYTICS
                        <a href="hr-posting.php" class="btn btn-primary float-end">Add Employee</a>

 
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php if (mysqli_num_rows($query_run) > 0): ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Department</th>
                                    <th>Position</th>
                                    <th>Gender</th>
                                    <th>Salary</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($resource = mysqli_fetch_assoc($query_run)): ?>
                                <tr>
                                    <td><?= $resource['id']; ?></td>
                                    <td><?= $resource['name']; ?></td>
                                    <td><?= $resource['contact']; ?></td>
                                    <td><?= $resource['department']; ?></td>
                                    <td><?= $resource['position']; ?></td>
                                    <td><?= $resource['gender']; ?></td>
                                    <td><?= $resource['salary']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm viewBtn" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal" data-employee-id="<?= $resource['id']; ?>">View</button>
                                        <button type="button" class="btn btn-success btn-sm editBtn" data-bs-toggle="modal" data-bs-target="#editEmployeeModal" data-employee-id="<?= $resource['id']; ?>">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm deleteBtn" data-employee-id="<?= $resource['id']; ?>">Delete</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <h4>No Record Found</h4>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
        <section class="home-section">
      <div class="text"></div>
  </section>
    </div>

    <div class="modal fade" id="AddEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModalLabel">Add Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm">
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

    <div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewEmployeeModalLabel">Employee Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewEmployeeDetails">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editEmployeeForm">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.viewBtn').on('click', function() {
                var employeeId = $(this).data('employee-id');
                $.ajax({
                    url: 'hr-view.php',
                    method: 'GET',
                    data: { id: employeeId },
                    success: function(response) {
                        $('#viewEmployeeDetails').html(response);
                    }
                });
            });
            $('.editBtn').on('click', function() {
                var employeeId = $(this).data('employee-id');
                $.ajax({
                    url: 'hr-edit.php',
                    method: 'GET',
                    data: { id: employeeId },
                    success: function(response) {
                        $('#editEmployeeForm').html(response);
                    }
                });
            });
            $('.deleteBtn').on('click', function() {
                var employeeId = $(this).data('employee-id');
                if (confirm('Are you sure you want to delete this employee?')) {
                    $.ajax({
                        url: 'code.php',
                        method: 'POST',
                        data: { delete_hr: employeeId },
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });
        });
        $(document).ready(function() {
    $('#addEmployeeForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: 'code.php',
            method: 'POST',
            data: formData,
            success: function(response) {
                console.log('AJAX success:', response);

                location.reload();
            },
            error: function(xhr, status, error) {
                console.log('AJAX error:', error);
            }
        });
    });
});


    </script>
    <script src="22006.js"></script>
</body>
</html>

<div class="sidebar">
    <div class="logo-details">
      <img src="2206logo.jpg" alt="">
        <div class="logo_name">2206 TNVS</div>
        <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='fas fa-search' ></i>
        <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="2206.php">
          <i class='fas fa-qrcode'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="index.php">
         <i class='fas fa-user' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module2</span>
       </a>
       <span class="tooltip">Module2</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module3</span>
       </a>
       <span class="tooltip">Module3</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module4</span>
       </a>
       <span class="tooltip">Module4</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module5</span>
       </a>
       <span class="tooltip">Module5</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">MG</div>
             <div class="email">avilamarygrace24@gmail.com</div>
           </div>
         </div>
         <a href="../login.php"><i class='fas fa-right-from-bracket' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <script>
 let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-search");
let body = document.querySelector("body"); 

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange();
});

searchBtn.addEventListener("click", ()=>{ 
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange(); 
});

function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("fa-bars", "fa-arrow-right");
 } else {
   closeBtn.classList.replace("fa-arrow-right", "fa-bars"); 
 }
}


</script>