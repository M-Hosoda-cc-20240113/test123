<?php
    /**
     * @var \App\Services\AdminUser\FetchLevelSkill\FetchLevelSkillResponse $LevelSkills
     */
?>



<?php $__env->startSection('title', 'ユーザー一覧|Aegis'); ?>

<?php $__env->startSection('body'); ?>
    <?php $__env->startComponent('admin.header.header', ['href' => route('front.index')]); ?>
        <?php echo $__env->make('admin.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($__componentOriginal743254f7093212322e6076ebbae489b726151344)): ?>
<?php $component = $__componentOriginal743254f7093212322e6076ebbae489b726151344; ?>
<?php unset($__componentOriginal743254f7093212322e6076ebbae489b726151344); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <div class="Container mt-30">
        <?php echo $__env->make('admin.bread_crumb._BreadCrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if($errors->all()): ?>
            <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="c-text--warning"><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <ul class="p-searchTab">
            <li class="p-searchTab__item js-tab is-active"><span class="u-dn-sp">ユーザーカテゴリー</span></li>
        </ul>

        <template id="skill_row">
            <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                <label class="p-formGroupUnit--2col__label" for="">
                    <select name="skill_ids[]" id="" class="c-input">
                        <option value="">選択してください</option>
                        <?php $__currentLoopData = $LevelSkills->getSkills(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($skill->id); ?>"><?php echo e($skill->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </label>

                <label class="p-formGroupUnit--2col__label--after" for="">
                    <select name="level_ids[]" id="" class="c-input">
                        <option value="">選択してください</option>
                        <?php $__currentLoopData = $LevelSkills->getLevels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($level->id); ?>"><?php echo e($level->level); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </label>
            </div>
        </template>
        

        <form class="js-form" action="<?php echo e(route('user.search')); ?>" method="get">
            
            <div class="p-checkboxUnit js-tab_content">
                <label class="p-checkbox p-checkboxUnit__item">新規
                    <input value=1 name="new_user"
                           type="checkbox" <?php if(request()->input('new_user')): ?><?php echo e('checked'); ?><?php endif; ?>>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">既存
                    <input value=1 name="not_new_user"
                           type="checkbox" <?php if(request()->input('not_new_user')): ?><?php echo e('checked'); ?><?php endif; ?>>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">稼働中
                    <input value=1 name="is_working"
                           type="checkbox" <?php if(request()->input('is_working')): ?><?php echo e('checked'); ?><?php endif; ?>>
                    <div class="p-checkbox__indicator"></div>
                </label>
                <label class="p-checkbox p-checkboxUnit__item">待機中
                    <input value=1 name="is_not_working"
                           type="checkbox" <?php if(request()->input('is_not_working')): ?><?php echo e('checked'); ?><?php endif; ?>>
                    <div class="p-checkbox__indicator"></div>
                </label>
            </div>
            

            
            <div class="p-formGroupUnit--2col u-ff-column js-parent">
                <?php $__currentLoopData = $LevelSkills->getRelLevelSkill(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $searched_skill_id => $searched_level_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($loop->first): ?>
                        <div class="p-formGroupUnit--2col__title">
                            <p class="c-text">スキル</p>
                            <p class="c-text u-pl-15">経験</p>
                        </div>
                    <?php endif; ?>
                    <div class="p-formGroupUnit--2col__itemForSkill js-content js-remove">
                        <label class="p-formGroupUnit--2col__label" for="">
                            <select name="skill_ids[]" id="skill_id" class="c-input">
                                <option value="0">選択してください</option>
                                <?php $__currentLoopData = $LevelSkills->getSkills(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($skill->id); ?>" <?php echo e($searched_skill_id === $skill->id ? 'selected' : ''); ?>><?php echo e($skill->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>

                        <label class="p-formGroupUnit--2col__label--after" for="">
                            <select name="level_ids[]" id="" class="c-input">
                                <option value="0">選択してください</option>
                                <?php $__currentLoopData = $LevelSkills->getLevels(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                        value="<?php echo e($level->id); ?>" <?php echo e($searched_level_id === $level->id ? 'selected' : ''); ?>><?php echo e($level->level); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <img class="c-icon--clickable u-m0a js-add" src="/images/icons/icon_add.png" alt="">
            </div>
            

            
            <div class="p-register__row u-mt-20">
                <span class="p-register__title c-text--bold">営業開始月</span>
                <div class="p-register__itemWrap u-ff-row">
                    <div class="p-register__item u-w-50-pc">
                        <input type="date"
                               class="c-input"
                               name="operation_start_month"
                               value="<?php echo e(old('operation_start_month')); ?>">
                    </div>
                </div>
            </div>
            
            <button type="submit"
                    class="c-button--secondary p-searchBox__button js-project_search u-db u-m0a u-w-15-pc u-mt-30 js-project_search">
                検索
            </button>
        </form>
        <div class="p-searchBox">
            <form action="<?php echo e(route('user.status')); ?>" method="get">
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="1">今月営業開始</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="2">未営業</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="3">新規稼働</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="4">既存稼働</button>
                <button type="submit" name="status" class="c-button u-m0a u-mt-30 u-w-30" value="5">今月面談</button>
            </form>
        </div>
        
        <?php echo $__env->make('admin.pages.user.list._RegularUserTable', ['response' => $response], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo e($response->getUsers()->links('components.paginator')); ?>

        <?php if($response->getUsers()->count() === 0): ?>
            <p class="u-text--center mt-30 u-fs-20">関連するユーザーが見つかりませんでした。</p>
        <?php endif; ?>
    </div>

    <?php echo $__env->make('admin.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/admin/pages/user/list/list.blade.php ENDPATH**/ ?>