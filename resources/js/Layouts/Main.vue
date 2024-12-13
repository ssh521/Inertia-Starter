<script setup>
</script>

<template>
<div class="md:flex md:flex-col border-1">
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
                  </div>
              </div>

              <!-- User -->
              <div
                  class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-white border-b md:px-12 md:py-0"
              >
                <div>
                    User       
                </div>

                <div>
                    <Link href="/">Home</Link>
                </div>
              </div>
          </div>

          <!-- main -->
          <div class="md:flex md:grow md:overflow-hidden">
              <div
                  class="hidden shrink-0 bg-[#293d14] p-4 w-56 md:block overflow-y-auto"
              >

              </div>

              <!-- content -->
              <div
                  class="md:flex-1 md:overflow-y-auto p-4"
                  scroll-region
              >
                  <slot />
              </div>
          </div>
      </div>
  </div>
</template>
