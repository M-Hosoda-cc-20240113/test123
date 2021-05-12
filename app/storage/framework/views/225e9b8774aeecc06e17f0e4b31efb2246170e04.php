<?php if($paginator->hasPages()): ?>
    <ul class="p-paginator u-mt-30">
        
        <?php if(!$paginator->onFirstPage()): ?>
            <li class="p-paginator__item p-paginator__item--prev"><a class="p-paginator__link" href="<?php echo e($paginator->previousPageUrl()); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#33313C" d="M7.41 1.41L6 0 0 6l6 6 1.41-1.41L2.83 6z"></path>
                        </g>
                    </svg>
                </a>
            </li>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <li class="p-paginator__item"><a class="p-paginator__link" href="#"><?php echo e($element); ?></a></li>
            <?php endif; ?>

            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <li class="p-paginator__item active"><a class="p-paginator__link" href="#"><?php echo e($page); ?></a></li>
                    <?php else: ?>
                        <li class="p-paginator__item"><a class="p-paginator__link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a> </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
            <li class="p-paginator__item p-paginator__item--next"><a class="p-paginator__link" href="<?php echo e($paginator->nextPageUrl()); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewbox="0 0 8 12">
                        <g fill="none" fill-rule="evenodd">
                            <path fill="#33313C" d="M7.41 1.41L6 0 0 6l6 6 1.41-1.41L2.83 6z"></path>
                        </g>
                    </svg>
                </a>
            </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>

<?php /**PATH /aegis/resources/views/components/paginator.blade.php ENDPATH**/ ?>