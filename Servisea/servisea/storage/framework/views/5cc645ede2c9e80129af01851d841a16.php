<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo e(asset('backend/USER_ASSET/assets/img/apple-icon.png')); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('backend/USER_ASSET/assets/img/favicon.ico')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('backend/USER_ASSET/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/USER_ASSET/assets/css/templatemo.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('backend/USER_ASSET/assets/css/custom.css')); ?>">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="<?php echo e(asset('backend/USER_ASSET/assets/css/fontawesome.min.css')); ?>">

    <?php echo $__env->yieldContent('style'); ?>

</head>

<body>

    <?php echo $__env->make('user.body.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php echo $__env->yieldContent('user-main-content'); ?>

    <?php echo $__env->make('user.body.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <!-- Start Script -->
    <script src="<?php echo e(asset('backend/USER_ASSET/assets/js/jquery-1.11.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/USER_ASSET/assets/js/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/USER_ASSET/assets/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/USER_ASSET/assets/js/templatemo.js')); ?>"></script>
    <script src="<?php echo e(asset('backend/USER_ASSET/assets/js/custom.js')); ?>"></script>
    <!-- End Script -->
</body>

</html>
<?php /**PATH C:\xampp\htdocs\Servisea\servisea\resources\views/user/user_master.blade.php ENDPATH**/ ?>