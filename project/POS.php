<?php
session_start();
$staffID = $_SESSION['staffID'];
$staffName = $_SESSION['staffName'];
$position = $_SESSION['position'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Point Of Sales</title>
    <link rel="stylesheet" href="css/POS.css">
</head>
<body>
<!--menu-->
<header>

    <label class="position">
        <a href="menu.php" class="band">Better Limited</a> &nbsp;&nbsp;
        <p> Name: <?php echo $staffName ?> &nbsp;&nbsp;
            Position: <?php echo $position ?></p>
    </label>

    <nav>
        <ul class="nav_links">
            <li><a href="item.php" class="menubtn">POS</a></li>
            <li><a href="report.php" class="menubtn">Order Record</a></li>
            <li><a href="customer.php" class="menubtn">Delivery</a></li>
        </ul>
    </nav>
    <a  href="index.php">
        <button class="log">LOGOUT</button>
    </a>
</header>
<h1 class="title">Point Of Sales</h1>
<form>
    <div>
        <select>
            <option selected disabled>Select Product</option>
        </select>
        Quantity:<input type="number">
        <button>+ ADD</button>
    </div>

    <table>
        <tr>
            <th>Item ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Discount</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5">Total:</td>
            <td>1</td>
            <td>1</td>
        </tr>
    </table>

</form>
</body>
</html>