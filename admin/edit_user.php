<?php
include "header.php";
include "../user/connect.php";
$id=$_GET["id"];
$fname="";
$lname="";
$username="";
$password="";
$status="";
$role="";
$res=mysqli_query($conn,"select * from user_registration where id= $id");
while($row=mysqli_fetch_array($res)){
$fname=$row['fname'];
$lname=$row['lname'];
$username=$row['username'];
$password=$row['ppassword'];
$status=$row['sstaus'];
$role=$row['rrole'];
}
?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit User</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname" value="<?php echo $fname;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname" value="<?php echo $lname;?>" />
              </div>
              <div class="control-group">
              <label class="control-label">User Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="User Name" name="username" readonly value="<?php echo $username;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password </label>
              <div class="controls">
                <input type="password"  class="span11" placeholder="Enter Password" name="password" value="<?php echo $password;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Role:</label>
              <div class="controls">
               <select name="role" class="span11">
                <option <?php if($role=='user'){echo "selected";}?>>user</option>
                <option <?php if($role=='admin'){echo "selected";}?>>admin</option>
               </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Status:</label>
              <div class="controls">
               <select name="status" class="span11">
                <option <?php if($status=='active'){echo "selected";}?>>active</option>
                <option <?php if($status=='inactive'){echo "selected";}?>>inactive</option>
               </select>
              </div>
            </div>
               
                       <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success" >Updated</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Record Updated Successfully!
              </div>
              
            

          </form>
        </div>
        </div>

    </div>
</div>
<?php
if(isset($_POST["submit1"])){
mysqli_query($conn,"update user_registration set fname='$_POST[firstname]',lname='$_POST[lastname]',ppassword='$_POST[password]',rrole='$_POST[role]',sstatus='$_POST[status]' where id=$id") or die(mysqli_error($conn));
?>
<script type="text/javascript">
      document.getElementById("success").style.display="block";
       setTimeout(function(){
        window.location.href="add_new_user.php";
       },1000);
    </script>
<?php
}
?>

<?php
include "footer.php";
?>




