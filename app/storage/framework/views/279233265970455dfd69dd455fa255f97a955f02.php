<?php
    /**
     * @var \App\Services\User\UserPage\UserPageResponse $response
     */
?>

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
            <li><?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
            <li><a href="<?php echo e(route('front.user.edit')); ?>">ユーザー情報編集</a> </li>
            <li><a href="<?php echo e(route('password.request')); ?>">パスワード変更</a> </li>
            <li><a href="<?php echo e(route('email.request')); ?>">メールアドレス変更</a> </li>
            <li><a href="<?php echo e(route('front.user.skill.form')); ?>">スキル編集</a></li>
            <li><a href="<?php echo e(route('front.user.delete.form')); ?>">退会</a></li>
        </ul>
    </nav>

    <div class="l-container--2col">
        <div class="l-sidebar u-dn-sp">
            <ul class="p-list <?php echo e($class ?? ''); ?>">
                <li class="c-text p-list__item--header">メニュー</li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('front.user.edit')); ?>">ユーザー情報編集</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('password.request')); ?>">パスワード変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('email.request')); ?>">メールアドレス変更</a>
                </li>
                <li class="p-list__item"><a class="c-text p-list__itemInner"
                                            href="<?php echo e(route('front.user.skill.form')); ?>">スキル編集</a></li>
                <li class="p-list__item"><a class="c-text p-list__itemInner"
                                            href="<?php echo e(route('front.user.delete.form')); ?>">退会</a></li>
            </ul>
        </div>
        <div class="l-main">
            <div class="p-mainItem">
                <p class="p-level2Heading">ユーザー退会</p>
                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="c-text--warning"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <p class="c-text">下記の内容をご確認の上、「退会する」ボタンを押してください。</p>
                <form action="<?php echo e(route('front.user.delete')); ?>" method="POST">
                    <?php echo e(@csrf_field()); ?>

                    <p class="c-text--warning c-text--bold c-text--center u-mt-30">退会後は登録内容の確認ができなくなり、<br class="u-dn-pc">取得したポイントは破棄されます。</p>
                    <div class="u-db u-m0a u-w-180px u-mt-30">
                        <label class="p-checkbox p-checkboxUnit__item u-db u-m0a">確認しました。
                            <input type="checkbox" name="withdraw-confirm" value="confirm"/>
                            <div class="p-checkbox__indicator"></div>
                        </label>
                    </div>
                    <button type="submit" class="c-button u-db u-m0a u-mt-20">退会する</button>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/mypage/delete/showDeleteForm.blade.php ENDPATH**/ ?>