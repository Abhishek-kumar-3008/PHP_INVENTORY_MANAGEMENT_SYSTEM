<?php
include "header.php";
include "../user/connect.php";
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"><a href="index.html" class="tip-bottom"><i class="icon-home"></i>
                    Sale a products</a></div>
        </div>

        <div class="container-fluid">
            <form name="form1" action="" method="post" class="form-horizontal nopadding">
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                                <h5>Sale a Products</h5>
                            </div>

                            <div class="widget-content nopadding">


                                <div class=" span4">
                                    <br>

                                    <div>
                                        <label>Full Name</label>
                                        <input type="text" class="span12" name="full_name">
                                    </div>
                                </div>

                                <div class="span3">
                                    <br>

                                    <div>
                                        <label>Bill Type</label>
                                        <select class="span12" name="bill_type">
                                            <option>Cash</option>
                                            <option>Debit</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="span2">
                                    <br>

                                    <div>
                                        <label>Date</label>
                                        <input type="text" class="span12" name="date"
                                               value="<?php echo date("Y-m-d") ?>"
                                               readonly>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>

                <!-- new row-->
                <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                    <div class="span12">


                        <center><h4>Select A Product</h4></center>


                        <div class="span2">
                            <div>
                                <label>Product Company</label>
                                <select class="span11" name="company_name" id="company_name"
                                onchange="select_company(this.value)">
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

                        <div class="span2">
                            <div>
                                <label>Product Name</label>
                                <div>
                                    <select class="span11"  name="product_name" id="product_name_div" onchange="select_product(this.value)" >
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Unit</label>
                                <div>
                                    <select class="span11" name="unit" id="unit_div"  onchange="select_unit(this.value)">
                                        <option>Select</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <div class="span2">
                            <div>
                                <label>Packing Size</label>
                                <div>
                                    <select class="span11"  id="packing_size_div" name="packing_size">
                                        <option>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="span1">
                            <div>
                                <label>Price</label>
                                <input type="text" class="span11" name="price" id="price" readonly value="0">
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>Enter Qty</label>
                                <input type="text" class="span11" name="qty" id="qty" autocomplete="off">
                            </div>
                        </div>



                        <div class="span1">
                            <div>
                                <label>Total</label>
                                <input type="text" class="span11" name="total" id="total" value="0" readonly>
                            </div>
                        </div>

                        <div class="span1">
                            <div>
                                <label>&nbsp</label>
                                <input type="button" class="span11 btn btn-success" value="Add">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end new row-->


            </form>




            <div class="row-fluid" style="background-color: white; min-height: 100px; padding:10px;">
                <div class="span12">
                    <center><h4>Taken Products</h4></center>

                    <table class="table table-bordered">
                        <tr>
                            <th>Product Company</th>
                            <th>Product Name</th>
                            <th>Product Unit</th>
                            <th>Product Size</th>
                            <th>Product Price</th>
                            <th>Product Qty</th>
                            <th>Total</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        <tr>
                            <td>Amul</td>
                            <td>Buutter</td>
                            <td>Grams</td>
                            <td>500</td>
                            <td>10</td>
                            <td>5</td>
                            <td>50</td>
                            <td style="color: green">Edit</td>
                            <td style="color:red">Delete</td>
                        </tr>
                    </table>

                    <h4>
                        <div style="float: right"><span style="float:left;">Total:&#8377;</span><span style="float: left">525</span></div>
                    </h4>


                    <br><br><br><br>

                    <center>
                        <input type="submit" value="generate bill" class="btn btn-success">
                    </center>

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
     
    }

    function select_unit(unit)
    {
        var company_name=document.getElementById("company_name").value;
        var product_name=document.getElementById("product_name_div").value;
        // console.log(unit+"=="+company_name+"=="+product_name);
     var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;
         
            $('#packing_size_div').on('change',function(){
              load_price(document.getElementById("packing_size_div").value);
            });

        }
     };
     xmlhttp.open("GET","forajax/load_packingsize_using_unit.php?unit="+unit+"&product_name="+product_name+"&company_name="+company_name ,true);
     xmlhttp.send();
     
    }

    function load_price(packing_size){
        var company_name=document.getElementById("company_name").value;
        var product_name=document.getElementById("product_name_div").value;
        var unit=document.getElementById("unit_div").value;

        var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("price").value=xmlhttp.responseText;
         
        }
     };
     xmlhttp.open("GET","forajax/load_price.php?company_name="+company_name+"&product_name="+product_name+"&unit="+unit+"&packing_size="+packing_size,true);
     xmlhttp.send();
     
        
    }

    </script>

<?php
include "footer.php";
?>