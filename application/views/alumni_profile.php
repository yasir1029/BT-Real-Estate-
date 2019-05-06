<?php include_once('header.php') ?>


<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="thumbnail">
                            <?php if(!is_null($data['0']->a_image)): ?>
                            <img class="img-circle" width="300" height="200"  src="<?= $data['0']->a_image?>" alt=""/>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <br><br><br>
                <div class="row">
                    <div class="col-sm-8 text-center">
                    <label>Name</label>
                    </div>
                    <div class="col-sm-4 text-left">
                    <p><?= $data['0']->a_name ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 text-center">
                    <label>Email</label>
                    </div>
                    <div class="col-sm-4 text-left">
                    <p><?= $data['0']->a_email ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 text-center">
                    <label>Passing Year</label>
                    </div>
                    <div class="col-sm-4 text-left">
                    <p><?= $data['0']->a_passing_year?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 text-center">
                    <label>Department Name</label>
                    </div>
                    <div class="col-sm-4 text-left">
                    <p><?= $data['0']->a_department_name?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8 text-center">
                    <label>Student Id</label>
                    </div>
                    <div class="col-sm-4 text-left">
                    <p><?= $data['0']->a_student_id?></p>
                    </div>
                </div>
                                        
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
 </div>                                





<?php include_once('footer.php') ?>