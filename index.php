<?php
if(isset($_POST['submit'])){

// send a curl get request to get the html input

$ch = curl_init();//intiate

curl_setopt($ch, CURLOPT_URL, "https://www.absa.co.ug/feeds/exchange-rates/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($ch);

// find all heading (h2) elements on the page

$dom = new DOMDocument();

@ $dom->loadHTML($html);

//get the titles

$table_heads = $dom->getElementsByTagName('tr');

//     $table_head = $table_heads->item(0);
//     $ths = $table_head->getElementsByTagName('th');

    
//     $store = array();

// foreach($ths as $th) {
//     $title_text = $th->textContent;
//     $td_array[] = $title_text;
//     array_push($store, $title_text);
//    // echo $title_text . '<br>';
// }

// var_dump($store);
// echo "<br>";
// echo "===========================================";
// echo "<br>";



//get the data
$table_rows = $dom->getElementsByTagName('tr');

//get object length
$ob_len = count($table_rows);
$counter = 1;

while($counter < $ob_len){
    $store = array();//array storing obj values
    $table_row = $table_rows->item($counter);
    $tds = $table_row->getElementsByTagName('td');

foreach($tds as $td) {
    $td_text = $td->textContent;
    $td_array[] = $td_text;
    array_push($store, $td_text);
    //echo $td_text . '<br>';
}
// echo "<br>";
// var_dump($store);

include "connection.php";

$insert = "INSERT INTO `absa` (`Currency`, `Name`, `MultiplyOrDivide`, `BuyTransfers`, `BuyCheques`, `BuyNotes`, `SellT/Cheques`, `SellNotes`, `CurrencyId`) VALUES ('$store[0]', '$store[1]', '$store[2]', '$store[3]', '$store[4]', '$store[5]', '$store[6]', '$store[7]', NULL)";

$sql_query = mysqli_query($conn, $insert);
  if ($sql_query == true){
    //echo "Data submitted to the DB";      
  }else{
    //echo mysqli_error($conn);
  }
  

$counter++;
}
//end foreach
header('Location: results.php');
}



?>


<!DOCTYPE html>
<html>
<style>

h1, h3{
    width: auto;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  
    margin:100px;
  
}

input[type=submit] {
  width: 100%;
  background-color: teal;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h1>Welcome to Ssegawa, Sanga and Andinda's UGX forex web scrapping solution</h1>

<h3>Lets scrap Absa's exchange rates!</hf3>
<div>
  <form action="" method="post">
    
  
    <input type="submit" value="Scrape" name="submit">
  </form>
</div>

<table align="center">
  <caption>Group members</caption>
  <tr>
  <thead>
    <th>Name</th>
    <th>Student Number</th>
    <th>Registration Number</th>
  </thead>
</tr>
<tr>
  <td>Sanga Arnold  Lukoda</td>
  <td>1900700771</td>
  <td>19/U/0771</td>
</tr>
<tr>
  <td>Ssegawa Godfrey	</td>
  <td>1900719321</td>
  <td>19/U/1932/PS</td>
</tr>
<tr>
  <td>Andinda Ruth	</td>
  <td>1900718852</td>
  <td>19/U/18852/PS</td>
</tr>
</table>


</body>
</html>





