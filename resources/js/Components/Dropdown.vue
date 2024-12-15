<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick } from "vue";
import { useFloating, flip, shift, offset, autoUpdate } from "@floating-ui/vue";

const props = defineProps({
  align: {
    type: String,
    default: "right",
  },
  width: {
    type: String,
    default: "48",
  },
  contentClasses: {
    type: String,
    default: "py-1 bg-white",
  },
});

const show = ref(false);
const trigger = ref(null);
const dropdown = ref(null);

const { floatingStyles, update, x, y, strategy } = useFloating(trigger, dropdown, {
  placement: props.align === "right" ? "bottom-end" : "bottom-start",
  middleware: [offset(4), flip(), shift({ padding: 8 })],
  whileElementsMounted: autoUpdate,
});

// 드롭다운 토글 함수
const toggleDropdown = () => {
  show.value = !show.value;
  if (show.value) {
    nextTick(update);
  }
};

// 외부 클릭 감지
const closeOnClickOutside = (event) => {
  if (!trigger.value?.contains(event.target) && !dropdown.value?.contains(event.target)) {
    show.value = false;
  }
};

onMounted(() => {
  document.addEventListener("click", closeOnClickOutside);
  document.addEventListener("keydown", closeOnEscape);
});

onBeforeUnmount(() => {
  document.removeEventListener("click", closeOnClickOutside);
  document.removeEventListener("keydown", closeOnEscape);
});

// Escape 키 이벤트 리스너 추가
const closeOnEscape = (e) => {
  console.log(e);
  if (show.value && e.key === "Escape") {
    show.value = false;
  }
};
</script>

<template>
  <div class="relative">
    <div ref="trigger" @click="toggleDropdown" class="cursor-pointer">
      <slot name="trigger" />
    </div>

    <div class="bg-white">
      <div v-show="show" ref="dropdown" :style="floatingStyles" class="absolute z-50">
        <slot />
      </div>
    </div>
  </div>
</template>
