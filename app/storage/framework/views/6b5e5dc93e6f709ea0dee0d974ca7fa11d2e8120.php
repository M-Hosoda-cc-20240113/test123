<?php if(auth()->guard()->check()): ?>
    <a class="p-header__textLink" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <img class="p-image--gray" src="<?php echo e(asset('images/icons/icon_logout.svg')); ?>" alt="">
      <span class="u-as-center">ログアウト</span>
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
      <?php echo e(csrf_field()); ?>

    </form>
<?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
  <?php echo $__env->make('front.header._link_signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <a class="p-header__textLink u-pl-0" href="<?php echo e(route('login')); ?>">
    <img class="p-image--gray u-mr-5" src="<?php echo e(asset('images/icons/icon_login.svg')); ?>" alt="">
    <span class="u-as-center">ログイン</span>
  </a>
<?php endif; ?>
<?php /**PATH /aegis/resources/views/front/header/_link_login_logout.blade.php ENDPATH**/ ?>