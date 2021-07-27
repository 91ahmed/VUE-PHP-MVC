<template>
	<div>
		<h2>{{ $route.params.name }}</h2>
		<header-component></header-component>
	</div>
</template>

<script>
	import HeaderComponent from '@/src/components/HeaderComponent.vue'

	export default {
		name: 'Home',
		components: {
			HeaderComponent
		}
	}
</script>

<style>

</style>