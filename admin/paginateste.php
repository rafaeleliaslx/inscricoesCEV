<?php
   function updater($value,$id){
// Create connection
   $conn = new mysqli( 'localhost' , 'user_name' , '' , 'data_base_name' );
// Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   $sql = "UPDATE table_name SET name=$value WHERE id=$id";
   if ($conn->query($sql) === TRUE) {
       echo "Record updated successfully";
   } else {
       echo "Error updating record: " . $conn->error;
   }
//$conn->close();
}
?>

<!DOCTYPE html>
<html>
<header>
</header>
<body>
    <form action="<?php updater($_POST['name'],1); ?>" method="post" style="height:50px;width:50px;">
        <input type="text" name="name" /><br><br>
        <input type="submit" /><br/>
    </form>
</body>
</html>