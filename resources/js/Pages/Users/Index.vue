!<template>
        Hi {{ name }}
        <a :href="route('second')">Go to second pages</a>
</template>

<script setup>
defineProps({
  name: String,
});
</script>

<style lang="scss" scoped>

</style>
