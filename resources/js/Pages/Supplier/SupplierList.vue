<script setup>
import { useForm } from '@inertiajs/inertia-vue3';
import DataTable from 'datatables.net-vue3'
import Select from 'datatables.net-select';
import DataTablesCore from 'datatables.net';
import Editor from 'datatables.net-editor';
import Buttons from 'datatables.net-buttons';
import 'datatables.net-dt/css/jquery.dataTables.min.css'
import $ from 'jquery'
import { ref, onMounted, onUpdated } from 'vue';


const props_info = defineProps({
    parent_to_child: String,
    is_success: Boolean
});


const form = useForm();

const emit = defineEmits(['supplier_frmtype','edit_form_data'])


const mthd_supplier_frm_type = (value) => emit('supplier_frmtype', value)

const edit_supplier_formdata = (value) => emit('edit_form_data', value)



const delete_supplier_record = (id) => {
    if(confirm('Are you sure want to delete the record')) {
        form.delete(route('supplier-delete', id),{
            onSuccess: () => {
                $('.display').dataTable().fnDestroy();
                supplierList()
            }
        })
    }
    
}


const supplierList = () => {
    $('.display').dataTable({
            "order": [[ 0, 'desc' ]],
            "ajax": {
                "url": "supplier-list",
                "dataType": "json",
                "type": "get"
            },
            "columnDefs": [{
                "targets": -1,
                "searchable": false,
                render: function(data, type, row, meta) {
                    
                    return `<span class="flex gap-2">
                            <a href="#" data-id="${row[0]}" data-name="${row[1]}" data-mobile="${row[2]}" data-email="${row[3]}" data-address="${row[4]}" data-landphone="${row[5]}" data-contact_person="${row[6]}" data-contact_person_mobile="${row[7]}" data-contact_person_email="${row[8]}" class="editor-edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>

                            <a href="#" data-id="${row[0]}" class="dlt-supplier">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </a>
                            </span>`;
                }
            }]
        });

}


onUpdated(() => {
    if (props_info.is_success === true) {
        $('.display').dataTable().fnDestroy();
        supplierList();
    }

    
})

onMounted(() => {
    
    supplierList()

    $('.display').on('click', 'a[class="editor-edit"]', function(e){
        e.preventDefault();
        
        mthd_supplier_frm_type('edt')

        edit_supplier_formdata({
            id: $(this).data('id'),
            name: $(this).data('name'),
            mobile: $(this).data('mobile'),
            email: $(this).data('email'),
            address: $(this).data('address'),
            landphone: $(this).data('landphone'),
            contact_person: $(this).data('contact_person'),
            contact_person_mobile: $(this).data('contact_person_mobile'),
            contact_person_email: $(this).data('contact_person_email')
        })
        setTimeout(() => {
            $('#id').val($(this).data('id'))
            $('#name').val($(this).data('name'))
            $('#mobile').val($(this).data('mobile'))
            $('#email').val($(this).data('email'))
            $('#address').val($(this).data('address'))
            $('#landphone').val($(this).data('landphone'))
            $('#contact_person').val($(this).data('contact_person'))
            $('#contact_person_mobile').val($(this).data('contact_person_mobile'))
            $('#contact_person_email').val($(this).data('contact_person_email'))
        },100)
        
    })

    $('.display').on('click','a[class="dlt-supplier"]', function(e){
        e.preventDefault();
        delete_supplier_record($(this).data('id'))
    })
    
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
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>Land Phone</th>
            
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>Land Phone</th>
            
            <th></th>
            </tr>
        </tbody>
    </table>
</template>



<style lang="scss" scoped>

</style>