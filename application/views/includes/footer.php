<div id="fb-root"></div>
</body>
	<!-- JS, Popper.js, and jQuery -->
	<script src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171843790-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-171843790-1');
	</script>


	<!-- <script src="https://cdn.jsdelivr.net/npm/emojione@4.0.0/lib/js/emojione.min.js"></script> -->
	<script src="<?= base_url() ?>assets/js/bs-validate.js"></script>
	<?php if($this->uri->segment(1) === "login") : ?>
		<script src="<?= base_url() ?>assets/js/auth-login.js"></script>
	<?php endif; ?>

	<?php if($this->uri->uri_string() === "" && !$this->session->userdata('SESS_IS_LOGGED')) : ?>
		<script src="<?= base_url() ?>assets/js/auth.js"></script>
	<?php endif; ?>

	<?php if($this->uri->uri_string() === "" && $this->session->userdata('SESS_IS_LOGGED')) : ?>
		<script src="<?= base_url() ?>assets/js/wall.js"></script>
		<script src="<?= base_url() ?>assets/js/autoresize.js"></script>
		<script src="<?= base_url() ?>assets/js/jquery-dim.js"></script>
		<script src="<?= base_url() ?>assets/js/bs-tagsinput.js"></script>
		<script src="<?= base_url() ?>assets/js/typeahead.js"></script>
		<script src="<?= base_url() ?>assets/js/infinite-scroll.js"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script> -->
		
		<script>(function(d, s, id) {
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) return;
		    js = d.createElement(s); js.id = id;
		    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
		    fjs.parentNode.insertBefore(js, fjs);
		  }(document, 'script', 'facebook-jssdk'));
		</script>
		<script type="text/javascript">
			var stickyOffset = $('#footer-panel').offset().top;

			$(window).scroll(function(){
			  	var sticky = $('#footer-panel'),
			      	scroll = $(window).scrollTop();
			      	
			  	if (scroll >= stickyOffset-500){
			  		sticky.addClass('sticky-panel');
			  		// $('#footer-panel .card').attr('style', 'margin-top: 70px !important');
			  	} else {
			  		sticky.removeClass('sticky-panel');
			  		// $('#footer-panel .card').attr('style', '');
			  	}
			});

			var stickyOffsetNav = $('.navbar').offset().top;


			$(window).scroll(function(){
			  	var stickyNav = $('.navbar'),
			      	scrollNav = $(window).scrollTop();

			  	if (scrollNav >= stickyOffsetNav){
			  		stickyNav.addClass('sticky-top');
			  	} else {
			  		stickyNav.removeClass('sticky-top');
			  	}
			});
		</script>
	<?php elseif($this->uri->segment(1) != 'account' && !$this->uri->segment(2) && $this->uri->segment(1) != '') : ?>

		<script src="<?= base_url() ?>assets/js/profile.js"></script>

	<?php elseif($this->uri->segment(2)) : ?>
		<script type="text/javascript">
			var stickyOffset = $('#control_btns').offset().top;

			$(window).scroll(function(){
			  	var sticky = $('#control_btns'),
			      	scroll = $(window).scrollTop();

			  	if (scroll >= stickyOffset){
			  		sticky.addClass('fixed-top');
			  		sticky.removeClass('btn-overlay');
			  	} else {
			  		sticky.removeClass('fixed-top');
			  		sticky.addClass('btn-overlay');
			  	}
			});
		</script>
		<script src="<?= base_url() ?>assets/js/dark-mode.js"></script>
		<script src="<?= base_url() ?>assets/js/readtime.js"></script>
		<script src="<?= base_url() ?>assets/js/r_analytics.js"></script>
	<?php endif; ?>
	<?php if ($this->uri->segment(1) == 'report'): ?>

		<script src="<?= base_url() ?>assets/js/report.js"></script>
	<?php elseif ($this->uri->segment(1) == 'account'): ?>

		<script src="<?= base_url() ?>assets/js/account.js"></script>
	<?php else: ?>

		<script src="<?= base_url() ?>assets/js/callback-content.js"></script>
		<script src="<?= base_url() ?>assets/js/html2canva.js"></script>
		<script src="<?= base_url() ?>assets/js/efface.js"></script>
		<script src="https://timeago.yarp.com/jquery.timeago.js"></script>
	<?php endif ?>
</html>