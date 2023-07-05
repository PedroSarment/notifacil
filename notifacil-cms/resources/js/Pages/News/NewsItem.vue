<script setup>
import { Link } from '@inertiajs/vue3';
import FormatedDateTime from '@/Components/FormatedDateTime.vue';

const props = defineProps({

    title: String,
    date: String,
    id: String,
    summary: String,
    category: String,
    author: String,
    views: String,
})

</script>

<template>

    <Link class="flex flex-col gap-3 mb-4 border border-divider w-full hover:bg-divider md:rounded-lg rounded-2xl p-4" :href="'/noticias/' + id" >
        
        <div class="rounded-xl bg-primary text-sm text-white w-fit flex flex-col px-3">{{category}}</div>

        <div class="text-primaryDark text-2xl font-bold">{{title}}</div>
        <div class="flex flex-row text-sm gap-2"> 
            <img class="w-[18px]" src="/assets/icons/Relogio.svg"/> 
            <FormatedDateTime :date="date"/> 
            <img class="w-[18px]" src="/assets/icons/Person.svg"/> {{author}}
        </div>
        <div class="text-base">{{summary}}</div>
        <div class="flex flex-row text-sm gap-2"> 
            <img class="w-[18px]" src="/assets/icons/Views.svg"/> {{views}}      
        </div>
      
    </Link>

</template>
