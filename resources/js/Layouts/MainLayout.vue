<script setup>
import LeftMenu from "@/Pages/LeftMenu.vue";
import PopupMenu from "@/Components/PopupMenu.vue";
import PopupMenuLink from "@/Components/PopupMenuLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
const props = defineProps({
  auth: Object,

  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
  laravelVersion: {
    type: String,
    required: true,
  },
  phpVersion: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
});
</script>

<template>
  <div class="md:flex md:flex-col md:h-screen border-1">
    <!-- header -->
    <div class="md:flex md:shrink-0">
      <div
        class="flex items-center justify-between px-6 py-4 bg-[#447712] md:shrink-0 md:justify-center md:w-56"
      >
        <div class="text-white text-2xl font-bold">
          <Link href="/">Inertia Starter</Link>
        </div>

        <div class="md:hidden">
          <Dropdown class="md:hidden" align="left">
            <template #trigger>
              <svg
                class="w-6 h-6 fill-white"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
            </template>
            <div class="bg-[#293d14] p-4 rounded-md w-[200px]">
              <LeftMenu />
            </div>
          </Dropdown>
        </div>
      </div>

      <!-- User -->
      <div
        class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0"
      >
        <div>{{ $page.component }}</div>

        <div>
          <div v-if="auth.user" class="-mx-3 flex flex-1 justify-end">
            <div>
              <PopupMenu align="right" width="48">
                <template #trigger>
                  <span class="inline-flex rounded-md">
                    <button
                      type="button"
                      class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                    >
                      {{ auth.user.name }}

                      <svg
                        class="-me-0.5 ms-2 h-4 w-4"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </button>
                  </span>
                </template>

                <template #content>
                  <div class="py-1">
                    <PopupMenuLink :href="route('user.index')"> Users </PopupMenuLink>
                    <PopupMenuLink :href="route('profile.edit')">
                      개인정보
                    </PopupMenuLink>
                    <PopupMenuLink :href="route('logout')" method="post" as="button">
                      로그아웃
                    </PopupMenuLink>
                  </div>
                </template>
              </PopupMenu>
            </div>
          </div>

          <div v-else>
            <Link
              :href="route('login')"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
              Log in
            </Link>

            <Link
              :href="route('register')"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
              Register
            </Link>
          </div>
        </div>
      </div>
    </div>

    <!-- main -->
    <div class="md:flex md:grow md:overflow-hidden">
      <div class="hidden shrink-0 bg-[#293d14] py-2 px-1 w-56 md:block overflow-y-auto">
        <LeftMenu />
      </div>

      <!-- content -->
      <div class="md:flex-1 md:overflow-y-auto p-10" scroll-region>
        <slot />

        <footer
          class="fixed bottom-0 py-2 right-0 text-sm text-center text-black dark:text-white/70 bg-slate-200 w-full"
        >
          Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
      </div>
    </div>
  </div>
</template>
