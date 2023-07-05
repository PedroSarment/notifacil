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
    category: {
        type: Object,
        default: null
    },
});

const form = useForm({  
    category_id: null
})

function submit() { 
      
    form.post('/categorias/apaga/' + Props.category.id)
}

function onCategorySelected(category) {
    
    form.category_id = category
}

</script>

<template>
    <div class="flex flex-row items-start gap-3">
        
        <img src="/assets/icons/Alert.svg">
        
        <form @submit.prevent="submit()" class="flex flex-col mt-4 gap-6">
            
            <PageTitle>Exclusão de Categoria</PageTitle>
            
            <div>Tem certeza que deseja continuar com a exclusão?</div>

            <div>Escolha a categoria para qual as noticias pertencentes a categoria excluída devem ser transferidas</div>

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

            <div class="flex flex-col md:flex-row gap-6 mt-5">
                <PrimaryButton type="submit">Excluir</PrimaryButton>
                <Link class="flex flex-row w-full md:w-fit bg-black" href="/categorias">
                    <SecondaryButton >Cancelar</SecondaryButton>
                </Link> 
            </div>

        </form>
 </div>
</template>


