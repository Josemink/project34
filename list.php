<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<title>Document</title>
	<!-- Masthead-->
	<header class="masthead">
		<div class="container h-100">
			<div class="row h-100 align-items-center justify-content-center text-center">
				<div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
					<h1 class="text-uppercase text-white font-weight-bold">ห้องพัก</h1>
					<hr class="divider my-4" />
				</div>

			</div>
		</div>
	</header>
</head>

<body>

	<?php
	$date_in = isset($_POST['date_in']) ? $_POST['date_in'] : date('d-m-Y');
	$date_out = isset($_POST['date_out']) ? $_POST['date_out'] : date('d-m-Y', strtotime(date('d-m-Y') . ' + 3 days'));
	?>


	<section class="page-section bg-dark">

		<div class="container">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form action="index.php?page=list" id="filter" method="POST">
							<div class="row">
								<div class="col-md-3">
									<label for="">เลือกวันที่เช็คอิน</label>
									<input type="date" class="form-control datepicker" name="date_in" autocomplete="off" value="<?php echo isset($date_in) ? date("d-m-Y", strtotime($date_in)) : "" ?>">
								</div>
								<div class="col-md-3">
									<label for="">เลือกวันที่เช็คเอาท์</label>
									<input type="date" class="form-control datepicker" name="date_out" autocomplete="off" value="<?php echo isset($date_out) ? date("d-m-Y", strtotime($date_out)) : "" ?>">
								</div>
								<div class="col-md-3">
									<br>
									<button class="btn-btn-block btn-primary mt-3">ค้นหาห้องว่าง</button>
								</div>

							</div>
						</form>
					</div>
				</div>

				<hr>

				<?php

				$cat = $conn->query("SELECT * FROM room_categories");
				$cat_arr = array();
				while ($row = $cat->fetch_assoc()) {
					$cat_arr[$row['id']] = $row;
				}
				$qry = $conn->query("SELECT distinct(category_id),category_id from rooms where id not in (SELECT room_id from checked where '$date_in' BETWEEN date(date_in) and date(date_out) and '$date_out' BETWEEN date(date_in) and date(date_out)  )");
				while ($row = $qry->fetch_assoc()) :

				?>
					<div class="card item-rooms mb-5">
						<div class="card-body">
							<div class="row">
								<div class="col-md-5">
									<img src="assets/img/<?php echo $cat_arr[$row['category_id']]['cover_img'] ?>" alt="">
								</div>
								<div class="col-md-7" height="100%">
									<h3><b><?php echo '฿ ' . number_format($cat_arr[$row['category_id']]['price'], 2) ?></b><span> /คืน</span></h3>

									<h4><b>
											<?php echo $cat_arr[$row['category_id']]['name'] ?>
											<button type="button" class="btn btn-link" style="color: #EF774B; margin-left: 50%;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">รายละเอียดเพิ่มเติม</button>
									</b></h4>
									<div class="col-md-10">
										<p class="card-t"><i class='bx bx-wifi'></i>ฟรี Wi-Fi</p>
										<p class="card-t"></i><i class='bx bx-x'></i>ห้องปลอดบุหรี่</p>
										<p class="card-t"><i class='bx bxs-bowl-rice'></i>ไม่รวมอาหารเช้า</p>
										<p class="card-t"><i class='bx bxs-dog'></i>ไม่อนุญาตให้นำสัตว์เลี้ยงเข้าห้องพัก</p>
									</div>
									<div class="align-self-end mt-10">
										<button class="btn btn-primary  float-right book_now" type="button" data-id="<?php echo $row['category_id'] ?>">จองห้องนี้</button>
									</div>
								</div>
							</div>

						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<style type="text/css">
		.item-rooms img {
			width: 23vw;
		}
	</style>
	<script>
		$('.book_now').click(function() {
			uni_modal('Book', 'admin/book.php?in=<?php echo $date_in ?>&out=<?php echo $date_out ?>&cid=' + $(this).attr('data-id'))
		})
	</script>
</body>

</html>