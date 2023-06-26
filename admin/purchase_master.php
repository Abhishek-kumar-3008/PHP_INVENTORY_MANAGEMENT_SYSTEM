<?php
include "header.php";
include "../user/connect.php";
?>

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                Add New Purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Add New Purchase</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form name="form1" action="" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Select Company:</label>
                                <div class="controls">
                                    <select class="span11" name="companyname" id="company_name" onchange="select_company(this.value)">
                                        <option>Select</option>
                                        <?php
                                        $res = mysqli_query($conn, "select* from comapny_name");
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "<option>";
                                            echo $row["company_name"];
                                            echo "<option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                                <div class="control-group">
                                    <label class="control-label">Select Product Name:</label>
                                    <div class="controls">
                                        <select class="span11" name="product_name" id="product_name_div" onchange="select_product(this.value)">
                                            <option>Select</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Select Unit:</label>
                                    <div class="controls">
                                        <select class="span11" name="unit" id="unit_div"  onchange="select_unit(this.value)">
                                            <option>Select</option>
                                        </select>
                                    </div>
                                </div>
                                        <div class="control-group">
                                            <label class="control-label">Packing Size:</label>
                                            <div class="controls" id="packing_size_div" name="packing_size">
                                            <select class="span11">
                                              <option>Select</option>
                                            </select>
                                            </div>
                                        </div>
                                          
                                            <div class="control-group">
                                            <label class="control-label">Enter quantity:</label>
                                            <div class="controls">
                                            <input type="text" name="qty" value="0" class="span11">
                                            </div>
                                            </div>

                                            <div class="control-group">
                                            <label class="control-label">Enter Price:</label>
                                            <div class="controls">
                                            <input type="text" name="price" value="0" class="span11">
                                            </div>
                                            </div>

                                            <div class="control-group">
                                            <label class="control-label">Select Party Name</label>
                                            <div class="controls">
                                            <select class="span11" name="party_name">
                                                <option>Select</option>
                                             <?php
                                             $res=mysqli_query($conn,"select * from party_info");
                                             while($row=mysqli_fetch_array($res))
                                             {
                                                echo "<option>";
                                                echo $row["bussinessname"];
                                                echo "</option>";
                                             }
                                             ?>
                                            </select>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label">Select Purchase Type</label>
                                            <div class="controls">
                                            <select class="span11" name="purchase_type">
                                              <option>Cash</option>
                                              <option>Debit</option>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Enter Price:</label>
                                            <div class="controls">
                                            <input type="text" name="expiry_date" class="span11" placeholder="YYYY-MM-dd" required pattern="\d{4}-\d{2}-\d{2}">
                                            </div>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" name="submit1" class="btn btn-success">Purchase Now</button>
                                            </div>

                                            <div class="alert alert-success" id="success" style="display:none">
                                                Purchase Inserted Successfully!
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

<script type="text/javascript">
    function select_company(company_name)
    {
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status == 200){
            document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;
        }
     };
     xmlhttp.open("GET","forajax/load_product_using_company.php?company_name="+company_name,true);
     xmlhttp.send();
    }


    function select_product(product_name)
    {
        var company_name=document.getElementById("company_name").value;
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("unit_div").innerHTML=xmlhttp.responseText;
        }
     };
     xmlhttp.open("GET","forajax/load_unit_using_products.php?product_name="+product_name+"&company_name="+company_name,true);
     xmlhttp.send();
    //  alert(product_name+"=="+company_name);
     
    }

    function select_unit(unit)
    {
        var company_name=document.getElementById("company_name").value;
        var product_name=document.getElementById("product_name_div").value;
        console.log(unit+"=="+company_name+"=="+product_name);
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
        }
     };
     xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name ,true);
     xmlhttp.send();
    //  alert(product_name+"=="+company_name);
     
    }

</script>


<?php
if (isset($_POST['submit1'])) {
    $count = 0;
    $res = mysqli_query($conn, "select * from  products where company_name='$_POST[companyname]' && product_name='$_POST[productsname]'&& unit='$_POST[unit]' && packing_size='$_POST[packingsize]'");
    $count = mysqli_num_rows($res);

    if ($count > 0) {

?>
        <script type="text/javascript">
            document.getElementById("success").style.display = "none";
            document.getElementById("error").style.display = "block";
        </script>
    <?php
    } else {

        mysqli_query($conn, "insert into products values(NULL,'$_POST[companyname]','$_POST[productsname]','$_POST[unit]','$_POST[packingsize]')") or die(mysqli_error($conn));

    ?>
        <script type="text/javascript">
            document.getElementById("error").style.display = "none";
            document.getElementById("success").style.display = "block";
            setTimeout(function() {
                window.location.href = window.location.href;
            }, 1000);
        </script>
<?php

    }
}
?>

<?php
include "footer.php";
?>