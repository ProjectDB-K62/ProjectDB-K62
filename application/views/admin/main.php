<html>
	<head>
		<?php $this->load->view('admin/head'); ?>
	</head>
	<body>
		<header><?php $this->load->view('admin/header'); ?></header>
		<?php $this->load->view('admin/left'); ?>
		<?php $this->load->view($temp, $this->data);?>
		<script src="<?php echo public_url('admin')?>/js/jquery-1.11.1.min.js"></script>
		<script src="<?php echo public_url('admin')?>/js/bootstrap.min.js"></script>	
		<script src="<?php echo public_url('admin')?>/js/bootstrap-table.js"></script>	
	</body>
</html>