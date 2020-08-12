<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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

	text-align:center;
  padding-top: 12px;
  padding-bottom: 12px;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>

<body>
<?php
if(isset($_POST['submit']))
{
$sprice=$_POST['saleprice'];
$dprice=$_POST['downpayment'];
$term=$_POST['term'];
$terminmonth=$_POST['term']*12;
$irate=$_POST['interestrate'];
$actualprice=$sprice-$dprice;
$interest=(($actualprice*$irate)/100);
$pricewithinterest=$actualprice+$interest;
$emi=$pricewithinterest/$terminmonth;

}
?>
<h2 align="center">Calculator</h2>
<hr />
<table id="customers">
<tr>
<th>Sale Price</th>	
<td><?php echo htmlentities($sprice)?></td>
</tr>

<tr>
<th>Down Payment</th>	
<td><?php echo htmlentities($dprice)?></td>
</tr>

<tr>
<th>Actual Payment</th>	
<td><?php echo htmlentities($actualprice)?></td>
</tr>

<tr>
<th>Term</th>	
<td><?php echo htmlentities($term)?></td>
</tr>

<tr>
<th>Interest Rate</th>	
<td><?php echo htmlentities($irate)?></td>
</tr>

<tr>
<th>Interest</th>	
<td><?php echo htmlentities($interest)?></td>
</tr>

<tr>
<th>Actual Payment + Interest</th>	
<td><?php echo htmlentities($pricewithinterest)?></td>
</tr>	

<tr>
<th>EMI</th>	
<td><?php echo htmlentities($emi)?></td>
</tr>	
</table>
</body>
</html>