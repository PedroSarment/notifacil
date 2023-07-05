<script setup>
import { useForm } from '@inertiajs/vue3'
import InputSecondary from '@/Components/InputSecondary.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import SelectSecondary from '@/Components/SelectSecondary.vue'
import TextAreaSecondary from '@/Components/TextAreaSecondary.vue'
import PageTitle from '@/Components/PageTitle.vue'
import { Link } from '@inertiajs/vue3';


const Props = defineProps({
    categorys: {
        type: Object,
        default: null
    },
});

let publico = false;

const form = useForm({

    title: '',
    summary: '',
    content: '',
    category_id: null
})

function submit() {
    
    form.post('/noticias/salva')
}

function onCategorySelected(category) {
    form.category_id = category
}

</script>

<template>

    <PageTitle>Nova Notícia</PageTitle>

    <form @submit.prevent="submit()" class="flex flex-col mt-8 gap-6">

        <InputSecondary
            label="Título"
            :value="form.title"
            @update:value="form.title = $event"
            :error="form.errors.title"
            name="titulo"
        />

        <InputSecondary
            label="Resumo"
            :value="form.summary"
            @update:value="form.summary = $event"
            :error="form.errors.summary"
            name="resumo"
        />

         <SelectSecondary
            label="Categoria"
            :value="form.category_id"
            @update:value="form.category_id = $event"
            :error="form.errors.category_id"
            name="categoria"
            :options="categorys"
            placeholder="Categoria"
            @optionSelected="onCategorySelected($event)"
        />

        <TextAreaSecondary
            label="Conteudo"
            :value="form.content"
            @update:value="form.content = $event"
            :error="form.errors.content"
            name="conteudo"
        />

        <div class="flex flex-col md:flex-row gap-6 mt-5">
            <PrimaryButton type="submit">Publicar</PrimaryButton>
            <Link class="flex flex-row w-full md:w-fit bg-black" href="/noticias">
                <SecondaryButton >Cancelar</SecondaryButton>
            </Link> 
        </div>
    </form>

</template>


