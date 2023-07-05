<script setup>

import Status from './Status.vue';

const Props = defineProps({
    name: String,
    label: String,
    value: Object,
    error: Object,
    placeholder: String,
    disabled: {
        type: Boolean,
        default: false
    },

});


</script>

<template>

    <div class="rounded border-solid border border-divider p-3 text-text-Color-2">

        <label for="titulo">{{label}}</label><br>
        <input :disabled="disabled" :placeholder="placeholder" :value="value" @input="$emit('update:value', $event.target.value)" ref="input" class="focus:border-white focus:outline-none border-white  outline-white w-full placeholder:text-divider " :name="name" :id="name" type="text">

        <div>

        </div>
    </div>

    <Status v-if="error" type="error" :status="error"/>

</template>

