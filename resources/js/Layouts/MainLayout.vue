<script setup>
import NavInfo from "@/Components/NavInfo.vue";

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

        <div class="md:hidden"></div>
      </div>

      <!-- User -->
      <div
        class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0"
      >
        <div>{{ $page.component }}</div>

        <div>
          <div v-if="auth.user" class="-mx-3 flex flex-1 justify-end">
            {{ auth.user.name }}
            /
            <Link class="ml-1" type="button" method="post" :href="route('logout')"
              >logout</Link
            >
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
      <div class="hidden shrink-0 bg-[#293d14] p-4 w-56 md:block overflow-y-auto">
        Left Menu
      </div>

      <!-- content -->
      <div class="md:flex-1 md:overflow-y-auto p-10" scroll-region>
        <slot />

        <footer
          class="fixed bottom-0 py-4 right-0 text-sm text-center text-black dark:text-white/70 bg-slate-200 w-full"
        >
          Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
        </footer>
      </div>
    </div>
  </div>
</template>
