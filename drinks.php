


<?php 
   if (isset($_POST['btn-drink'])) {
    $filetxt = 'drinksList.json';

    $formdata = array(
        'drink'=> $_POST['drink'],
       
    );

    $arr_data = array();  
    $jsondata = file_get_contents($filetxt);
    $arr_data = json_decode($jsondata, true);
    $arr_data[] = $formdata;
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
    file_put_contents('drinksList.json', $jsondata);
}
?>

   