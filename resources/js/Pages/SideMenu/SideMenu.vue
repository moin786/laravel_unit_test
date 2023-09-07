<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>
<template>
    
<aside class="w-48 min-h-screen bg-gray-800" aria-label="Sidebar">
   <div class="overflow-y-auto py-2 px-2 bg-gray-800  dark:bg-gray-800 min-h-screen">
      <ul class="space-y-0">
         <li :style="{'borderBottom': '1px solid #666'}">
            <Link :href="route('dashboard')" class="flex items-center p-2 text-base font-normal text-white dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700">
               <svg aria-hidden="true" class="w-6 h-6 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
               <span class="ml-3">Dashboard</span>
            </Link>
         </li>
         <li :style="{'borderBottom': '1px solid #666'}">
            <Link :href="route('create-supplier')"  class="w-6 h-6 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">Manage Supplier</Link>
         </li>
         <li :style="{'borderBottom': '1px solid #666'}">
            <Link :href="route('create-category')"  class="w-6 h-6 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">Manage Category</Link>
         </li>
      </ul>
   </div>
</aside>

</template>