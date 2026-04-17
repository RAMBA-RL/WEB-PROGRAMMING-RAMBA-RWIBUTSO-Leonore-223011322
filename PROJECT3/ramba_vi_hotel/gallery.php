<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - RAMBA VI Hotel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        
        .gallery-section {
            padding: 60px 0;
        }

        .gallery-info-bar {
            background: #F5EBD8;
            border: 1px solid rgba(212,165,116,0.3);
            border-radius: 4px;
            padding: 20px 28px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .gallery-info-bar p {
            font-family: 'Lato', sans-serif;
            font-size: 0.9rem;
            color: #A0522D;
        }

        .gallery-info-bar span {
            font-weight: 700;
            color: #7B3F00;
        }

        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        
        .gallery-grid .gallery-item:first-child {
            grid-column: span 2;
        }

       
        .gallery-item {
            position: relative;
            display: block;
            overflow: hidden;
            border-radius: 8px;
            aspect-ratio: 4 / 3;
            background: #d4a574;
            cursor: pointer;
            text-decoration: none;
        }

       
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

       
        .gallery-item:hover img {
            transform: scale(1.07);
        }

     
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(123,63,0,0.85) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.35s ease;
            display: flex;
            align-items: flex-end;
            padding: 20px;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

    
        .gallery-overlay-text {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
        }

      
        .gallery-order-tag {
            position: absolute;
            top: 12px;
            right: 12px;
            background: #7B3F00;
            color: #ffffff;
            font-family: 'Lato', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 6px 12px;
            border-radius: 20px;
            opacity: 0;
            transition: opacity 0.35s ease;
        }

        .gallery-item:hover .gallery-order-tag {
            opacity: 1;
        }

       
        .gallery-cta {
            text-align: center;
            margin-top: 48px;
            padding: 40px;
            background: #F5EBD8;
            border-radius: 8px;
            border: 1px solid rgba(212,165,116,0.3);
        }

        .gallery-cta h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: #7B3F00;
            margin-bottom: 12px;
        }

        .gallery-cta p {
            color: #2C2C2C;
            margin-bottom: 24px;
            font-size: 1rem;
        }

       
        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .gallery-grid .gallery-item:first-child {
                grid-column: span 1;
            }
        }

      
        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="container">
        <a href="index.php" class="nav-logo">
            <img src="logo.png" alt="Ramba VI Hotel Logo" class="nav-logo-img" style="height:50px;width:auto;">
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="gallery.php" class="active">Gallery</a></li>
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
        <p class="breadcrumb"><a href="index.php">Home</a> &rarr; Gallery</p>
        <h1>Food Gallery</h1>
        <p>Click any photo to go to the order page</p>
    </div>
</div>


<section class="gallery-section">
    <div class="container">

        <p class="section-subtitle">Our Dishes</p>
        <h2 class="section-title">A Taste of RAMBA VI</h2>
        <div class="section-divider"></div>

        <div class="gallery-info-bar">
            <p>&#128247; Showing <span>7 photos</span> &mdash; <span>Click any photo</span> to order that dish</p>
            <a href="order.php" class="btn btn-primary" style="padding:10px 24px;font-size:0.75rem;">Order Now &rarr;</a>
        </div>

       
        <div class="gallery-grid">

           
            <a href="order.php" class="gallery-item" title="Click to order Fried Tilapia">
                <img src="images/photo1.jpg" alt="Fried Tilapia">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Fried Tilapia &mdash; 8,000 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

      
            <a href="order.php" class="gallery-item" title="Click to order Beef Brochettes">
                <img src="images/photo2.jpg" alt="Beef Brochettes">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Brochettes &mdash; 6,500 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

        
            <a href="order.php" class="gallery-item" title="Click to order Fresh Juice">
                <img src="images/photo3.jpg" alt="Fresh Juice">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Fresh Juice &mdash; 2,500 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

        
            <a href="order.php" class="gallery-item" title="Click to order Chocolate Cake">
                <img src="images/photo5.jpg" alt="Chocolate Cake">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Chocolate Cake &mdash; 3,500 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

        
            <a href="order.php" class="gallery-item" title="Click to order Garden Salad">
                <img src="images/photo6.jpg" alt="Garden Salad">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Garden Salad &mdash; 2,500 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

        
            <a href="order.php" class="gallery-item" title="Click to order Red Wine">
                <img src="images/photo7.jpg" alt="Red Wine">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Red Wine &mdash; 4,000 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

        
            <a href="order.php" class="gallery-item" title="Click to order Roast Chicken">
                <img src="images/photo8.jpg" alt="Roast Chicken">
                <div class="gallery-overlay">
                    <span class="gallery-overlay-text">&#128722; Order Roast Chicken &mdash; 18,000 RWF</span>
                </div>
                <span class="gallery-order-tag">Order Now</span>
            </a>

        </div>

      
        <div class="gallery-cta">
            <h3>Seen Something You Like?</h3>
            <p>Order online and we will prepare it fresh for you!</p>
            <a href="order.php" class="btn btn-primary">Place an Order Now</a>
        </div>

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
                    <li><a href="menu.php">Menu</a></li>
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
