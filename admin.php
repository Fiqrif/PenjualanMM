<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="css/admin.css" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Admin ProboLezat</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<i class="bx bx-category"></i>
			<span class="logo_name">ProboLezat</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="#" class="active">
					<i class="bx bx-grid-alt"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="categories/categories.php">
					<i class="bx bx-box"></i>
					<span class="links_name">Categories</span>
				</a>
			</li>
			<li>
				<a href="transaction/transaction.php">
					<i class="bx bx-list-ul"></i>
					<span class="links_name">Transaction</span>
				</a>
			</li>
			<li>
   				<a href="admin/logout-admin.php">
					<i class="bx bx-log-out"></i>
					<span class="links_name">Log out</span>
   				</a>
			</li>
		</ul>
	</div>
		<section class="home-section">
			<nav>
				<div class="sidebar-button">
					<i class="bx bx-menu sidebarBtn"></i>
				</div>
				<div class="profile-details">
					<span class="admin_name">ProboLezat Admin</span>
				</div>
			</nav>
			<div class="home-content">
				<h2 id="text">
					<?php
					session_start();
					echo $_SESSION['username'];
					?>
				</h2>
				<h3 id="date"></h3>

				<div class="total-transaksi">
					<br>
					<?php
					include 'connection/connection.php';
					// Query untuk menghitung jumlah data
					$count_query = "SELECT COUNT(*) AS total_transaksi FROM tb_transaction";
					$count_result = mysqli_query($db, $count_query);

					// Ambil hasilnya
					$total_transaksi = 0;
					if ($count_result && mysqli_num_rows($count_result) > 0) {
						$count_data = mysqli_fetch_assoc($count_result);
						$total_transaksi = $count_data['total_transaksi'];
					}
					?>
					<h1>Total Transaksi : <?php echo $total_transaksi; ?></h1>
				</div>

				<div class="widget">
					<table class="table-data">
						<thead>
						<tr>
							<th>Tanggal</th>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Harga</th>
						</tr>
						</thead>
						<tbody>
						<?php
						include 'connection/connection.php';
						$sql = "SELECT * FROM tb_transaction";
						$result = mysqli_query($db, $sql);
						if (mysqli_num_rows($result) == 0) {
							echo "
							<h3 style='text-align: center; color: red;'>Data Kosong</h3>
						";
						} else {
							while ($data = mysqli_fetch_assoc($result)) {
								echo "
								<tr>
									<td>$data[tanggal]</td>
									<td>$data[nama]</td>
									<td>$data[jenis]</td>
									<td>$data[harga]</td>
								</tr>
								";
							}
						}
						?>
						</tbody>
					</table>

					<button type="button" class="btn btn-tambah">
						<a href="transaction/transaction.php">Transaction</a>
					</button>
				</div>

				<div class="total-categories">
					<br>
					<?php
					include 'connection/connection.php';
					// Query untuk menghitung jumlah data
					$count_query = "SELECT COUNT(*) AS total_kategori FROM tb_categories";
					$count_result = mysqli_query($db, $count_query);

					// Ambil hasilnya
					$total_transaksi = 0;
					if ($count_result && mysqli_num_rows($count_result) > 0) {
						$count_data = mysqli_fetch_assoc($count_result);
						$total_kategori = $count_data['total_kategori'];
					}
					?>
					<h1>Total Kategori : <?php echo $total_kategori; ?></h1>
				</div>

				<div class="widget">
				<table class="table-data">
				<thead>
					<tr>
						<th scope="col" style="width: 20%">Photo</th>
						<th>Categories</th>
						<th scope="col" style="width: 30%">Description</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include 'connection/connection.php';
					$sql = "SELECT * FROM tb_categories";
					$result = mysqli_query($db, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
			   			<tr>
							<td colspan='5' align='center'>
                           		Data Kosong
                        	</td>
			   			</tr>
						";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                    <tr>
                      	<td>$data[categories]</td>
					  	<td>$data[description]</td>
                      	<td>$data[price]</td>
                    </tr>
                  	";
					}
					?>
				</tbody>
			</table>

					<button type="button" class="btn btn-tambah">
						<a href="categories/categories.php">Categories</a>
					</button>
				</div>
			</div>
		</section>


	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};

		function myFunction() {
			const months = ["Januari", "Februari", "Maret", "April", "Mei",
				"Juni", "Juli", "Agustus", "September",
				"Oktober", "November", "Desember"
			];
			const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
				"Jumat", "Sabtu"
			];
			let date = new Date();
			jam = date.getHours();
			tanggal = date.getDate();
			hari = days[date.getDay()];
			bulan = months[date.getMonth()];
			tahun = date.getFullYear();
			let m = date.getMinutes();
			let s = date.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
			requestAnimationFrame(myFunction);
		}

		function checkTime(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}
		window.onload = function() {
			let date = new Date();
			jam = date.getHours();
			if (jam >= 4 && jam <= 10) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Pagi,");
			} else if (jam >= 11 && jam <= 14) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Siang,");
			} else if (jam >= 15 && jam <= 18) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Sore,");
			} else {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Malam,");
			}
			myFunction();
		};
	</script>
</body>

</html>
