<?php
    /**
     * @var \App\Services\User\ShowEditSkillForm\ShowEditSkillFormResponse $response
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

                <p class="p-level2Heading">スキル情報編集</p>

                <?php if($errors->any()): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="c-text--warning"><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <template id="skill_row">
                    <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                        <label class="p-formGroupUnit--2col__label" for="">
                            <select name="skill_ids[]" id="" class="c-input">
                                <?php $__currentLoopData = $response->getSkills(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($skill->id); ?>"><?php echo e($skill->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>

                        <label class="p-formGroupUnit--2col__label--after" for="">
                            <select name="level_ids[]" id="" class="c-input">
                                <?php $__currentLoopData = $response->getLevels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($level->id); ?>"><?php echo e($level->level); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>
                    </div>
                </template>
                

                <form class="js-form" action="<?php echo e(route('front.user.skill.edit')); ?>" method="post">
                    <?php echo e(@csrf_field()); ?>

                    <div class="p-formGroupUnit--2col u-ff-column js-parent">
                        <?php $__currentLoopData = $response->getRelLevelSkillUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level_skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($loop->first): ?>
                                <div class="p-formGroupUnit--2col__title">
                                    <p class="c-text">スキル</p>
                                    <p class="c-text u-pl-15">経験</p>
                                </div>
                            <?php endif; ?>

                            <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">

                                <label class="p-formGroupUnit--2col__label" for="">
                                    <select name="skill_ids[]" id="skill_id" class="c-input">
                                        <?php $__currentLoopData = $response->getSkills(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($skill->id); ?>" <?php echo e($level_skill->name === $skill->name ? 'selected' : ''); ?>><?php echo e($skill->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </label>

                                <label class="p-formGroupUnit--2col__label--after" for="">
                                    <select name="level_ids[]" id="" class="c-input">
                                        <?php $__currentLoopData = $response->getLevels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option
                                                value="<?php echo e($level->id); ?>" <?php echo e($level_skill->level === $level->level ? 'selected' : ''); ?>><?php echo e($level->level); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </label>
                            </div>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
                    </div>
                    <button type="submit" class="c-button u-db u-m0a u-mt-20">更新する</button>
                </form>
            </div>

        </div>
        
    </div>

    <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/mypage/skill/edit.blade.php ENDPATH**/ ?>