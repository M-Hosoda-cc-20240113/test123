<?php
    /**
     * @var \App\Services\Top\FetchTopData\FetchTopResponse $response
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
            <li class="u-mt-10"><?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
        </ul>
    </nav>

    <nav class="p-drawerContents">
        <ul>
            <li><?php echo $__env->make('front.header._link_mypage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
            <li class="u-mt-10"><?php echo $__env->make('front.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></li>
        </ul>
    </nav>

    <div class="l-container">
        <?php if($errors->all()): ?>
            <p class="c-text--bold u-mt-20">検索条件が不正です。</p>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p class="c-text--warning"><?php echo e($error); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <img src="<?php echo e(asset('/images/hero/hero_02.png')); ?>" alt="">

        <ul class="p-searchTab u-mt-30">
            <li class="p-searchTab__item js-tab is-active">スキル<span class="u-dn-sp">でさがす</span></li>
            <li class="p-searchTab__item js-tab">ポジション<span class="u-dn-sp">でさがす</span></li>
            <li class="p-searchTab__item js-tab">最寄り駅<span class="u-dn-sp">でさがす</span></li>
        </ul>

        <form action="<?php echo e(route('front.project.search')); ?>" method="get">
            <div class="p-checkboxUnit js-tab_content">
                <?php $__currentLoopData = $response->getSkills(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="p-checkbox p-checkboxUnit__item"><?php echo e($skill->name); ?>

                        <input value="<?php echo e($skill->id); ?>" name="skill_ids[]"
                               type="checkbox" <?php if(!\Route::is('front.index') && in_array($skill->id, $response->getSearchedSkillIds())): ?><?php echo e('checked'); ?><?php endif; ?>>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            

            <div class="p-checkboxUnit js-tab_content">
                <?php $__currentLoopData = $response->getPositions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="p-checkbox p-checkboxUnit__item"><?php echo e($position->name); ?>

                        <input value="<?php echo e($position->id); ?>" name="position_ids[]"
                               type="checkbox" <?php if(!\Route::is('front.index') && in_array($position->id, $response->getSearchedPositionIds())): ?><?php echo e('checked'); ?><?php endif; ?>>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            

            <div class="p-checkboxUnit js-tab_content">
                <?php $__currentLoopData = $response->getStations(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $station): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label class="p-checkbox p-checkboxUnit__item"><?php echo e($station->name); ?>

                        <input value="<?php echo e($station->id); ?>" name="station_ids[]"
                               type="checkbox" <?php if(!\Route::is('front.index') && in_array($station->id, $response->getSearchedStationIds())): ?><?php echo e('checked'); ?><?php endif; ?>>
                        <div class="p-checkbox__indicator"></div>
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="p-searchBox u-mt-20">
                <input name="keyword" class="c-input--light p-searchBox__input js-search_input" type="text" value=""
                       placeholder="PHP JavaScript">
                <button type="submit" class="c-button--secondary p-searchBox__button js-project_search"
                        data-search-url="<?php echo e(route('front.project.search')); ?>">検索
                </button>
            </div>
        </form>

        <p class="c-text u-mt-20">案件数：<span class="c-text--bold"><?php echo e($response->getProjects()->count()); ?></span>件</p>

        <div class="p-cardUnit--col3 u-mt-30">
            <?php $__currentLoopData = $response->getProjects(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('organisms.ProjectCard', $project, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        

        <?php if($response->getProjects()->count() === 0): ?>
            <p class="u-text--center mt-30 u-fs-20">関連する求人・案件が見つかりませんでした。</p>
        <?php endif; ?>

        <div class="p-mainItem u-mt-30">
            <h2 class="p-level2Heading">よくあるご質問</h2>
            <?php echo $__env->make('front.pages.top._FAQ', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>


    <?php echo $__env->make('front.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/front/pages/top/top.blade.php ENDPATH**/ ?>