<table class="p-table">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">案件名</th>
        <th class="p-table__headRowItem">ユーザー名</th>
        <th class="p-table__headRowItem">ステータス</th>
        <th class="p-table__headRowItem">応募日時</th>
        <th class="p-table__headRowItem">面談予定日</th>
        <th class="p-table__headRowItem">アサイン</th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    <?php $__currentLoopData = $response->getApplications(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="p-table__bodyRow" data-href="">
            <td class="p-table__bodyRowItem">
                <a class="d-block w-100"
                   href="<?php echo e(route('project.detail', ['project_id' => $application['projects']['id']] )); ?>"><?php echo e($application['projects']['name'] ?? ''); ?></a>
            </td>
            <td class="p-table__bodyRowItem">
                <a class="d-block w-100"
                   href="<?php echo e(route('user.detail', ['user_id' => $application['users']['id']] )); ?>"><?php echo e($application['users']['sei'] ?? ''); ?>

                    &nbsp;<?php echo e($application['users']['mei'] ?? ''); ?></a>
            </td>
            <td class="p-table__bodyRowItem">
                <?php echo e(ViewHelper::Status( $application['status'] ?? '' )); ?><br>
            </td>
            <td class="p-table__bodyRowItem">
                <?php echo e(ViewHelper::YmdReplace( $application['created_at'] ?? '' )); ?><br>
            </td>
            <td class="p-table__bodyRowItem">
                <?php echo e(ViewHelper::YmdReplace( $application['interview_date'] ?? '未定' )); ?><br>
            </td>
            <td class="p-table__bodyRowItem--textCenter">
                <form action="<?php echo e(route('assignment.register')); ?>" method="post">
                    <?php echo e(@csrf_field()); ?>

                    <input type="hidden" name="user_id" value="<?php echo e($application['users']['id']); ?>">
                    <input type="hidden" name="project_id" value="<?php echo e($application['projects']['id']); ?>">
                    <button type="submit" class="c-button u-m0a">確定</button>
                </form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /aegis/resources/views/admin/pages/application/list/_ApplicationTable.blade.php ENDPATH**/ ?>