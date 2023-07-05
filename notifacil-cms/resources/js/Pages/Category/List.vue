<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PageTitle from '@/Components/PageTitle.vue';
import WhiteCard from '@/Components/WhiteCard.vue';
import CategoryItem from './CategoryItem.vue'
import Pagination from '@/Components/Pagination.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    categorys: {
        type: Object,
        default: null
    }
});

</script>

<template>

    <div class="flex flex-col gap-4">

        <div class="flex flex-row w-full justify-between">
            <PageTitle class="mb-2">Categorias</PageTitle>
            <Link href="/categorias/cadastro"><PrimaryButton>+</PrimaryButton></Link>
        </div>
                    
        <div  v-for="category in categorys.data">
            
            <CategoryItem :title="category.title" :date="category.created_at" :id="category.id" />
        
        </div>

        <Pagination v-if="categorys != null" :paginacao="categorys"/>

    </div>

</template>