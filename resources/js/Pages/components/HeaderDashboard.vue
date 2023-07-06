<template>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between ml-4">
            <div class="flex items-center justify-start">
                <div class="flex-shrink-0 text-4xl font-black tracking-[-.08em] text-[#af38f9] dark:text-[#af38f9]">
                <Link href="/">booqy</Link>
                </div>
                <div class="hidden md:block">
                    <div class="esquerda ml-10 flex items-baseline space-x-4">
                        <Link href="/dashboard" class="text-gray-700 hover:bg-gray-200 rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Início</Link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block justify-end">
                
                <div class="ml-10 flex items-center space-x-4">
                    <div class="text-gray-700 font-bold px-3 py-2 text-sm font-medium">
                        Boas-vindas <span class="font-bold text-[#af38f9]">{{ user.name }}</span>!
                        <!-- <Link class="text-gray-700 hover:bg-gray-200 font-bold hover:text-gray-700 rounded-md px-3 py-2 text-sm font-medium mr-4" href="/logout">Sair</Link> -->
                    </div>
                    <div class="shrink-0 rounded-full">

                        <img 
                            v-if="this.$page.props.user.profile_photo_path"
                            class="h-10 w-10 object-cover rounded-full mr-4 cursor-pointer border-solid 
                            border-2 border-transparent hover:border-solid hover:border-2 hover:border-[#af38f9]" 
                            :src="getProfilePhotoUrl" 
                            type="button" 
                            id="avatarButton"
                            data-dropdown-toggle="userDropdown" 
                            data-dropdown-placement="bottom-start"
                        />
                        <svg 
                            v-if="!this.$page.props.user.profile_photo_path" 
                            fill="none" 
                            stroke="currentColor" 
                            stroke-width="1.5" 
                            viewBox="0 0 24 24" 
                            xmlns="http://www.w3.org/2000/svg" 
                            aria-hidden="true"
                            class="text-[#af38f9] hover:text-[#8c2cc7] h-10 w-10 object-cover rounded-full mr-4 cursor-pointer border-solid 
                            border-2 border-transparent hover:border-solid hover:border-2 hover:border-[#af38f9]"
                            type="button" 
                            id="avatarButton"
                            data-dropdown-toggle="userDropdown" 
                            data-dropdown-placement="bottom-start"
                        >
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" 
                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"
                            ></path>
                        </svg>
                        
                        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-54">
                            <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                            <div>{{ user.name }}</div>
                            <div class="font-medium text-xs truncate">{{ user.email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                            <li>
                                <a href="/profile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  class="w-5 h-5 inline-block mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                                    </svg>
                                    Perfil
                                </a>
                            </li>
                            </ul>
                            <div class="py-1">
                                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                    <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
                                    </svg>
                                    Sair
                                </a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            
        </div>
    </div>
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
  },
  computed: {
      getProfilePhotoUrl() { 
        const baseUrl = window.location.origin
        const path = this.$page.props.user.profile_photo_path
        if (path) {
            return `${baseUrl}/storage/${path}`;
        } else {
            return null;
        }
      },
    },
};
</script>

<style lang="scss" scoped>

</style>