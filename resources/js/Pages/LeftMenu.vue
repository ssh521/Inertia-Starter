<template>
  <div>
    <ul>
      <li class="border-slate-900 bg-slate-900 p-1 hover:text-white mb-2">
        <Link
          href="/"
          class="text-indigo-500 hover:text-white py-2 px-4 w-full rounded-md"
          >Home</Link
        >
      </li>
      <li class="border-slate-900 bg-slate-900 p-1 hover:text-white">
        <Link
          :href="route('test')"
          class="text-indigo-500 hover:text-white py-2 px-4 w-full rounded-md"
          >Test</Link
        >
      </li>
    </ul>
  </div>
</template>

<style scoped>
ul {
  list-style: none;
  padding: 0;
  margin: 0;
}
</style>
