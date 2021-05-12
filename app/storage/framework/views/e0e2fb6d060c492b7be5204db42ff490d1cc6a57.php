<?php
  /**
   * @var \App\Services\User\ShowEditUserForm\ShowEditUserFormResponse $response
   */
?>


<?php $__env->startSection('title', 'ユーザー情報編集|Aegis'); ?>

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
          <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('front.user.edit')); ?>">ユーザー情報編集</a> </li>
          <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('password.request')); ?>">パスワード変更</a> </li>
          <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('email.request')); ?>">メールアドレス変更</a> </li>
          <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('front.user.skill.form')); ?>">スキル編集</a></li>
          <li class="p-list__item"><a class="c-text p-list__itemInner" href="<?php echo e(route('front.user.delete.form')); ?>">退会</a></li>
      </ul>
    </div>
    

    <div class="l-main">
      <div class="p-mainItem">
        <p class="p-level2Heading">ユーザー情報編集</p>
        <?php if($errors->any()): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="c-text--warning"><?php echo e($error); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <form action="<?php echo e(route('front.user.edit')); ?>" method="post">
          <?php echo e(@csrf_field()); ?>

          <div class="p-formGroupUnit--2col">
            <div class="p-formGroup p-formGroupUnit--2col__item--left">
              <span class="">姓</span>
              <input name="sei" type="text" class="c-input2" value="<?php echo e($response->getUser()->sei); ?>">
            </div>
            <div class="p-formGroup p-formGroupUnit--2col__item">
              <span class="">名</span>
              <input name="mei" type="text" class="c-input2" value="<?php echo e($response->getUser()->mei); ?>">
            </div>
            <div class="p-formGroup p-formGroupUnit--2col__item--left">
              <span class="">セイ</span>
              <input name="sei_kana" type="text" class="c-input2" value="<?php echo e($response->getUser()->sei_kana); ?>">
            </div>
            <div class="p-formGroup p-formGroupUnit--2col__item">
              <span class="">メイ</span>
              <input name="mei_kana" type="text" class="c-input2" value="<?php echo e($response->getUser()->mei_kana); ?>">
            </div>
            <div class="p-formGroup p-formGroupUnit--2col__item--left">
              <span class="">電話番号</span>
              <input name="tel" type="number" class="c-input2" value="<?php echo e($response->getUser()->tel); ?>">
            </div>
            <div class="p-formGroup p-formGroupUnit--2col__item">
              <span class="">生年月日</span>
              <input name="birthday" type="number" class="c-input2" value="<?php echo e($response->getUser()->birthday); ?>">
            </div>
          </div>

          <button type="submit" class="c-button u-db u-m0a u-mt-20">更新する</button>
        </form>
      </div>
      
    </div>
    
  </div>

  <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/mypage/user/edit.blade.php ENDPATH**/ ?>