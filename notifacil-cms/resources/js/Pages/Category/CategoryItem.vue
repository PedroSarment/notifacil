<script setup>
import { Link } from '@inertiajs/vue3';
import DangerButton from '@/Components/DangerButton.vue';
import FormatedDateTime from '@/Components/FormatedDateTime.vue';

const props = defineProps({
    title: String,
    date: String,
    id: String,
})

</script>

<template>

    <div class="flex flex-row justify-between gap-3 mb-4 border border-divider w-full hover:bg-divider md:rounded-lg rounded-2xl p-4">
        
        <div class="flex flex-col gap-2">  
            <div class="text-primaryDark text-xl font-bold">{{title}}</div>
            <div class="flex flex-row text-sm gap-2"> 
                <img class="w-[18px]" src="/assets/icons/Relogio.svg"/> 
                <FormatedDateTime :date="date"/>
            </div>
        </div>

        <Link :href="'categorias/exclui/' + id "> <DangerButton class="h-[10px]">X</DangerButton></Link>

    </div>

</template>
