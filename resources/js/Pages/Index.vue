<template>
  
  <div class="min-h-screen font-Red_Hat_Display font-light bg-white dark:bg-black">
    
    <Header :logado="!!user"></Header>

    <main class="bg-gray-100 flex h-[80vh] justify-center items-center dark:bg-gray-900">
      <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h1 class="text-6xl font-extrabold leading-tight text-gray-700 dark:text-white text-center">
          Organize seus <span class="text-[#af38f9]">links em um só lugar</span>.
        </h1>
        <p class="mt-4 text-lg text-gray-500 text-center font-light">
          booqy permite que você acompanhe todos os seus links favoritos em um único local.
        </p>
        <div class="mt-6 text-center">

          <Link v-if="!user" href="/register" class="text-white bg-[#af38f9] hover:bg-[#8c2cc7] focus:ring-4 focus:ring-blue-300 
            rounded-lg px-6 text-lg py-3.5 dark:bg-[#af38f9] dark:hover:bg-[#8c2cc7] 
            focus:outline-none dark:focus:ring-blue-800 font-bold">Junte-se a nós</Link>

          
        </div>
      </div>
    </main>

    <Footer></Footer>

  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3'
import { defineProps } from 'vue';

import Header from './components/Header.vue';
import Footer from './components/Footer.vue';

defineProps({ 
  user: Object,
  status: Boolean,
  computed: {
      success() {
        console.log(this.$page.props)
        return this.$page.props.session.success;
      },
    }
})
</script>

<script>

</script>