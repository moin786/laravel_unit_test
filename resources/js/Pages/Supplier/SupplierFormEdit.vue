<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import 'flowbite/plugin';
import { computed, onUpdated, ref } from 'vue';


const props_info = defineProps({
    parent_to_child: String,
    form_type: String,
    edit_form: Object,
})

const emit = defineEmits(['isSubmitted','spparent_to_child','ins_frm_type','frm_info_toparent']);

const msg = computed(() => {
    return usePage().props.value.flash.success ?? 'Supplier Inserted Successfully';
})
const is_success = ref(false);
const parent_to_child  = ref(0);

const form = useForm({
    id: props_info.edit_form.id,
    name: props_info.edit_form.name,
    address: props_info.edit_form.address,
    mobile: props_info.edit_form.mobile,
    landphone:props_info.edit_form.landphone,
    email:props_info.edit_form.email,
    contact_person:props_info.edit_form.contact_person,
    contact_person_email:props_info.edit_form.contact_person_email,
    contact_person_mobile:props_info.edit_form.contact_person_mobile
});


const parent_data = ref({
    parent_child:parent_to_child,
    success_msg:msg

})

const frmSubmit = (value) => emit('isSubmitted', value);

const sp_prnt_to_child = (value) => emit('spparent_to_child', value);

const set_form_type = (value) => emit('ins_frm_type', value);

const mthd_form_toparent = (value) => {
    emit('frm_info_toparent', value);
}

const submit = () => {

    form.post(route('update-supplier'), {
        onFinish: () => {
            frmSubmit(true);
            set_form_type('ins');
        } ,
        onSuccess: () => {
            is_success.value = true;
            parent_to_child.value += 1;
            
            
            form.reset();

            setTimeout(() => {
                is_success.value = false;
            }, 1000)
        }
    });
};

onUpdated(() => {
    mthd_form_toparent(form);
})
</script>

<template>
    <div class="px-4 pb-4">
        <form @submit.prevent="submit();sp_prnt_to_child(parent_data);">
            <div class="flex sm:flex-row flex-col justify-between items-center gap-2 w-full">
                <div class="mt-4 w-full">
                    <BreezeLabel for="name" value="Name" class="font-bold" />
                    <BreezeInput id="name" type="text" class="mt-1 block w-full text-base" v-model="form.name" required autofocus autocomplete="off" />
                </div>

                <div class="mt-4 w-full">
                    <BreezeLabel for="mobile" value="Mobile" class="font-bold" />
                    <BreezeInput id="mobile" type="text" class="mt-1 block w-full text-base" v-model="form.mobile" required autocomplete="off" />
                </div>

                <div class="mt-4 w-full">
                    <BreezeLabel for="emial" value="Email" class="font-bold" />
                    <BreezeInput id="email" type="email" class="mt-1 block w-full text-base" v-model="form.email" required autocomplete="off" />
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row justify-between items-center gap-2 w-full">
                <div class="mt-4 w-full">
                    <BreezeLabel for="address" value="Address" class="font-bold" />
                    <BreezeInput id="address" type="text" class="mt-1 block w-full text-base" v-model="form.address" required autocomplete="off" />
                </div>

                

                <div class="mt-4 w-full">
                    <BreezeLabel for="landphone" value="Land Phone" class="font-bold" />
                    <BreezeInput id="landphone" type="text" class="mt-1 block w-full text-base" v-model="form.landphone" required autocomplete="off" />
                </div>
            </div>

            
            <div class="flex flex-col sm:flex-row justify-between items-center gap-2 w-full">
                <div class="mt-4 w-full">
                    <BreezeLabel for="contact_person" value="Contact Person" class="font-bold" />
                    <BreezeInput id="contact_person" type="text" class="mt-1 block w-full text-base" v-model="form.contact_person" required autocomplete="off" />
                </div>

                <div class="mt-4 w-full">
                    <BreezeLabel for="contact_person_mobile" value="Contact Person Mobile" class="font-bold" />
                    <BreezeInput id="contact_person_mobile" type="text" class="mt-1 block w-full text-base" v-model="form.contact_person_mobile" required autocomplete="off" />
                </div>

                <div class="mt-4 w-full">
                    <BreezeLabel for="contact_person_email" value="Contact Person Email" class="font-bold" />
                    <BreezeInput id="contact_person_email" type="email" class="mt-1 block w-full text-base" v-model="form.contact_person_email" required autocomplete="off" />
                </div>

                <input type="hidden" v-model="form.id" id="id" />
            </div>

            <div class="flex items-center justify-end mt-4">
            
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Edit
                </BreezeButton>
            </div>
        </form>
    </div>
</template>


<style lang="scss" scoped>

</style>