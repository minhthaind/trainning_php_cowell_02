<!DOCTYPE html>
<html lang="en">
<head>
  <title>Info</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/javascripts/application.js" type="text/javascript" charset="utf-8">
    function checkDelete(){
      return confirm('Are you sure?');
    }
  </script>
</head>
<body>
<div class="container">
  <h2>Thông tin</h2>
  <!-- <p>The .table-hover class enables a hover state on table rows:</p> -->            
  <div class="row">
    <div style="float: right">
      <a href="adduser.php" title="" class="btn btn-success btn-sm">Add</a>
    </div>
    <div class="col-md-10 col-md-offset-1">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Username</th>
            <th>Password</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        <?php
        require_once 'dbConnect.php';
        $sqlSelectData = "  Select *
                            From users";
        $resultSelectData = mysqli_query($conn, $sqlSelectData);
        while($row = mysqli_fetch_array($resultSelectData)){
        ?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['created_at'] ?></td>
            <td><?= $row['updated_at'] ?></td>
            <td><?= $row['username'] ?></td>
            <td><?= $row['password'] ?></td>
            <td><a href="editperson.php?id=<?= $row['id']?>" title="" class="btn btn-info btn-xs">Edit</a><a href="delete.php?id=<?= $row['id']?>" title="" class="btn btn-warning btn-xs" onclick="return confirm('Delete?')">Delete</a></td>
          </tr>
        <?php
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>