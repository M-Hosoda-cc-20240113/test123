<?php if(auth()->guard()->check()): ?>
  <a class="p-header__textLink" href="<?php echo e(route('home.mypage')); ?>" ><img class="p-image--gray" src="<?php echo e(asset('images/icons/icon_user_circle.svg')); ?>" alt=""><span class="u-as-center">マイページ</span></a>
<?php endif; ?>
<?php /**PATH /aegis/resources/views/front/header/_link_mypage.blade.php ENDPATH**/ ?>