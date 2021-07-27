<!DOCTYPE html>
<html>
	<head>
		<title><?php echo e($title); ?></title>
	</head>
	<body>
		<div id="app">
			<h1>Hello</h1>
			<router-link to="/home/omar">Go to Home</router-link>
    		<router-view></router-view>
		</div>

		<ul>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<li><?php echo e($user['username']); ?></li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</ul>

		<script type="module" src="./public/dist/main.js"></script>
	</body>
</html><?php /**PATH C:\xampp\htdocs\PHP-VUE-MVC\app\view/home.blade.php ENDPATH**/ ?>