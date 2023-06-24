<?php
include "../../user/connect.php";
$unit=$_GET["unit"];
$company_name=$_GET["company_name"];
$product_name=$_GET["product_name"];
$res=mysqli_query($conn,"select * from products where company_name='$company_name' && product_name='$product_name' && unit ='$unit'");
?>
<select class="span11" name="unit" id="unit">
    <option>
        Select
    </option>
    <?php
    while($row=mysqli_fetch_array($res))
    {
    echo "<option>";
    echo $row["packing_size"];
    echo "</option>";
    }
    echo "</select>";
    ?>
       
