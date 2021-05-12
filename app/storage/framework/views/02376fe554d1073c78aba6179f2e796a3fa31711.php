<?php
  /**
   * @var \App\Services\User\UserPage\UserPageResponse $response
   */
?>


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
        <p class="p-level2Heading">ユーザー情報</p>
        <table class="p-sideColumnTable u-mb-30">
          <tbody>
          <tr>
            <th>氏名</th>
            <td><?php echo e($response->getUser()->sei ?? ''); ?>&#160;<?php echo e($response->getUser()->mei ?? ''); ?></td>
          </tr>
          <tr>
            <th>フリガナ</th>
            <td><?php echo e($response->getUser()->sei_kana ?? ''); ?>&#160;<?php echo e($response->getUser()->mei_kana ?? ''); ?></td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><?php echo e($response->getUser()->email ?? ''); ?></td>
          </tr>
          <tr>
            <th>電話番号</th>
            <td><?php echo e($response->getUser()->tel ?? ''); ?></td>
          </tr>
          <tr>
            <th>生年月日</th>
            <td><?php echo e(ViewHelper::BirthdayReplace($response->getUser()->birthday ?? '' )); ?></td>
          </tr>
          <tr>
              <th>保有ポイント</th>
              <td><?php echo e($response->getUser()->points ?? ''); ?> pt</td>
          </tr>
          </tbody>
        </table>
        

        <p class="p-level2Heading u-mb-5">スキル</p>
        <div class="u-mb-30">
          <?php if($response->getRelLevelSkillUser()->count() === 0 ): ?>
            <p class="c-text">
              スキルが登録されていません。
              <a class="c-text--primary" href="<?php echo e(route('front.user.skill.form')); ?>">こちら</a>から登録をお願いします。
           </p>
          <?php endif; ?>
          <?php $__currentLoopData = $response->getRelLevelSkillUser(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level_skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="c-label u-mt-5 u-mr-10"><?php echo e($level_skill->name); ?>（<?php echo e($level_skill->level); ?>)</span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        

        <p class="p-level2Heading">応募案件</p>
        <div class="u-mb-30">
          <?php if($response->getUser()->project_app->count() === 0 ): ?>
            <p class="c-text">応募していません。</p>
          <?php endif; ?>
          <?php $__currentLoopData = $response->getUser()->project_app; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="c-text--bold u-dib u-mt-10 u-indent-1" href="<?php echo e(route('front.project.detail', ['project_id' => $project->id] )); ?>">・<?php echo e($project->name ?? ''); ?></a>
                <p class="u-indent">面談予定日：<?php echo e(ViewHelper::YmdReplace($project->pivot->interview_date ?? '未定' )); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        

        <p class="p-level2Heading">稼働案件</p>
        <div class="u-mb-30">
          <?php if($response->getUser()->project_assign->count() === 0 ): ?>
              <p class="c-text">稼働していません。</p>
          <?php endif; ?>
          <?php $__currentLoopData = $response->getUser()->project_assign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="c-text--bold u-dib u-mt-10 u-indent-1" href="<?php echo e(route('front.project.detail', ['project_id' => $project->id] )); ?>">・<?php echo e($project->name ?? ''); ?></a>
                <p>稼働開始日：<?php echo e(ViewHelper::YmdReplace($project->pivot->assignment_start_date ?? '未定' )); ?></p>
                <p>稼働終了日：<?php echo e(ViewHelper::YmdReplace($project->pivot->assignment_end_date ?? '未定' )); ?></p>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
      </div>
      
    </div>
    
  </div>
  

  <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/mypage/top/top.blade.php ENDPATH**/ ?>