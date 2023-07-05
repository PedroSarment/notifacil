<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    paginacao: Object,

    });
</script>

<template>
    <div class="mt-6 -mb-1 flex flex-wrap flex-col md:flex-row justify-between content-center itens-center">

        <div class="flex flex-row gap-1 text-sl text-gray text-center itens-center">Mostrando <span class="text-sl">{{paginacao.from}}</span> a <span class="p-16-700-Inter">{{paginacao.to}}</span> de <span class="text-sl">{{paginacao.total}}</span></div>

        <div class=" border border-divider rounded-lg w-fit self-center">

            <template v-for="(link, key) in paginacao.links">

                <div v-if="link.url === null"

                     class="border-l border-divider relative inline-flex items-center px-4 py-2 text-sm font-medium text-primary cursor-default leading-5 rounded-md"
                     :class="{ 'ml-auto': link.label === 'Next' }">
                    <span v-html="link.label"></span>
                </div>

                <Link v-else

                    class="border-l border-divider relative inline-flex items-center px-4 py-2 hover:text-primary focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-text-Color-2 active:text-white transition ease-in-out duration-150"
                    :class="{ 'bg-primary text-white': link.active, 'ml-auto': link.label === 'Next' }"
                    :href="link.url">

                    <span v-html="link.label"></span>
                </Link>

            </template>

        </div>

    </div>
</template>


