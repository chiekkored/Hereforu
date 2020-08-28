    </main>
  </div>
</div>
</body>
	<script>
	  feather.replace()
	</script>
	<!-- JS, Popper.js, and jQuery -->
	<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="<?= base_url() ?>assets/js/bs-validate.js"></script>
	<script src="<?= base_url() ?>assets/js/cms-login.js"></script>
	<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/auto-refresh/bootstrap-table-auto-refresh.min.js"></script>
	<script src="<?= base_url() ?>assets/js/cms.js"></script>
	<?php if ($this->uri->segment(1) === "posts"): ?>
		<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
		<script src="<?= base_url() ?>assets/js/cms-posts.js"></script>
	<?php endif ?>

	<?php if ($this->uri->segment(1) === "reports"): ?>
		<script src="<?= base_url() ?>assets/js/cms-reports.js"></script>
	<?php endif ?>

	<?php if ($this->uri->segment(1) === "users"): ?>
		<script src="<?= base_url() ?>assets/js/cms-users.js"></script>
	<?php endif ?>
	
</html>