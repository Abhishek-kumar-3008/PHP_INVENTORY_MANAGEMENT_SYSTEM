<?php
include "header.php";
include "../user/connect.php";
$id=$_GET["id"];
$company="";
$res=mysqli_query($conn,"select * from comapny_name where id= $id");
while($row=mysqli_fetch_array($res)){
$company=$row['company_name'];
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
          <h5>Edit Company</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Company Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Company name" name="companyname" value="<?php echo $company;?>" />
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
mysqli_query($conn,"update comapny_name set company_name='$_POST[companyname]' where id=$id") or die(mysqli_error($conn));
?>
<script type="text/javascript">
      document.getElementById("success").style.display="block";
       setTimeout(function(){
        window.location.href="add_new_company.php";
       },1000);
    </script>
<?php
}
?>

<?php
include "footer.php";
?>




