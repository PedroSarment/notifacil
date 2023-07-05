<script setup>
import { DialogTitle} from '@headlessui/vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ModalBase from './ModalBase.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    title: {
        type: String,
    },
    text: {
        type: String,
    },
    open: {
        type: Boolean,
        default: false,
    },
    urlDestroy: {
        type: String,
    },
    urlClose: {
        type: String,
        default: ''
    }
});

function close(){

    router.get(props.urlClose);
}

function deleteFunction(){

    router.delete(props.urlDestroy);
}

</script>

<template>
   <ModalBase :open="true" @close="close()" width="md:w-4/12">

        <div class="flex flex-col gap-5 px-2 py-5">

            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                
                <div class="sm:flex sm:items-start">
                
                <div class="mx-auto flex flex-shrink-0 items-center justify-center rounded-full bg-alert-light sm:mx-0 sm:h-10 sm:w-10">
                    <img src="/assets/icons/Alert.svg">
                </div>

                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <DialogTitle v-if="title" as="h3" class="text-xl font-bold text-error">{{title}}</DialogTitle>
                    <div class="mt-2">
                    <p v-if="text" class="text-sl">{{text}}</p>
                    </div>
                </div>

            </div>

        </div>

            <div class=" px-4 py-3 flex flex-col md:flex-row-reverse px-6 gap-7">
                <PrimaryButton @click="deleteFunction()"> Excluir </PrimaryButton>
                <Link :href="urlClose"><SecondaryButton :href="urlClose"> Cancelar </SecondaryButton></Link>
            </div>

        </div>

    </ModalBase>

  </template>
