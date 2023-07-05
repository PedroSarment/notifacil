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
})

function submit() {

    form.post('/categorias/salva')
}


</script>

<template>

    <div class="flex flex-col ">

        <PageTitle>Nova Categoria</PageTitle>

        <form @submit.prevent="submit()" class="flex flex-col mt-8 gap-6">

            <InputSecondary
                label="Título"
                :value="form.title"
                @update:value="form.title = $event"
                :error="form.errors.title"
                name="titulo"
            />

            <div class="flex flex-col md:flex-row gap-6 mt-5">
                <PrimaryButton type="submit">Criar</PrimaryButton>
                <Link class="flex flex-row w-full md:w-fit bg-black" href="/categorias">
                    <SecondaryButton >Cancelar</SecondaryButton>
                </Link> 
            </div>
        </form>

    </div>
</template>


