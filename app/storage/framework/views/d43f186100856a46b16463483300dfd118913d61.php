<?php $__env->startSection('title', '案件詳細|Aegis'); ?>
<?php $__env->startSection('body'); ?>
    <?php $__env->startComponent('front.header.header', ['href' => route('front.index')]); ?>
        <?php echo $__env->make('front.header._link_mypage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($__componentOriginalbce12c1fbdf99649dac1a138090d2c42bb3e3e62)): ?>
<?php $component = $__componentOriginalbce12c1fbdf99649dac1a138090d2c42bb3e3e62; ?>
<?php unset($__componentOriginalbce12c1fbdf99649dac1a138090d2c42bb3e3e62); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

    <nav class="p-drawerContents">
        <ul>
            <li><?php echo $__env->make('front.header._link_mypage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
            <li class="u-mt-10"><?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
        </ul>
    </nav>

    <div class="l-container">
        <div class="l-main">
            <?php if(Auth::check()): ?>
                <form class="" action="<?php echo e(route('front.project.app')); ?>"
                      method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="p-mainItem">
                        <h2 class="p-level2Heading"><?php echo e($response->getProject()->name ?? ''); ?></h2>
                        <input type="hidden" name="project_id" value=<?php echo e($response->getProject()->id); ?>>
                        <?php echo $__env->make('front.pages.project.detail._ProjectDetailTable', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php if(Auth::getUser()->is_apply($response->getProject()->id)): ?>
                            <p class="mt-20 ta-center fs-12">※応募済みです。担当営業からの連絡をお待ちください。</p>
                        <?php elseif(Auth::getUser()->is_assign($response->getProject()->id)): ?>
                            <p class="mt-20 ta-center fs-12">※稼働中です。ご連絡は担当営業にお願いいたします。</p>
                        <?php else: ?>
                            <button class="c-button u-db u-w-30-pc u-m0a u-mt-20" type="submit">応募する</button>
                            <p class="c-text--center u-mt-20">※クリックで応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
                        <?php endif; ?>
                    </div>
                </form>
            <?php else: ?>
                <div class="p-mainItem">
                    <p class="p-level2Heading"><?php echo e($response->getProject()->name ?? ''); ?></p>
                    <?php echo $__env->make('front.pages.project.detail._ProjectDetailTable', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <a href="<?php echo e(route('register', ['project_id' => $response->getProject()] )); ?>"
                       class="c-button u-db u-m0a u-mt-30 u-w-30-pc">新規登録して応募する</a>
                    <p class="mt-20 ta-center fs-12">※新規登録で応募が完了します。担当営業が2営業日以内に電話で連絡いたします。</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/project/detail/detail.blade.php ENDPATH**/ ?>