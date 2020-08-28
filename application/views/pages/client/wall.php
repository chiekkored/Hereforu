<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/nav'); ?>
<div class="fixed-bottom" id="notif_alert"></div>
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-sm-12">
			<div class="alert alert-warning alert-dismissible fade show mx-3 mt-2" role="alert">
		  	<small>Cheers to getting through our worst days together. <strong>We're here for u</strong>. To listen and understand whatever it is you're going through. Your life is full of worth. Your story matters. <strong>You are important</strong>.</small>
			</div>
			<div class="card shadow-sm mx-3 my-3" id="card-post">
				<small class="card-header text-muted">
					Write up your thoughts
				</small>
			  	<div class="card-body">
			    	<!-- <div class="row">
			    		<div class="col-lg-6 col-sm-12">
			    			<div class="form-group">
					    		<input type="text" name="title" id="title" class="form-control form-control-sm rounded-pill" placeholder="Place a title" />
					    	</div>
			    		</div>
			    	</div> -->
			    	<div class="row">
			    		<div class="col-12">
			    			<?= form_open('post', 'id="post" novalidate'); ?>
			    			<?php if($this->session->userdata('SESS_ROLE') == 'Guest') : ?>
								<div class="form-group">
				    				<input type="text" name="name" id="name" class="form-control form-control-sm border-0 post" placeholder="Guest Name" required />
				    			</div>
				    			<div class="dropdown-divider"></div>
							<?php endif; ?>
			    			<div class="form-group">
			    				<input type="text" name="title" id="title" class="form-control form-control-sm border-0 post" placeholder="Place a title" required />
			    			</div>
		    				<div id="wall_subform">
		    					<div class="form-group">
						    		<textarea name="content" id="content" class="form-control form-control-sm border-0 rounded post ta-expand" placeholder="Write it all out here, <?= $this->session->userdata('SESS_USERNAME') ?>" required ></textarea>
						    	</div>
				    			<div class="form-group" id="form_tags" style="width: 100% !important">
				    				<input type="text" name="tags" id="tags" class="form-control" data-role="tagsinput" placeholder="Warning tags">
				    				<label for="tags"><small class="text-muted">Ex. Sexual Abuse, Physical Abuse, Depression, etc.</small></label>
				    			</div>
		    				</div>
					    	<div class="form-group" id="wall_post_b">
					    		<button class="btn btn-outline-warning btn-block mt-4" type="button" id="btnPost"><strong>POST</strong></button>
					    	</div>
					    	<?= form_close(); ?>
			    		</div>
			    	</div>
			  	</div>
			</div>
			<div id="p_wall">
				<small>
		        	<nav aria-label="breadcrumb" class="mx-3">
					  	<ol class="breadcrumb">
					    	<li id="a_feed" class="breadcrumb-item active">All</li>
				    		<li id="ng_feed" class="breadcrumb-item"><a href="" id="btnNg_tab">No Guest</a></li>
					  	</ol>
					</nav>
		        </small>
				<div class="card text-dark mx-3 my-3 position-relative d-md-block d-lg-none">
		            <div class="card-body">
		              <div class="row">
		                <div class="col-12">
		                  <small class="text-muted">📌 Pinned Card</small>
		                </div>
		              </div>
		              <div class="media">
		                <div class="media-body">
		                  	<h5 class="mt-2">
		                  		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-fill-exclamation mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.553.553 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
								</svg> Hotlines For U
							</h5>
							<div class="row">
				              	<div class="col-12">
				              		<small>
				              			<!-- Mobile Pinned Hotline -->
				              			<p class="text-muted">Philippines</p>
										<dl class="row border-bottom">
										  <dt class="col-6">Hopeline</dt>
										  <dd class="col-6">
										  	<a class="text-info" href="tel:804-4673"><p>804-4673</p></a>
										  	<a class="text-info" href="tel:0917 558 4673"><p>0917 558 4673</p></a>
										  </dd>
										</dl>
										<dl class="row border-bottom">
										  <dt class="col-6">In Touch Community Services</dt>
										  <dd class="col-6">
										  	<a class="text-info" href="tel:893-7603"><p>893-7603</p></a>
										  	<a class="text-info" href="tel:0917 800 1123"><p>0917 800 1123</p></a>
										  	<a class="text-info" href="tel:0922 893 8944"><p>0922 893 8944</p></a>
										  </dd>
										</dl>
										<dl class="row border-bottom">
										  <dt class="col-6">Tawag aaglaum - Centro Bisaya</dt>
										  <dd class="col-6">
										  	<a class="text-info" href="tel:0939 937 5433"><p>0939 937 5433</p></a>
										  	<a class="text-info" href="tel:0927 654 1629"><p>0927 654 1629</p></a>
										  </dd>
										</dl>
										<dl class="row">
										  <dt class="col-6">The National Center for Mental Health Crisis</dt>
										  <dd class="col-6">
										  	<a class="text-info" href="tel:989-8727"><p>989-8727</p></a>
										  	<a class="text-info" href="tel:0917 899 8727"><p>0917 899 8727</p></a>
										  </dd>
										</dl>
				              		</small>
				              		<small><a data-toggle="modal" href="" data-target="#moreCountries" class="text-info d-flex justify-content-center text-decoration-none">Show Other Countries</a></small>
				              	</div>
				              </div>
		                </div>
		            </div>
		            </div>
		        </div>
			</div>
			<div id="f_wall">
			</div>
			<div id="t_wall">
			</div>
		</div>
		<div class="col-lg-4 d-none d-lg-block">
			<div class="row">
				<div class="col-12">
					<div class="card mx-1 my-3">
					  	<h5 class="card-header">
					  		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-fill-exclamation mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.553.553 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
							</svg> Hotlines For U
					  	</h5>
					  	<!-- Side Panel Hotline -->
					  	<small class="card-body">
					  		<p class="text-muted">Philippines</p>
							<dl class="row border-bottom mx-1">
							  <dt class="col-sm-6">Hopeline</dt>
							  <dd class="col-sm-6">
							  	<p>804-4673</p>
							  	<p>0917 558 4673</p>
							  </dd>
							</dl>
							<dl class="row border-bottom mx-1">
							  <dt class="col-sm-6">In Touch Community Services</dt>
							  <dd class="col-sm-6">
							  	<p>893-7603</p>
							  	<p>0917 800 1123</p>
							  	<p>0922 893 8944</p>
							  </dd>
							</dl>
							<dl class="row border-bottom mx-1">
							  <dt class="col-sm-6">Tawag Paglaum - Centro Bisaya</dt>
							  <dd class="col-sm-6">
							  	<p>0939 937 5433</p>
							  	<p>0927 654 1629</p>
							  </dd>
							</dl>
							<dl class="row border-bottom mx-1">
							  <dt class="col-sm-6">The National Center for Mental Health Crisis</dt>
							  <dd class="col-sm-6">
							  	<p>989-8727</p>
							  	<p>0917 899 8727</p>
							  </dd>
							</dl>
							<div class="collapse" id="countryhotlines">
							  	<p class="text-muted">South Korea</p>
								<dl class="row border-bottom mx-1">
								  <dt class="col-sm-6">Love-Line (Sarang - Jonwha) Counselling Centre</dt>
								  <dd class="col-sm-6">
								  	<p>715 8600</p>
								  	<p>716 8600 <i>(counsel24.com)</i></p>
								  	<p>717 8600</p>
								  	<p>718 8600</p>
								  </dd>
								</dl>
							  	<p class="text-muted">Thailand</p>
								<dl class="row border-bottom mx-1">
								  <dt class="col-sm-6">Samaritans of Thailand</dt>
								  <dd class="col-sm-6">
								  	<p>713-6793 <i>(geocites.com/samaritansthai)</i></p>
								  </dd>
								</dl>
							  	<p class="text-muted">Japan</p>
								<dl class="row border-bottom mx-1">
								  <dt class="col-sm-6">Befrienders International, Tokyo</dt>
								  <dd class="col-sm-6">
								  	<p>+81 (0)3 5286 9090</p>
								  </dd>
								</dl>
								<dl class="row border-bottom mx-1">
									<dt class="col-sm-6">BI Suicide Prevention Centre, Osaka</dt>
								  	<dd class="col-sm-6">
								  		<p>+81 (0)6 4395 4343 <i>(spc-osaka.org)</i></p>
								  	</dd>
								</dl>
								<dl class="row border-bottom mx-1">
								  <dt class="col-sm-6">Tokyo English Lifeline</dt>
								  <dd class="col-sm-6">
								  	<p>03 5774 0992 <i>(telljp.com)</i></p>
								  </dd>
								</dl>
							  	<p class="text-muted">Australia</p>
								<dl class="row border-bottom mx-1">
								  <dt class="col-sm-6">Lifeline Australia</dt>
								  <dd class="col-sm-6">
								  	<p>13 14 11 <i>(lifeline.org.au)</i></p>
								  </dd>
								</dl>
							</div>
					  	</small>
						<div class="card-footer border-0" style="padding: 0px 1.25rem !important">
		            		<div class="row bg-light">
		            			<div class="col-12 text-center">
		            				<small><a data-toggle="collapse" href="#countryhotlines" class="text-info  stretched-link text-decoration-none">Show Other Countries</a></small>
		            			</div>
		            		</div>
		            	</div>
					</div>
				</div>
			</div>
			<div id="footer-panel">
				<div class="row">
					<div class="col-12">
						<div class="card mx-1 my-3">
						  	<h5 class="card-header">
						  		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  	<path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
								  	<path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
								</svg> Most Read
						  	</h5>
						  	<div class="card-body">
								<small class="list-group list-group-flush" id="mr_wall">
									<div id="most_read">
										<div class="ph-item border-0">
								            <div class="ph-col-12">
								                <div class="ph-row">
								                    <div class="ph-col-6"></div>
								                    <div class="ph-col-4 empty"></div>
								                    <div class="ph-col-2"></div>
								                    <div class="ph-col-12 empty"></div>
								                    <div class="ph-col-6"></div>
								                    <div class="ph-col-4 empty"></div>
								                    <div class="ph-col-2"></div>
								                    <div class="ph-col-12 empty"></div>
								                    <div class="ph-col-6"></div>
								                    <div class="ph-col-4 empty"></div>
								                    <div class="ph-col-2"></div>
								                    <div class="ph-col-12 empty"></div>
								                    <div class="ph-col-6"></div>
								                    <div class="ph-col-4 empty"></div>
								                    <div class="ph-col-2"></div>
								                    <div class="ph-col-12 empty"></div>
								                    <div class="ph-col-6"></div>
								                    <div class="ph-col-4 empty"></div>
								                    <div class="ph-col-2"></div>
								                </div>
								            </div>
								        </div>
									</div>
								</small>
						  	</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<small class="d-flex justify-content-center text-muted">
							<a href="http://about.hereforu.com/hereforyou/cookies" target="_blank" class="text-muted mx-auto">Cookies</a>
							<a href="http://about.hereforu.com/hereforyou/privacy" target="_blank" class="text-muted mx-auto">Privacy</a>
							<a href="http://about.hereforu.com/hereforyou/policy" target="_blank" class="text-muted mx-auto">Policy</a>
							<a href="http://about.hereforu.com/hereforyou/terms" target="_blank" class="text-muted mx-auto">Terms</a>
							<a href="http://about.hereforu.com/hereforyou/developer" target="_blank" class="text-muted mx-auto">Developer</a>
							<a href="<?= base_url() ?>report" target="_blank" class="text-muted mx-auto">Report</a>
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
<!-- Modal -->
<div class="modal fade" id="moreCountries" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Other Countries</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <small class="modal-body">
        <p class="text-muted">South Korea</p>
		<dl class="row border-bottom mx-1">
		  <dt class="col-6">Love-Line (Sarang - Jonwha) Counselling Centre</dt>
		  <dd class="col-6">
		  	<a class="text-info" href="tel:715 8600"><p>715 8600</p></a>
		  	<a class="text-info" href="tel:716 8600"><p>716 8600 <i>(counsel24.com)</i></p></a>
		  	<a class="text-info" href="tel:717 8600"><p>717 8600</p></a>
		  	<a class="text-info" href="tel:718 8600"><p>718 8600</p></a>
		  </dd>
		</dl>
	  	<p class="text-muted">Thailand</p>
		<dl class="row border-bottom mx-1">
		  <dt class="col-6">Samaritans of Thailand</dt>
		  <dd class="col-6">
		  	<a class="text-info" href="tel:713-6793"><p>713-6793 <i>(geocites.com/samaritansthai)</i></p></a>
		  </dd>
		</dl>
	  	<p class="text-muted">Japan</p>
		<dl class="row border-bottom mx-1">
		  <dt class="col-6">Befrienders International, Tokyo</dt>
		  <dd class="col-6">
		  	<a class="text-info" href="tel:+81 (0)3 5286 9090"><p>+81 (0)3 5286 9090</p></a>
		  </dd>
		</dl>
		<dl class="row border-bottom mx-1">
			<dt class="col-6">BI Suicide Prevention Centre, Osaka</dt>
		  	<dd class="col-6">
		  		<a class="text-info" href="tel:+81 (0)6 4395 4343"><p>+81 (0)6 4395 4343 <i>(spc-osaka.org)</i></p></a>
		  	</dd>
		</dl>
		<dl class="row border-bottom mx-1">
		  <dt class="col-6">Tokyo English Lifeline</dt>
		  <dd class="col-6">
		  	<a class="text-info" href="tel:03 5774 0992"><p>03 5774 0992 <i>(telljp.com)</i></p></a>
		  </dd>
		</dl>
	  	<p class="text-muted">Australia</p>
		<dl class="row border-bottom mx-1">
		  <dt class="col-6">Lifeline Australia</dt>
		  <dd class="col-6">
		  	<a class="text-info" href="tel:13 14 11"><p>13 14 11 <i>(lifeline.org.au)</i></p></a>
		  </dd>
		</dl>
      </small>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('includes/footer'); ?>