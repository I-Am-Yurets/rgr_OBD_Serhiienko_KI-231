<?php 
// tables.php
require 'db.php';

// Fetch data from each table
$officers = $pdo->query("SELECT id, name, rank, unit_id FROM officer")->fetchAll(PDO::FETCH_ASSOC);
$logistics = $pdo->query("SELECT logistics_id, resource_id, unit_id FROM logistics")->fetchAll(PDO::FETCH_ASSOC);
$medicalStaff = $pdo->query("SELECT id, name, specialization FROM medicalstaff")->fetchAll(PDO::FETCH_ASSOC);
$operations = $pdo->query("SELECT operation_id, name, plan, order_id FROM operation")->fetchAll(PDO::FETCH_ASSOC);
$orders = $pdo->query("SELECT id, date, officer_id, soldier_id FROM `order`")->fetchAll(PDO::FETCH_ASSOC);
$resourceProvision = $pdo->query("SELECT id, resource_type, quantity_id, unit_id FROM resourceprovision")->fetchAll(PDO::FETCH_ASSOC);
$soldiers = $pdo->query("SELECT id, name, rank, unit_id FROM soldier")->fetchAll(PDO::FETCH_ASSOC);
$units = $pdo->query("SELECT id, readiness_status, health_status, medical_staff_id FROM unit")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Military District Tables</title>
    <link href="css/style.css" media="screen" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <style>
        /* Стиль таблиць */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background-color: #ffffff; /* Білий фон таблиць */
        }

        th, td {
            border: 1px solid #000000; /* Чорні межі */
            padding: 10px;
            text-align: left;
            background-color: #ffffff; /* Білий фон у комірках */
        }

        th {
            background-color: #f2f2f2; /* Світло-сірий фон для заголовків */
            color: #333;
        }

        h2 {
            color: #777;
            margin-top: 30px;
        }

        h1 {
            text-align: center;
            color: #777;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <h1>Military District Tables</h1>

    <!-- Officers -->
    <h2>Officers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Unit ID</th>
        </tr>
        <?php foreach ($officers as $officer): ?>
            <tr>
                <td><?= htmlspecialchars($officer['id']); ?></td>
                <td><?= htmlspecialchars($officer['name']); ?></td>
                <td><?= htmlspecialchars($officer['rank']); ?></td>
                <td><?= htmlspecialchars($officer['unit_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Logistics -->
    <h2>Logistics</h2>
    <table>
        <tr>
            <th>Logistics ID</th>
            <th>Resource ID</th>
            <th>Unit ID</th>
        </tr>
        <?php foreach ($logistics as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['logistics_id']); ?></td>
                <td><?= htmlspecialchars($item['resource_id']); ?></td>
                <td><?= htmlspecialchars($item['unit_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Medical Staff -->
    <h2>Medical Staff</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Specialization</th>
        </tr>
        <?php foreach ($medicalStaff as $staff): ?>
            <tr>
                <td><?= htmlspecialchars($staff['id']); ?></td>
                <td><?= htmlspecialchars($staff['name']); ?></td>
                <td><?= htmlspecialchars($staff['specialization']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Operations -->
    <h2>Operations</h2>
    <table>
        <tr>
            <th>Operation ID</th>
            <th>Name</th>
            <th>Plan</th>
            <th>Order ID</th>
        </tr>
        <?php foreach ($operations as $operation): ?>
            <tr>
                <td><?= htmlspecialchars($operation['operation_id']); ?></td>
                <td><?= htmlspecialchars($operation['name']); ?></td>
                <td><?= htmlspecialchars($operation['plan']); ?></td>
                <td><?= htmlspecialchars($operation['order_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Orders -->
    <h2>Orders</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Officer ID</th>
            <th>Soldier ID</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order['id']); ?></td>
                <td><?= htmlspecialchars($order['date']); ?></td>
                <td><?= htmlspecialchars($order['officer_id']); ?></td>
                <td><?= htmlspecialchars($order['soldier_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Resource Provision -->
    <h2>Resource Provision</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Resource type</th>
            <th>Quantity ID</th>
            <th>Unit ID</th>
        </tr>
        <?php foreach ($resourceProvision as $resource): ?>
            <tr>
                <td><?= htmlspecialchars($resource['id']); ?></td>
                <td><?= htmlspecialchars($resource['resource_type']); ?></td>
                <td><?= htmlspecialchars($resource['quantity_id']); ?></td>
                <td><?= htmlspecialchars($resource['unit_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Soldiers -->
    <h2>Soldiers</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Unit ID</th>
        </tr>
        <?php foreach ($soldiers as $soldier): ?>
            <tr>
                <td><?= htmlspecialchars($soldier['id']); ?></td>
                <td><?= htmlspecialchars($soldier['name']); ?></td>
                <td><?= htmlspecialchars($soldier['rank']); ?></td>
                <td><?= htmlspecialchars($soldier['unit_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Units -->
    <h2>Units</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Readiness status</th>
            <th>Health status</th>
            <th>Medical staff ID</th>
        </tr>
        <?php foreach ($units as $unit): ?>
            <tr>
                <td><?= htmlspecialchars($unit['id']); ?></td>
                <td><?= htmlspecialchars($unit['readiness_status']); ?></td>
                <td><?= htmlspecialchars($unit['health_status']); ?></td>
                <td><?= htmlspecialchars($unit['medical_staff_id']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
