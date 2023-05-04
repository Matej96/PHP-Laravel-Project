<!doctype html>
<html lang="sk">

    <head>
        <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('custom'); ?>
    </head>

    <body>
        <?php echo $__env->make('layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <main >
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <?php echo $__env->make('layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Bootstrap core JavaScript -->
        <?php echo $__env->make('layout.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('customJs'); ?>
        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html>
<?php /**PATH C:\Users\matej\OneDrive\Počítač\Škola\6. semester\WTECH\WTECH\WearIt\resources\views/layout/main.blade.php ENDPATH**/ ?>