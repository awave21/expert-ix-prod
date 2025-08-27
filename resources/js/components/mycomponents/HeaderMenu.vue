<script setup lang="ts">
import { Link, router, usePage } from "@inertiajs/vue3";
import { Menu, Stethoscope, X } from "lucide-vue-next";
import { ref } from "vue";
import logo from "/var/www/expertix/storage/app/public/logo/logo.png";
const page = usePage();

// Проверка активного маршрута
const isCurrentRoute = (path: string) => {
  return page.url === path;
};

const isMobileMenuOpen = ref(false);

const menuItems = [
  { name: "Календарь", path: "/calendar" },
  { name: "Библиотека", path: "/library" },
  { name: "Мастер-классы", path: "/masterclasses" },
  { name: "Курсы", path: "/courses-nmo" },
  { name: "Портфолио", path: "/portfolio" },
  { name: "Лекторы", path: "/lecturers" },
  { name: "НМО", path: "/nmo" },
  { name: "О нас", path: "/about" },
];

const toggleMobileMenu = () => {
  isMobileMenuOpen.value = !isMobileMenuOpen.value;
};

const closeMobileMenu = () => {
  isMobileMenuOpen.value = false;
};

// если хочешь навигировать программно
const navigateTo = (path: string) => {
  router.visit(path);
  closeMobileMenu();
};
</script>

<template>
  <header
    class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 shadow-sm backdrop-blur-md"
  >
    <div class="container mx-auto px-4">
      <div class="flex h-20 items-center justify-between">
        <!-- Logo -->
        <img href="/" :src="logo" alt="Логотип" class="h-12 w-auto" />
        <!--  <p class="-mt-1 text-xs text-slate-500">Образовательный цент</p>
        <Link href="/" class="flex cursor-pointer items-center space-x-4">
           <div class="relative">
            <div
              class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-teal-500 to-cyan-600 shadow-lg"
            >
             <Stethoscope class="h-7 w-7 text-white" />
            </div>
            <div
              class="absolute -right-1 -bottom-1 h-4 w-4 rounded-full border-2 border-white bg-green-500"
            ></div>
          </div>
          <div> 
            
          </div>
        </Link> -->

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex">
          <div class="rounded-2xl bg-slate-50 p-2 shadow-inner">
            <div class="flex items-center space-x-1">
              <Link
                v-for="item in menuItems"
                :key="item.path"
                :href="item.path"
                class="rounded-xl px-4 py-2.5 text-sm font-medium whitespace-nowrap transition-all duration-200"
                :class="
                  isCurrentRoute(item.path)
                    ? 'bg-white text-teal-700 shadow-sm ring-1 ring-teal-100'
                    : 'text-slate-600 hover:bg-white/70 hover:text-slate-800'
                "
              >
                {{ item.name }}
              </Link>
            </div>
          </div>
        </nav>

        <!-- Mobile Menu Button -->
        <button
          @click="toggleMobileMenu"
          class="rounded-xl bg-slate-100 p-3 text-slate-600 transition-colors hover:bg-slate-200 lg:hidden"
        >
          <Menu v-if="!isMobileMenuOpen" :size="24" />
          <X v-else :size="24" />
        </button>
      </div>

      <!-- Mobile Navigation -->
      <div
        v-if="isMobileMenuOpen"
        class="space-y-2 border-t border-slate-200 py-4 lg:hidden"
      >
        <Link
          v-for="item in menuItems"
          :key="item.path"
          :href="item.path"
          class="block w-full rounded-xl px-4 py-3 text-left transition-all duration-200"
          :class="
            isCurrentRoute(item.path)
              ? 'border border-teal-200 bg-teal-50 text-teal-700'
              : 'text-slate-600 hover:bg-slate-50'
          "
          @click="closeMobileMenu"
        >
          {{ item.name }}
        </Link>
      </div>
    </div>
  </header>
</template>
