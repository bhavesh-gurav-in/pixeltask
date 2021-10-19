<?php
session_start();
error_reporting(0);
echo "Count :-".$_SESSION["cnt"];  //Here shown the counting of visits
include("connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Records</title>
    </head>
<body bgcolor="skyblue">
    <div class="form">
        <h2>View Records</h2>
    <table width="100%" border="1" style="border-collapse:collapse;">
    <thead>
    <tr>
        <th><strong>Name</strong></th>
        <th><strong>Category</strong></th>
        <th><strong>Description</strong></th>
        <th><strong>LifeExpectancy</strong></th>
        <th><strong>Date</strong></th>
        <th><strong>Image</strong></th>
    </tr>
    </thead>
<tbody>

<!-- Php code for print data from database in table format-->
<?php
$count=1;
$sel_query="Select * from animal ORDER BY name,category asc;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
    <td align="center"><?php echo $row["name"]; ?></td>
    <td align="center"><?php echo $row["category"]; ?></td>
    <td align="center"><?php echo $row["desc"]; ?></td>
    <td align="center"><?php echo $row["life"]; ?></td>
    <td align="center"><img src="<?php echo $row['image']; ?>" width="100" height="100"></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>