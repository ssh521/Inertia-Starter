<script setup>
import Dropdown from "@/Components/Dropdown.vue";
import PopupMenu from "@/Components/PopupMenu.vue";
import PopupMenuLink from "@/Components/PopupMenuLink.vue";
import Tooltip from "@/Components/Tooltip.vue";
</script>

<template>
  <h1>Test</h1>

  <div class="w-[200px]">
    <Dropdown align="left">
      <template #trigger>
        <button class="bg-indigo-800 text-white px-4 py-2 rounded">메뉴 열기</button>
      </template>

      <div class="py-1 border-2 border-red-500">
        <a href="#" class="block px-4 py-2 text-sm">옵션 1</a>
        <a href="#" class="block px-4 py-2 text-sm">옵션 2</a>
      </div>
    </Dropdown>
  </div>

  <div>
    <Tooltip buttonText="버튼" tooltipContent="툴팁" align="top">
      <div>
        <p>Slot 테스트</p>
      </div>
    </Tooltip>
  </div>
</template>
