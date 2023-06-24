<?php
include "../user/connect.php";
$id=$_GET['id'];
$sql=mysqli_query($conn,"delete from  comapny_name where id=$id");
?>
<script type="text/javascript">
    window.location="add_new_company.php";
</script>