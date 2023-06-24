<?php
include "../user/connect.php";
$id=$_GET['id'];
$sql=mysqli_query($conn,"delete from user_registration where id=$id");
?>
<script type="text/javascript">
    window.location="add_new_user.php";
</script>