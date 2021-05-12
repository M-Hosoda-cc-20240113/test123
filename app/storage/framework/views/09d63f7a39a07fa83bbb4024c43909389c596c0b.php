<?php
    /**
     * @var \App\Services\Application\ApplicationList\ApplicationListResponse $response
     */
?>



<?php $__env->startSection('title', '応募状況一覧|Aegis'); ?>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('admin.header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="l-container">
        <?php echo $__env->make('admin.bread_crumb._BreadCrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.pages.application.list._ApplicationTable', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo e($response->getApplications()->links('components.paginator')); ?>

    </div>
    <?php echo $__env->make('admin.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/admin/pages/application/list/list.blade.php ENDPATH**/ ?>