<ol class="p-breadCrumb mb-20">
    
    <?php if(url()->current() === route('user.list') || url()->current() === route('user.search') || url()->current() === route('user.status')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('user.list')); ?>"><span>ユーザー一覧</span></a></li>
    <?php endif; ?>

    
    <?php if(Route::currentRouteName() === 'user.detail'): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('user.list')); ?>"><span>ユーザー一覧</span></a></li>
        <li><a href=""><span>ユーザー詳細</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('project.list')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('project.list')); ?>"><span>案件一覧</span></a></li>
    <?php endif; ?>

    
    <?php if(Route::currentRouteName() === 'project.detail'): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('project.list')); ?>"><span>案件一覧</span></a></li>
        <li><a href=""><span>案件詳細</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('project.create')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('project.create')); ?>"><span>新規案件登録</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('application.list')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('application.list')); ?>"><span>応募状況一覧</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('assignment.list')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('assignment.list')); ?>"><span>稼働状況一覧</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('agent.list')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('agent.list')); ?>"><span>案件元会社一覧</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('agent.create')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('agent.list')); ?>"><span>案件元会社一覧</span></a></li>
        <li><a href="<?php echo e(route('agent.create')); ?>"><span>案件元会社新規登録</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('station.list')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('station.list')); ?>"><span>駅名一覧</span></a></li>
    <?php endif; ?>

    
    <?php if(url()->current() === route('station.create')): ?>
        <li><a href="<?php echo e(route('admin.index')); ?>"><span>ホーム</span></a></li>
        <li><a href="<?php echo e(route('station.list')); ?>"><span>駅名一覧</span></a></li>
        <li><a href="<?php echo e(route('station.create')); ?>"><span>新規駅名登録</span></a></li>
    <?php endif; ?>
</ol>
<?php /**PATH /aegis/resources/views/admin/bread_crumb/_BreadCrumb.blade.php ENDPATH**/ ?>