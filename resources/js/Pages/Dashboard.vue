<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import SidebarMenu from './SideMenu/SideMenu';
</script>

<template>
    

    <BreezeAuthenticatedLayout>
        <!--<template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>-->

        <div class="min-h-screen">
            <div class="max-w-10xl mx-auto">
                <div class="overflow-hidden">
                    <Head title="Dashboard" class="w-2/3" />
                    <div class="flex justify-between bg-white border-b border-gray-200 min-h-screen">
                        <div class="md:block lg:block xl:block  hidden relative shadow-lg">

                            <SidebarMenu />
                        </div>
                        <div class="w-full p-4 mx-auto">
                            content goes here
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
