<?php 
include 'koneksi.php'; 
$id = isset($_GET['id']) ? $_GET['id'] : 1;
$data = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'"));
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title><?php echo $data['nama_produk'] ?? 'Product'; ?> - G3S0</title>
</head>
<body>
    <div class="container" style="display:flex; gap:50px;">
        <div style="flex:1; background:#f5f5f5; height:500px;"></div>
        <div style="flex:1;">
            <h1><?php echo $data['nama_produk'] ?? 'Product Name'; ?></h1>
            <p style="font-size:24px; margin: 20px 0;">Rp <?php echo number_format($data['harga'] ?? 0); ?></p>
            <label>Select Size:</label>
            <div class="size-grid">
                <?php $sizes = ["40", "40.5", "41", "42", "42.5", "43", "44", "44.5", "45", "46"];
                foreach($sizes as $s) { echo "<button class='size-btn'>EU $s</button>"; } ?>
            </div>
            <button class="btn-buy" style="width:100%; padding:20px; font-size:18px;">Add to Bag</button>
            <button class="btn-buy" style="width:100%; padding:20px; font-size:18px; background:#fff; color:#000; border:1px solid #000; margin-top:10px;">Favourite ♡</button>
            
            <div style="margin-top: 50px;">
                <h3>More Styles</h3>
                <div class="scroll-container">
                    <?php
                    $more = mysqli_query($conn, "SELECT * FROM produk LIMIT 5");
                    while($m = mysqli_fetch_array($more)){ ?>
                    <a href="detail.php?id=<?php echo $m['id_produk']; ?>" class="scroll-item" style="text-decoration:none; color:black;">
                        <div style="background:#eee; height:100px;"></div>
                        <p style="font-size:12px; margin-top:10px;"><?php echo $m['nama_produk']; ?></p>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>