<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
	text-align:center;
}
th, td {
    padding: 10px 5px 10px 15px;
}

table tr:nth-child(even) {
    background-color: #eee;
}
table tr:nth-child(odd) {
   background-color:#fff;
}
table th {
	border-bottom:3px solid #999;
	font-size:18px;
}
</style>
</head>
<body>

<table align="center" width="560">
	<tr><td><img src="<?php echo base_url();?>assets/admin2/images/logo_black.png" /></td></tr>
</table>
<table align="center" width="560">
	<tr><td>List of Registered Users</td></tr>
</table>
<table align="center" style="width:90%">
  <tr>
    <th>First Name</th>
   <th>Last Name</th>
   <th>Email</th>
   <th>Phone</th>
   <th>Zip Code</th>
   </tr>
  <?php foreach($ulist as $row) { ?>
    <tr>
    <td><?php echo $row->firstname; ?></td>
    <td> <?php echo $row->lastname; ?></td>
    <td><?php echo $row->email; ?></td>
    <td><?php echo $row->phone; ?></td>
    <td><?php echo $row->zip; ?></td>
     </tr>
     <?php
  }
	 ?>
 
</table>

</body>
</html>
