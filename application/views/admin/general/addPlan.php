<div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Plan</h2>
   
                        </div>
                    </div>
                </div>
          
            </div>
            <div class="content-body">
                <!-- Validation -->
                <section class="bs-validation">
                    <div class="row">
                        
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"></h4>
                                </div>
                                <div class="card-body">
                                    <form id="jquery-val-form" method="post">
                                        <div class="form-group">
                                            <label class="form-label" for="basic-default-name">Plan Name</label>
                                            <input type="text" class="form-control" id="basic-default-name" value="<?php echo isset($plan['planName'])?$plan['planName']:""; ?>" name="planName" placeholder="Put your plan name" />
                                           <small class="text-danger"> <?php echo form_error("planName") ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="select-country1">Plan type</label>
                                            <select class="form-control" id="select-country1" name="planType" required>
                                                <option  value="">--select--</option>
                                                <option <?php echo (isset($plan['planType']) &&  $plan['planType']==1)?"selected":""; ?> value="1">User</option>
                                                <option <?php echo (isset($plan['planType']) && $plan['planType']==2)?"selected":""; ?> value="2">Business</option>
                                              
                                            </select>
                                           <small class="text-danger"> <?php echo form_error("planType") ?></small>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-default-name">Plan Price</label>
                                            <input type="text" class="form-control"  value="<?php echo isset($plan['planPrice'])?$plan['planPrice']:""; ?>" id="basic-default-name" name="planPrice" placeholder="Put plan Price $" />
                                            <small class="text-danger"> <?php echo form_error("planPrice") ?></small>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /jQuery Validation -->
                    </div>
                </section>
                <!-- /Validation -->

            </div>