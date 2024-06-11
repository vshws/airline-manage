<?php
session_start();
if (empty($_SESSION['user_info'])) {
    echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
    exit;
}

if (!isset($_GET['ticket_id'])) {
    echo "<script type='text/javascript'>alert('No ticket found');</script>";
    exit;
}

$ticket_id = $_GET['ticket_id'];
$conn = mysqli_connect("localhost", "root", "", "airline");
if (!$conn) {  
    echo "<script type='text/javascript'>alert('Database connection failed');</script>";
    die('Could not connect: ' . mysqli_connect_error());
}

$sql = "SELECT tickets.t_no, flights.f_no, flights.f_src, flights.f_dest, flights.f_time, passenger.Fname, passenger.Lname, passenger.email 
        FROM tickets 
        JOIN flights ON tickets.f_no = flights.f_no 
        JOIN passenger ON tickets.passenger_id = passenger.id 
        WHERE tickets.t_no = '$ticket_id'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}

$ticket = mysqli_fetch_assoc($result);
if (!$ticket) {
    echo "<script type='text/javascript'>alert('No ticket found');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Boarding Pass</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .boarding-pass {
            width: 60%;
            margin: auto;
            border: 2px solid blue;
            border-radius: 10px;
            background-color: #ffffff;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .boarding-pass h2 {
            text-align: center;
            color: #333333;
        }
        .boarding-pass table {
            width: 100%;
            margin-top: 20px;
        }
        .boarding-pass table td {
            padding: 10px;
        }
        .boarding-pass .details {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="boarding-pass">
        <h2>Boarding Pass</h2>
        <table>
            <tr>
                <td><strong>Ticket No:</strong></td>
                <td><?php echo $ticket['t_no']; ?></td>
            </tr>
            <tr>
                <td><strong>Flight No:</strong></td>
                <td><?php echo $ticket['f_no']; ?></td>
            </tr>
            <tr>
                <td><strong>From:</strong></td>
                <td><?php echo $ticket['f_src']; ?></td>
            </tr>
            <tr>
                <td><strong>To:</strong></td>
                <td><?php echo $ticket['f_dest']; ?></td>
            </tr>
            <tr>
                <td><strong>Departure Time:</strong></td>
                <td><?php echo $ticket['f_time']; ?></td>
            </tr>
            <tr>
                <td><strong>Passenger Name:</strong></td>
                <td><?php echo $ticket['Fname'] . ' ' . $ticket['Lname']; ?></td>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td><?php echo $ticket['email']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
