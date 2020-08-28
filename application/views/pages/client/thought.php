<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>

<div class="container btn-overlay" id="control_btns">
	<div class="row">
		<div class="col-12 d-flex justify-content-center align-self-center">
			<div class="bg-light my-2 px-3 py-2 rounded-pill">
				<div class="row">
					<div class="col-4 d-flex align-items-center px-3">
						<iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2F192.168.1.2%2F<?= $this->uri->segment(1); ?>%2F<?= $this->uri->segment(2); ?>&layout=button&size=small&appId=558933221488713&width=67&height=20" width="67" height="20" style="border:none;" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
					</div>
					<div class="col-4 border-right d-flex align-items-center px-3">
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-text="Sharing you this write-up '<?= $thought['p_title'] ?>'" data-url="<?= base_url($this->uri->uri_string()); ?>" data-show-count="false">Tweet</a>
					</div>
					<div class="col-4 d-flex align-items-center px-3">
						<div class="custom-control custom-switch">
						  	<small>
						  		<input type="checkbox" class="custom-control-input" id="darkSwitch" />
							  	<label class="custom-control-label" for="darkSwitch">
							  		<svg class="bi bi-moon" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									  	<path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"/>
									</svg>
							  	</label>
						  	</small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container" style="position: relative;">
	<div class="row">
		<div class="col-lg-8 col-sm-12">
			<div class="card my-4">
			  	<div class="card-body" id="thought_content">
			  		<div class="row">
			  			<div class="col-12">
			  				<h2 class="my-1" data-slug="<?= $thought['p_slug'] ?>"><?= htmlspecialchars(nl2br($thought['p_title'])) ?></h2>
			  				<small class="text-muted"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  	<path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
							</svg> 
							<?php if($thought['p_type'] == 'User') : ?>
								<a class="text-muted" href="<?= base_url().$thought['username']; ?>"><?= $thought['username'] ?></a> 
							<?php else : ?>
							 <?= $thought['guest_name'] ?>[?]
							 <?php endif; ?> 
							 on <?= $thought['p_date_created'] ?>
							</small>
							<div class="text-muted">
								<svg class="bi bi-book" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
			                      	<path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>\
			                      	<path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>\
			                  	</svg>
								<small><span class="eta"></span> min</small>
							</div>
			  			</div>
			  		</div>
			  		<p class="my-3" id="thought_body" <?php if ($thought['p_is_efface'] == 1): ?>style="display: none;"<?php endif ?> ><?= nl2br(htmlspecialchars($thought['p_content'])) ?></p>
			  		<?php if ($thought['p_is_efface'] == 1): ?>
			  			<small class="text-center text-warning d-flex justify-content-center bg-light my-1">Thought effaced 💛</small>
			  		<?php endif ?>
			  		<div class="dropdown-divider"></div>
			  		<div class="row">
			  			<small class="col-12">
			  				<svg class="bi bi-heart-fill text-warning" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		                      	<path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
		                  	</svg>
		                  	<span class="mr-2 text-muted" id="psic"><?= $thought['psic'] ?></span>
		                  	<svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		                      	<path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
		                      	<path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
		                  </svg>
		                  <span class="mr-2 text-muted"><?= $thought['pvic'] ?></span>
		                  <svg class="bi bi-book" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		                      	<path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>
		                      	<path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
		                  </svg>
		                  <span class="mr-2 text-muted"><?= $thought['pric'] ?></span>
		                  <?php if ($this->session->userdata('SESS_USER_ID') == $thought['user_id'] && $thought['p_is_efface'] == 0): ?>
		                  	<button type="button" class="badge badge-danger float-right btn btn-danger" id="effaceBtn"><i class="fa fa-fire"></i> Efface this thought</button>
		                  <?php endif ?>
		                  <?php if ($thought['p_is_efface'] == 1): ?>
		                  	<button type="button" class="badge badge-light float-right btn btn-light" id="show_effaceBtn"><i class="fa fa-fire-extinguisher"></i> Reverse efface to read</button>
		                  <?php endif ?>
			  			</small>
			  		</div>
			  		<div class="container sticky-bottom pb-2">
						<div class="row d-flex justify-content-center align-self-center text-center">
							<?php if($this->session->userdata('SESS_ROLE') === 'User') : ?>
							<div id="support_info">
								<small class="text-muted"><strong>Support button will appear after reading the content.</strong></small>
							</div>
							<div class="col-xs-2 bg-light mt-3 py-3 px-5 rounded-pill" id="support_btn" data-is-support="<?= $is_support ?>">
								<div class="col-12">
									<label class="heart-switch" style="margin-bottom: 0 !important">
									    <input type="checkbox" id="supportBtn" <?php if($is_support) : ?>checked disabled <?php endif; ?>>
									    <svg viewBox="0 0 33 23" fill="white">
									        <path d="M23.5,0.5 C28.4705627,0.5 32.5,4.52943725 32.5,9.5 C32.5,16.9484448 21.46672,22.5 16.5,22.5 C11.53328,22.5 0.5,16.9484448 0.5,9.5 C0.5,4.52952206 4.52943725,0.5 9.5,0.5 C12.3277083,0.5 14.8508336,1.80407476 16.5007741,3.84362242 C18.1491664,1.80407476 20.6722917,0.5 23.5,0.5 Z"></path>
									    </svg>
									</label>
								</div>
								<div class="row">
									<div class="col-12">
										<small class="text-muted"><strong>Show Support</strong></small>
									</div>
								</div>
							</div>
							<?php else : ?>
								<small class="text-muted"><strong>Support button is disabled for guests users.</strong></small>
							<?php endif; ?>
						</div>
					</div>
			  	</div>
			</div>
		</div>
		<div class="col-lg-4 d-none d-lg-block">
			<div id="footer-panel">
				<div class="row">
					<div class="col-12">
						<div class="card mx-1 my-4">
						  	<h5 class="card-header">
						  		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  	<path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
								  	<path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
								</svg> Most Read
						  	</h5>
						  	<div class="card-body">
								<?php if ($this->session->userdata('SESS_IS_LOGGED')): ?>
									<small class="list-group list-group-flush" id="mr_wall"></small>
								<?php else: ?>
									<small><a href="<?= base_url() ?>login">Login</a> to view most read thoughts.</small>
								<?php endif ?>
						  	</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<small class="d-flex justify-content-center text-muted">
							<span class="mx-3">Privacy</span>
							<span class="mx-3">Terms</span>
							<span class="mx-3">Developer</span>
							<a href="<?= base_url() ?>report" class="text-muted mx-3">Report a bug</a>
						</small>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-12">
						<small class="d-flex justify-content-center text-muted">
							<span>HereForU 2020</span>
						</small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->load->view('includes/footer'); ?>