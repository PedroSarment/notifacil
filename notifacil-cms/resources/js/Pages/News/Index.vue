<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PageTitle from '@/Components/PageTitle.vue';
import WhiteCard from '@/Components/WhiteCard.vue';
import NewsItem from './NewsItem.vue'
import Pagination from '@/Components/Pagination.vue'
import List from './List.vue'
import View from './View.vue'
import Create from './Create.vue'
import Edit from './Edit.vue'
import ConfirmExclusion from '@/Components/ConfirmExclusion.vue';

const props = defineProps({
    news: {
        type: Object,
        default: null
    },
    categorys: {
        type: Object,
        default: null
    },
    state: {
        type: String,
        default: 'index'
    }, 
    categorys: {
        type: Object,
        default: null
    }, 
});

</script>

<template>
    
    <ConfirmExclusion
        v-if=" state === 'deleting' "
        title="Excluir Notícia"
        text="Tem certeza que deseja continuar com a exclusão?"
        :urlDestroy="'/noticias/apaga/' + news.id"
        :open=" state == 'deleting'"
        urlClose="/noticias"
    />

    <AppLayout title="Inicio">

    <div class="flex flex-row w-full gap-5">

        <WhiteCard>

        <div>
            <div class="flex flex-col gap-4">
                
                <List v-if="state === 'index'" :news="news"/>  
                <View v-if="state === 'viewing' || state === 'deleting'" :id="news.id" :author="news.created_by.name" :category="news.category.title" :date="news.created_at" :title="news.title" :content="news.content" :summary="news.summary" :views="news.views"/>
                <Create v-if="state === 'creating'" :categorys="categorys"/>
                <Edit v-if="state === 'editing'" :news="news" :categorys="categorys"/>

            </div>
        </div>

        
        </WhiteCard>

    </div>


    </AppLayout>
</template>
