<script setup>

const props = defineProps({
    date: {
        type: String,
        default: ''
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
    {{convertToDateTimeFormat(date)}}
</template>