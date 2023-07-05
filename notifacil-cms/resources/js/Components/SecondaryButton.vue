<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 bg-white w-full md:w-fit border border-primary rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-primary hover:text-white focus:outline-none focus:ring-2 focus:ring-primaryDark focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
