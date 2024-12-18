<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";
import PaginationLinks from "@/Components/PaginationLinks.vue";
import TextInput from "@/Components/TextInput.vue";

// 넘어오는 값 받기
const props = defineProps({
  users: Object,
  searchTerm: String,
});

// 검색 값 받기
const search = ref(props.searchTerm);

// 검색 값 변경 시 검색 값 전달
watch(
  search,
  debounce((q) => {
    console.log(q);
    router.get(route("user.index"), { search: q }, { preserveState: true });
  }, 500)
);

// 날짜 포맷
const formatDate = (date) => {
  return new Date(date).toLocaleDateString("ko-KR", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
};
</script>

<template>
  <Head :title="` ${$page.component}`" />

  <div>
    <div class="flex justify-end">
      <div class="flex-initial">
        <TextInput
          type="search"
          class="form-input w-full"
          placeholder="Search"
          v-model="search"
        />
      </div>
    </div>

    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">avatar</th>
            <th class="pb-4 pt-6 px-6">name</th>
            <th class="pb-4 pt-6 px-6">email</th>
            <th class="pb-4 pt-6 px-6">created_at</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="user in users.data"
            :key="user.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <img
                :src="
                  user.avatar
                    ? '/storage/' + user.avatar
                    : '/storage/avatars/default-avatar.png'
                "
                :alt="user.name"
                class="w-8 h-8 rounded-full"
              />
              <img
                v-if="user.avatar"
                class="block -my-2 mr-2 w-5 h-5 rounded-full"
                :src="user.avatar"
              />
            </td>
            <td class="border-t">
              <Link :href="route('user.show', user.id)">{{ user.name }}</Link>
            </td>
            <td class="border-t">{{ user.email }}</td>
            <td class="w-px border-t">{{ formatDate(user.created_at) }}</td>
          </tr>
          <tr v-if="users.length === 0">
            <td class="px-6 py-4 border-t" colspan="4">No users found.</td>
          </tr>
        </tbody>
      </table>
    </div>

    <PaginationLinks :paginator="users" />
  </div>
</template>
