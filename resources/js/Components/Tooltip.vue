<script setup>
import { ref, onMounted, onBeforeUnmount, nextTick, defineProps } from "vue";
import { useFloating, flip, shift, offset, autoUpdate } from "@floating-ui/vue";

// props 정의
const props = defineProps({
  align: {
    type: String,
    default: "bottom",
  },
  buttonText: {
    type: String,
    required: true,
  },
  tooltipContent: {
    type: String,
    required: true,
  },
});

const isShow = ref(false);
const referenceRef = ref(null);
const floatingRef = ref(null);

// Floating UI Vue 훅 사용
const { floatingStyles, update } = useFloating(referenceRef, floatingRef, {
  placement: props.align === "bottom" ? "bottom-start" : "top-start",
  middleware: [offset(8), flip(), shift({ padding: 8 })],
  whileElementsMounted: autoUpdate,
});

// 드롭다운 토글 함수
const toggleTooltip = () => {
  isShow.value = !isShow.value;
  if (isShow.value) {
    nextTick(update);
  }
};

// 외부 클릭 감지
const closeOnClickOutside = (event) => {
  if (
    !referenceRef.value?.contains(event.target) &&
    !floatingRef.value?.contains(event.target)
  ) {
    isShow.value = false;
  }
};

onMounted(() => {
  document.addEventListener("click", closeOnClickOutside);
});

onBeforeUnmount(() => {
  document.removeEventListener("click", closeOnClickOutside);
});
</script>

<template>
  <div class="container">
    <button
      ref="referenceRef"
      @click="toggleTooltip"
      @mouseenter="toggleTooltip"
      @mouseleave="toggleTooltip"
      class="trigger-button"
    >
      {{ buttonText }}
    </button>

    <div v-if="isShow" ref="floatingRef" class="tooltip" :style="floatingStyles">
      {{ tooltipContent }}
      <slot></slot>
    </div>
  </div>
</template>

<style scoped>
.container {
  position: relative;
  padding: 20px;
}

.trigger-button {
  position: relative;
  padding: 8px 16px;
  background: #4caf50;
  border: none;
  border-radius: 4px;
  color: white;
  cursor: pointer;
}

.tooltip {
  position: absolute;
  background: #333;
  color: white;
  padding: 8px 12px;
  border-radius: 4px;
  font-size: 14px;
  z-index: 1000;
}
</style>
