<template>
  <!-- head -->
  <Head>
    <meta
      type="description"
      content="Information About my app"
      head-key="description"
    />
  </Head>
  <!-- header -->
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>
        <p class="text-sm ml-4">Welcome back, {{ username }}</p>
      </div>
      <Nav />
    </header>
  </section>
  <!-- slot -->
  <section class="p-6">
    <div class="max-w-3xl mx-auto">
      <slot />
    </div>
  </section>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import Nav from "@shared/Nav.vue";
import { computed } from "vue";

const page = usePage();

const username = computed(() => {
  return page.props.auth.user.username;
});
</script>

<style lang="scss" scoped></style>
