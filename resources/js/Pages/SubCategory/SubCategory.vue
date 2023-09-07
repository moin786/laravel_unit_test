<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import FormLayout from '../Settings/FormLayout.vue';
import 'flowbite/plugin';
import { onUpdated, ref } from 'vue';
import { useForm } from '@inertiajs/inertia-vue3';
import SubCategoryForm from './SubCategoryForm.vue';

const parent_to_child  = ref(1);
const child_data = ref({});
const is_success = ref(false);
const cat_form_type = ref('ins');
const edit_form = ref({});
const category_form = ref('');

const form = useForm({
    name: '',
    category_parent: 0
});

onUpdated(() => {
    setTimeout(() => {
        is_success.value = false;
    },1000)
})
</script>

<template>
    <BreezeAuthenticatedLayout>
        <FormLayout>
            <template #header>
                <Head title="Create Sub Category" />
            </template>

            <template #breadcrumb>
                <nav class="flex mt-2 pb-2 border-b border-gray-300" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Home
                        </a>
                        </li>
                        <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Sub Category</a>
                        </div>
                        </li>
                        <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Sub Create Category</span>
                        </div>
                        </li>
                    </ol>
                </nav>
            </template>
            <BreezeValidationErrors class="mt-6 mb-4" />


            <span class="flex mx-auto p-2 text-center justify-center bg-gray-200 text-gray-900 font-bold" v-if="is_success">{{ child_data.success_msg }}</span>

            <div class="flex flex-col sm:mx-auto w-full bg-white shadow-md mt-8">
                <div class="p-3 bg-gray-800 text-base border-b font-bold text-white">Sub Category</div>
                
                <SubCategoryForm v-if="cat_form_type === 'ins'" @isSubmitted="(value) => is_success = value" @spparent_to_child="(value) => child_data = value" />
                
            </div>
            
        </FormLayout>
    </BreezeAuthenticatedLayout>
</template>

<style lang="scss" scoped>

</style>