<?php
include "header.php";
include "../user/connect.php";
?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Add New Party</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Party</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname" />
              </div>
              <div class="control-group">
              <label class="control-label">Business Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Business Name" name="bussinessname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact </label>
              <div class="controls">
                <input type="contact"  class="span11" placeholder="Enter Contact No" name="contact" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address </label>
              <div class="controls">
                <textarea class="span11" name="aaddress"></textarea>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">City </label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Enter City" name="city" />
              </div>
            </div>
              
                       <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success" >Save</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Record Inserted Successfully!
              </div>
              
            

          </form>
        </div>
         <br>
         <br>
        <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Bussinessname</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              
                 <?php
                 $res=mysqli_query($conn,"select * from  party_info ");
                 while($row=mysqli_fetch_array($res))
                 {
                  ?>
                   <tr>
                  <td>
                    <center><?php echo $row["firstname"];?>
                    </center></td>
                  <td>
                    <center><?php echo $row["lastname"];?>
                    </center></td>
                  <td><center>
                    <?php echo $row["bussinessname"];?>
                  </center></td>
                  <td>
                    <center><?php echo $row["contact"];?>
                    </center></td>
                  <td>
                    <center><?php echo $row["aaddress"];?>
                    </center></td>
                    <td>
                    <center><?php echo $row["city"];?>
                    </center></td>
                  <td>
                    <center><a href="edit_party.php?id=<?php echo $row["id"];?>" style="color:green;">Edit</a>
                    </center></td>
                  <td>
                  <center><a href="delete_party.php?id=<?php echo $row["id"];?>" style="color: red;">Delete</a>
                  </center></td>
                </tr>
                  <?php
                 }
                 ?>


               
              </tbody>
            </table>
          </div>



      </div>
      
          </form>
        </div>
      </div>
      
    </div>
        </div>

    </div>
</div>
   
<?php
if(isset($_POST['submit1']))

{

  
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $bussinessname=$_POST['bussinessname'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $sql = "INSERT INTO  party_info 
     (firstname, lastname,bussinessname,contact,aaddress,city)
    VALUES ('$fname', '$lname','$bussinessname','$contact','$address','$city')";
   $result= $conn->query($sql);
   
    ?>
    <script type="text/javascript">
      document.getElementById("success").style.display="block";
       setTimeout(function(){
        window.location.href= window.location.href;
       },1000);
    </script>
    <?php
    
}
?>

<?php
include "footer.php";
?>




