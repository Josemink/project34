<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['bgvilla'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}
    </style>
    <body id="page-top">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_hotel_name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">หน้าหลัก</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=list">ห้องพัก</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=pay">ชำระเงิน</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">การจองของฉัน</a></li>
                    </ul>
                </div>
            </div>
        </nav>
       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="Villa">
        <h3>สถานที่ใกล้เคียง</h3>
        <div class="mapvilla">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.0649722229796!2d101.37282671467175!3d17.456604088037206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3121273d1cd2b60d%3A0x71bd6196d0c3b524!2z4LmC4Lij4LiH4LmB4Lij4Lih4Lin4Li04Lil4Lil4LmI4Liy4LmA4LiU4Lit4Lie4Lix4LiZ4LiV4Liy!5e0!3m2!1sth!2sth!4v1661761437813!5m2!1sth!2sth" width="750" height="450" style="border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="nearbyplaces">
                <ul>ภูเรือ - 1.3 กม.</ul>
                <ul>โรงพยาบาลภูเรือ - 2.3 กม.</ul>
                <ul>จุดชมวิวเดโช - 3.6 กม.</ul>
                <ul>อุทยานแห่งชาติภูเรือ - 4.9 กม.</ul>
                <ul>หน้าผาสามทอง - 5.2 กม.</ul>
                <ul>ภูเรือแคมป์ไซต์ - 6.2 กม.</ul>
                <ul>ผาโหล่นน้อย - 6.4 กม.</ul>
                <ul>น้ําตกปลาบ่า - 7.2 กม.</ul>
                <ul>ภูเรือ ใจดี กอล์ฟ - 15.2 กม.</ul>
            </div>
        </div>
    </div>
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">Villa DePantaPhuRuea| <a href="https://1sourcecodr.blogspot.com/" target="_blank">1 SOURCE CODE</a></div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
