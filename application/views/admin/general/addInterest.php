<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Interest</h2>
                <div class="breadcrumb-wrapper">
               
                </div>
            </div>
        </div>
    </div>
    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="task.php"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="chat.php"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="email.php"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="calendar.php"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
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
                        <form id="jquery-val-form" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-name">Interest Name</label>
                                <input type="text" value="<?php echo isset($interest['intrestCategoryTitle'])?$interest['intrestCategoryTitle']:""; ?>" class="form-control" id="basic-default-name" name="intrestCategoryTitle" placeholder="Put Your Interest Name" />
                            </div>
                            <div class="form-group">
                                <label>Interest Images</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="interestImage" />
                                    <label class="custom-file-label" for="customFile">Choose Interest Images</label>
                                </div>
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