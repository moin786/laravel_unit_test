<script setup>
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import DataTable from 'datatables.net-vue3'
import Select from 'datatables.net-select';
import DataTablesCore from 'datatables.net';
import Editor from 'datatables.net-editor';
import Buttons from 'datatables.net-buttons';
import 'datatables.net-dt/css/jquery.dataTables.min.css'
import $ from 'jquery'
import { ref, computed, onMounted, onUpdated} from 'vue';

const props_info = defineProps({
    is_success: Boolean
})

const form = useForm();

const msg = computed(() => {
    return usePage().props.value.flash.success ?? null;
});

const parent_data = ref({
    success_msg:msg

});

const emit = defineEmits(['isSubmitted','form_type','edit_form_data','msg_broadcast'])

const mhtd_form_type = (value) => emit('form_type', value);
const mhtd_edit_form_data = (value) => emit('edit_form_data', value);
const mhtd_msg_broadcast = (value) => emit('msg_broadcast', value);
const frmSubmit = (value) => emit('isSubmitted', value);

const delete_category_record = (id) => {
    if(confirm('Are you sure, want to delete the record')) {
        form.delete(route('category-delete', id),{
            onSuccess: () => {
                frmSubmit(true);
                mhtd_form_type('ins');
                mhtd_msg_broadcast(parent_data);
                $('.display').dataTable().fnDestroy();
                categoryList();
            }
        })
    }
}

const categoryList = () => {
    $('.display').DataTable({
        "order": [[ 0, 'desc' ]],
        "ajax": {
            "url": "category-list",
            "dataType": "json",
            "type": "get"
        },
        "columnDefs": [{
            "targets": -1,
            "searchable": false,
            render: function(data, type, row, meta) {
                
                return `<span class="flex gap-2">
                        <a href="#" data-id="${row[0]}" data-name="${row[1]}" class="editor-edit">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </a>

                        <a href="#" data-id="${row[0]}" class="dlt-category">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>
                        </span>`;
            }
        }]
    })
}

onMounted(() => {
    categoryList();

    $('.display').on('click','.editor-edit', function(e){
        e.preventDefault();

        mhtd_form_type('edt');

        mhtd_edit_form_data({
            id: $(this).data('id'),
            name: $(this).data('name')
        })

        setTimeout(() => {
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
        }, 100)

    })

    $('.display').on('click','.dlt-category', function(e){
        e.preventDefault();
        delete_category_record($(this).data('id'));
    })
})


onUpdated(() => {
    if (props_info.is_success === true) {
        $('.display').dataTable().fnDestroy();
        categoryList();
    }
})

</script>

<template>
    <table
        class="display"
        width="100%"
    >
        <thead>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th></th>
            </tr>
        </tbody>
    </table>
</template>

<style lang="scss" scoped>

</style>