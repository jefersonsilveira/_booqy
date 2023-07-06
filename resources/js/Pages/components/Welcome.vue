<template>
    <!-- <header class="bg-white border">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex items-center">
            <h1 class="text-2xl font-bold tracking-tight text-gray-900 ml-4">Boas-vindas, <span class="text-[#8c2cc7]">{{ user.name }}</span>!</h1>
        </div>
    </header> -->
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<script>
export default {
  props: {
    user: {
      type: Object
    }
  }
};
</script>

<style lang="scss" scoped>

</style>