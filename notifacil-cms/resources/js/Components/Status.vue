<script setup>

defineProps({
    status: String,
    type: String,

});

</script>

<template>

    <div class="flex flex-row gap-4 bg-white rounded shadow-md border border-border-input p-4 items-center">

        <img v-if="type == 'error'" class="w-[25px]" src="/assets/icons/WarningOutlined.svg"/>

        <img v-if="type == 'sucess'" class="w-[25px]" src="/assets/icons/CheckCircleOutlined.svg"/>

        <p class="text-xl"> {{status}} </p>

    </div>
</template>
