<?php
    /**
     * @var \App\Services\AdminDashboard\FetchDashboard\FetchDashboardResponse $response
     */
?>


<?php $__env->startSection('title', 'ダッシュボード|Aegis'); ?>

<?php $__env->startSection('body'); ?>
    <?php $__env->startComponent('admin.header.header', ['href' => route('front.index')]); ?>
        <?php echo $__env->make('admin.header._link_login_logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($__componentOriginal743254f7093212322e6076ebbae489b726151344)): ?>
<?php $component = $__componentOriginal743254f7093212322e6076ebbae489b726151344; ?>
<?php unset($__componentOriginal743254f7093212322e6076ebbae489b726151344); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
    <div class="l-container--2col">
        <div class="l-sidebar">
            <?php echo $__env->make('admin.pages.dashboard._RegularList', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="l-main">
            <div class="p-mainItem">
                <h2 class="p-level2Heading">各種ステータス</h2>
                <form action="<?php echo e(route('user.search')); ?>" method="get">
                <div class="p-counterUnit--col2">
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title"><button type="submit" name="status" value="1">今月営業開始</button></p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count"><?php echo e($response->getFetchUserOperation()->count() ?? 0); ?></span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-0">
                        <p class="c-text--bold p-counter__title c-tooltip"><button type="submit" name="status" value="2">未営業</button>
                            <span class="c-tooltip__text--up">今月営業月だがまだ未営業の人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count"><?php echo e($response->getFetchNotOpen()->count() ?? 0); ?></span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter">
                        <p class="c-text--bold p-counter__title c-tooltip"><button type="submit" name="status" value="3">新規稼働件数</button>
                            <span class="c-tooltip__text--up">新規で今月稼働する人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count"><?php echo e($response->getFetchNewAssignUser()->count() ?? 0); ?></span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title c-tooltip"><button type="submit" name="status" value="4">既存稼働件数</button>
                            <span class="c-tooltip__text--up">既存で今月稼働する人数</span>
                        </p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count"><?php echo e($response->getFetchAssignUser()->count() ?? 0); ?></span><span>件</span>
                        </div>
                    </div>
                    <div class="p-counter u-mt-10-pc">
                        <p class="c-text--bold p-counter__title"><button type="submit" name="status" value="5">今月面談件数</button></p>
                        <div class="p-counter__countWrap">
                            <span class="p-counter__count"><?php echo e($response->getFetchInterview()->count() ?? 0); ?></span><span>件</span>
                        </div>
                    </div>
                </div>
                </form>
                

                <h2 class="p-level2Heading u-mt-20">クイックアクション</h2>

                <div class="p-flex--col2">
                    <a href="<?php echo e(route('project.create.form')); ?>" class="p-button p-flex__item">
                        <img class="p-button__icon" src="images/icons/icon_file.svg" alt="">
                        <div class="p-button__box">
                            <h2 class="p-button__boxTitle">案件追加</h2>
                            <p class="p-button__boxText">案件の登録処理を行います</p>
                        </div>
                    </a>
                    

                    <a href="<?php echo e(route('agent.create.form')); ?>" class="p-button p-flex__item">
                        <img class="p-button__icon" src="images/icons/icon_building.svg" alt="">
                        <div class="p-button__box">
                            <h2 class="p-button__boxTitle">案件元追加</h2>
                            <p class="p-button__boxText">案件元の登録処理を行います</p>
                        </div>
                    </a>
                    

                    <a href="<?php echo e(route('station.create.form')); ?>" class="p-button p-flex__item">
                        <img class="p-button__icon" src="images/icons/icon_train.svg" alt="">
                        <div class="p-button__box">
                            <h2 class="p-button__boxTitle">駅追加</h2>
                            <p class="p-button__boxText">駅の登録処理を行います</p>
                        </div>
                    </a>
                    
                </div>

            </div>
            
        </div>
    </div>

    <?php echo $__env->make('admin.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /aegis/resources/views/admin/pages/dashboard/dashboard.blade.php ENDPATH**/ ?>