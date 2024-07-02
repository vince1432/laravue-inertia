<template>
  <Head title="Create User" />
  <h1 class="text-3xl">Create New User</h1>

  <form @submit.prevent="submit" method="post" class="max-w-md mx-auto mt-7">
    <!-- Name -->
    <div class="mb-6">
      <label
        for="name"
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
      >
        Name
      </label>

      <input
        v-model="form.name"
        type="text"
        name="name"
        id="name"
        class="border border-gray-400 p-2 w-full"
      />
      <div
        v-if="form.errors.name"
        v-text="form.errors.name"
        class="text-red-500 text-xs mt-1"
      />
    </div>
    <!-- Email -->
    <div class="mb-6">
      <label
        for="email"
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
      >
        Email
      </label>

      <input
        v-model="form.email"
        type="email"
        name="email"
        id="email"
        class="border border-gray-400 p-2 w-full"
      />
      <div
        v-if="form.errors.email"
        v-text="form.errors.email"
        class="text-red-500 text-xs mt-1"
      />
    </div>
    <!-- Password -->
    <div class="mb-6">
      <label
        for="password"
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
      >
        Password
      </label>

      <input
        v-model="form.password"
        type="password"
        name="password"
        id="password"
        class="border border-gray-400 p-2 w-full"
      />
    </div>
    <div
      v-if="form.errors.password"
      v-text="form.errors.password"
      class="text-red-500 text-xs mt-1"
    />
    <!-- submit -->
    <div class="mb-6">
      <button
        type="submit"
        class="bg-blue-400 text-white rounded py-2 px-2 hover:bg-blue-500"
        :disabled="form.proccessing"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
  errors: Object,
});
const form = useForm({
  name: "",
  email: "",
  password: "",
});

const submit = () => {
  form.post("/users");
};
</script>

<style lang="scss" scoped></style>
