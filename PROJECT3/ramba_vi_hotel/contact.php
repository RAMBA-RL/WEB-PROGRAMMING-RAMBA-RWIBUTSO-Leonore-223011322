<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - RAMBA VI Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="index.php" class="nav-logo">
            <span class="logo-name">RAMBA VI</span>
            <span class="logo-tagline">Luxury Hotel &amp; Restaurant</span>
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="contact.php" class="active">Contact</a></li>
            <li><a href="login.php" class="btn-nav">Login</a></li>
        </ul>
        <div class="hamburger" onclick="toggleNav()">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>


<div class="page-hero">
    <div class="container">
        <p class="breadcrumb"><a href="index.php">Home</a> &rarr; Contact Us</p>
        <h1>Contact Us</h1>
        <p>We'd love to hear from you — send us a message</p>
    </div>
</div>

<?php

$success_message = '';
$error_message   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {

    require_once 'db.php';

    $full_name = trim($conn->real_escape_string($_POST['full_name']));
    $email     = trim($conn->real_escape_string($_POST['email']));
    $phone     = trim($conn->real_escape_string($_POST['phone']));
    $location  = trim($conn->real_escape_string($_POST['location']));
    $subject   = trim($conn->real_escape_string($_POST['subject']));
    $message   = trim($conn->real_escape_string($_POST['message']));

    if (empty($full_name) || empty($email) || empty($message)) {
        $error_message = "Please fill in all required fields (Name, Email, Message).";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Please enter a valid email address.";
    } else {
        $sql = "INSERT INTO contacts (full_name, email, phone, location, subject, message)
                VALUES ('$full_name', '$email', '$phone', '$location', '$subject', '$message')";

        if ($conn->query($sql) === TRUE) {
            $success_message = "Thank you, $full_name! Your message has been sent successfully. We will get back to you soon.";
        } else {
            $error_message = "Error saving message: " . $conn->error;
        }
        $conn->close();
    }
}
?>

<!-- CONTACT SECTION -->
<section class="section">
    <div class="container">
        <div class="contact-grid">

            <!-- CONTACT INFO -->
            <div class="contact-info">
                <p class="section-subtitle" style="text-align:left;">Get In Touch</p>
                <h3>Visit or Reach Out to RAMBA VI Hotel</h3>
                <p style="color:var(--charcoal);margin-bottom:32px;font-size:1rem;line-height:1.8;">
                    Whether you have a question about our menu, want to make a reservation,
                    or simply want to share feedback — we are always happy to hear from you.
                </p>

                <div class="contact-detail">
                    <div class="icon">📍</div>
                    <div class="text">
                        <h4>Our Location</h4>
                        <p>KG 123 St, Kigali, Rwanda<br>Near City Centre</p>
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="icon">📞</div>
                    <div class="text">
                        <h4>Phone Number</h4>
                        <p>+250 788 000 000<br>+250 722 000 000</p>
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="icon">✉</div>
                    <div class="text">
                        <h4>Email Address</h4>
                        <p>info@rambavihotel.rw<br>reservations@rambavihotel.rw</p>
                    </div>
                </div>
                <div class="contact-detail">
                    <div class="icon">⏰</div>
                    <div class="text">
                        <h4>Opening Hours</h4>
                        <p>Monday – Friday: 7:00 AM – 11:00 PM<br>
                           Saturday: 8:00 AM – 12:00 AM<br>
                           Sunday: 9:00 AM – 10:00 PM</p>
                    </div>
                </div>

                <div style="background:linear-gradient(135deg,var(--nude-pale),var(--nude-lt));border-radius:4px;height:160px;display:flex;align-items:center;justify-content:center;margin-top:24px;border:1px solid rgba(212,165,116,0.3);">
                    <div style="text-align:center;">
                        <div style="font-size:2rem;margin-bottom:8px;">🗺</div>
                        <p style="font-family:var(--font-ui);font-size:0.75rem;letter-spacing:2px;text-transform:uppercase;color:var(--chocolate);">RAMBA VI HOTEL — Kigali, Rwanda</p>
                    </div>
                </div>
            </div>

            <div>
                <?php if (!empty($success_message)): ?>
                <div class="alert alert-success"><?= $success_message ?></div>
                <?php endif; ?>
                <?php if (!empty($error_message)): ?>
                <div class="alert alert-error">❌ <?= $error_message ?></div>
                <?php endif; ?>

                <div class="form-wrapper">
                    <div class="form-header">
                        <h2>Send Us a Message</h2>
                        <p>We'll get back to you within 24 hours</p>
                    </div>
                    <div class="form-body">
                        <form action="contact.php" method="POST" onsubmit="return validateContactForm()">

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="full_name">Full Name *</label>
                                    <input type="text" id="full_name" name="full_name"
                                           placeholder="Jean Pierre Habimana"
                                           value="<?= isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : '' ?>"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address *</label>
                                    <input type="email" id="email" name="email"
                                           placeholder="your@email.com"
                                           value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone"
                                           placeholder="+250 788 000 000"
                                           value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>">
                                </div>
                                <div class="form-group">
                                    <label for="location">Your Location</label>
                                    <input type="text" id="location" name="location"
                                           placeholder="e.g. Kigali, Nyarugenge"
                                           value="<?= isset($_POST['location']) ? htmlspecialchars($_POST['location']) : '' ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <select id="subject" name="subject">
                                    <option value="">-- Select a Subject --</option>
                                    <option value="General Inquiry">General Inquiry</option>
                                    <option value="Reservation">Make a Reservation</option>
                                    <option value="Menu Question">Menu Question</option>
                                    <option value="Feedback">Feedback</option>
                                    <option value="Complaint">Complaint</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="message">Your Message *</label>
                                <textarea id="message" name="message" rows="5"
                                          placeholder="Write your message here..." required><?= isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '' ?></textarea>
                            </div>

                            <div class="form-submit">
                                <button type="submit" name="submit_contact" class="btn btn-primary">
                                    ✉ Send Message
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
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
                    <li><a href="#">Mon–Fri: 7AM–11PM</a></li>
                    <li><a href="#">Sat: 8AM–12AM</a></li>
                    <li><a href="#">Sun: 9AM–10PM</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#">📍 Kigali, Rwanda</a></li>
                    <li><a href="#">📞 +250 782 758 237</a></li>
                    <li><a href="#">✉ info@rambavihotel.rw</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 RAMBA VI Hotel. All Rights Reserved.</p>
    </div>
</footer>

<script>
function toggleNav() {
    document.getElementById('navLinks').classList.toggle('open');
}
function validateContactForm() {
    var name    = document.getElementById('full_name').value.trim();
    var email   = document.getElementById('email').value.trim();
    var message = document.getElementById('message').value.trim();
    if (!name || !email || !message) {
        alert('Please fill in Name, Email, and Message.');
        return false;
    }
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }
    return true;
}
</script>
</body>
</html>
