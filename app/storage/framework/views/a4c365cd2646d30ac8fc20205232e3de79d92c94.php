<?php
/**
 * @var \App\Services\AdminUser\UserList\UserListResponse $response
 */
?>
<table class="p-table">
  <thead class="p-table__head">
    <tr class="p-table__headRow">
      <th class="p-table__headRowItem--soart">氏名</th>
      <th class="p-table__headRowItem--soart">登録日</th>
      <th class="p-table__headRowItem">稼働中</th>
      <th class="p-table__headRowItem">新規</th>
      <th class="p-table__headRowItem--soart">営業開始月</th>
      <th class="p-table__headRowItem">電話番号</th>
      <th class="p-table__headRowItem">生年月日&nbsp;(年齢)</th>
      <th class="p-table__headRowItem">備考欄</th>
    </tr>
  </thead>

  <tbody class="p-table__body">
    <?php $__currentLoopData = $response->getUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="p-table__bodyRow" data-href="<?php echo e(route('user.detail', ['user_id' => $user->id])); ?>">
      <td class="p-table__bodyRowItem"><?php echo e($user->sei ?? ''); ?>&#160;<?php echo e($user->mei ?? ''); ?></td>
      <td class="p-table__bodyRowItem"><?php echo e(ViewHelper::YmdReplace($user->created_at ?? '' )); ?></td>
      <td class="p-table__bodyRowItem--textCenter"><?php echo e($user->is_working ? '◎' : '-'); ?></td>
      <td class="p-table__bodyRowItem--textCenter"><?php echo e($user->is_new ? '◎' : '-'); ?></td>
      <td class="p-table__bodyRowItem"><?php echo e(ViewHelper::YmdReplace($user->operation_start_month ?? '' )); ?></td>
      <td class="p-table__bodyRowItem"><?php echo e($user->tel ?? ''); ?></td>
      <td class="p-table__bodyRowItem"><?php echo e(ViewHelper::BirthdayReplace($user->birthday ?? '')); ?>（<?php echo e(ViewHelper::CountAge($user->birthday ?? '')); ?>）</td>
      <td class="p-table__bodyRowItem"><?php echo e($user->remarks ?? ''); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>
<?php /**PATH /aegis/resources/views/admin/pages/user/list/_RegularUserTable.blade.php ENDPATH**/ ?>