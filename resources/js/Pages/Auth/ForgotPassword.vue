<template>
    <div class="min-h-screen font-Red_Hat_Display font-light">
        <Header></Header>

        <main class="bg-gray-100 h-[80vh] justify-center items-center dark:bg-gray-900">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                
                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

                    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">

                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <h2 class="mb-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                                Redefinir sua senha
                            </h2>
                        </div>
                        
                        <form class="space-y-6" @submit.prevent="handleForm">
                            
                            <div v-if="$page.props.flash.success" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Info</span>
                                <div class="ml-3 text-sm">
                                    <span class="font-medium"> {{ $page.props.flash.success }}</span>
                                </div>
                            </div>

                                <div v-if="errors && Object.keys(errors).length > 0" class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Danger</span>
                                    <div>
                                        <span class="font-medium">Alguns requisitos não foram atendidos</span>
                                        <ul class="mt-1.5 ml-4 list-disc list-inside">
                                            <li v-for="(error, field) in errors" :key="field">
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <label v-if="$page.props.flash.success == null" for="text" class="block text-sm font-light leading-6 text-gray-500">
                                    Informe o seu email de cadastro que enviaremos as instruções para redefinir a sua senha de acesso.
                                </label>
                                
                                <div v-if="$page.props.flash.success == null">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-500">E-mail</label>
                                    <div class="mt-2">
                                    <input id="email" name="email" autocomplete="email" 
                                    v-model="form.email" tabindex="1"
                                    class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                    ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                    focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div v-if="$page.props.flash.success == null">
                                    <button type="submit" tabindex="3" class="flex w-full justify-center rounded-md px-3 p-3 text-sm font-semibold 
                                    leading-6 text-white shadow-sm text-white bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                                    focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Redefinir senha</button>
                                </div>
                            
                        </form>

                    </div>
                </div>

            </div>
        </main>

        <Footer></Footer>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3'
import { defineProps } from 'vue';

import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';

defineProps({ 
    errors: Object,
})
</script>

<script>
export default {
  data() {
    return {
      form: {
        _token: null,
        email: null
      },
    };
  },
  methods: {
    handleForm() {
      this.$inertia.post('/forgot-password', {
        ...this.form,
        _token: this.$page.props.csrf_token,
      });
    },
  },
  computed: {
    success() {
      return this.$page.props.session.success;
    },
  },
}
</script>

<style lang="scss" scoped>

</style>