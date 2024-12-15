<template>
  <div>
    <div class="mb-2">
      <Link
        class="group flex items-center px-3 py-1 rounded-md transition-all duration-200 hover:bg-[#476329]"
        href="/"
      >
        <icon
          name="dashboard"
          class="mr-2 w-5 h-5"
          :class="isUrl('') ? 'fill-[#ffffff]' : 'fill-[#76b934] group-hover:fill-white'"
        />
        <div
          :class="
            isUrl('')
              ? 'text-[#ffffff] font-medium'
              : 'text-[#76b934] group-hover:text-[#ffffff]'
          "
        >
          Root
        </div>
      </Link>
    </div>
    <div class="mb-2">
      <Link
        class="group flex items-center px-3 py-1 rounded-md transition-all duration-200 hover:bg-[#476329]"
        href="/test"
      >
        <icon
          name="printer"
          class="mr-2 w-5 h-5"
          :class="
            isUrl('test') ? 'fill-[#ffffff]' : 'fill-[#76b934] group-hover:fill-white'
          "
        />
        <div
          :class="
            isUrl('test')
              ? 'text-[#ffffff] font-medium'
              : 'text-[#76b934] group-hover:text-[#ffffff]'
          "
        >
          Test
        </div>
      </Link>
    </div>
  </div>
</template>

<script setup>
import { usePage } from "@inertiajs/vue3";
import Icon from "@/Components/Icon.vue";

const isUrl = (...urls) => {
  let currentUrl = usePage().url.slice(1);
  //console.log(currentUrl)
  if (urls[0] === "") {
    return currentUrl === "";
  }
  return urls.filter((url) => currentUrl.startsWith(url)).length;
};
</script>
