<!DOCTYPE html>
<html>
<head>
<style>



marquee{
 font-size: 2em;
 color: #4CAF50;
 width: 70%;
 height: 50%;
 margin: 30;
 line-height: 50px;
 text-align: left;
 direction: down;
  
}

h1{
    width: auto;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  
    margin:50px, 100px;
  
}



#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Exchange rates from ABSA website!</h1>
<h1>Welcome to Ssegawa, Sanga and Andinda's UGX forex web scrapping solution</h1>

<div>
<marquee style = "text-align: center;"> <a target ="_blank" href = "https://www.absa.co.ug/feeds/exchange-rates">https://www.absa.co.ug/feeds/exchange-rates/ </a>is the scraping source</marquee>
</div>

<table id="customers">
  <tr>
    <th>Currency</th>
    <th>Name</th>
    <th>Multiply or divide</th>
    <th>Buy Transfers</th>
    <th>Buy Cheques</th>
    <th>Buy Notes & T/Cheques</th>
    <th>Sell T/Cheques & Transfers</th>
  </tr>

<?php
//select php
include "connection.php";
$retreive = "SELECT * FROM absa";
$sql_query = mysqli_query($conn, $retreive);
while ($rows = mysqli_fetch_assoc($sql_query) ) {
?>
  <tr>
    <td><?php   echo $rows['Currency']; ?></td>
    <td><?php   echo $rows['Name']; ?></td>
    <td><?php   echo $rows['MultiplyOrDivide']; ?></td>
    <td><?php   echo $rows['BuyTransfers']; ?></td>
    <td><?php   echo $rows['BuyCheques']; ?></td>
    <td><?php   echo $rows['SellT/Cheques']; ?></td>
    <td><?php   echo $rows['SellNotes']; ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>


