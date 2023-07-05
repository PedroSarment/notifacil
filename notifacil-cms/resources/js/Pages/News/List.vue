<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PageTitle from '@/Components/PageTitle.vue';
import WhiteCard from '@/Components/WhiteCard.vue';
import NewsItem from './NewsItem.vue'
import Pagination from '@/Components/Pagination.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    news: {
        type: Object,
        default: null
    }
});

function convertToDateTimeFormat(dateString) {
  
    const date = new Date(dateString);
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    const hour = date.getHours();
    const minute = date.getMinutes();
    const second = date.getSeconds();

    return `${day}/${month}/${year} ${hour}:${minute}:${second}`;
}

</script>

<template>

    <div class="flex flex-col gap-4">

        <div class="flex flex-row w-full justify-between">
            <PageTitle class="mb-2">Notícias</PageTitle>
            <Link href="/noticias/cadastro"><PrimaryButton>+</PrimaryButton></Link>
        </div>
                    
        <div  v-for="newsItem in news.data">
            
            <NewsItem :views="newsItem.views" :author="newsItem.created_by.name" :category="newsItem.category.title" :title="newsItem.title" :date="convertToDateTimeFormat(newsItem.created_at)" :id="newsItem.id" :summary="newsItem.summary"/>
        
        </div>

        <Pagination v-if="news != null" :paginacao="news"/>

    </div>

</template>