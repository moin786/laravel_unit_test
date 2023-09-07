<script setup>
import SidebarMenu from './../SideMenu/SideMenu.vue';

</script>


<template>
    <slot name="header" />

    <BreezeValidationErrors class="mb-4" />
    <!--<div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
    </div> -->
    <div class="flex flex-row gap-3">
        <div class="md:block lg:block xl:block  hidden relative">

            <SidebarMenu class="shadow-lg h-full" />
        </div>

        <div class="w-full">
            <slot name="breadcrumb" />
            <div class="flex flex-col gap-5 mx-auto">
                
                
                <div class="w-3/4 mx-auto mt-4 px-2">
                    <slot />
                </div>

                <div class="w-full mt-8 px-2">
                    <slot name="dataTable"/>
                </div>
            </div>
        </div>
    </div>
</template>