<?php
include "header.php";
include "../user/connect.php";
$id=$_GET["id"];
$fname="";
$lname="";
$bussinessname="";
$contact="";
$address="";
$city="";
$res=mysqli_query($conn,"select * from party_info where id= $id");
while($row=mysqli_fetch_array($res)){
$fname=$row['firstname'];
$lname=$row['lastname'];
$bussinessname=$row['bussinessname'];
$contact=$row['contact'];
$address=$row['aaddress'];
$city=$row['city'];
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
          <h5>Edit Party</h5>
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
              <label class="control-label">Business Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Business Name" name="businessname" value="<?php echo $bussinessname;?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact </label>
              <div class="controls">
                <input type="contact"  class="span11" placeholder="Enter Contact" name="contact" value="<?php echo $contact;?>"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">
                <textarea class="span11" name="aaddress"><?php echo $address;?></textarea>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">City </label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter city" name="city" value="<?php echo $city;?>"/>
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
mysqli_query($conn,"update party_info set firstname='$_POST[firstname]',lastname='$_POST[lastname]',bussinessname='$_POST[businessname]',contact='$_POST[contact]',aaddress='$_POST[aaddress]',city='$_POST[city]' where id=$id") or die(mysqli_error($conn));
?>
<script type="text/javascript">
      document.getElementById("success").style.display="block";
       setTimeout(function(){
        window.location.href="add_new_party.php";
       },1000);
    </script>
<?php
}
?>

<?php
include "footer.php";
?>




