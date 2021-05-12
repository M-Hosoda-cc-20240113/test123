<table class="p-itemDetailTable">
    <tbody>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">単価</th>
        <td class="p-itemDetailTable__body"><?php echo e($response->getProject()->min_unit_price ?? ''); ?>〜<?php echo e($response->getProject()->max_unit_price ?? ''); ?>万</td>
        <th class="p-itemDetailTable__head">最寄り駅</th>
        <td class="p-itemDetailTable__body"><?php echo e($response->getProject()->station->name ?? ''); ?></td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">案件内容</th>
        <td class="p-itemDetailTable__body"><?php echo e(ViewHelper::nl2brWithAnchor( $response->getProject()->description ?? '' )); ?></td>
        <th class="p-itemDetailTable__head">必須</th>
        <td class="p-itemDetailTable__body"><?php echo e(ViewHelper::nl2brWithAnchor( $response->getProject()->required_condition ?? '' )); ?></td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">就業時間</th>
        <td class="p-itemDetailTable__body"><?php echo e(ViewHelper::timeReplace( $response->getProject()->work_start ?? '' )); ?>〜<?php echo e(ViewHelper::timeReplace( $response->getProject()->work_end ?? '' )); ?></td>
        <th class="p-itemDetailTable__head">精算幅</th>
        <td class="p-itemDetailTable__body"><?php echo e($response->getProject()->min_operation_time ?? ''); ?>時間〜<?php echo e($response->getProject()->max_operation_time ?? ''); ?>時間</td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">職種</th>
        <td class="p-itemDetailTable__body">
            <?php $__currentLoopData = $response->getProject()->positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('front.project.search', ['position_ids[]' => $position->id])); ?>" class="c-tag u-mb-5"><?php echo e($position->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <th class="p-itemDetailTable__head">スキル</th>
        <td class="p-itemDetailTable__body">
            <?php $__currentLoopData = $response->getProject()->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('front.project.search', ['skill_ids[]' => $skill->id])); ?>" class="c-tag u-mb-5"><?php echo e($skill->name); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
    </tr>
    <tr class="p-itemDetailTable__row">
        <th class="p-itemDetailTable__head">尚可</th>
        <td class="p-itemDetailTable__body"><?php echo e(ViewHelper::nl2brWithAnchor( $response->getProject()->better_condition ?? '' )); ?></td>
        <th class="p-itemDetailTable__head">特徴</th>
        <td class="p-itemDetailTable__body"><?php echo e(ViewHelper::nl2brWithAnchor( $response->getProject()->feature ?? '' )); ?></td>
    </tr>
    </tbody>
</table>
<?php /**PATH /aegis/resources/views/front/pages/project/detail/_ProjectDetailTable.blade.php ENDPATH**/ ?>