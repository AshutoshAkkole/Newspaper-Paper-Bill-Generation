<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bill</title>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <style>
        body{
            background-color: cadetblue;
        }
         #bill{
            background-color: antiquewhite;
            width: 20%;
            text-align: left;
            margin-top: 5rem;
            margin-left: auto;
            margin-right: auto;
            font-family: 'Ubuntu', sans-serif;
            padding: 1rem;
            border: 2px solid black;
           
        }
        tr,td,th{
            border: 2px solid black;
        }
        @media only screen and (max-width:690px)
        {
            #bill
            {
                width:43%;
            }
        }
    </style>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	include ('connect.php');

	$id = $_POST['id'];

    $sql1 = "SELECT * FROM customer_details WHERE id=$id";
    $sql2 = "SELECT * FROM bill WHERE id=$id";
		if(mysqli_query($connect,$sql1) and mysqli_query($connect,$sql2))
		{
		$result1 = mysqli_fetch_assoc(mysqli_query($connect,$sql1));
        $result2 = mysqli_fetch_assoc(mysqli_query($connect,$sql2));
		}
		else
		{ 
		echo mysqli_error($connect);
		}
} ?>
<div id="bill">
        <b>Cutomer id: <?php echo $id;?></b><br>
        <b><?php echo $result1['name']; ?></b>
        <p><?php echo $result1['address'] ;?></p>
        <p>Phone: <?php echo $result1['phone']; ?> </p>
        <hr>
        <table>
            <tr>
                <td>From date</td>
                <td><?php echo $result2['from_date']; ?></td>
            </tr>
            <tr>
                <td>To date</td>
                <td><?php echo $result2['to_date']; ?></td>
            </tr>
            <tr>
                <td>total usage</td>
                <td><?php echo $result2['total_usage']; ?></td>
            </tr>
            <tr>
                <td>per unit charges</td>
                <td>₹2.00</td>
            </tr>
            <tr>
                <th>Total bill</th>
                <th>₹<?php 
                $a = 2 * $result2['total_usage'];
                echo $a;
                ?></th>
            </tr>
        </table>
    </div>

</body>
</html>
