<?php include_once('header.php')?>
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2"><?= $event->e_name ?></h1>
                    <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the
                        need</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->
<?php
$date = date('j F, Y', strtotime($event->e_date));
$event_date = date("Y/m/d", strtotime($event->e_date));
?>
<!--== Gallery Page Content Start ==-->
<section id="page-content-wrap">
    <div class="single-event-page-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-event-details">
                        <div class="event-thumbnails">
                            <div class="event-thumbnail-carousel owl-carousel">
                                <div class="event-thumb-item event-thumb">
                                        <?php
                                        if (! is_null($event->e_image)):
                                        ?>
                                        <img src="<?= $event->e_image ?>" class="img-fluid" alt="Upcoming Event">
                                        <?php endif;?>
                                    <div class="event-meta">
                                        <h3><?= $event->e_name ?></h3>
                                        <a class="event-address" href="#"><i class="fa fa-map-marker"></i><?= $event->e_venue ?></a>                                    </div>
                                </div>
                            </div>
                            <div class="event-countdown">
                                <div class="event-countdown-counter" data-date=<?= $event_date ?>></div>
                                <p>Remaining</p>
                            </div>
                        </div>
                        <h2>Details all Thing About This Event</h2>
                        <p><?= $event->e_name?></p>

                        <p><?= $event->e_desc ?></p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->
<?php include_once('footer.php')?>