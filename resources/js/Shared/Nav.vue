<template>
  <nav>
    <ul class="flex space-x-6">
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
      <li>
        <Navlink href="/logout" method="post"> Logout </Navlink>
      </li>
    </ul>
  </nav>
</template>

<script setup>
import Navlink from "@shared/NavLink.vue";
</script>

<style lang="scss" scoped></style>
