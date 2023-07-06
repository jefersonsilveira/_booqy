<template>
    <header class="bg-white dark:bg-black">
      <nav class="bg-white dark:bg-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center py-6">
            <div class="flex-shrink-0 text-4xl font-black tracking-[-.08em] text-[#af38f9] dark:text-[#af38f9]">
              <Link href="/">booqy</Link>
            </div>
            <div class="hidden md:flex items-center space-x-4" >
              <button @click="toggleDarkMode" class="flex items-center justify-center w-12 h-12 text-white rounded-full focus:outline-none" v-if="!logado">
                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5 h-5 fill-[#af38f9] hover:fill-[#8c2cc7] dark:fill-[#af38f9] dark:hover:fill-[#8c2cc7]">
                  <path d="M448 256c0-106-86-192-192-192V448c106 0 192-86 192-192zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/>
                </svg>

              </button>

              <Link href="/login" v-if="!logado"
                    preserve-state="true" class="text-white text-[14px] bg-[#af38f9] hover:bg-[#8c2cc7] focus:ring-4 focus:ring-blue-300 rounded-lg px-6 py-2.5 dark:bg-[#af38f9] dark:hover:bg-[#8c2cc7] focus:outline-none dark:focus:ring-blue-800 font-bold">
                Entrar
              </Link>
              
              <Link href="/register" class="font-semibold leading-6 text-[#af38f9] hover:text-[#8c2cc7]" v-if="!logado">Junte-se a nós!</Link>
              
                <span class="text-gray-700 font-bold hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium" v-if="logado">Você está logado!</span> 
                <Link href="/dashboard" 
                class="text-gray-700 hover:bg-gray-200 font-bold hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium mr-4" 
                v-if="logado">
                Acessar o painel
              </Link>

            </div>
          </div>
        </div>
      </nav>
    </header>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<script>
export default {
  props: {
    logado: {
      type: Boolean,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>

</style>