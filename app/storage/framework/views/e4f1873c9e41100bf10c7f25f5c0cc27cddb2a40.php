<?php $__env->startSection('title', 'トップページ|Aegis'); ?>

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
            <?php if(auth()->guard()->check()): ?>
            <li><a href="<?php echo e(route('front.user.edit')); ?>">ユーザー情報編集</a> </li>
            <li><a href="<?php echo e(route('password.request')); ?>">パスワード変更</a> </li>
            <li><a href="<?php echo e(route('email.request')); ?>">メールアドレス変更</a> </li>
            <li><a href="<?php echo e(route('front.user.skill.form')); ?>">スキル編集</a></li>
            <li><a href="<?php echo e(route('front.user.delete.form')); ?>">退会</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="l-container--2col <?php if(auth()->guard()->guest()): ?> u-jc-center <?php endif; ?>">
        <?php if(auth()->guard()->check()): ?>
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
        <?php endif; ?>
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">メールアドレス変更</h2>
                <p class="c-text u-mt-20">変更したいメールアドレスへ再設定の案内を送ります。</p>
                <form action="<?php echo e(route('email.sendEmail')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input class="c-input--light" type="email" placeholder="メールアドレス入力欄" name="email">
                    <button type="submit" class="c-button u-mt-20">案内メールを送信</button>
                </form>
            </div>
        </div>
    </div>

    <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/email/change_request.blade.php ENDPATH**/ ?>