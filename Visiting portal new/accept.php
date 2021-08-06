<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, "requestData");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT id,clientid, userid, email FROM requestdata WHERE checked=0 ";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Submit Button</title>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
  <div class="container">

    <h1>Accept requestData</h1>

    <?php
    if (isset($_POST['acc'])) {
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $id = $_POST['hid1'];
      $act = $_POST['acc'];
      $sql = "UPDATE requestdata SET checked=1 Where id =$id";

      $result = mysqli_query($conn, $sql);
      if (!$result) {
        echo mysqli_error($conn);
      } else {
        header("Location:http://127.0.0.1/dashboard/Visiting%20portal%20new/accept.php");
      }}
      if (isset($_POST['rej'])) {
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $id = $_POST['hid1'];
        $act = $_POST['rej'];
        $sql = "UPDATE requestdata SET checked=-1 Where id =$id";
  
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          echo mysqli_error($conn);
        } else {
          header("Location:http://127.0.0.1/dashboard/Visiting%20portal%20new/accept.php");
        }}
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {

    ?>
          <h1><?php echo $row['id'] ?></h1>
          <form method="post">
            <input type="hidden" value="<?php echo $row['id'] ?>" name="hid1">
            <input type="submit" class="btn btn-primary" name="acc" value="Accept">
            <input type="submit" class="btn btn-primary" name="rej" value="Reject">
            
          </form>
    <?php
        }
      } else {
        echo "No any Request Till Now";
      }
    
    ?>
  </div>

</body>

</html>
<script>
  function updateId(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        alert(xmlhttp.responseText);
      }
    };
    xmlhttp.open("GET", "update.php?id=" + id, true);
    xmlhttp.send();
  }
</script>