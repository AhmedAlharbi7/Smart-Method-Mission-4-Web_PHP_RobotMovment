

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movment";

    //---------------------------------------------------------------
    // STEP 1 Create connection if you alerady have database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    //---------------------------------------------------------------
    //   Step 2 call the input action from the html 

    // collect value of input field
    if (isset($_GET['Forward'])) {
      # Forward-button was clicked
      $value = $_GET['Forward'];
    } elseif (isset($_GET['Left'])) {
      $value = $_GET['Left'];
    } elseif (isset($_GET['Stop'])) {
      $value = $_GET['Stop'];
    } elseif (isset($_GET['Right'])) {
      $value = $_GET['Right'];
    } elseif (isset($_GET['Backward'])) {
      $value = $_GET['Backward'];
    }



    //---------------------------------------------------------------
      //Step 3 insert the number in the database
    $sql1 = "INSERT INTO direction VALUES ('$value')";
      $conn->query($sql1);

    //---------------------------------------------------------------
    //Step 4 show all the number in the database
    $sql = "SELECT * FROM direction";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row

      while ($row = $result->fetch_assoc()) {
        echo "<br>" . "Action pressed: " . $row["movment"];
      }
    } else {
      echo "0 results";
    }

    //---------------------------------------------------------------
    $conn->close();

    ?>
 