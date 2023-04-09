<?php $__env->startSection('admin-main-content'); ?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Table</a></li>
                                    <li class="active">Data table</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $gigcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i->CATEGORY_ID); ?></td>
                                            <td><?php echo e($i->CATEGORY_NAME); ?></td>
                                            <td><?php echo e($i->CATEGORY_DESCRIPTION); ?></td>
                                            <td>
                                            <form action="<?php echo e(route('editCategory')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                                <input class="form-control" name="category_ID" value="<?php echo e($i->CATEGORY_ID); ?>" hidden>
                                                <button type="submit">Edit</button>
                                            </form>
                                            </td>
                                            <td>
                                            <form action="" method="get">
                                            <input class="form-control" name="category_ID" value="<?php echo e($i->CATEGORY_ID); ?>" hidden>

                                            <button type="submit" value="<?php echo e($i->CATEGORY_ID); ?>">Delete</button>
                                            </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Insert Category</div>
                        <div class="card-body card-block">
                            <form id="categoryFormCrud" action="<?php echo e(route('insertCategory')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <div class="input-group">

                                        <div class="input-group-addon">CATEGORY ID</div>
                                        <input class="form-control" value="<?php echo e($test); ?>" disabled>
                                        <!--<div class="input-group-addon"><i class="fa fa-user"></i></div>-->

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">CATEGORY NAME</div>
                                        <input class="form-control">
                                        <!--<div class="input-group-addon"><i class="fa fa-envelope"></i></div>-->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">CATEGORY DESCRIPTION</div>
                                        <input class="form-control">
                                        <!--<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>-->
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">Insert</button>
                                    <button type="submit" style="display:none;" class="btn btn-primary btn-sm">Update</button>
                                    <button type="submit" style="display:none;" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

    </div><!-- /#right-panel -->
    <?php $__env->stopSection(); ?>
    <!-- Right Panel -->

    <!-- Scripts -->

    <?php $__env->startSection('admin-script'); ?>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/lib/data-table/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/ADMIN_ASSET/assets/js/init/datatables-init.js')); ?>"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        });

        function chgAction()
        {
            document.getElementById("categoryFormCrud").action = "<?php echo e(route('updateCategory')); ?>";
        }

    </script>
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Servisea\servisea\resources\views/admin/gig.blade.php ENDPATH**/ ?>