<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 bg-primary border border-transparent rounded-md font-semibold text-xs text-white uppercase  hover:bg-primaryDark focus:bg-primaryDark active:bg-primaryDark focus:outline-none focus:ring-2 focus:bg-primaryDark focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
