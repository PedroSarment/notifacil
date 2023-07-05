<script setup>

import Status from './Status.vue';
import { ref } from 'vue';
import { onBeforeMount } from 'vue';

const Props = defineProps({
    name: String,
    label: String,
    value: Object,
    error: Object,
    options: Array,
    placeholder: {
        type: String,
        default: ''
    },
});

let selected = ref(Props.placeholder)

onBeforeMount(() => {

    if(Props.value){
        selected = ref(Props.value)
    }
})
</script>

<template>

    <select :id="name" v-model="selected"  @change="$emit('optionSelected', selected)" class="text-black form-select rounded border rouded-lg border-divider focus:outline-none focus:border-primary py-2 w-full">

        <option disabled >{{placeholder}}</option>
        <option v-for="option in options" :value="option.id">{{option.title}}</option>

    </select>

    <Status v-if="error" type="error" :status="error"/>

</template>
