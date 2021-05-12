<?php $__env->startSection('title', 'ログイン画面|Aegis'); ?>

<?php $__env->startSection('body'); ?>
    <?php $__env->startComponent('front.header.header', ['href' => route('front.index')]); ?>
        <?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($__componentOriginalbce12c1fbdf99649dac1a138090d2c42bb3e3e62)): ?>
<?php $component = $__componentOriginalbce12c1fbdf99649dac1a138090d2c42bb3e3e62; ?>
<?php unset($__componentOriginalbce12c1fbdf99649dac1a138090d2c42bb3e3e62); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

    <nav class="p-drawerContents">
        <ul>
            <li class="u-mt-10"><?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
        </ul>
    </nav>

    <div class="l-container">
        <div class="l-main">
            <img class="u-m0a u-w-30-pc u-mt-60" src="<?php echo e(asset('images/logo/aegis.svg')); ?>" alt="">
            <p class="c-text--center u-mt-20">ログイン画面</p>
            <form action="<?php echo e(route('login')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="c-text--warning u-w-40-pc u-m0a"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="p-iconInput u-mt-30 u-w-40-pc u-m0a">
                    <img src="<?php echo e(asset('images/icons/icon_lock.png')); ?>">
                    <input name="email" type="text" placeholder="example.email.com">
                </div>

                <div class="p-iconInput u-mt-20 u-w-40-pc u-m0a">
                    <img src="<?php echo e(asset('images/icons/icon_mail.png')); ?>">
                    <input name="password" type="password" placeholder="パスワードを入力">
                </div>
                <p class="c-text--muted u-w-40-pc u-m0a u-mt-5">半角英数字8文字以上</p>
                <div class="u-w-40-pc u-m0a u-mt-20">
                    <label class="p-checkbox"><span class="c-text--muted u-fs-14">ログイン状態を保持する</span>
                        <input value="" name="remember" type="checkbox">
                        <div class="p-checkbox__indicator"></div>
                    </label>
                </div>
                <button type="submit" class="c-button u-w-40-pc u-db u-m0a u-mt-20">ログイン</button>
                <div class="u-mt-20 u-m0a u-w-40-pc u-border-top u-pt-20">
                    <a class="c-text--primary u-mr-20" href="">パスワードを忘れた方</a>
                    <a class="c-text--primary" href="">ユーザー登録</a>
                </div>
            </form>
        </div>
    </div>

    <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/login/login.blade.php ENDPATH**/ ?>