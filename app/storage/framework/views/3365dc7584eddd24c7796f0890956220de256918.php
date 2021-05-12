<header class="Header">
    <div class="Header__loginWrap">
        <a href="<?php echo e(route('front.index')); ?>" class="Header__textLink mr-a">
            <img src="<?php echo e(asset('images/logo/aegis.svg')); ?>" alt="aegisのロゴ" class="w-40">
        </a>
        <?php echo e($slot ?? ''); ?>

    </div>
</header>
<?php /**PATH /aegis/resources/views/admin/header/header.blade.php ENDPATH**/ ?>