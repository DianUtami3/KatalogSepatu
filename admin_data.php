<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
    <style>
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000; }
        .modal-content { background: white; padding: 40px; border-radius: 12px; width: 400px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
        .input-field { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; }
    </style>
</head>
<body>
<div class="dashboard-layout">
    <div class="sidebar">
        <a href="index.php" style="color: #bdc3c7; text-decoration: none; font-size: 14px; margin-bottom: 20px; display: block;">← BACK TO HOME</a>
        <h2>G3S0 STORE</h2>
        
        <div class="menu-group">
            <p>MASTER DATA</p>
            <a href="?tabel=produk">Produk</a>
            <a href="?tabel=kategori">Kategori</a>
            <a href="?tabel=pelanggan">Pelanggan</a>
        </div>
        
        <div class="menu-group">
            <p>TRANSAKSI</p>
            <a href="?tabel=penjualan">Penjualan</a>
            <a href="?tabel=detail_penjualan">Detail Penjualan</a>
        </div>
    </div>

    <div class="main-content">
        <?php if(isset($_GET['tabel'])): ?>
            <div class="table-container">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h1 style="font-size: 22px; text-transform: capitalize;"><?php echo str_replace('_', ' ', $_GET['tabel']); ?></h1>
                    
                    <button onclick="document.getElementById('modal').style.display='flex'" style="background: #8d7171; color: #fff; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer;">
                        <?php echo ($_GET['tabel'] == 'detail_penjualan') ? '+ Catat Detail Penjualan' : '+ Tambah ' . ucfirst(str_replace('_', ' ', $_GET['tabel'])); ?>
                    </button>
                </div>

                <table class="data-table">
                    <?php
                    $t = $_GET['tabel'];
                    $q = mysqli_query($conn, "SELECT * FROM $t");
                    $fields = mysqli_fetch_fields($q);
                    echo "<thead><tr>";
                    foreach($fields as $f) echo "<th>{$f->name}</th>";
                    echo "<th>Aksi</th></tr></thead><tbody>";
                    while($r = mysqli_fetch_assoc($q)){ 
                        echo "<tr>"; 
                        foreach($r as $d) echo "<td>$d</td>"; 
                        $id = reset($r);
                        echo "<td><a href='proses_hapus.php?tabel=$t&id=$id' style='color:red; text-decoration:none;' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a></td>";
                        echo "</tr>"; 
                    }
                    echo "</tbody>";
                    ?>
                </table>
            </div>
        <?php else: ?>
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; height: 80vh;">
                <h1 style="font-size: 32px; color: #333;">Welcome back, Admin.</h1>
                <p style="color:#666; margin-top:10px;">Pilih menu di samping untuk mengelola database.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if(isset($_GET['tabel'])): ?>
<div id="modal" class="modal">
    <div class="modal-content">
        <h2 style="margin-bottom: 20px; text-transform: capitalize;">Tambah <?php echo str_replace('_', ' ', $_GET['tabel']); ?></h2>
        <form action="proses_tambah.php" method="POST">
            <input type="hidden" name="tabel" value="<?php echo $_GET['tabel']; ?>">
            <?php
            $q = mysqli_query($conn, "SELECT * FROM ".$_GET['tabel']);
            $fields = mysqli_fetch_fields($q);
            foreach($fields as $f) {
                if($f->flags & 1) continue; 
                echo "<input type='text' name='{$f->name}' class='input-field' placeholder='{$f->name}' required>";
            }
            ?>
            <button type="submit" style="width:100%; padding:12px; background:#8d7171; color:#fff; border:none; border-radius:6px; margin-top:10px; cursor:pointer;">SIMPAN DATA</button>
            <button type="button" onclick="document.getElementById('modal').style.display='none'" style="width:100%; padding:12px; background:none; border:1px solid #ddd; border-radius:6px; margin-top:10px; cursor:pointer;">BATAL</button>
        </form>
    </div>
</div>
<?php endif; ?>
</body>
</html>