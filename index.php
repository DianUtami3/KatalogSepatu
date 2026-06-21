<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>G3S0 Store</title>
    <style>
        .menu-icon { cursor: pointer; font-size: 30px; position: absolute; right: 50px; top: 60px; z-index: 1001; }
        .side-nav { height: 100%; width: 0; position: fixed; z-index: 1002; top: 0; right: 0; background-color: #fff; overflow-x: hidden; transition: 0.5s; padding-top: 60px; border-left: 1px solid #ddd; }
        .side-nav a { padding: 15px 25px; text-decoration: none; font-size: 20px; color: #000; display: block; transition: 0.3s; }
        .side-nav a:hover { color: #8d7171; }
    </style>
</head>
<body>
    <header>
        <div class="logo">G3S0</div>
        <div class="menu-icon" onclick="openNav()">&#9776;</div>
    </header>

    <div id="sideNav" class="side-nav">
        <a href="javascript:void(0)" onclick="closeNav()" style="font-size:30px; text-align:right; padding-right:20px;">&times;</a>
        <a href="index.php">Home</a>
        <a href="login.php">Login / Daftar Admin</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="hero-section">
        <h1>UNLEASH YOUR STYLE.</h1>
        <a href="admin_data.php" class="btn-main" style="background: #000000;">KELOLA DATABASE</a>
        <div class="artist-section">
            <div class="artist-track">
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=500"></div>
                <div class="artist-card"><img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?w=500"></div>
            </div>
        </div>
    </div>

    <div class="scroll-wrapper" id="katalog">
        <h2 style="padding:0 50px;">LATEST ARRIVALS</h2>
        <div class="scroll-container">
            <?php 
            $items = [
                ["nama" => "Nike Uplift SC", "img" => "assets/uplift.png"],
                ["nama" => "Nike Zoom Rival Fly 4", "img" => "assets/zoom.png"],
                ["nama" => "Nike Pegasus 41 SE", "img" => "assets/pegasus.png"],
                ["nama" => "Nike Air Max Dn", "img" => "assets/airmax.png"]
            ];
            foreach($items as $i){ ?>
                <div class="scroll-item">
                    <img src="<?php echo $i['img']; ?>" alt="<?php echo $i['nama']; ?>">
                    <p style="font-weight:bold; margin-top:10px;"><?php echo $i['nama']; ?></p>
                </div>
            <?php } 
            foreach($items as $i){ ?>
                <div class="scroll-item">
                    <img src="<?php echo $i['img']; ?>" alt="<?php echo $i['nama']; ?>">
                    <p style="font-weight:bold; margin-top:10px;"><?php echo $i['nama']; ?></p>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function openNav() { document.getElementById("sideNav").style.width = "250px"; }
        function closeNav() { document.getElementById("sideNav").style.width = "0"; }
    </script>
</body>
</html>