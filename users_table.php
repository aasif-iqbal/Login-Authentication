<?php
include "db_connection.php";
include "functions.php";
include "cdn.php";
?>
<div id="layoutSidenav_content">
      <main>
              <!-- table -->
                    <div class="container-fluid">
                        <h2 class="mt-4">Users</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Details</li>
                        </ol>
                        <div class="card mb-4">

                        </div>
                        <?php displayMessage();?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fa fa-user mr-1"></i>
                                User Details
                            </div>
                                <div class="card-body">
                                <div class="table-responsive">

                                  <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>User Id</th>
                                                <th>UserName</th>
                                                <th>Email Address</th>
                                                <th>Password</th>
                                                <th>User Status</th>
                                                <th>Change Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
<?php
global $connection;
$output = '';

$query = "SELECT * FROM `tbl_users`";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));

while ($row = mysqli_fetch_array($result)) {
	?>
   <tr>
    <td><?php echo $row['user_id']; ?></td>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><?php
if ($row['status'] == 1) {
		echo "<p class='text-success' id=str" . $row['user_id'] . ">Active</p>";
	} else {
		echo "<p class='text-danger' id=str" . $row['user_id'] . ">Deactive</p>";
	}
	?>
    </td>
    <td>
<select class="custom-select"   onchange="userStatus(this.value, <?php echo ($row['user_id']) ?>)">
    <option value="">Select Status</option>
  <option value="0">Deactive</option>
  <option value="1">Active</option>

</select>

      </td>
    <td><?php echo "<a href='delete.php?delete={$row['user_id']}'>
          <button type='submit' class='btn btn-info' id='remove'>
            <svg width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
              <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
              <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg>
          </button>
        </a>" ?></td>
  <?php
} //end-of-while

?>
</table>
</div>
</div>
     <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
     </div>
</div>
    </main>
</div>

<script>

function userStatus(value, user_id) {
$.ajax({
  type:'POST',
  url:'status.php',
  data:{
    value:value,
    user_id:user_id
  },
  success:function(result){
    console.log(result);
    if (result == 1) {
      $('#str'+user_id).html('Active');
      location.reload();
    }else{
      $('#str'+user_id).html('Deactive');
      location.reload();
    }
  },
  error:function(xhr, status, errorThrown){
    console.log(xhr.status);
    }
  })
}
//Delete Product
$(document).ready(function(){
  $("#remove").click(function(){
  var alert_message;

  location.reload();
  return alert_message = confirm("Are you sure! You Want To Delete This Product.");
    });
});
//hide message after 3sec
      setTimeout(function() {
         document.getElementById("message").style.display = 'none';
      }, 3000);
</script>