<!DOCTYPE html>
<html lang="ja">
<head>
  <meta content="IE=Edge" http-equiv="X-UA-Compatible">
  <meta charset="utf-8">
  <link rel="SHORTCUT ICON" href="/assets/images/favicon.ico">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('title'); ?></title>
  <?php if (! empty(trim($__env->yieldContent('description')))): ?>
    <meta name="description" content="<?php echo $__env->yieldContent('description'); ?>">
  <?php endif; ?>
  <?php if (! empty(trim($__env->yieldContent('keywords')))): ?>
    <meta name="keywords" content="<?php echo $__env->yieldContent('keywords'); ?>">
  <?php endif; ?>
  <?php if (! empty(trim($__env->yieldContent('robots')))): ?>
    <meta name="robots" content="<?php echo $__env->yieldContent('robots'); ?>">
  <?php endif; ?>
  <?php if (! empty(trim($__env->yieldContent('canonical')))): ?>
    <link rel="canonical" href="<?php echo $__env->yieldContent('canonical'); ?>">
  <?php endif; ?>
  <?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/style.css')); ?>" media="all">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css2/style.css')); ?>" media="all">
  <?php echo $__env->yieldSection(); ?>
  <?php $__env->startSection('head'); ?>
  <?php echo $__env->yieldSection(); ?>
</head>
<body>
<?php $__env->startSection('body'); ?>
<?php echo $__env->yieldSection(); ?> 

<?php $__env->startSection('script'); ?>
  <script src="<?php echo e(asset('/js/bundle.js')); ?>" type="text/javascript"></script>
<?php echo $__env->yieldSection(); ?>
</body>
</html>
<?php /**PATH /aegis/resources/views/errors/layout.blade.php ENDPATH**/ ?>