<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>G3S0 Store</title>
</head>
<body>
    <header>
        <div class="logo">G3S0</div>
    </header>

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
</body>
</html>