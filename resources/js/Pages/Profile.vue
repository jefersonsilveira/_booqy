<template>

    <div class="min-h-full font-Red_Hat_Display font-light bg-gray-100 flex flex-col min-h-screen">
        
      <nav class="">
            <HeaderDashboard :user="user"></HeaderDashboard>
        </nav>

        <Welcome :user="user"></Welcome>

        <main class="mb-20 flex-grow">
          <div class="mx-auto max-w-7xl p-4 sm:px-8"> 
            
            <!-- <div class="flex items-center justify-between">
              <div class="text-2xl font-semibold text-gray-900 pl-4 py-1">
                Perfil <span class="font-light text-sm text-gray-400">/ Atualize informações pessoais e de acesso.</span>
              </div>
            </div> -->


            <!-- Breadcrumb -->
            <nav class=" ml-4 mt-0.5 flex inline-flex px-5 py-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                  <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#8c2cc7] dark:text-gray-400 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Início
                  </a>
                </li>
                <li class="inline-flex items-center text-sm font-medium text-gray-700 ">
                  <!-- <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white"> -->
                    <svg aria-hidden="true" class="w-6 h-6 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    Perfil
                  <!-- </a> -->
                </li>
              </ol>
            </nav>


            <div class="flex flex-wrap">
              
              <div class="w-1/2 mt-0.5 p-4">
                <div class="border border-gray-200 p-4 rounded-lg bg-white">

                  <tabs variant="underline" v-model="activeTab" class="p-5 text-sm font-semibold text-[#af38f9] hover:text-[#8c2cc7]"> <!-- class appends to content DIV for all tabs -->
                    <tab name="first" title="Dados pessoais">
                      <input type="hidden" name="tab" value="dados_pessoais">
                      <form id="formUpdateProfile" class="space-y-6 dropzone" @submit.prevent="updateProfile">
                        
                        <div v-if="errors && Object.keys(errors).length > 0 && aba === 'dados'" class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
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
                        
                        <div>
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-500">Nome</label>
                                <div class="mt-2">
                                    <input id="name" name="name" type="text" autocomplete="name" 
                                    v-model="formUpdateProfile.name"
                                    class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                    ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                    focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="100">
                                    <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formUpdateProfile.name?.length }}/100</span>
                                </div> 
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-500">E-mail</label>
                                <div class="mt-2">
                                    <input id="email" name="email" autocomplete="email"
                                    v-model="formUpdateProfile.email"
                                    class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                    ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                    focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="100">
                                    <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formUpdateProfile.email?.length }}/100</span>
                                </div>
                            </div>

                            <div>
                              <label for="profile_photo" class="block text-sm font-medium leading-6 text-gray-500">Imagem de perfil</label>
                              <div class="flex items-center space-x-6">
                                
                                <label class="block">
                                  <span class="sr-only">Choose profile photo</span>
                                  <input type="file" 
                                    @input="formUpdateProfile.profile_photo = $event.target.files[0]"
                                    @change="handleFileUpload"
                                    class="hidden" 
                                    id="profile_photo" 
                                  />
                                  <label for="profile_photo" class="block cursor-pointer bg-violet-50 text-violet-700 text-sm 
                                  font-semibold py-2 px-4 rounded-full border-0 hover:bg-violet-100">
                                    <span v-if="!this.$page.props.user.profile_photo_path">Escolha uma foto para seu perfil</span>
                                    <span v-if="this.$page.props.user.profile_photo_path">Altere a foto do seu perfil</span>
                                  </label>
                                </label>

                                <div v-if="this.$page.props.user.profile_photo_path" class="shrink-0 border rounded-full p-2">
                                  <img class="h-24 w-24 object-cover rounded-full" :src="getProfilePhotoUrl" />
                                </div>

                              </div>

                              <div class="flex items-center space-x-6">

                                <div v-if="formUpdateProfile.fileName" class="w-full p-2">
                                  <span class="text-sm font-medium leading-6 text-gray-500">Nova imagem selecionada:</span>
                                  <input :value="formUpdateProfile.fileName"
                                    class="w-full block text-violet-700 text-sm font-semibold py-2 px-4 rounded-lg border-0" maxlength="100" disabled>
                                  
                                </div>
                                
                              </div>

                            </div>

                            <div>
                                <button v-if="!formUpdateProfile.processing" type="submit" class="flex w-full justify-center rounded-md px-3 p-3 text-sm font-semibold 
                                leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>

                                <button v-if="formUpdateProfile.processing" 
                                  type="button" disabled 
                                  class="button-spinner w-full text-gray-500 bg-white rounded-lg border 
                                        border-gray-200 text-sm font-medium px-5 py-2.5 font-semibold ">
                                  <svg class="spinner mr-4" viewBox="0 0 50 50">
                                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
                                  </svg>
                                  Enviando...
                                </button>
                            </div>
                      </form>
                      
                    </tab>
                    <tab name="second" title="Alterar senha">
                      
                      <form id="formUpdatePassword" class="space-y-6" @submit.prevent="updatePassword">
                        
                        <div v-if="errors && Object.keys(errors).length > 0 && aba === 'password'" class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
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

                        <div>
                            <div class="flex items-center justify-between">
                              <label for="current_password" class="block text-sm font-medium leading-6 text-gray-500">Senha atual</label>
                            </div>
                            <div class="mt-2">
                              <input id="current_password" name="current_password" :type="showPassword ? 'text' : 'password'"  autocomplete="current-password" 
                              v-model="formUpdatePassword.current_password"
                              class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                              ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset
                              focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="255">
                              <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formUpdatePassword.current_password ? formUpdatePassword.current_password.length : 0 }}/255</span>
                            </div>
                            
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                              <label for="password" class="block text-sm font-medium leading-6 text-gray-500">Senha</label>
                            </div>
                            <div class="mt-2">
                              <input id="password" name="password" :type="showPassword ? 'text' : 'password'"  autocomplete="current-password" 
                              v-model="formUpdatePassword.password"
                              class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                              ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset
                              focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="255">
                              <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formUpdatePassword.password ? formUpdatePassword.password.length : 0 }}/255</span>
                            </div>
                            
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                              <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-500">Confirme sua senha</label>
                            <button type="button" @click="toggleShowPassword"
                                class="text-sm font-semibold text-[#af38f9] hover:text-[#8c2cc7]">
                                Mostrar senha
                            </button>

                            </div>
                            <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" :type="showPassword ? 'text' : 'password'" autocomplete="current-password" 
                            v-model="formUpdatePassword.password_confirmation"
                            class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                            ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset
                            focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="255">
                            <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formUpdatePassword.password_confirmation ? formUpdatePassword.password_confirmation.length : 0 }}/255</span>
                            </div>
                            
                        </div>
                        <div>
                            <button v-if="!formUpdatePassword.processing"
                            type="submit" class="flex w-full justify-center rounded-md px-3 p-3 text-sm font-semibold 
                            leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                            focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>

                            <button v-if="formUpdatePassword.processing" 
                                  type="button" disabled 
                                  class="button-spinner w-full text-gray-500 bg-white rounded-lg border 
                                        border-gray-200 text-sm font-medium px-5 py-2.5 font-semibold ">
                                  <svg class="spinner mr-4" viewBox="0 0 50 50">
                                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
                                  </svg>
                                  Enviando...
                                </button>
                        </div>
                      </form>

                    </tab>
                  </tabs>

                </div>
              </div>

            </div>

          </div>
        </main>

        <FooterDashboard  class="fixed bottom-0 left-0 w-full"></FooterDashboard>

        <Toast v-if="showToast" :type="'success'" closable divide
          class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg border shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800">
          {{ $page.props.flash.success }}
        </Toast>

    </div>
  </template>
  <script setup>
    import { useForm } from '@inertiajs/vue3'
    import HeaderDashboard from './components/HeaderDashboard.vue'
    import Welcome from './components/Welcome.vue';
    import FooterDashboard from './components/FooterDashboard.vue'
    import { ref } from 'vue'
    import { Tabs, Tab, Toast } from 'flowbite-vue'

    import { onMounted } from 'vue'
    import { initFlowbite } from 'flowbite'

    // Inicializa o Flowbite após o carregamento do componente
    onMounted(() => {
      initFlowbite();
    });

    const activeTab = ref('first')
    

    defineProps({ 
      errors: Object,
      user: Object,
      categories: Object,
      bookmarks: Object,
      computed: {
          success() {
            console.log(this.$page.props)
            return this.$page.props.session.success;
          },
      },
    })
  </script>
  <script>

  const showToast = ref(false);
  // const aba = ref('dados');

  export default {
    data() {
      return {
        aba: ref('dados'),
        formUpdateProfile: {
          _token: null,
          name: null,
          email: null,
          file: null,
          processing: false
        },
        formUpdatePassword: {
          _token: null,
          current_password: null,
          password: null,
          password_confirmation: null,
          processing: false
        },
        showPassword: false,
        showConfirmPassword: false,
      };
    },
    mounted() {
      this.formUpdateProfile = useForm({
        _token: null,
        name: this.$props.user.name,
        email: this.$props.user.email,
        profile_photo: this.$props.user.profile_photo,
        tab: 'dados_pessoais'
      });
      this.formUpdatePassword = useForm({
        _token: null,
        current_password: null,
        password: null,
        password_confirmation: null,
        tab: 'alterar_senha'
      });
    },
    methods: {
      handleFileUpload(event) {
        this.file = event.target.files[0];
        this.formUpdateProfile.fileName = this.file.name;
      },
      updateProfile() {
        this.formUpdateProfile.processing = true;
        const formData = new FormData();
        formData.append('profile_photo', this.formUpdateProfile.profile_photo);
        
        formData.append('name', this.formUpdateProfile.name);
        formData.append('email', this.formUpdateProfile.email);

        this.$inertia.post('/profile', formData, {
          onSuccess: (resp) => {
            console.log('Hey! Success');
            showToast.value = true;
            this.formUpdateProfile.processing = false;
            setTimeout(() => {
              showToast.value = false;
            }, 5000);
            console.log(resp);
          },
          onError: (errors) => {
            console.log('Hey! Errors');
            this.formUpdateProfile.processing = false;
            console.log(errors);
          },
        });
        this.aba = 'dados';
      },
      _updateProfile () {
        this.$page.props['errors'] = {}
        this.aba = 'dados'
        this.formUpdateProfile.put('/profile', {
          onSuccess: (resp) => {
            console.log('Hey! Success')
            showToast.value = true;
            setTimeout(() => {
              showToast.value = false;
            }, 5000);
            console.log(resp);
          },
          onErrors: (errors) => {
            console.log('Hey! Errors')
            console.log(errors);
          }
        });
      },  
      updatePassword () {
        this.formUpdatePassword.processing = true;
        this.$page.props['errors'] = {}
        this.aba = 'password'
        this.formUpdatePassword.put('/profile/password', {
          onSuccess: (resp) => {
            console.log('Hey! Success')
            this.formUpdatePassword.processing = false;
            // this.formUpdatePassword.reset('current_password');
            // this.formUpdatePassword.reset('password');
            // this.formUpdatePassword.reset('password_confirmation');
            this.formUpdatePassword.current_password = '';
            this.formUpdatePassword.password = '';
            this.formUpdatePassword.password_confirmation = '';
            showToast.value = true;
            setTimeout(() => {
              showToast.value = false;
            }, 5000);
            console.log(resp);
          },
          onErrors: (errors) => {
            this.formUpdatePassword.processing = false;
            console.log('Hey! Errors')
            console.log(errors);
          }
        });
      },
      toggleShowPassword() {
        this.showPassword = !this.showPassword;
      },
    },
    computed: {
      success() {
        return this.$page.props.session.success;
      },
      getProfilePhotoUrl() { 
        const baseUrl = window.location.origin
        const path = this.$page.props.user.profile_photo_path
        // return `${baseUrl}/storage/${path}`;
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
.button-spinner {
  position: relative;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding-right: 1.5rem; /* Espaçamento à direita para o spinner */
}

.button-spinner .spinner {
  width: 1.5rem; /* Tamanho do spinner */
  height: 1.5rem;
  animation: spin 1s linear infinite; /* Animação do spinner */
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.button-spinner .path {
  stroke: #8c2cc7; /* Cor do spinner */
  stroke-linecap: round;
  animation: dash 1.5s ease-in-out infinite; /* Animação do efeito de traço */
}

@keyframes dash {
  0% {
    stroke-dasharray: 1, 150;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -35;
  }
  100% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -124;
  }
}
</style>

