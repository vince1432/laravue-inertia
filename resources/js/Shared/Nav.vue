<template>
  <nav>
    <ul class="list-disc flex space-x-4 list-inside">
      <li>
        <Navlink href="/" :active="$page.component === 'Home'"> Home </Navlink>
      </li>
      <li>
        <Navlink href="/users" :active="$page.component === 'Users'">
          Users
        </Navlink>
      </li>
      <li>
        <Navlink href="/settings" :active="$page.component === 'Settings'">
          Settings
        </Navlink>
      </li>
    </ul>
  </nav>
</template>

<script setup>
import Navlink from "@shared/NavLink.vue";
</script>

<style lang="scss" scoped></style>
