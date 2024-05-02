<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Interests Subcategories</h2>
                <div class="breadcrumb-wrapper">

                </div>
            </div>
        </div>
    </div>

</div>

<!-- Table Hover Animation start -->
<div class="row" id="table-hover-animation">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Subcategories</h4>
            </div>
            <div class="card-body">
                <p class="card-text">
                    User And Business Interests of happiverse
                </p>
            </div>
            <div class="table-responsive">
                <table class="table table-hover-animation makedatatable">
                    <thead>
                        <tr>
                            <th>Sub Interest</th>
                            <th>Interest</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($interests as $list) { ?>
                            <tr>
                                <td>
                                   <?php echo $list['interestSubCategoryTitle']; ?>
                                </td>
                                <td> <?php echo $list['intrestCategoryTitle'] ?></td>
                                <td><span class="badge badge-pill badge-light-<?php echo ($list['isActive'] == 1) ? "success" : ""; ?> mr-1"><?php echo ($list['isActive'] == 1) ? "Active" : "Inactive"; ?> </span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url('admin/General/AddSubInterest/' . $list['interestSubCategoryId']); ?>">
                                                <i data-feather="edit-2" class="mr-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form method="post" id="<?php echo $list['interestSubCategoryId'] ?>" action="<?php echo base_url('admin/Delete/deleteRealData'); ?>">
                                                <input type="hidden" name="table" value="mstintrestsubcategory">
                                                <input type="hidden" name="columnName" value="interestSubCategoryId">
                                                <input type="hidden" name="userId" value="<?php echo $list['interestSubCategoryId'] ?>">
                                                <input type="hidden" name="pageUrl" value="admin/General/subInterest">
                                                <a onclick="deletedatamultiple('<?php echo $list['interestSubCategoryId'] ?>')">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>