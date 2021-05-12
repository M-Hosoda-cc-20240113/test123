<?php if(auth()->guard()->check()): ?>
  <li class="d-flex">
    <a class="Header__textLink" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span>ログアウト</span>
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
      <?php echo e(csrf_field()); ?>

    </form>
  </li>
<?php endif; ?>
<?php if(auth()->guard()->guest()): ?>
  <?php echo $__env->make('front.header._link_signup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <a class="Header__textLink" href="<?php echo e(route('login')); ?>">ログイン</a>
<?php endif; ?>
<?php /**PATH /aegis/resources/views/admin/header/_link_login_logout.blade.php ENDPATH**/ ?>