<?php
/**
 * @var \App\Services\AdminProject\ProjectDetail\ProjectDetailResponse $response
 */
?>


<?php $__env->startSection('title', '案件詳細|Aegis'); ?>

<?php $__env->startSection('body'); ?>
    <?php $__env->startComponent('admin.header.header', ['href' => route('front.index')]); ?>
        <?php echo $__env->make('admin.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($__componentOriginal743254f7093212322e6076ebbae489b726151344)): ?>
<?php $component = $__componentOriginal743254f7093212322e6076ebbae489b726151344; ?>
<?php unset($__componentOriginal743254f7093212322e6076ebbae489b726151344); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <div class="l-container">
        <div class="l-main">
            <?php echo $__env->make('admin.bread_crumb._BreadCrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="p-mainItem">
                <h2 class="p-level2Heading"><?php echo e($response->getProject()->name ?? ''); ?><?php echo e($response->getProject()->decided ? '※応募終了' : ''); ?></h2>
                <?php echo $__env->make('admin.pages.project.detail._ProjectDetailTable', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <a class="c-button u-db u-m0a u-w-15-pc u-mt-30" href="<?php echo e(route('project.edit.form', ['project_id' => $response->getProject()->id])); ?>">編集</a>
                

                <form action="<?php echo e(route('project.toggle')); ?>" method="POST">
                    <?php echo e(@csrf_field()); ?>

                    <input type="hidden" name="project_id" value="<?php echo e($response->getProject()->id); ?>">
                    <button type="submit" class="c-button u-db u-m0a u-w-15-pc u-mt-10"><?php echo e($response->getProject()->decided ? '応募開始' : '応募終了'); ?></button>
                </form>
                

                <form action="<?php echo e(route('project.delete')); ?>" method="POST">
                    <?php echo e(@csrf_field()); ?>

                    <input type="hidden" name="project_id" value="<?php echo e($response->getProject()->id); ?>">
                    <button type="submit" class="c-button--warning u-db u-m0a u-w-15-pc u-mt-10" id="alert_button">削除</button>
                </form>
                
            </div>
        </div>
    </div>
    <?php echo $__env->make('admin.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/admin/pages/project/detail/detail.blade.php ENDPATH**/ ?>