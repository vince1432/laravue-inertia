<template>
  <h1>Users</h1>

  <div style="margin-top: 800px">
    <p>The current time is {{ time }}</p>

    <Link href="/users" class="text-blue-500" preserve-scroll> Refresh </Link>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
  time: String,
});
</script>

<style lang="scss" scoped></style>
