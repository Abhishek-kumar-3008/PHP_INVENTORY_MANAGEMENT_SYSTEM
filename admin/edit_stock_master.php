<?php
include "header.php";
include "../user/connect.php";
$id=$_GET["id"];
$product_company="";
$product_name="";
$product_unit="";
$packing_size="";
$product_quantity="";
$product_selling_price="";
$res=mysqli_query($conn,"select * from stock_master where id=$id");
while($row=mysqli_fetch_array($res)){
  $product_company=$row["product_company"];
  $product_name=$row["product_name"];
  $product_unit=$row["product_unit"];
  $packing_size=$row["packing_size"];
  $product_quantity=$row["product_qty"];
  $product_selling_price=$row["product_selling_price"];
}
?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html"  class="tip-bottom"><i class="icon-home"></i>
            Edit Stocks Price</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
        <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Stocks Price</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Product Company:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product_company" name="product_company"value="<?php echo $product_company;?>"  readonly/>
              </div>
              </div>
              <div class="control-group">
              <label class="control-label">Product Name:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product_Name" name="product_name"value="<?php echo $product_name;?>" readonly />
              </div>

              <div class="control-group">
              <label class="control-label">Product Unit:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product_unit" name="product_unit"value="<?php echo $product_unit;?>" readonly />
              </div>

              <div class="control-group">
              <label class="control-label">Packing Size:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Packing Size" name="packing_size"value="<?php echo $packing_size;?>" readonly />
              </div>
            
              <div class="control-group">
              <label class="control-label">Product Quantity</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product_Qunatity" name="product_qty"  value="<?php echo $product_quantity;?>" readonly/>
              </div>

              <div class="control-group">
              <label class="control-label">Product Selling Price:</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product_Selling_Price" name="product_selling_price"  value="<?php echo $product_selling_price;?>"/>
              </div>
            
               <div class="alert alert-danger" id="error" style="display:none">
                This Products is Already Exists! Please Try Another.
              </div>

              
                       <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success" >Update</button>
            </div>

            <div class="alert alert-success" id="success" style="display:none">
                Record Updated Successfully!
              </div>
              
            

          </form>
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
 mysqli_query($conn,"update stock_master set  product_selling_price='$_POST[product_selling_price]'where id=$id") or die(mysqli_error($conn));
 ?>
 <script type="text/javascript">
document.getElementById("success").style.display="block";
setTimeout(function(){
    window.location="stock_master.php"
},2000)
</script>
<?php
}
?>

<?php
include "footer.php";
?>




