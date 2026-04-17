<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAMBA VI Hotel - Home</title>
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="about.php">About Us</a></li>
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

<!-- HERO -->
<section class="hero">
    <div class="hero-pattern"></div>
    <div class="hero-content">
        <div class="hero-badge">&#9733; Welcome to Excellence &#9733;</div>
        <h1 class="hero-title">RAMBA <span>VI</span><br>HOTEL</h1>
        <p class="hero-subtitle">Where Every Meal Becomes a Memory</p>
        <div class="hero-buttons">
            <a href="menu.php" class="btn btn-primary">Explore Menu</a>
            <a href="order.php" class="btn btn-outline">Order Now</a>
        </div>
    </div>
    <div class="hero-scroll">SCROLL</div>
</section>

<!-- FEATURES -->
<section class="section">
    <div class="container">
        <p class="section-subtitle">Why Choose Us</p>
        <h2 class="section-title">The RAMBA VI Experience</h2>
        <div class="section-divider"></div>
       <div class="features-grid">
    <div class="feature-card">
        <div class="feature-img-box">
            <img src="images/seafood.jpg" alt="Fresh Seafood">
        </div>
        <h3>Fresh Seafood</h3>
        <p>Finest fish and seafood dishes prepared daily with the freshest catches available.</p>
    </div>
    <div class="feature-card">
        <div class="feature-img-box">
            <img src="images/drinks.jpg" alt="Exotic Drinks">
        </div>
        <h3>Exotic Drinks</h3>
        <p>Handcrafted cocktails, fresh juices and premium beverages for every taste.</p>
    </div>
    <div class="feature-card">
        <div class="feature-img-box">
            <img src="images/chef1.jpg" alt="Expert Chefs">
        </div>
        <h3>Expert Chefs</h3>
        <p>Our award-winning culinary team brings decades of experience to every plate.</p>
    </div>
    <div class="feature-card">
        <div class="feature-img-box">
            <img src="images/ingredients.jpg" alt="Fresh Ingredients">
        </div>
        <h3>Fresh Ingredients</h3>
        <p>We source locally grown, organic ingredients to guarantee the best quality.</p>
    </div>
    <div class="feature-card">
        <div class="feature-img-box">
            <img src="images/delivery.jpg" alt="Fast Delivery">
        </div>
        <h3>Fast Delivery</h3>
        <p>Hot and fresh food delivered to your doorstep within the shortest time.</p>
    </div>
</div>
</div>
    </div>
</section>
    </div>
</section>

<!-- GALLERY PREVIEW -->
<section class="section">
    <div class="container">
        <p class="section-subtitle">Visual Delight</p>
        <h2 class="section-title">A Glimpse of Our Kitchen</h2>
        <div class="section-divider"></div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:12px;">
            <a href="gallery.php" style="position:relative;overflow:hidden;border-radius:4px;aspect-ratio:4/3;display:block;background:#EDD5B3;">
                <img src="images/photo1.jpg" alt="Food" style="width:100%;height:100%;object-fit:cover;"
                     onerror="this.style.display='none';this.parentElement.style.display='flex';this.parentElement.style.alignItems='center';this.parentElement.style.justifyContent='center';this.parentElement.innerHTML+='<span style=\'font-size:3rem\'>🐟</span>';">
            </a>
            <a href="gallery.php" style="position:relative;overflow:hidden;border-radius:4px;aspect-ratio:4/3;display:block;background:#EDD5B3;">
                <img src="images/photo2.jpg" alt="Food" style="width:100%;height:100%;object-fit:cover;"
                     onerror="this.style.display='none';this.parentElement.innerHTML+='<span style=\'font-size:3rem;display:flex;align-items:center;justify-content:center;width:100%;height:100%\'>🍢</span>';">
            </a>
            <a href="gallery.php" style="position:relative;overflow:hidden;border-radius:4px;aspect-ratio:4/3;display:block;background:#EDD5B3;">
                <img src="images/photo3.jpg" alt="Food" style="width:100%;height:100%;object-fit:cover;"
                     onerror="this.style.display='none';">
            </a>
        </div>
        <div style="text-align:center;margin-top:32px;">
            <a href="gallery.php" class="btn btn-primary">View Full Gallery</a>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background:linear-gradient(135deg,#7B3F00,#0D0D0D);padding:80px 0;text-align:center;">
    <div class="container">
        <h2 style="font-family:'Playfair Display',serif;font-size:2.5rem;color:#ffffff;margin-bottom:16px;">Ready to Order?</h2>
        <p style="color:#EDD5B3;font-size:1.1rem;margin-bottom:36px;font-style:italic;">Place your order online and enjoy our delicious meals</p>
        <a href="order.php" class="btn btn-outline">Place an Order</a>
        &nbsp;&nbsp;
        <a href="contact.php" class="btn btn-primary" style="border-color:#D4A574;background:#D4A574;color:#0D0D0D;">Contact Us</a>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo-name">RAMBA VI HOTEL</div>
                <p>A place where exceptional cuisine meets warm Rwandan hospitality. We bring you the best flavors every day.</p>
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
                <h4>Menu Categories</h4>
                <ul>
                    <li><a href="menu.php">Fish Dishes</a></li>
                    <li><a href="menu.php">Meat &amp; Grill</a></li>
                    <li><a href="menu.php">Fresh Juices</a></li>
                    <li><a href="menu.php">Soft Drinks</a></li>
                    <li><a href="menu.php">Desserts</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact Info</h4>
                <ul>
                    <li><a href="#">📍 Kigali, Rwanda</a></li>
                    <li><a href="#">📞 +250 782 758 237</a></li>
                    <li><a href="#">✉ info@rambavihotel.rw</a></li>
                    <li><a href="#">⏰ Open Daily: 7AM &ndash; 11PM</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 RAMBA VI Hotel. All Rights Reserved. | Crafted with ❤ in Rwanda</p>
    </div>
</footer>

<script>
function toggleNav() {
    document.getElementById('navLinks').classList.toggle('open');
}
</script>
</body>
</html>
