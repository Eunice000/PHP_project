<?php
session_start();
$staffID = $_SESSION['staffID'];
$staffName = $_SESSION['staffName'];
$position = $_SESSION['position'];
?>
<!DOCTYPE html>
<html lang="en">
<script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/report.css">
</head>
<body>
<header>

    <label class="position">
        <a href="menu.php" class="band">Better Limited</a> &nbsp;&nbsp;
        <p> Name: <?php echo $staffName ?> &nbsp;&nbsp;
            Position: <?php echo $position ?></p>
    </label>

    <nav>
        <ul class="nav_links">
            <li><a href="item.php" class="menubtn">Item List</a></li>
            <li><a href="report.php" class="menubtn">Monthly Report</a></li>
            <li><a href="customer.php" class="menubtn">Customer</a></li>
        </ul>
    </nav>
    <a  href="index.php">
        <button class="log">LOGOUT</button>
    </a>
</header>
<h1 class="title">Monthly Report</h1>
<div id="chooseStaff">
    <label>Choose a staff:</label>
    <select name="staffs" id="staffs">
        <option value="All">All staff</option>
        <option value="staff3">1</option>
        <option value="staff3">3</option>
    </select>
</div>
<table class="vertical-center">
    <tr>
        <div class="vertical-center">
            <button class="button-55"><img src="image/order_l.png"><br>
                <div>Order</div>
            </button>
            <button class="button-55"><img src="image/sales_l.png"><br>
                <div>Sales</div>
            </button>
            <button class="button-55"><img src="image/customer_l.png"><br>
                <div>Customer</div>
            </button>
        </div>
    </tr>
</table>
<?php
require_once('conn.php');
$sql = "SELECT COUNT(orderID) AS orders, MONTH(dateTime) AS  month FROM orders GROUP BY month;";
$rs = mysqli_query($conn, $sql)
or die(mysqli_error($conn));
$orders = array();
$month = array();
while ($row = mysqli_fetch_assoc($rs)) {
    $orders[] = $row['orders'];
    $month[] = $row['month'];
}
?>
<div class="vertical-center">Line Chart: Orders</div>
<script type="text/javascript">
    let orders =<?php echo json_encode($orders); ?>;
    let month =<?php echo json_encode($month); ?>;
    let max = Math.max(...orders);
</script>
<canvas id="myChart"  ></canvas>
<script>
    new Chart("myChart", {
        type: "line",
        data: {
            labels: month,
            datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(0,0,255,0.1)",
                data: orders
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Orders per month'
                    },
                    ticks: {
                        stepSize: 1
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Month'
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
</script>
</body>
</html>
