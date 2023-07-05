<script setup>
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

defineProps({
    open: false,
    width: String,
});

</script>

<template>

<TransitionRoot as="template" :show="open" @close="open = false">
    <Dialog as="div" class="relative z-50">

        <div class="fixed inset-0 overflow-y-auto">

            <div class="flex min-h-full items-end justify-center text-center sm:items-center sm:p-0">

                <div class="opacity-50 fixed inset-0 bg-black"></div>

                <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to="opacity-100 translate-y-0 sm:scale-100" >

                    <DialogPanel class="border border-divider relative overflow-hidden rounded-lg bg-white text-left transition-all"
                    :class="width"
                    >
                        <slot/>

                    </DialogPanel>

                </TransitionChild>

            </div>

        </div>

    </Dialog>

</TransitionRoot>

</template>

