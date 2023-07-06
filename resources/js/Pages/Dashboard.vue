<template>
    <div class="min-h-full font-Red_Hat_Display font-light bg-gray-100 flex flex-col min-h-screen">
    
        <nav class="">
            <HeaderDashboard :user="user"></HeaderDashboard>
        </nav>

        <Welcome :user="user"></Welcome>

        <main class="mb-20 flex-grow">
            <div class="mx-auto max-w-7xl p-4 sm:px-8"> 
            
            <div class="ml-4 flex items-center justify-between">
              <!-- <div class="text-2xl font-semibold text-gray-900 pl-4">
                Categorias <span class="font-light text-sm text-gray-400">/ Utilize as categorias para organizar seus favoritos.</span>
              </div> -->

              <!-- Breadcrumb -->
              <nav class="flex px-5 mt-0.5 py-4 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
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
                      Categoria
                    <!-- </a> -->
                  </li>
                  
                </ol>
              </nav>

              

              <button @click="showModalCategory" type="button" class="flex text-gray-500 bg-white hover:text-white hover:bg-[#af38f9] focus:ring-2 focus:ring-[#8c2cc7] focus:outline-0 focus:ring-inset rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 font-semibold dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600 ml-auto mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.6" stroke="currentColor" class="w-5 h-5 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                </svg>
                Nova categoria
              </button>
            </div>
            
              <div class="flex flex-wrap">

                <div v-if="categories.length == 0" class="w-full p-4">
                  <div class="border border-gray-200 p-4 rounded-lg bg-white">
                    <p class="text-[14px] mt-5 mb-4 text-center text-gray-400 dark:text-white italic">
                      Ainda não há categorias cadastradas.
                    </p>
                  </div>
                </div>

                <div v-for="category in categories" :key="category.id" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                  <div class="border border-gray-200 p-4 rounded-lg bg-white">

                    <div class="flex items-center justify-between">
                      <h5 class="text-base font-bold leading-none text-gray-900 dark:text-white">{{ category.name }}</h5>
                                            
                      <div class="justify-end">
                          
                        <button @click="showModalEditCategory(category)" type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 text-xs font-medium hover:bg-gray-100 dark:text-blue-500 p-1 rounded-md">
                          <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke-width="1.5" aria-hidden="true">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                          </svg>
                          <!-- editar -->
                        </button>

                        <!-- <button @click="toggleDivVisibility(category.id)" type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 text-xs font-medium hover:bg-gray-100 dark:text-blue-500 p-1 rounded-md">
                          <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="2.0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"></path>
                          </svg>
                        </button> -->

                        <button @click="showModalDeleteCategory(category)" type="button" class="text-red-600 text-xs font-medium text-blue-600 hover:text-red-800 hover:bg-red-100 dark:text-blue-500 p-1 rounded-md">
                          <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                          </svg>
                          <!-- deletar -->
                        </button>
                      </div>

                    </div>

                    <div :id="'favorites-' + category.id" class="border-t mt-4 pt-2 ">
                      <div class="flex items-center justify-center">
                        <div class="w-full">
                          <p v-if="getBookmarksByCategory(category.id).length === 0" class="text-[14px] mt-5 mb-4 text-center text-gray-400 dark:text-white italic">
                            Ainda não há faoritos cadastrados.
                          </p>
                          <p v-if="getBookmarksByCategory(category.id).length > 0" class="text-2xl font-black text-center text-gray-900 dark:text-white">
                            {{ getBookmarksByCategory(category.id).length }}
                          </p>
                          <p v-if="getBookmarksByCategory(category.id).length > 0" class="text-[14px] font-normal text-center text-gray-400 dark:text-white">
                            {{ getBookmarksByCategory(category.id).length === 1 ? 'favorito' : 'favoritos' }}
                          </p>
                        </div>
                        <div class="ml-auto">
                          <button @click="goToBookmark(category.uuid)" type="button" class="text-gray-500 text-xs font-medium text-blue-600 hover:text-gray-800 hover:bg-gray-100 dark:text-blue-500 p-1 rounded-md">
                            <svg fill="none" stroke="currentColor" stroke-width="1.5" class="w-8 h-8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                            </svg>
                          </button>
                        </div>
                      </div>
                      
                    </div>
                    

                  </div>
                </div>


                <!--  -->
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                  <div @click="showModalCategory" class="border-dashed border rounded-lg border-gray-300 h-[140px] flex flex-col justify-center items-center 
                      text-gray-400 hover:cursor-pointer text-sm font-normal
                      hover:bg-gray-200">
                    
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mb-2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    <span class="">Nova categoria</span>
                  </div>
                </div>
                <!--  -->

              </div>

            </div>
        </main>

        <FooterDashboard  class="fixed bottom-0 left-0 w-full"></FooterDashboard>

        <Toast v-if="showToast" :type="'success'" closable divide
          class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg border shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800">
          {{ $page.props.flash.success }}
        </Toast>
        
        <Modal size="md" v-if="isShowModalCategory" @close="closeModalCategory">
            <template #header>
              <div class="flex items-center text-lg">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                  <span v-if="!isEditModalCategory">Criar uma categoria</span>
                  <span v-if="isEditModalCategory">Editar esta categoria</span>
                </h1>
              </div>
            </template>
            
            <template #body>
              <form id="formCat" @submit.prevent="isEditModalCategory ? sendEditCategory() : sendCategory()">
                <input type="hidden" id="uuid_category" name="uuid_category" v-model="formCat.uuid_category">
                <div class="grid gap-6 mb-0">
                  <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome da categoria:</label>
                      <!-- <input id="name" name="name" v-model="formCategory.name" -->
                      <input id="name" name="name" v-model="formCat.name"
                      type="text" class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="30">
                                <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formCat.name.length }}/30</span>

                                <div v-if="errors && Object.keys(errors).length > 0" class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                  <span>{{ errors.name }}</span>
                                </div>

                  </div>
                </div>
              </form>
            </template>
            <template #footer>  
              <div class="flex justify-between">
                <button @click="closeModalCategory" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-2
                                                                focus:ring-2 focus:ring-[#8c2cc7] focus:outline-0 focus:ring-inset
                                                                rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 
                                                                dark:bg-gray-700 dark:text-gray-300 font-semibold dark:border-gray-500 dark:hover:text-white 
                                                                dark:hover:bg-gray-600 dark:focus:ring-gray-600
                                                                    ">
                  Cancelar
                </button>
                <!-- <button form="formCategory" type="submit" class="flex  justify-center rounded-md px-3 p-3 text-sm font-semibold  -->
                  <button form="formCat" type="submit" class="flex  justify-center rounded-md px-3 p-3 text-sm font-semibold 
                                leading-6 text-white shadow-sm text-white bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                v-if="!formCat.processing">
                  <span v-if="!isEditModalCategory">Criar categoria</span>
                  <span v-if="isEditModalCategory">Editar categoria</span>
                </button>
                <button v-if="formCat.processing" type="button" disabled class="button-spinner text-gray-500 bg-white 
                                                                rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 font-semibold ">
                  <svg class="spinner mr-4" viewBox="0 0 50 50">
                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
                  </svg>
                  Enviando...
                </button>
              </div>
            </template>
          
        </Modal>

       

        <Modal size="md" v-if="isShowDeleteModalCategory" @close="closeModalDeleteCategory">
          <template #header>
            <div class="flex items-center text-lg text-red-700 p-2 rounded-md">
              <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 rounded-md " stroke-width="1.0" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
              </svg> <h1 class="ml-2 text-2xl font-bold tracking-tight text-gray-900">Confirmar exclusão</h1>
            </div>
          </template>
          <template #body>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
              Tem certeza de que deseja excluir esta categoria e seus favoritos?
            </p>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
              <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span>Ao confirmar, esta categoria e seus favoritos serão excluídos permanentemente, de forma irreversível.</span>
              </div>  
            </p>

            <form id="formDeleteCat" @submit.prevent="sendDeleteCategory">
                <input type="hidden" id="uuid_category" name="uuid_category" v-model="formDeleteCat.uuid_category">
            </form>
          </template>
          <template #footer>
            <div class="flex justify-between">
              <button @click="closeModalDeleteCategory" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Não, cancelar
              </button>
              <button form="formDeleteCat" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Sim eu tenho certeza
              </button>
            </div>
          </template>
        </Modal> 

        <Modal size="md" v-if="isShowDeleteModalBookmark" @close="closeModalDeleteBookmark">
          <template #header>
            <div class="flex items-center text-lg text-red-700 p-2 rounded-md">
              <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 rounded-md " stroke-width="1.0" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zm0 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z"></path>
              </svg> <h1 class="ml-2 text-2xl font-bold tracking-tight text-gray-900">Confirmar exclusão</h1>
            </div>
          </template>
          <template #body>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
              Tem certeza de que deseja excluir este favorito?
            </p>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
              <div class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span>Ao confirmar, este favorito será excluído permanentemente, de forma irreversível.</span>
              </div>  
            </p>

            <form id="formDeleteBookmark" @submit.prevent="sendDeleteBookmark">
                <input type="hidden" id="uuid_bookmark" name="uuid_bookmark" v-model="formDeleteBookmark.uuid_bookmark">
            </form>
          </template>
          <template #footer>
            <div class="flex justify-between">
              <button @click="closeModalDeleteBookmark" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Não, cancelar
              </button>
              <button form="formDeleteBookmark" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Sim eu tenho certeza
              </button>
            </div>
          </template>
        </Modal> 

    </div>
</template>

<script setup>
  import { Link } from '@inertiajs/vue3';
  import { defineProps } from 'vue';
  import { ref } from 'vue'
  import { Modal } from 'flowbite-vue'
  import { Toast } from 'flowbite-vue'
  import { useForm } from '@inertiajs/vue3'
  import { Tooltip } from 'flowbite-vue'

  import Header from './components/Header.vue';
  import HeaderDashboard from './components/HeaderDashboard.vue';
  import Welcome from './components/Welcome.vue';
  import FooterDashboard from './components/FooterDashboard.vue';

  import { onMounted } from 'vue'
  import { initFlowbite } from 'flowbite'

  // Inicializa o Flowbite após o carregamento do componente
  onMounted(() => {
    initFlowbite();
  });

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

const isShowModalCategory = ref(false)
const isEditModalCategory = ref(false)
const isShowDeleteModalCategory = ref(false)

const isShowModalBookmark = ref(false)
const isEditModalBookmark = ref(false)
const isShowDeleteModalBookmark = ref(false)

const showToast = ref(false);

export default {
  data() {
    return {
      formCat: null,
      formBookmark: null,
      isEditModalCategory: false,
    }
  },
  mounted() {
    this.formCat = useForm({
      _token: null,
      uuid_category: null,
      name: null,
    });
    this.formDeleteCat = useForm({
      _token: null,
      uuid_category: null,
    });
    this.formBookmark = useForm({
      _token: null,
      uuid_category: null,
      uuid_bookmark: null,
      link: null,
      name: null,
      note: null,
    });
    this.formDeleteBookmark = useForm({
      _token: null,
      uuid_bookmark: null,
    });
  },
  methods: {
    toggleDivVisibility(categoryId) {
      const favoritesDiv = document.getElementById("favorites-" + categoryId);
      const isVisible = favoritesDiv.style.display !== "none";
      console.log(isVisible)
      if (favoritesDiv) {
        if (favoritesDiv.style.display === "none") {
          favoritesDiv.style.display = "block";
        } else {
          favoritesDiv.style.display = "none";
        }
      }
    },
    sendCategory() {
      console.log('sendCategory')
      this.formCat.post('/dashboard', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isShowModalCategory.value = false
          isEditModalCategory.value = false
          this.formCat.reset('uuid_category');
          this.formCat.reset('name');
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
    showModalEditCategory(category){
      this.formCat.uuid_category = category.uuid
      this.formCat.name = category.name
      isEditModalCategory.value = true
      isShowModalCategory.value = true
    },
    sendEditCategory() {
      console.log('sendEditCategory')
      this.formCat.put('/dashboard/category/', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isEditModalCategory.value = false
          isShowModalCategory.value = false
          this.formCat.reset('uuid_category');
          this.formCat.reset('name');
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
    sendDeleteCategory() {
      console.log('sendDeleteCategory')
      this.formDeleteCat.delete('/dashboard/category/', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isShowDeleteModalCategory.value = false
          this.formDeleteCat.reset('uuid_category');
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
    showModalDeleteCategory(category){
      console.log(category)
      this.formDeleteCat.uuid_category = category.uuid
      isShowDeleteModalCategory.value = true
    },
    closeModalDeleteCategory() {
      this.formCat.uuid_category = '';
      isShowDeleteModalCategory.value = false
    },
    closeModalCategory() {
      this.formCat.name = '';
      this.formCat.uuid_category = '';
      this.$page.props.errors = {}
      isShowModalCategory.value = false
    },
    showModalCategory() {
      this.formCat.name = '';
      this.formCat.uuid_category = '';
      isEditModalCategory.value = false
      isShowModalCategory.value = true
    },
    getBookmarksByCategory(category_id) {
      return this.bookmarks.filter(bookmark => bookmark.category_id === category_id);
    },
    goToBookmark(uuid) {
      this.$inertia.visit('/dashboard/list/bookmark/' + uuid);
    },
  }
}

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