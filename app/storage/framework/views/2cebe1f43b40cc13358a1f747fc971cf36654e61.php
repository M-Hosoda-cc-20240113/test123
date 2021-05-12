<?php
    /**
     * @var \App\Services\AdminProject\ProjectList\ProjectListResponse $response
     */
?>



<?php $__env->startSection('title', '案件一覧|Aegis'); ?>

<?php $__env->startSection('body'); ?>
    <?php $__env->startComponent('admin.header.header', ['href' => route('front.index')]); ?>
        <?php echo $__env->make('admin.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($__componentOriginal743254f7093212322e6076ebbae489b726151344)): ?>
<?php $component = $__componentOriginal743254f7093212322e6076ebbae489b726151344; ?>
<?php unset($__componentOriginal743254f7093212322e6076ebbae489b726151344); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <div class="l-container">
        <?php echo $__env->make('admin.bread_crumb._BreadCrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.pages.project.list._RegularTable', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo e($response->getProjects()->links('components.paginator')); ?>

    </div>

    <?php echo $__env->make('admin.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/admin/pages/project/list/list.blade.php ENDPATH**/ ?>