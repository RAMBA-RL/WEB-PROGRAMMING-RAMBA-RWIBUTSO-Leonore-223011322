<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - RAMBA VI Hotel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <div class="container">
        <a href="index.php" class="nav-logo">
            <span class="logo-name">RAMBA VI</span>
            <span class="logo-tagline">Luxury Hotel &amp; Restaurant</span>
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="menu.php" class="active">Menu</a></li>
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
        <p class="breadcrumb"><a href="index.php">Home</a> &rarr; Menu</p>
        <h1>Our Menu</h1>
        <p>Discover the finest flavors crafted by our expert chefs</p>
    </div>
</div>
<section class="section">
    <div class="container">
        <p class="section-subtitle">Explore Our Selection</p>
        <h2 class="section-title">What We Offer</h2>
        <div class="section-divider"></div>

        <div class="menu-tabs">
            <button class="menu-tab active" onclick="showMenu('fish', this)"> Fish</button>
            <button class="menu-tab" onclick="showMenu('meat', this)"> Meat &amp; Grill</button>
            <button class="menu-tab" onclick="showMenu('juice', this)">Fresh Juices</button>
            <button class="menu-tab" onclick="showMenu('drinks', this)"> Drinks</button>
            <button class="menu-tab" onclick="showMenu('sides', this)">Sides &amp; Salads</button>
            <button class="menu-tab" onclick="showMenu('dessert', this)">Desserts</button>
        </div>

        <div class="menu-section active" id="fish">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Price (RWF)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td class="item-name">Fried Tilapia <span class="menu-badge badge-popular">Popular</span></td>
                        <td class="item-desc">Whole crispy fried tilapia with special house seasoning, served with fries</td>
                        <td>Whole</td>
                        <td class="price">8,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td class="item-name">Smoked Fish <span class="menu-badge badge-new">New</span></td>
                        <td class="item-desc">Traditional Rwandan smoked fish prepared with local spices and herbs</td>
                        <td>Half / Whole</td>
                        <td class="price">7,500 / 14,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td class="item-name">Fish Fillet</td>
                        <td class="item-desc">Boneless tilapia fillet pan-fried in garlic butter sauce</td>
                        <td>200g</td>
                        <td class="price">10,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>05</td>
                        <td class="item-name">Fish Soup</td>
                        <td class="item-desc">Rich and aromatic fish soup with fresh tomatoes, onions, and spices</td>
                        <td>Bowl</td>
                        <td class="price">5,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="menu-section" id="meat">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Price (RWF)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td class="item-name">Beef Brochettes <span class="menu-badge badge-popular">Popular</span></td>
                        <td class="item-desc">Tender marinated beef skewers grilled on charcoal, served with chips</td>
                        <td>5 skewers</td>
                        <td class="price">6,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td class="item-name">Goat Brochettes</td>
                        <td class="item-desc">Spiced goat meat skewers slowly grilled for maximum tenderness</td>
                        <td>5 skewers</td>
                        <td class="price">7,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td class="item-name">Chicken Wings <span class="menu-badge badge-popular">Popular</span></td>
                        <td class="item-desc">Crispy fried or grilled chicken wings in our signature sauce</td>
                        <td>8 pcs</td>
                        <td class="price">9,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td class="item-name">Whole Roast Chicken</td>
                        <td class="item-desc">Juicy whole chicken slow-roasted with herbs, served with ugali or rice</td>
                        <td>1kg</td>
                        <td class="price">18,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="menu-section" id="juice">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Juice Name</th>
                        <th>Ingredients</th>
                        <th>Size</th>
                        <th>Price (RWF)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td class="item-name">Passion Fruit Juice <span class="menu-badge badge-popular">Popular</span></td>
                        <td class="item-desc">100% fresh passion fruit, no added sugar or preservatives</td>
                        <td>500ml</td>
                        <td class="price">2,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td class="item-name">Mango Juice <span class="menu-badge badge-veg">Fresh</span></td>
                        <td class="item-desc">Sweet ripe mangoes blended fresh, chilled and served with ice</td>
                        <td>500ml</td>
                        <td class="price">2,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td class="item-name">Avocado Blend</td>
                        <td class="item-desc">Creamy avocado blended with milk and a hint of honey</td>
                        <td>400ml</td>
                        <td class="price">3,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td class="item-name">Watermelon Juice</td>
                        <td class="item-desc">Chilled fresh watermelon juice, naturally sweet and hydrating</td>
                        <td>500ml</td>
                        <td class="price">2,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="menu-section" id="drinks">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Drink Name</th>
                        <th>Description</th>
                        <th>Volume</th>
                        <th>Price (RWF)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td class="item-name">Primus Beer</td>
                        <td class="item-desc">Rwanda's favourite lager beer, cold and refreshing</td>
                        <td>72cl / 33cl</td>
                        <td class="price">1,500 / 1,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td class="item-name">Heineken Beer</td>
                        <td class="item-desc">Premium imported Dutch lager beer, cold and crisp</td>
                        <td>33cl</td>
                        <td class="price">2,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td class="item-name">Fanta (All Flavors)</td>
                        <td class="item-desc">Available in Orange, Citron, and Passion — served cold</td>
                        <td>33cl</td>
                        <td class="price">1,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>04</td>
                        <td class="item-name">Red Wine</td>
                        <td class="item-desc">Imported South African red wine, smooth and full-bodied</td>
                        <td>Glass / Bottle</td>
                        <td class="price">4,000 / 25,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="menu-section" id="sides">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Serving</th>
                        <th>Price (RWF)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td class="item-name">French Fries <span class="menu-badge badge-popular">Popular</span></td>
                        <td class="item-desc">Golden crispy fries seasoned with sea salt and served with ketchup</td>
                        <td>Regular / Large</td>
                        <td class="price">2,000 / 3,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td class="item-name">Steamed Rice</td>
                        <td class="item-desc">Fluffy long-grain white rice, perfectly cooked</td>
                        <td>Plate</td>
                        <td class="price">1,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td class="item-name">Ugali</td>
                        <td class="item-desc">Traditional East African cornmeal staple, smooth and firm</td>
                        <td>Plate</td>
                        <td class="price">1,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="menu-section" id="dessert">
            <table class="menu-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Serving</th>
                        <th>Price (RWF)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td class="item-name">Chocolate Cake <span class="menu-badge badge-popular">Popular</span></td>
                        <td class="item-desc">Rich moist chocolate cake with ganache frosting, served warm</td>
                        <td>Slice</td>
                        <td class="price">3,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td class="item-name">Vanilla Ice Cream</td>
                        <td class="item-desc">Creamy premium vanilla ice cream, served with fresh fruit topping</td>
                        <td>2 scoops</td>
                        <td class="price">2,500</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                    <tr>
                        <td>03</td>
                        <td class="item-name">Fruit Salad <span class="menu-badge badge-veg">Healthy</span></td>
                        <td class="item-desc">Seasonal fresh fruit medley with honey and mint drizzle</td>
                        <td>Bowl</td>
                        <td class="price">3,000</td>
                        <td><a href="order.php" class="btn btn-primary" style="padding:8px 18px;font-size:0.72rem;">Order</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="alert alert-info" style="margin-top:32px;text-align:center;">
            All prices are in Rwandan Francs (RWF).
            <a href="order.php" style="color:#7B3F00;font-weight:700;text-decoration:underline;">Click here to order online &rarr;</a>
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
                    <li><a href="menu.php">Our Menu</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="order.php">Order Food</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Fish Dishes</a></li>
                    <li><a href="#">Meat &amp; Grill</a></li>
                    <li><a href="#">Fresh Juices</a></li>
                    <li><a href="#">Drinks</a></li>
                    <li><a href="#">Desserts</a></li>
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
function showMenu(id, btn) {
    document.querySelectorAll('.menu-section').forEach(s => s.classList.remove('active'));
    document.querySelectorAll('.menu-tab').forEach(b => b.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    btn.classList.add('active');
}
</script>
</body>
</html>
