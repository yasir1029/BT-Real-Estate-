<?php include_once('header.php')?>
<link href="<?php echo base_url('assets/vendor/admin_bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

<!--== Page Title Area Start ==-->
<section id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto text-center">
                <div class="page-title-content">
                    <h1 class="h2">All Event Archive</h1>
                    <p>Alumni Needs enables you to harness the power of your alumni network. Whatever may be the
                        need</p>
                    <a href="#page-content-wrap" class="btn btn-brand smooth-scroll">Let's See</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Page Title Area End ==-->

<!--== Gallery Page Content Start ==-->
<section id="page-content-wrap">
    <div class="event-page-content-wrap section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="event-filter-area">
                        <form action="https://codeboxr.net/themedemo/unialumni/html/index.html" class="form-inline">
                            <select name="year" id="year">
                                <option selected>Year</option>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="all-event-list">
                        <!-- Single Event Start -->
                        <?php  
                        if (count($events)):
                        $count = $this->uri->segment(3,0);
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
                                                    <div class="event-countdown-counter" data-date=<?= $event_date ?>></div>
                                                    <p>Remaining</p>
                                                </div>
                                                <h3><?php echo anchor("home/user_single_event/{$event->id}","#".++$count."  ".$event->e_name) ?>
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
                        <?php else:  ?>
                                       <tr>
                                           <td colspan="5">No record found </td>
                                       </tr>
                        <?php endif;?>
                        <?php echo $this->pagination->create_links(); ?>
                        <!-- Single Event End -->
            <!-- Pagination End -->            
        </div>
    </div>
</section>
<!--== Gallery Page Content End ==-->
<?php include_once('footer.php')?>
