<script setup>
defineProps({
    paginator: {
        type: Object,
        required: true,
    },
});

const makeLabel = (label) => {
    if (label.includes("Previous")) {
        return "<<";
    } else if (label.includes("Next")) {
        return ">>";
    }
    return label;
};
</script>

<template>

    <div class="flex justify-between items-center mt-4">
        <div>
            <p class="text-sm lg:text-base">
                {{ paginator.current_page }} / {{ paginator.last_page }} page
                (총 {{ paginator.total }}건)
            </p>
        </div>

        <div class="block lg:hidden">
            <Link
                :href="paginator.prev_page_url"
                class="px-3 py-2 bg-gray-200 rounded-md mr-1"
                >이전 페이지
            </Link>
            <Link
                :href="paginator.next_page_url"
                class="px-3 py-2 bg-gray-200 rounded-md mr-1"
                >다음 페이지
            </Link>
        </div>

        <div class="hidden lg:block">
            <div class="flex items-center">
                <div v-for="link in paginator.links" :key="link.label">
                    <component
                        :is="link.url ? 'Link' : 'span'"
                        :href="link.url"
                        v-html="makeLabel(link.label)"
                        class="px-2 py-1 text-sm xl:text-base xl:px-3 xl:py-2 bg-gray-200 rounded-md mr-1"
                        :class="{
                            'bg-blue-500 text-white': link.active,
                        'text-gray-400 bg-gray-100': !link.url,
                        'hover:bg-blue-300': link.url,
                        }"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
