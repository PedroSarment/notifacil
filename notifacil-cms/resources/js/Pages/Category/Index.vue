<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PageTitle from '@/Components/PageTitle.vue';
import WhiteCard from '@/Components/WhiteCard.vue';
//import NewsItem from './NewsItem.vue'
import Pagination from '@/Components/Pagination.vue'
import ModalBase from '@/Components/ModalBase.vue'
import List from './List.vue'
import Create from './Create.vue'
/* import List from './List.vue'
import View from './View.vue'
import Create from './Create.vue'
import Edit from './Edit.vue' */
import ConfirmExclusion from '@/Components/ConfirmExclusion.vue';
import CategoryItem from './CategoryItem.vue'
import Delete from './Delete.vue'

const props = defineProps({

    categorys: {
        type: Object,
        default: null
    },
    state: {
        type: String,
        default: 'index'
    }, 
    category: {
        type: Object,
        default: null
    }, 

});

</script>

<template>
    
    <AppLayout title="Inicio">

        <div class="flex flex-row w-full gap-5">

            <WhiteCard>

            <div>
                <div class="flex flex-col gap-4">
                    
                    <List v-if="state === 'index'" :categorys="categorys"/>
                    <Create v-if="state === 'creating'"/>
                    <Delete v-if="state === 'deleting'" :categorys="categorys" :category="category"/>  
                    <!-- <View v-if="state === 'viewing' || state === 'deleting'" :id="news.id" :author="news.created_by.name" :category="news.category.title" :date="news.created_at" :title="news.title" :content="news.content" :summary="news.summary" :views="news.views"/>
                    <Create v-if="state === 'creating'" :categorys="categorys"/>
                    <Edit v-if="state === 'editing'" :news="news" :categorys="categorys"/> -->

                </div>
            </div>

            </WhiteCard>

        </div>

        <!-- <ModalBase
            width="md:w-4/12"
            :open="true"
            @close="index()">

            <Create/>

        </ModalBase> -->


    </AppLayout>
</template>
