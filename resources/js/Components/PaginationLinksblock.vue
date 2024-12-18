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
    <div>PaginationLinks</div>

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

        <div class="hidden lg:block border">
            <div class="flex items-center rounded-md overflow-hidden shadow-lg">
                <div v-for="link in paginator.links" :key="link.url">
                    <component
                        :is="link.url ? 'Link' : 'span'"
                        :href="link.url"
                        v-html="makeLabel(link.label)"
                        class="border-x border-slate-50 w-9 xl:w-12 h-10 xl:h-12 grid place-items-center bg-white"
                        :class="{
                            'font-bold text-blue-500': link.active,
                            'hover:bg-slate-300': link.url,
                            'text-zinc-400': !link.url,
                        }"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
