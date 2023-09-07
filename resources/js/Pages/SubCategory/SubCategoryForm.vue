
<script setup>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import 'flowbite/plugin';
import { computed, defineComponent, onMounted, ref } from 'vue';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

defineComponent({
    vSelect
})

defineProps({
    parent_to_child: String,
    form_type: String

})

const emit = defineEmits(['isSubmitted','spparent_to_child','frm_info_toparent']);

const msg = computed(() => {
    return usePage().props.value.flash.success ?? 'Category Inserted Successfully';
})
const is_success = ref(false);
const parent_to_child  = ref(0);
const options = ref([
      'foo',
      'bar',
      'baz'
    ])

const form = useForm({
    name: '',
    category_parent: 0
});

const parent_data = ref({
    parent_child:parent_to_child,
    success_msg:msg

})

const frmSubmit = (value) => {
    emit('isSubmitted', value);
}

const sp_prnt_to_child = (value) => {
    emit('spparent_to_child', value);
}

const mthd_form_toparent = (value) => {
    emit('frm_info_toparent', value);
}


const submit = () => {

    form.post(route('insert-category'), {
        onFinish: () => {
            frmSubmit(true);
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

onMounted(() => {
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
                    <BreezeLabel for="name" value="Name" class="font-bold" />
                    <v-select :options="options" v-model="form.category_parent"  class="mt-1 block w-full text-base"></v-select>
                </div>
            </div>
            
            

            <div class="flex items-center justify-end mt-4">
            
                <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit
                </BreezeButton>
            </div>
        </form>
    </div>
</template>


<style lang="scss" scoped>

</style>