<script setup>
import PageTitle from '@/Components/PageTitle.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Link } from '@inertiajs/vue3';

defineProps({

    id: String,
    title: String,
    content: String,
    date: String,
    author: String,
    summary: String,
    category: String,
    views: String,

})

</script>
<template>

    <div class="flex flex-col gap-5">

        <div class="rounded-2xl bg-primary text-sl text-white w-fit flex flex-col px-4 py-1">{{category}}</div>

        <PageTitle>{{title}}</PageTitle>

        <div class="flex flex-col md:flex-row gap-3 md:gap-8 text-greyDark">

            <div class="flex flex-row gap-3">
                <img class="w-[18px]" src="/assets/icons/Relogio.svg"/>
                <div>{{date}}</div>
            </div>
            <div class="flex flex-row gap-3">
                <img class="w-[18px]" src="/assets/icons/Person.svg"/>
                <div>{{author}}</div>
            </div>
            <div class="flex flex-row gap-3">
                <img class="w-[18px]" src="/assets/icons/Views.svg"/>
                <div>{{views}}</div>
            </div>
        </div>

        <div class="font-extralight text-base">
            <div>{{summary}}</div>
        </div>

        <div class="font-normal text-xl w-full flex flex-col items-center list-disc	">
           {{content}}
        </div>

        <div class="flex flex-col md:flex-row gap-4 mt-8">

            <Link :href="'/noticias/edita/' + id"><PrimaryButton>Editar</PrimaryButton></Link>
            <Link href="/noticias"><SecondaryButton>Voltar</SecondaryButton></Link>
            <Link :href="'/noticias/exclui/' + id"><DangerButton>Excluir</DangerButton></Link>
        
        </div>

    </div>


</template>