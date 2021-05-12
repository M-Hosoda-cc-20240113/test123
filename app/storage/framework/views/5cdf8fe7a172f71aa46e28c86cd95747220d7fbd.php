<table class="p-table">
    <thead class="p-table__head">
    <tr class="p-table__headRow">
        <th class="p-table__headRowItem">案件名</th>
        <th class="p-table__headRowItem">登録日時</th>
        <th class="p-table__headRowItem">アサイン可否</th>
    </tr>
    </thead>

    <tbody class="p-table__body">
    <?php $__currentLoopData = $response->getProjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="p-table__bodyRow"
            data-href="<?php echo e(route('project.detail', ['project_id' => $project->id])); ?>">
            <td class="p-table__bodyRowItem"><?php echo e($project->name ?? ''); ?></td>
            <td class="p-table__bodyRowItem"><?php echo e(ViewHelper::YmdReplace($project->created_at ?? '' )); ?></td>
            <td class="p-table__bodyRowItem--textCenter"><?php echo e($project->decided ? '否' : '可'); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH /aegis/resources/views/admin/pages/project/list/_RegularTable.blade.php ENDPATH**/ ?>