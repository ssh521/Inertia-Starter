<script setup>
const props = defineProps({
  user: Object,
});

const formatDate = (date) => {
  return new Date(date).toLocaleDateString("ko-KR", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
};
</script>

<template>
  <div>
    <Link :href="route('user.index')">목록으로 돌아가기</Link>
    <h1>{{ user.name }}</h1>
    <p>{{ user.email }}</p>
    <p>{{ formatDate(user.created_at) }}</p>
    <p>{{ formatDate(user.updated_at) }}</p>
  </div>
  <Link :href="route('user.edit', user.id)">수정</Link>
</template>
