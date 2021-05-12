<?php
/**
 * @var \App\Models\Project $project
 * @var string $class
 */
?>

<div class="<?php echo e($class ?? ''); ?> p-card">
  <a href="<?php echo e(route('front.project.detail', ['project_id' => $project->id])); ?>" class="c-text--bold p-card__title"><?php echo e($project->name); ?></a>
  <table class="p-card__table">
    <tr>
      <td class="c-text">単価/月</td>
      <td class="c-text--warning c-text--bold"><?php echo e($project->min_unit_price ?? ''); ?>〜<?php echo e($project->max_unit_price); ?>万</td>
    </tr>
    <tr>
      <td class="c-text">最寄り駅</td>
      <td class="c-text"><?php echo e($project->station->name); ?></td>
    </tr>
  </table>
  <p class="c-text p-card__sub-title">応募スキル</p>
  <?php $__currentLoopData = $project->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('front.project.search', ['skill_ids[]' => $skill->id])); ?>" class="c-tag u-mt-5"><?php echo e($skill->name); ?></a>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /aegis/resources/views/organisms/ProjectCard.blade.php ENDPATH**/ ?>