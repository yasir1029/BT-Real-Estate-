<?php include_once('header.php')?>

<section id="slider-area">
    <div class="slider-active-wrap owl-carousel text-center text-md-left">
        <!-- Single Slide Item Start -->
        <div class="single-slide-wrap slide-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-content">
                            <h2>We Are Proud</h2>
                            <h3>Students of <span>Karachi University</span></h3>
                            <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need (academic, relocation, career, projects, mentorship, etc. you can ask the community and get responses in three.</p>
                            <div class="slider-btn">
                                <a href="#about-area" class="btn btn-brand smooth-scroll">our mission</a>
                                <a href="about.html" class="btn btn-brand-rev">our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slide Item End -->

        <!-- Single Slide Item Start -->
        <div class="single-slide-wrap slide-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-content">
                            <h2>We Are Not Proud</h2>
                            <h3>Students of <span>Karachi University</span></h3>
                            <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need (academic, relocation, career, projects, mentorship, etc. you can ask the community and get responses in three.</p>
                            <div class="slider-btn">
                                <a href="#" class="btn btn-brand">our mission</a>
                                <a href="#" class="btn btn-brand-rev">our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slide Item End -->
        <!-- Single Slide Item Start -->
        <div class="single-slide-wrap slide-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-content">
                            <h2>We Are Not Proud</h2>
                            <h3>Students of <span>Karachi University</span></h3>
                            <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need (academic, relocation, career, projects, mentorship, etc. you can ask the community and get responses in three.</p>
                            <div class="slider-btn">
                                <a href="#" class="btn btn-brand">our mission</a>
                                <a href="#" class="btn btn-brand-rev">our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slide Item End -->

        <!-- Single Slide Item Start -->
        <div class="single-slide-wrap slide-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="slider-content">
                            <h2>Why Proud for u</h2>
                            <h3>Students of <span>Karachi University</span></h3>
                            <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the need (academic, relocation, career, projects, mentorship, etc. you can ask the community and get responses in three.</p>
                            <div class="slider-btn">
                                <a href="#" class="btn btn-brand">our mission</a>
                                <a href="#" class="btn btn-brand-rev">our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slide Item End -->
    </div>

    <!-- Social Icons Area Start -->
    <div class="social-networks-icon">
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i> <span>7.2k Likes</span></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i> <span>3.2m Followers</span></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i> <span>7.2k Likes</span></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i> <span>2.2k Subscribers</span></a></li>
        </ul>
    </div>
    <!-- Social Icons Area End -->
</section>
<!--== Slider Area End ==-->

    <!--== Upcoming Event Area Start ==-->
<section id="upcoming-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="upcoming-event-wrap">
                    <div class="up-event-titile">
                        <h3>Upcoming event</h3>
                    </div>
                    <div class="upcoming-event-content owl-carousel">
                        <!-- No 1 Event -->
                        <?php  
                        foreach ($events as $event):
                        $date = date('j F, Y', strtotime($event->e_date));
                        $event_date = date("Y/m/d", strtotime($event->e_date));
                        ?>
                        <div class="single-upcoming-event">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="up-event-thumb">
                                        <?php
                                        if (! is_null($event->e_image)):
                                        ?>
                                        <img src="<?= $event->e_image ?>" class="img-fluid" alt="Upcoming Event">
                                        <?php endif;?>
                                        <h4 class="up-event-date"><?= "It's on ".$date ?></h4>
                                    </div>
                                </div>

                                <div class="col-lg-7">
                                    <div class="display-table">
                                        <div class="display-table-cell">
                                            <div class="up-event-text">
                                                <div class="event-countdown">
                                                    <div class="event-countdown-counter" data-date=<?= $event_date ?>>></div>
                                                    <p>Remaining</p>
                                                </div>
                                                <h3><?php echo anchor("home/user_single_event/{$event->id}",$event->e_name) ?>
                                                </h3>
                                                <p class="max-lines"><?= $event->e_desc ?></p>
                                                <a <?php echo anchor("home/user_single_event/{$event->id}",'join with us',['class'=>'btn btn-brand btn-brand-dark'])?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <!-- partial -->                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="about-area" class="section-padding">
    <div class="about-area-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ml-auto">
                    <div class="about-content-wrap">
                        <div class="section-title text-center text-lg-left">
                            <h2>Our Misssion</h2>
                        </div>

                        <div class="about-thumb">
                            <img src="assets/img/about-bg.jpg" alt="" class="img-fluid">
                        </div>

                        <p>The Institute aspires for the leadership role in pursuit of excellence in engineering, sciences and technology.</p>
                        <p>The Institute is to provide excellent teaching and research environment to produce graduates who distinguish themselves by their professional competence, research, entrepreneurship, humanistic outlook, ethical rectitude, pragmatic approach to problem solving, managerial skills and ability to respond to the challenge of socio-economic development to serve as the vanguard of techno-industrial transformation of the society.</p>
                        <a href="about.html" class="btn btn-brand about-btn">know more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!--== Job Opportunity Area Start ==-->
 <section id="job-opportunity" class="section-padding">
    <div class="container">
        <!--== Section Title Start ==-->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Recent Jobs</h2>
                </div>
            </div>
        </div>
        <!--== Section Title End ==-->

        <!--== Job opportunity Wrapper ==-->
        <div class="job-opportunity-wrapper">
            <div class="row">
                <!--== Single Job opportunity Start ==-->
                <?php
                foreach ($jobs as $job):
                        $date_j = date('j F, Y', strtotime($job->j_date_posted));
                        $job_date = date("Y/m/d", strtotime($job->j_date_posted));
                ?>
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

                
                <!--== Single Job opportunity End ==-->
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                <?= anchor('home/open_jobs','All Jobs list',['class'=>'btn btn-brand btn-loadmore']);?>                    
                </div>
            </div>
        </div>
        <!--== Job opportunity Wrapper ==-->
    </div>
</section>
<!--== Job Opportunity Area End ==-->
<!--== Gallery Area Start ==-->
<section id="gallery-area" class="section-padding">
    <div class="container">
        <!--== Section Title Start ==-->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Our gallery</h2>
                </div>
            </div>
        </div>
        <!--== Section Title End ==-->

        <!--== Gallery Container Warpper ==-->
        <div class="gallery-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Gallery Menu Start -->
                    <div class="gallery-menu text-center">
                        <span class="active" data-filter="*">All</span>
                        <span data-filter=".old">Old Memories</span>
                        <span data-filter=".event">Event</span>
                        <span data-filter=".pic">Our Picnic</span>
                        <span class="d-none d-sm-inline-block" data-filter=".recent">Recent</span>
                    </div>
                    <!-- Gallery Menu End -->

                    <!-- Gallery Item content Start -->
                        <div class="row gallery-gird">
    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 recent event">
        <div class="single-gallery-item gallery-bg-1">
            <div class="gallery-hvr-wrap">
                <div class="gallery-hvr-text">
                    <h4>University Cumpus</h4>
                    <p class="gallery-event-date">28 Oct, 2018</p>
                </div>
                <a href="assets/img/gallery/gellary-img-1.jpg" class="btn-zoom image-popup">
                    <img src="assets/img/zoom-icon.png" alt="a">
                </a>
            </div>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 old event pic">
        <div class="single-gallery-item video gallery-bg-2">
            <a href="https://player.vimeo.com/video/140182080?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1"
               class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 recent pic">
        <div class="single-gallery-item gallery-bg-3">
            <div class="gallery-hvr-wrap">
                <div class="gallery-hvr-text">
                    <h4>University Cumpus</h4>
                    <p class="gallery-event-date">28 Oct, 2018</p>
                </div>
                <a href="assets/img/gallery/gellary-img-3.jpg" class="btn-zoom image-popup">
                    <img src="assets/img/zoom-icon.png" alt="a">
                </a>
            </div>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 old">
        <div class="single-gallery-item gallery-bg-4">
            <div class="gallery-hvr-wrap">
                <div class="gallery-hvr-text">
                    <h4>University Cumpus</h4>
                    <p class="gallery-event-date">28 Oct, 2018</p>
                </div>
                <a href="assets/img/gallery/gellary-img-4.jpg" class="btn-zoom image-popup">
                    <img src="assets/img/zoom-icon.png" alt="a">
                </a>
            </div>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 pic event">
        <div class="single-gallery-item gallery-bg-5">
            <div class="gallery-hvr-wrap">
                <div class="gallery-hvr-text">
                    <h4>University Cumpus</h4>
                    <p class="gallery-event-date">28 Oct, 2018</p>
                </div>
                <a href="assets/img/gallery/gellary-img-5.jpg" class="btn-zoom image-popup">
                    <img src="assets/img/zoom-icon.png" alt="a">
                </a>
            </div>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 old recent">
        <div class="single-gallery-item gallery-bg-6">
            <div class="gallery-hvr-wrap">
                <div class="gallery-hvr-text">
                    <h4>University Cumpus</h4>
                    <p class="gallery-event-date">28 Oct, 2018</p>
                </div>
                <a href="assets/img/gallery/gellary-img-6.jpg" class="btn-zoom image-popup">
                    <img src="assets/img/zoom-icon.png" alt="a">
                </a>
            </div>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 pic">
        <div class="single-gallery-item video gallery-bg-7">
            <a href="https://player.vimeo.com/video/181545195?title=0&amp;portrait=0&amp;byline=0&amp;autoplay=1&amp;loop=1"
               class="btn btn-video-play video-popup"><i class="fa fa-play"></i></a>
        </div>
    </div>
    <!-- Single Gallery End -->

    <!-- Single Gallery Start -->
    <div class="col-lg-3  col-sm-6 pic recent old">
        <div class="single-gallery-item gallery-bg-8">
            <div class="gallery-hvr-wrap">
                <div class="gallery-hvr-text">
                    <h4>University Cumpus</h4>
                    <p class="gallery-event-date">28 Oct, 2018</p>
                </div>
                <a href="assets/img/gallery/gellary-img-8.jpg" class="btn-zoom image-popup">
                    <img src="assets/img/zoom-icon.png" alt="a">
                </a>
            </div>
        </div>
    </div>
    <!-- Single Gallery End -->
</div>
                    <!-- Gallery Item content End -->
                </div>
            </div>
        </div>
        <!--== Gallery Container Warpper==-->
    </div>
</section>
<!--== Gallery Area Start ==-->



<?php include_once('footer.php')?>