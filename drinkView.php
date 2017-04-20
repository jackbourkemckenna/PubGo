<html>
    <head>
        <title>Drinks List</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="resources/css/style.css"/>
    </head>
    <body>
        <?php
        include("SessionNavigationBar.php");
        ?>
        
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center drink-list">
                <h1>Your Drinks</h1>
                <br>
                <br>
                
                <?php
                session_start();
                include("dbconnect.php");
                //query gets needed info from DB from the current user's session
                $result = $DBcon->query("SELECT name, price, type, drink_id
                        FROM drinks as d
                        INNER JOIN pubUsers as p
                        ON d.pub_id =".$_SESSION['userSession']." AND p.pub_id =".$_SESSION['userSession'].";");
                    if ($result->num_rows > 0) {
                        //output data of each row
                        while($row = $result->fetch_assoc()) {
                        //diplays name/price/drink type per row 
                        echo "Name: " . $row["name"]. "<br> Price: €" . $row["price"]. "<br> Drink Type: " . $row["type"]. "<br><br>";
                        //displays delete button
                        echo "<form method='post' id='btn-delete' action='".deleteDrink($DBcon)."'>
                                <input type='hidden' name='drink-id' value='".$row["drink_id"]."'>
                                <button type='submit' class='btn btn-danger' name='btn-delete' id='btn-delete' value='btn-delete'>
                                    <span class='glyphicon glyphicon-remove'></span> &nbsp; Delete
                                </button>
                              </form><br><br>";
                        }
                    } else {
                    echo "no drinks added yet";
                }
                //function for delete button to delete drink from DB
                function deleteDrink($DBcon){
                    if (isset($_POST['btn-delete'])){
                        
                        $drink_id = $_POST['drink-id'];
                        
                        $delete = $DBcon->query("DELETE FROM drinks WHERE drink_id=$drink_id");
                        header("Location: drinkView.php");
                    }
                }
                ?>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>
</html>



