<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - RAMBA VI Hotel Admin</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: var(--nude-pale); }

        .dashboard-layout {
            display: grid;
            grid-template-columns: 240px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: var(--black);
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 240px;
            z-index: 100;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 28px 24px;
            border-bottom: 1px solid rgba(212,165,116,0.15);
        }
        .sidebar-brand .logo-name {
            font-family: var(--font-display);
            font-size: 1.2rem;
            color: var(--nude);
            display: block;
        }
        .sidebar-brand .logo-sub {
            font-family: var(--font-ui);
            font-size: 0.62rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: rgba(237,213,179,0.5);
        }
        .sidebar-user {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(212,165,116,0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .sidebar-avatar {
            width: 38px;
            height: 38px;
            background: var(--chocolate);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }
        .sidebar-user .name {
            font-family: var(--font-ui);
            font-size: 0.82rem;
            font-weight: 700;
            color: var(--nude-lt);
        }
        .sidebar-user .role {
            font-family: var(--font-ui);
            font-size: 0.65rem;
            color: rgba(237,213,179,0.5);
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .sidebar-nav {
            padding: 16px 0;
        }
        .sidebar-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            font-family: var(--font-ui);
            font-size: 0.82rem;
            font-weight: 600;
            color: rgba(237,213,179,0.6);
            transition: var(--transition);
            letter-spacing: 0.5px;
        }
        .sidebar-nav a:hover,
        .sidebar-nav a.active {
            color: var(--nude);
            background: rgba(212,165,116,0.1);
            border-left: 3px solid var(--chocolate);
        }
        .sidebar-nav .icon { font-size: 1rem; }
        .sidebar-divider {
            height: 1px;
            background: rgba(212,165,116,0.1);
            margin: 8px 24px;
        }
        .sidebar-logout {
            padding: 16px 24px;
            position: absolute;
            bottom: 0;
            width: 240px;
            border-top: 1px solid rgba(212,165,116,0.1);
        }
        .sidebar-logout a {
            display: flex;
            align-items: center;
            gap: 8px;
            font-family: var(--font-ui);
            font-size: 0.82rem;
            color: #e57373;
            transition: var(--transition);
        }
        .sidebar-logout a:hover { color: #ef5350; }

        /* Main content */
        .main-content {
            margin-left: 240px;
            padding: 32px;
        }
        .dash-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }
        .dash-header h1 {
            font-family: var(--font-display);
            font-size: 1.8rem;
            color: var(--chocolate);
        }
        .dash-header .date {
            font-family: var(--font-ui);
            font-size: 0.8rem;
            color: var(--chocolate-mid);
            letter-spacing: 1px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: var(--white);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            border-left: 4px solid var(--chocolate);
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .stat-icon {
            width: 52px;
            height: 52px;
            background: var(--nude-pale);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }
        .stat-info .num {
            font-family: var(--font-display);
            font-size: 1.8rem;
            color: var(--chocolate);
            font-weight: 700;
        }
        .stat-info .label {
            font-family: var(--font-ui);
            font-size: 0.72rem;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--chocolate-mid);
        }

        .card {
            background: var(--white);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 32px;
        }
        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid rgba(212,165,116,0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-header h2 {
            font-family: var(--font-display);
            font-size: 1.2rem;
            color: var(--chocolate);
        }
        .card-body { padding: 0; }
        .card-body .orders-table { box-shadow: none; }

        @media (max-width: 900px) {
            .dashboard-layout { grid-template-columns: 1fr; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .sidebar-logout { position: relative; width: 100%; }
            .main-content { margin-left: 0; padding: 20px; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>

<?php

session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

require_once 'db.php';

$total_orders   = $conn->query("SELECT COUNT(*) AS c FROM orders")->fetch_assoc()['c'];
$pending_orders = $conn->query("SELECT COUNT(*) AS c FROM orders WHERE status = 'Pending'")->fetch_assoc()['c'];
$total_messages = $conn->query("SELECT COUNT(*) AS c FROM contacts")->fetch_assoc()['c'];


$orders_result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");

$messages_result = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
?>

<div class="dashboard-layout">

  
    <aside class="sidebar">
        <div class="sidebar-brand">
            <span class="logo-name">RAMBA VI</span>
            <span class="logo-sub">Admin Panel</span>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-avatar">👤</div>
            <div>
                <div class="name"><?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?></div>
                <div class="role"><?= htmlspecialchars($_SESSION['admin_role'] ?? 'staff') ?></div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <a href="dashboard.php" class="active">
                <span class="icon">📊</span> Dashboard
            </a>
            <a href="dashboard.php#orders">
                <span class="icon">🛒</span> Orders
            </a>
            <a href="dashboard.php#messages">
                <span class="icon">✉</span> Messages
            </a>
            <div class="sidebar-divider"></div>
            <a href="index.php" target="_blank">
                <span class="icon">🌐</span> View Website
            </a>
            <a href="order.php" target="_blank">
                <span class="icon">🍽</span> Order Page
            </a>
        </nav>
        <div class="sidebar-logout">
            <a href="logout.php">🚪 Logout</a>
        </div>
    </aside>

  
    <main class="main-content">

     
        <div class="dash-header">
            <h1>Dashboard</h1>
            <div class="date">📅 <?= date('l, d F Y') ?> | Welcome, <?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin') ?>
                &nbsp;&nbsp;
                <a href="logout.php" style="color:#e57373;font-family:var(--font-ui);font-size:0.8rem;">Logout →</a>
            </div>
        </div>

      
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">🛒</div>
                <div class="stat-info">
                    <div class="num"><?= $total_orders ?></div>
                    <div class="label">Total Orders</div>
                </div>
            </div>
            <div class="stat-card" style="border-color:#e57373;">
                <div class="stat-icon">⏳</div>
                <div class="stat-info">
                    <div class="num" style="color:#e57373;"><?= $pending_orders ?></div>
                    <div class="label">Pending Orders</div>
                </div>
            </div>
            <div class="stat-card" style="border-color:#66bb6a;">
                <div class="stat-icon">✅</div>
                <div class="stat-info">
                    <?php
                    $confirmed = $conn->query("SELECT COUNT(*) AS c FROM orders WHERE status = 'Confirmed'")->fetch_assoc()['c'];
                    ?>
                    <div class="num" style="color:#66bb6a;"><?= $confirmed ?></div>
                    <div class="label">Confirmed</div>
                </div>
            </div>
            <div class="stat-card" style="border-color:#42a5f5;">
                <div class="stat-icon">✉</div>
                <div class="stat-info">
                    <div class="num" style="color:#42a5f5;"><?= $total_messages ?></div>
                    <div class="label">Messages</div>
                </div>
            </div>
        </div>

        <!-- ORDERS TABLE -->
        <div class="card" id="orders">
            <div class="card-header">
                <h2>🛒 Customer Orders</h2>
                <span style="font-family:var(--font-ui);font-size:0.75rem;color:var(--chocolate-mid);">
                    Total: <?= $total_orders ?> orders
                </span>
            </div>
            <div class="card-body">
                <?php if ($orders_result && $orders_result->num_rows > 0): ?>
                <div style="overflow-x:auto;">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Menu Item</th>
                                <th>Address</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Ordered At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $orders_result->fetch_assoc()): ?>
                            <tr>
                                <td><strong>#<?= $row['id'] ?></strong></td>
                                <td><?= htmlspecialchars($row['full_name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                <td><?= htmlspecialchars($row['menu_item']) ?></td>
                                <td><?= htmlspecialchars($row['address']) ?></td>
                                <td><?= htmlspecialchars($row['order_date']) ?></td>
                                <td>
                                    <span class="status-badge <?= $row['status'] === 'Pending' ? 'status-pending' : 'status-confirmed' ?>">
                                        <?= $row['status'] ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div style="padding:40px;text-align:center;color:var(--chocolate-mid);">
                    <div style="font-size:3rem;margin-bottom:12px;">🛒</div>
                    <p style="font-family:var(--font-ui);">No orders yet. Share the order page!</p>
                    <a href="order.php" class="btn btn-primary" style="margin-top:16px;padding:10px 24px;font-size:0.78rem;">Go to Order Page</a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- MESSAGES TABLE -->
        <div class="card" id="messages">
            <div class="card-header">
                <h2>✉ Contact Messages</h2>
                <span style="font-family:var(--font-ui);font-size:0.75rem;color:var(--chocolate-mid);">
                    Total: <?= $total_messages ?> messages
                </span>
            </div>
            <div class="card-body">
                <?php if ($messages_result && $messages_result->num_rows > 0): ?>
                <div style="overflow-x:auto;">
                    <table class="orders-table">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Location</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Received At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $messages_result->fetch_assoc()): ?>
                            <tr>
                                <td><strong>#<?= $row['id'] ?></strong></td>
                                <td><?= htmlspecialchars($row['full_name']) ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['phone'] ?? '—') ?></td>
                                <td><?= htmlspecialchars($row['location'] ?? '—') ?></td>
                                <td><?= htmlspecialchars($row['subject'] ?? '—') ?></td>
                                <td style="max-width:220px;">
                                    <?= htmlspecialchars(substr($row['message'], 0, 80)) ?>
                                    <?= strlen($row['message']) > 80 ? '...' : '' ?>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($row['created_at'])) ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div style="padding:40px;text-align:center;color:var(--chocolate-mid);">
                    <div style="font-size:3rem;margin-bottom:12px;">✉</div>
                    <p style="font-family:var(--font-ui);">No messages yet.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </main>
</div>

<?php $conn->close(); ?>
</body>
</html>
