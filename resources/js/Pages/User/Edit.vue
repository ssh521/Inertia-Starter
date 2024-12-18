<script setup>
const props = defineProps({
  user: Object,
});
</script>

<template>
  <div>
    <h1>Edit User</h1>
    <input type="text" :value="user.name" />
    <input type="text" :value="user.email" />
  </div>
</template>
