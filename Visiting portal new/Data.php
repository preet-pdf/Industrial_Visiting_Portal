<script>
  let testBool = false;
</script>
<?php
include('files.php');
$_SESSION['service'] = false;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portaldatanew";
// Create connection
$conn=mysqli_connect("localhost","root","","industrial_visiting_portal") or die('Database connection failed');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * from packages";
$rs_result = mysqli_query($conn, $sql);
?>
<nav>
  <label class="logo">Visit X</label>
  <ul>
    <li><a class="active" href="#">Home</a></li>
    <li><a href="#" class="nactive" onclick="toggle()">Sign-In</a></li>
    <script>
      function toggle() {
        testBool = !testBool;

        console.log('Toggled bool is',
          testBool);
      }
    </script>
    <li><a href="#" class="nactive">Sign-Up</a></li>
    <li><a href="#" class="nactive">Profile</a></li>
  </ul>
  <label id="icon">
    <i class="fas fa-bars"></i>
  </label>

</nav>
<style>
  .wrapper {
    width: auto;

    height: auto;
    background: blanchedalmond;
    overflow: hidden;
    display: grid;
    grid-row-gap: 50px;
    grid-template-columns: auto auto auto;

    padding: 10px;
  }

  .card {
    display: grid;
    grid-template-columns: auto;
    grid-template-rows: 210px 210px 80px;
    grid-template-areas: "image""text""stats";

    border-radius: 18px;
    background: white;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.9);
    font-family: roboto;
    text-align: center;


    transition: 0.5s ease;
    cursor: pointer;
    margin: 30px;
  }

  .card-image {
    grid-area: image;

    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    background-size: cover;
  }

  .card-text {
    grid-area: text;
    margin: 25px;
  }

  .card-text .date {
    color: rgb(255, 7, 110);
    font-size: 13px;
  }

  .card-text p {
    color: grey;
    font-size: 15px;
    font-weight: 300;
  }

  .card-text h2 {
    margin-top: 0px;
    font-size: 28px;
  }

  .card-stats {
    grid-area: stats;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background: rgb(255, 7, 110);
  }

  .card-stats .stat {
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: white;
  }

  .card-stats .border {
    border-left: 1px solid rgb(172, 26, 87);
    border-right: 1px solid rgb(172, 26, 87);
  }

  .card-stats .value {
    font-size: 22px;
    font-weight: 500;
  }

  .card-stats .value sup {
    font-size: 12px;
  }

  .card-stats .type {
    font-size: 11px;
    font-weight: 300;
    text-transform: uppercase;
  }

  .card:hover {
    transform: scale(1.15);
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.6);
  }
</style>

<body>
  <div class="wrapper">
    <?php
    if (mysqli_num_rows($rs_result) > 0) {
    while ($row = mysqli_fetch_assoc($rs_result)) {
      $id=$row['package_id'];	
      $img=$row['image'];
      $path="./Image/Packages/$img";
    ?>

      <a id="a" style="border:none"  href="http://127.0.0.1/dashboard/Visiting%20portal%20new/page2.php?varname=<?php echo $id?>" >
        <!-- <script>
        

          function check() {
            if (testBool) {
              console.log(testBool);
              document.getElementById("a").setAttribute("onclick", "http://127.0.0.1/dashboard/Visiting%20portal%20new/page2.php?varname=");
            
              //window.open("http://127.0.0.1/dashboard/Visiting%20portal%20new/page2.php?varname=");
              //document.getElementById("abc").setAttribute("onclick", );
   
             
            } else {
              console.log(testBool);
              alert("");
              document.getElementById("a").setAttribute("onclick", "http://127.0.0.1/dashboard/Visiting%20portal%20new/Data.php#");
            
             
            }
          }
        </script> -->
        <div class="card">
          <img src="<?php echo $path;?>" class="card-image" style="height:100%;width:100%"></img>
          <div class="card-text">
            <span class="date">4 days ago</span>
            <h2><?php echo $row['package_name']; ?></h2>
            <p><?php echo $row['package_description']; ?></p>
          </div>
          <div class="card-stats">
            <div class="stat">
              <div class="value">Rating</div>
              <div class="type">4.9/5</div>
            </div>
            <div class="stat border">
              <div class="value">Type</div>
              <div class="type">Space</div>
            </div>
            <div class="stat">
              <div class="value">Vistors</div>
              <div class="type">15k</div>
            </div>
          </div>
        </div>

      <?php
    }};
    $conn->close();

      ?>


      </a>
  </div>
</body>