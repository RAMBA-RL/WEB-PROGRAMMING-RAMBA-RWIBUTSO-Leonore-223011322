<?php
// =============================================
// ORDER PROCESSING - runs BEFORE the HTML
// =============================================
$success_message = '';
$error_message   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_order'])) {

    require_once 'db.php';

    // Get form data and make it safe for database
    $full_name  = trim($conn->real_escape_string($_POST['full_name']));
    $email      = trim($conn->real_escape_string($_POST['email']));
    $phone      = trim($conn->real_escape_string($_POST['phone']));
    $menu_item  = trim($conn->real_escape_string($_POST['menu_item']));
    $address    = trim($conn->real_escape_string($_POST['address']));
    $order_date = trim($conn->real_escape_string($_POST['order_date']));

    // Check all fields are filled
    if (empty($full_name) || empty($email) || empty($phone) ||
        empty($menu_item) || empty($address) || empty($order_date)) {
        $error_message = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
    } else {
        // Save order to database
        $sql = "INSERT INTO orders (full_name, email, phone, menu_item, address, order_date, status)
                VALUES ('$full_name', '$email', '$phone', '$menu_item', '$address', '$order_date', 'Pending')";

        if ($conn->query($sql) === TRUE) {
            $order_id = $conn->insert_id;
            $success_message = "Order #$order_id placed successfully! We will contact you soon. Thank you, $full_name!";
        } else {
            $error_message = "Error saving order: " . $conn->error . " — Make sure the database is set up.";
        }
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food - RAMBA VI Hotel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Order page styles */

        /* The form wrapper box */
        .form-wrapper {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 30px rgba(123,63,0,0.12);
            overflow: hidden;
        }

        /* Header inside the form box */
        .form-header {
            background: linear-gradient(135deg, #7B3F00, #A0522D);
            color: #ffffff;
            padding: 32px 40px;
            text-align: center;
        }

        .form-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 8px;
        }

        .form-header p {
            font-family: 'Lato', sans-serif;
            font-size: 0.9rem;
            opacity: 0.85;
        }

        /* Body of the form */
        .form-body {
            padding: 40px;
        }

        /* Two fields side by side */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Single form field group */
        .form-group {
            margin-bottom: 20px;
        }

        /* Label above each field */
        .form-group label {
            display: block;
            font-family: 'Lato', sans-serif;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #7B3F00;
            margin-bottom: 8px;
        }

        /* Input and select fields */
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #EDD5B3;
            border-radius: 4px;
            font-family: 'Lato', sans-serif;
            font-size: 0.95rem;
            color: #2C2C2C;
            background: #FFFDF9;
            transition: border-color 0.3s ease;
            outline: none;
        }

        /* When user clicks on a field */
        .form-group input:focus,
        .form-group select:focus {
            border-color: #7B3F00;
            background: #ffffff;
        }

        /* Submit button area */
        .form-submit {
            text-align: center;
            margin-top: 12px;
        }

        .form-submit .btn {
            padding: 16px 48px;
            font-size: 1rem;
        }

        /* Success message box */
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            padding: 20px 28px;
            margin-bottom: 24px;
            font-family: 'Lato', sans-serif;
            font-size: 0.95rem;
        }

        /* Error message box */
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            padding: 20px 28px;
            margin-bottom: 24px;
            font-family: 'Lato', sans-serif;
            font-size: 0.95rem;
        }

        /* Info message box */
        .alert-info {
            background: #F5EBD8;
            color: #7B3F00;
            border: 1px solid rgba(212,165,116,0.4);
            border-radius: 8px;
            padding: 16px 20px;
            font-family: 'Lato', sans-serif;
            font-size: 0.85rem;
            text-align: center;
        }

        /* Responsive: stack to single column on small screens */
        @media (max-width: 600px) {
            .form-row { grid-template-columns: 1fr; }
            .form-body { padding: 24px 20px; }
            .form-header { padding: 24px 20px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container">
        <a href="index.php" class="nav-logo">
            <img src="logo.png" alt="Ramba VI Hotel Logo" style="height:50px;width:auto;">
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="order.php" class="active">Order</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php" class="btn-nav">Login</a></li>
        </ul>
        <div class="hamburger" onclick="toggleNav()">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>

<!-- PAGE HERO -->
<div class="page-hero">
    <div class="container">
        <p class="breadcrumb"><a href="index.php">Home</a> &rarr; Order Food</p>
        <h1>Order Online</h1>
        <p>Fill in your details and we will prepare your order fresh</p>
    </div>
</div>

<!-- ORDER FORM SECTION -->
<section class="section">
    <div class="container">

        <!-- SUCCESS MESSAGE - shown after successful order -->
        <?php if (!empty($success_message)): ?>
        <div class="alert-success" style="max-width:720px;margin:0 auto 32px;">
            &#9989; <?php echo $success_message; ?>
            <br><br>
            <a href="order.php" style="color:#155724;font-weight:700;text-decoration:underline;">&#8592; Place Another Order</a>
        </div>
        <?php endif; ?>

        <!-- ERROR MESSAGE - shown if something went wrong -->
        <?php if (!empty($error_message)): ?>
        <div class="alert-error" style="max-width:720px;margin:0 auto 32px;">
            &#10060; <?php echo $error_message; ?>
        </div>
        <?php endif; ?>

        <!-- THE ORDER FORM -->
        <div class="form-wrapper">

            <!-- Form title -->
            <div class="form-header">
                <h2>&#127869; Place Your Order</h2>
                <p>Complete the form below &mdash; we will have your food ready!</p>
            </div>

            <!-- Form fields -->
            <div class="form-body">
                <form action="order.php" method="POST" onsubmit="return validateOrderForm()">

                    <!-- Row 1: Full Name and Email -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name">Full Name *</label>
                            <input type="text" id="full_name" name="full_name"
                                   placeholder="e.g. Jean Pierre Habimana"
                                   value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email"
                                   placeholder="your@email.com"
                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                   required>
                        </div>
                    </div>

                    <!-- Row 2: Phone and Menu Selection -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone"
                                   placeholder="+250 788 000 000"
                                   value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"
                                   required>
                        </div>
                        <div class="form-group">
                            <label for="menu_item">Select Menu Item *</label>
                            <select id="menu_item" name="menu_item" required>
                                <option value="">-- Choose a Dish --</option>
                                <optgroup label="&#128032; Fish">
                                    <option value="Fried Tilapia - 8,000 RWF">Fried Tilapia &mdash; 8,000 RWF</option>
                                    <option value="Grilled Tilapia - 9,500 RWF">Grilled Tilapia &mdash; 9,500 RWF</option>
                                    <option value="Smoked Fish (Half) - 7,500 RWF">Smoked Fish (Half) &mdash; 7,500 RWF</option>
                                    <option value="Smoked Fish (Whole) - 14,000 RWF">Smoked Fish (Whole) &mdash; 14,000 RWF</option>
                                    <option value="Fish Fillet - 10,500 RWF">Fish Fillet &mdash; 10,500 RWF</option>
                                    <option value="Fish Soup - 5,000 RWF">Fish Soup &mdash; 5,000 RWF</option>
                                    <option value="Prawn Platter - 18,000 RWF">Prawn Platter &mdash; 18,000 RWF</option>
                                </optgroup>
                                <optgroup label="&#127830; Meat &amp; Grill">
                                    <option value="Beef Brochettes - 6,500 RWF">Beef Brochettes &mdash; 6,500 RWF</option>
                                    <option value="Goat Brochettes - 7,000 RWF">Goat Brochettes &mdash; 7,000 RWF</option>
                                    <option value="T-Bone Steak - 25,000 RWF">T-Bone Steak &mdash; 25,000 RWF</option>
                                    <option value="Chicken Wings - 9,000 RWF">Chicken Wings &mdash; 9,000 RWF</option>
                                    <option value="Whole Roast Chicken - 18,000 RWF">Whole Roast Chicken &mdash; 18,000 RWF</option>
                                    <option value="Mixed Grill Platter - 35,000 RWF">Mixed Grill Platter &mdash; 35,000 RWF</option>
                                </optgroup>
                                <optgroup label="&#129380; Fresh Juices">
                                    <option value="Passion Fruit Juice - 2,500 RWF">Passion Fruit Juice &mdash; 2,500 RWF</option>
                                    <option value="Mango Juice - 2,500 RWF">Mango Juice &mdash; 2,500 RWF</option>
                                    <option value="Avocado Blend - 3,000 RWF">Avocado Blend &mdash; 3,000 RWF</option>
                                    <option value="Pineapple Juice - 2,000 RWF">Pineapple Juice &mdash; 2,000 RWF</option>
                                    <option value="Mixed Fruit Punch - 3,500 RWF">Mixed Fruit Punch &mdash; 3,500 RWF</option>
                                    <option value="Watermelon Juice - 2,000 RWF">Watermelon Juice &mdash; 2,000 RWF</option>
                                </optgroup>
                                <optgroup label="&#127866; Drinks">
                                    <option value="Primus Beer (72cl) - 1,500 RWF">Primus Beer (72cl) &mdash; 1,500 RWF</option>
                                    <option value="Coca Cola - 1,000 RWF">Coca Cola &mdash; 1,000 RWF</option>
                                    <option value="Fanta - 1,000 RWF">Fanta &mdash; 1,000 RWF</option>
                                    <option value="Red Wine (Glass) - 4,000 RWF">Red Wine (Glass) &mdash; 4,000 RWF</option>
                                    <option value="White Wine (Glass) - 4,000 RWF">White Wine (Glass) &mdash; 4,000 RWF</option>
                                </optgroup>
                                <optgroup label="&#129367; Sides">
                                    <option value="French Fries - 2,000 RWF">French Fries &mdash; 2,000 RWF</option>
                                    <option value="Steamed Rice - 1,500 RWF">Steamed Rice &mdash; 1,500 RWF</option>
                                    <option value="Garden Salad - 2,500 RWF">Garden Salad &mdash; 2,500 RWF</option>
                                    <option value="Fried Plantains - 2,000 RWF">Fried Plantains &mdash; 2,000 RWF</option>
                                </optgroup>
                                <optgroup label="&#127856; Desserts">
                                    <option value="Chocolate Cake - 3,500 RWF">Chocolate Cake &mdash; 3,500 RWF</option>
                                    <option value="Vanilla Ice Cream - 2,500 RWF">Vanilla Ice Cream &mdash; 2,500 RWF</option>
                                    <option value="Fruit Salad - 3,000 RWF">Fruit Salad &mdash; 3,000 RWF</option>
                                    <option value="Mandazi - 2,000 RWF">Mandazi &mdash; 2,000 RWF</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Delivery Address (full width) -->
                    <div class="form-group">
                        <label for="address">Delivery Address *</label>
                        <input type="text" id="address" name="address"
                               placeholder="e.g. KG 123 St, Kigali, Gasabo District"
                               value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>"
                               required>
                    </div>

                    <!-- Row 4: Preferred Date -->
                    <div class="form-group">
                        <label for="order_date">Preferred Delivery Date *</label>
                        <input type="date" id="order_date" name="order_date"
                               value="<?php echo isset($_POST['order_date']) ? htmlspecialchars($_POST['order_date']) : date('Y-m-d'); ?>"
                               min="<?php echo date('Y-m-d'); ?>"
                               required>
                    </div>

                    <!-- Submit button -->
                    <div class="form-submit">
                        <button type="submit" name="submit_order" class="btn btn-primary">
                            &#128722; Place My Order
                        </button>
                    </div>

                    <p style="text-align:center;font-family:'Lato',sans-serif;font-size:0.8rem;color:#777;margin-top:16px;">
                        We will call you to confirm your order before preparing it.
                    </p>

                </form>
            </div>
        </div>

        <!-- Link to menu page -->
        <div style="max-width:720px;margin:24px auto 0;">
            <div class="alert-info">
                &#128203; Want to see all menu items with prices?
                <a href="menu.php" style="color:#7B3F00;font-weight:700;text-decoration:underline;">View Full Menu &rarr;</a>
            </div>
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo-name">RAMBA VI HOTEL</div>
                <p>A place where exceptional cuisine meets warm Rwandan hospitality.</p>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="menu.php">Our Menu</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="order.php">Order Food</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Opening Hours</h4>
                <ul>
                    <li><a href="#">Mon&ndash;Fri: 7AM&ndash;11PM</a></li>
                    <li><a href="#">Sat: 8AM&ndash;12AM</a></li>
                    <li><a href="#">Sun: 9AM&ndash;10PM</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#">&#128205; Kigali, Rwanda</a></li>
                    <li><a href="#">&#128222; +250 782 758 237</a></li>
                    <li><a href="#">&#9993; info@rambavihotel.rw</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 RAMBA VI Hotel. All Rights Reserved.</p>
    </div>
</footer>

<script>
function toggleNav() {
    document.getElementById('navLinks').classList.toggle('open');
}

// Validate form before submitting
function validateOrderForm() {
    var name   = document.getElementById('full_name').value.trim();
    var email  = document.getElementById('email').value.trim();
    var phone  = document.getElementById('phone').value.trim();
    var menu   = document.getElementById('menu_item').value;
    var addr   = document.getElementById('address').value.trim();
    var date   = document.getElementById('order_date').value;

    if (!name || !email || !phone || !menu || !addr || !date) {
        alert('Please fill in all required fields.');
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    return true; // allow form to submit
}
</script>
</body>
</html>
