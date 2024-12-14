<script setup>
const props = defineProps({
  title: {
    type: String,
    default: "Home",
    required: true,
  },
});
</script>

<template>
  <Head :title="title" />
  <div class="flex flex-col">
    <main class="mt-6">
      <h1>
        Welcome to the Laravel 11 Inertia + Vue 3 + TailwindCSS + Laravel 11 Skeleton
      </h1>
    </main>
  </div>
</template>
