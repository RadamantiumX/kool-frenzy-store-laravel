<template>
    <div  class="min-h-full bg-gray-200 flex">
    <!--    Sidebar-->
    <SideBar :class="{'-ml-[200px]': !sidebarOpened}"/>
    <!--/    Sidebar-->

    <div class="flex-1">
      <NavBar @toggle-sidebar="toggleSidebar"></Navbar>
      <!--      Content-->
      <main class="p-6">
        <router-view></router-view>
      </main>
      <!--      Content-->
    </div>
  </div>

</template>

<script setup>
import {ref, computed, onMounted, onUnmounted} from 'vue'
import SideBar from "./SideBar.vue";
import NavBar from "./NavBar.vue";
import store from "../store";

const {title} = defineProps({
  title: String
})
const sidebarOpened = ref(true);

</script>

<style>
</style>