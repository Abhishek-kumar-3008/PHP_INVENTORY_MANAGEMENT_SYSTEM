<?php
include "header.php";
include "../user/connect.php";
?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Add New Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Products</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Company:</label>
              <div class="controls">
                <select class="span11" name="companyname">
                  <?php
                $res=mysqli_query($conn,"select* from comapny_name");
                  while($row=mysqli_fetch_array($res))
                  {
                    echo "<option>";
                    echo $row["company_name"];
                    echo "<option>";
                  }
                  ?>
                </select>

              </div>
              <div class="control-group">
              <label  class="control-label">Enter Product Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Products name" name="productsname" />
              </div>
              <div class="control-group">
              <label class="control-label">Select Unit:</label>
              <div class="controls">
                <select class="span11" name="unit">
                <?php
                $res=mysqli_query($conn,"select* from units");
                  while($row=mysqli_fetch_array($res))
                  {
                    echo "<option>";
                    echo $row["unit"];
                    echo "<option>";
                  }
                  ?>
                </select>
              </div>
              <div class="control-group">
              <label class="control-label">Packing Size:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Packing Size" name="packingsize" />
              </div>
            
               <div class="alert alert-danger" id="error" style="display:none">
                This Products is Already Exists! Please Try Another.
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
                    <th>Id</th>
                  <th>Company Name</th>
                  <th>Products Name</th>
                  <th>Unit</th>
                  <th>Packing Size</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
              
                 <?php
                 $res=mysqli_query($conn,"select * from products");
                 while($row=mysqli_fetch_array($res))
                 {
                  ?>
                   <tr>
                  <td><center><?php echo $row["id"];?></center></td>
                  <td><center><?php echo $row["company_name"];?></center></td>
                  <td><center><?php echo $row["product_name"];?></center></td>
                  <td><center><?php echo $row["unit"];?></center></td>
                  <td><center><?php echo $row["packing_size"];?></center></td>
                  <td><center><a href="edit_product.php?id=<?php echo $row["id"];?>" style="color:green;">Edit</a>
                </center></td>
                  <td>
                    <center><a href="delete_products.php?id=<?php echo $row["id"];?>" style="color:red;">Delete</a>
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
  $count=0;
  $res=mysqli_query($conn,"select * from  products where company_name='$_POST[companyname]' && product_name='$_POST[productsname]'&& unit='$_POST[unit]' && packing_size='$_POST[packingsize]'");
  $count=mysqli_num_rows($res);

  if($count>0){

    ?>
    <script type="text/javascript">
      document.getElementById("success").style.display="none";
     document.getElementById("error").style.display="block";
    </script>
    <?php
  }
  else{
    
    mysqli_query($conn,"insert into products values(NULL,'$_POST[companyname]','$_POST[productsname]','$_POST[unit]','$_POST[packingsize]')") or die(mysqli_error($conn));
   
    ?>
    <script type="text/javascript">
       document.getElementById("error").style.display="none";
      document.getElementById("success").style.display="block";
       setTimeout(function(){
        window.location.href= window.location.href;
       },1000);
    </script>
    <?php
    
  }
}
?>

<?php
include "footer.php";
?>




