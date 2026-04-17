<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - RAMBA VI Hotel</title>
    <link rel="stylesheet" href="style.css">
    <style>
      
        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-image-wrap {
            position: relative;
        }

        .about-logo-box {
            width: 100%;
            height: 420px;
            background: linear-gradient(135deg, #EDD5B3, #D4A574);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 50px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .about-logo-box img {
            width: 85%;
            height: auto;
            object-fit: contain;
            display: block;
        }

        .about-text h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #7B3F00;
            margin-bottom: 16px;
        }

        .about-text p {
            margin-bottom: 16px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: #2C2C2C;
        }

        /* Stats row */
        .about-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-top: 32px;
        }

        .stat {
            text-align: center;
            padding: 16px 8px;
            background: #F5EBD8;
            border-radius: 8px;
            border: 1px solid rgba(212,165,116,0.3);
        }

        .stat .num {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #7B3F00;
            font-weight: 700;
        }

        .stat .label {
            font-family: 'Lato', sans-serif;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #A0522D;
        }

        /* Values / Features grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .feature-card {
            background: #ffffff;
            padding: 32px 20px;
            border-radius: 8px;
            text-align: center;
            border: 1px solid rgba(212,165,116,0.2);
            box-shadow: 0 4px 20px rgba(123,63,0,0.08);
        }

        .feature-icon {
            font-size: 2.5rem;
            display: block;
            margin-bottom: 16px;
        }

        .feature-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: #7B3F00;
            margin-bottom: 12px;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.6;
        }

        /* Team grid */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .team-card {
            text-align: center;
            padding: 32px 16px;
            background: #F5EBD8;
            border-radius: 8px;
        }

        .team-avatar {
            font-size: 3.5rem;
            margin-bottom: 16px;
        }

        .team-info h3 {
            font-family: 'Playfair Display', serif;
            color: #7B3F00;
            font-size: 1rem;
            margin-bottom: 4px;
        }

        .team-info p {
            font-family: 'Lato', sans-serif;
            font-size: 0.8rem;
            color: #A0522D;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-cta {
            background: linear-gradient(135deg, #7B3F00, #0D0D0D);
            padding: 80px 0;
            text-align: center;
        }

        .about-cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #ffffff;
            margin-bottom: 16px;
        }

        .about-cta p {
            color: #EDD5B3;
            margin-bottom: 32px;
            font-style: italic;
        }

        @media (max-width: 900px) {
            .about-grid { grid-template-columns: 1fr; }
            .features-grid { grid-template-columns: repeat(2, 1fr); }
            .team-grid { grid-template-columns: repeat(2, 1fr); }
            .about-stats { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 480px) {
            .features-grid { grid-template-columns: 1fr; }
            .team-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="index.php" class="nav-logo">
            <img src="logo.png" alt="Ramba VI Hotel Logo" style="height:50px;width:auto;">
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php" class="active">About Us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="order.php">Order</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php" class="btn-nav">Login</a></li>
        </ul>
        <div class="hamburger" onclick="toggleNav()">
            <span></span><span></span><span></span>
        </div>
    </div>
</nav>

<div class="page-hero">
    <div class="container">
        <p class="breadcrumb"><a href="index.php">Home</a> &rarr; About Us</p>
        <h1>About RAMBA VI Hotel</h1>
        <p>Our story, our passion, our promise to you</p>
    </div>
</div>


<section class="section">
    <div class="container">
        <div class="about-grid">

            <div class="about-image-wrap">
                <div class="about-logo-box">
                   
                    <img src="logo.png" alt="RAMBA VI Hotel Official Logo">
                </div>
            </div>

            <div class="about-text">
                <p class="section-subtitle" style="text-align:left;">Our Story</p>
                <h2>A Legacy of Flavor &amp; Hospitality</h2>
                <p>RAMBA VI Hotel started in 2010 as a small family restaurant in Kigali. We had a simple dream of  serving delicious food made from fresh local ingredients and to make every guest feel welcome.</p>
                <p>Over the years, we have grown into a well-known hotel and restaurant, serving both local and international visitors. Even as we grow, we still keep our original values: good food, warm hospitality, and a comfortable place for everyone.</p>
                <p>We believe good food starts with fresh fish, local vegetables, and rich Rwandan flavors.</p>
            </div>

        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container">
        <p class="section-subtitle">What We Stand For</p>
        <h2 class="section-title">Our Core Values</h2>
        <div class="section-divider"></div>

        <div class="features-grid">

    <div class="feature-card">
        <img src="images/star.jpg" alt="Quality First" class="feature-img">
        <h3>Quality First</h3>
        <p>We always use high-quality ingredients and give the best service to every guest.</p>
    </div>

    <div class="feature-card">
        <img src="images/hospitality.jpg" alt="Warm Hospitality" class="feature-img">
        <h3>Warm Hospitality</h3>
        <p>We welcome every guest with warmth and treat them like family from the moment they arrive.</p>
    </div>

    <div class="feature-card">
        <img src="images/sustainability.jpg" alt="Sustainability" class="feature-img">
        <h3>Sustainability</h3>
        <p>We are committed to sustainable practices.</p>
    </div>

    <div class="feature-card">
        <img src="images/innovation.jpg" alt="Culinary Innovation" class="feature-img">
        <h3>Culinary Innovation</h3>
        <p>Our chefs try new flavors while keeping the true taste of Rwandan food.</p>
    </div>

</div>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="section-subtitle">The People Behind the Magic</p>
        <h2 class="section-title">Meet Our Team</h2>
        <div class="section-divider"></div>

      <div class="team-grid">

    <div class="team-card">
        <img src="images/chef1.jpg" alt="Chef Jean Pierre" class="team-img">
        <div class="team-info">
            <h3>Chef Jean Pierre</h3>
            <p>Executive Chef</p>
        </div>
    </div>

    <div class="team-card">
        <img src="images/chef2.jpg" alt="Chef Marie Claire" class="team-img">
        <div class="team-info">
            <h3>Chef Marie Claire</h3>
            <p>Head of Pastry</p>
        </div>
    </div>

    <div class="team-card">
        <img src="images/chef3.jpg" alt="Chef Emmanuel" class="team-img">
        <div class="team-info">
            <h3>Chef Emmanuel</h3>
            <p>Grill Specialist</p>
        </div>
    </div>

    <div class="team-card">
        <img src="images/manager.jpg" alt="Erneste MUGABO" class="team-img">
        <div class="team-info">
            <h3>Erneste MUGABO</h3>
            <p>Hotel Manager</p>
        </div>
    </div>
            </div>
        </div>
    </div>
</section>
<section class="about-cta">
    <div class="container">
        <h2>Come Dine With Us</h2>
        <p>Experience the warmth and flavors of RAMBA VI Hotel</p>
        <a href="order.php" class="btn btn-outline">Order Online</a>
        &nbsp;&nbsp;
        <a href="contact.php" class="btn btn-primary" style="background:#D4A574;border-color:#D4A574;color:#0D0D0D;">Contact Us</a>
    </div>
</section>


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
</script>
</body>
</html>
