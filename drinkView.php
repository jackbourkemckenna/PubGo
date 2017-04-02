<html>
    <head>
        <title>Drinks List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a href="dashboard.php"><span class="glyphicon glyphicon-chevron-left"></span>Back to Dashboard</a>
            </div>
        </nav>
        <h1>Your Drinks</h1>
        
        <?php
        session_start();
        include("dbconnect.php");
        
        $result = $DBcon->query("SELECT name, price, type, drink_id
                FROM drinks as d
                INNER JOIN pubUsers as p
                ON d.pub_id =".$_SESSION['userSession']." AND p.pub_id =".$_SESSION['userSession'].";");
            if ($result->num_rows > 0) {
            // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["name"]. "<br> Price: " . $row["price"]. "<br> Drink Type: " . $row["type"]. "<br><br>";
                
                
                
                
                
                echo "<form method='post' id='btn-delete' action='".deleteDrink($DBcon)."'>
                        <input type='hidden' name='drink-id' value='".$row["drink_id"]."'>
                        <button type='submit' class='btn btn-primary' name='btn-delete' id='btn-delete' value='btn-delete'>
                            <span class='glyphicon glyphicon-repeat'></span> &nbsp; Delete
                        </button>
                      </form><br><br>";
                }
            } else {
            echo "no drinks added yet";
        }
        function deleteDrink($DBcon){
            if (isset($_POST['btn-delete'])){
                
                $drink_id = $_POST['drink-id'];
                
                
                $delete = $DBcon->query("DELETE FROM drinks WHERE drink_id=$drink_id");
                header("Location: drinkView.php");
            }
        }
        ?>
    </body>
</html>



