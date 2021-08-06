<?php

include('files.php');
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portaldatanew";
$first_name = $_GET['varname'];
$conn1 = mysqli_connect("localhost", "root", "", "industrial_visiting_portal") or die('Database connection failed');
$conn2 = mysqli_connect($servername, $username, $password, "requestData");

// Check connection
if (!$conn1 && !$conn2) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT unique_id,package_name,package_description,package_aamount,package_bamount,image,package_tamount,package_days,package_id FROM packages Where package_id ='$first_name'";
$result = mysqli_query($conn1, $sql);
?>
<nav>
  <label class="logo">Visit X</label>
  <ul>
    <li><a class="active" href="#">Home</a></li>
    <li><a href="#" class="nactive">Sign-In</a></li>
    <li><a href="#" class="nactive">Sign-Up</a></li>
    <li><a href="#" class="nactive">Profile</a></li>
  </ul>
  <label id="icon">
    <i class="fas fa-bars"></i>
  </label>

</nav>
<style>
  /* 
* Design by Robert Mayer:https://goo.gl/CJ7yC8
*
*I intentionally left out the line that was supposed to be below the subheader simply because I don't like how it looks.
*
* Chronicle Display Roman font was substituted for similar fonts from Google Fonts.
*/

  body {
    background-color: #fdf1ec;
  }

  .wrapper {
    height: 420px;
    width: 654px;
    margin: 50px auto;
    border-radius: 7px 7px 7px 7px;
    /* VIA CSS MATIC https://goo.gl/cIbnS */
    -webkit-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
    box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);
  }

  .product-img {
    float: left;
    height: 420px;
    width: 327px;
  }

  .product-img img {
    border-radius: 7px 0 0 7px;
  }

  .product-info {
    float: left;
    height: 420px;
    width: 327px;
    border-radius: 0 7px 10px 7px;
    background-color: #ffffff;
  }

  .product-text {
    height: 300px;
    width: 327px;
  }

  .product-text h1 {
    margin: 0 0 0 38px;
    padding-top: 52px;
    font-size: 34px;
    color: gray;
  }

  .product-text h1,
  .product-price-btn p {
    font-family: 'Bentham', serif;
  }

  .product-text h2 {
    margin: 50px 0 47px 38px;
    font-size: 13px;
    font-family: 'Raleway', sans-serif;
    font-weight: 900;
    text-transform: uppercase;
    color: gray;
    letter-spacing: 0.2em;
  }

  .product-text p {
    height: 125px;
    margin: 0 0 0 38px;
    font-family: 'Playfair Display', serif;
    color: #8d8d8d;
    line-height: 1.7em;
    font-size: 15px;
    font-weight: lighter;
    overflow: hidden;
  }

  .product-price-btn {
    height: 103px;
    width: 327px;
    margin-top: 10px;
    position: relative;
  }

  .product-price-btn p {
    display: inline-block;
    position: absolute;
    top: -3px;
    height: 50px;
    font-family: 'Trocchi', serif;
    margin: 0 0 0 38px;
    font-size: 28px;
    font-weight: lighter;
    color: #474747;
  }

  span {
    display: inline-block;
    height: 50px;
    font-family: 'Suranna', serif;
    font-size: 34px;
  }

  .product-price-btn input {
    float: right;
    display: inline-block;
    height: 50px;
    width: 176px;
    margin: 0 40px 0 16px;
    box-sizing: border-box;
    border: transparent;
    border-radius: 60px;
    font-family: 'Raleway', sans-serif;
    font-size: 14px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    color: #ffffff;
    background-color: #9cebd5;
    cursor: pointer;
    outline: none;
  }

  .product-price-btn input:hover {
    background-color: #79b0a1;
    box-shadow: 0px 14px 32px 0px rgba(0, 0, 0, 0.15);

  }
</style>

<body>
  <?php
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $id11 = $row['unique_id'];

      $img = $row['image'];
      $path = "./Image/Packages/$img";
  ?>


      <div class="wrapper">
        <div class="product-img">
          <img src="<?php echo $path; ?>" height="420" width="327">
        </div>
        <div class="product-info">
          <div class="product-text">
            <h2><?php echo $row['package_description'] ?></h1>
              <h2><?php echo $row['package_name'] ?></h2>
              <h2><?php echo $row['package_days'] ?></h2>
          </div>

          <?php
          $uuid = $_SESSION["uid"];
          $id = $row['unique_id'];
          $sql1 = "SELECT reg_date FROM requestdata Where clientid ='$id' and userid='$uuid' and checked=0";
          $result1 = mysqli_query($conn2, $sql1);
          $sql117 = "SELECT reg_date FROM requestdata Where clientid ='$id' and userid='$uuid' and checked=-1";
          $result117 = mysqli_query($conn2, $sql117);
          $sql122 = "SELECT reg_date FROM requestdata Where clientid ='$id' and userid='$uuid' and checked=1";
          $result99 = mysqli_query($conn2, $sql122);
          if (mysqli_num_rows($result1) > 0) {

            // output data of each row
            while ($row1 = mysqli_fetch_assoc($result1)) {
          ?>

              <div class="product-price-btn">
                <p><span>112</span>$</p>
                <!--button type="button">Contact now</button-->
                <input type="submit" value="Pending" />
              </div>

            <?php
            }
          } elseif (mysqli_num_rows($result117) > 0) {
            while ($row117 = mysqli_fetch_assoc($result117)) {
            ?>

              <div class="product-price-btn">
                <p><span>112</span>$</p>
                <!--button type="button">Contact now</button-->
                <input type="submit" value="Rejected" />
              </div>

            <?php
            }
          } elseif (mysqli_num_rows($result99) > 0) {
            while ($row122 = mysqli_fetch_assoc($result99)) {
            ?>

              <div class="product-price-btn">
                <p><span>112</span>$</p>
                <!--button type="button">Contact now</button-->
                <a ><input type="submit" value="Payment" /></a>
              </div>

            <?php
            }
          } else {
            $uuid = $_SESSION["uid"];
            $id = $row['unique_id'];
            $resultset_1 = mysqli_query($conn2, "select * from requestdata where clientid='" . $id . "'and userid='" . $uuid . "' ") or die(mysqli_error($conn2));
            $count = mysqli_num_rows($resultset_1);
            if ($count == 0) {
              if (isset($_POST['test']) && trim(strlen($_POST['test'])) > 0) {
               
                $sql5 = "INSERT INTO requestdata (clientid, userid, email,checked) VALUES ('$id','$uuid', 'john@example.com',0)";

                if (mysqli_query($conn2, $sql5)) {

                  unset($_POST['test']);
                } else {
                  echo mysqli_error($conn2);
                }

                mysqli_close($conn2);
              }
            } else {
              
            }
            ?>
            <form method="post">
              <div class="product-price-btn">
                <p><span></span>$</p>
                <!--button type="button">Contact now</button-->
                <input type="submit" name="test" value="Contact Now" />
              </div>
            </form>
            <?php

            ?>
          <?php
          }
          ?>
        </div>
      </div>
  <?php
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn1);
  ?>
</body>