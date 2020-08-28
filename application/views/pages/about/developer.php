<?php $this->load->view('includes/about/header'); ?>
<?php $this->load->view('includes/about/nav'); ?>
<section class="jumbotron jumbotron-fluid bg-white">
  <div class="container">
    <h1 class="display-3 font-weight-normal">Developer</h1>
  </div>
</section>
<div class="bg-light py-3">
    <div class="container py-3">
      <h3 class="mb-3">About Me</h3>
      <div class="row d-flex align-items-center">
        <div class="col-lg-8 text-justify">
          <p class="lead">Been into full-stack development of numerous web applications using php and js, released three(3) cross platformed mobile applications using flutter and an experienced team leader and council member.</p>
          <p class="lead">In a span for 3 years, I was a Director of Media Arts in Videography, Motion and Still Graphics Director and took up Leadership Training Seminar. I am skillful in many still graphic and video design development applications. In 2019, I was a Software-Developer Intern in HATCHIT SOLUTIONS for 5 months. Aside from my experiences from school and work, I also participated in numerous national and regional dance competitions and represented our country, Philippines. </p>
          <div class="form-inline float-right">
            <a class="text-dark mx-2" href=""><i class="fa fa-facebook fa-lg"></i></a>
            <a class="text-dark mx-2" href=""><i class="fa fa-twitter fa-lg"></i></a>
            <a class="text-dark mx-2" href=""><i class="fa fa-instagram fa-lg"></i></a>
          </div>
        </div>
        <div class="col-lg-4">
          <img src="<?= base_url() ?>assets/img/me.jpg" class="img-fluid">
        </div>
      </div>
    </div>
</div>


<?php $this->load->view('includes/about/footer'); ?>