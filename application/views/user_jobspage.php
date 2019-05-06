<?php include_once('header.php')?>
  <body>
  
  <!--== Page Title Area Start ==-->
    <section id="page-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">
                    <div class="page-title-content">
                        <h1 class="h2">Job Opportunity</h1>
                        <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need</p>
                        <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Page Title Area End ==-->

    <!--== Single Album Page Content Start ==-->
    <section id="page-content-wrap">
        <div class="career-page-wrapper">
            <div class="career-page-topbg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <img src="<?php echo base_url('assets/img/careerbg.png');?>" class="img-fluid" alt="career">
                        </div>
                    </div>
                </div>
            </div>

            <div class="career-page-content-wrap section-padding">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="event-filter-area">
                                <form action="https://codeboxr.net/themedemo/unialumni/html/index.html" class="form-inline">
                                    <select name="cat" id="year">
                                        <option selected>Categories</option>
                                        <option>2018</option>
                                        <option>2017</option>
                                        <option>2016</option>
                                        <option>2015</option>
                                        <option>2014</option>
                                    </select>

                                    <select name="place" id="place">
                                        <option selected>Place</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Colorado</option>
                                        <option>Delaware</option>
                                    </select>

                                    <select name="type" id="type">
                                        <option selected>Type</option>
                                        <option>Meetup</option>
                                        <option>Seminar</option>
                                        <option>Get Together</option>
                                    </select>

                                    <button class="btn btn-brand">Filter</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="job-opportunity-wrapper">
                        <div class="row">
                        <?php  
                              
                              foreach ($jobs as $job):
                                $date_j = date('j F, Y', strtotime($job->j_date_posted));
                                $job_date = date("Y/m/d", strtotime($job->j_date_posted));  
                            ?>
                            <!--== Single Job opportunity Start ==-->
                            <div class="col-lg-4 col-sm-6 text-center">
                                <div class="single-job-opportunity">
                                    <div class="job-opportunity-text">
                                        <div class="job-oppor-logo">
                                            <div class="display-table">
                                                <div class="display-table-cell">
                                                      <?php
                                                      if (! is_null($job->j_image)):
                                                      ?>
                                                     <img src="<?= $job->j_image ?>" class="img-fluid" alt="Upcoming Event">
                                                     <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <h3><a href="#"><?= $job->j_name ?></a></h3>
                                        <p class="max-lines"><?= $job->j_desc ?><a href="#">[...]</a></p>
                                    </div>
                                    <a href="#" class="btn btn-job"><?= $job->j_status ?></a>
                                    <div class="alert alert-dismissible alert-info">
                                    <strong>Posted on : <?= $job_date ?> </strong> 
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <!--== Single Job opportunity End ==-->
                        </div>

                        <!-- Pagination Start -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="pagination-wrap text-center">
                                    <nav>
                                        <ul class="pagination">
                                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                                            <li class="page-item"><a class="page-link" href="#">50</a></li>
                                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Pagination End -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== Single Album Page Content End ==-->
    <?php include_once('footer.php')?>
 