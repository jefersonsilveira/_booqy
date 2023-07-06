<template>
    <div class="min-h-full font-Red_Hat_Display font-light">
    
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center justify-start">
                    <div class="flex-shrink-0 text-4xl font-black tracking-[-.08em] text-[#af38f9] dark:text-[#af38f9]">
                    <Link href="/">booqy</Link>
                    </div>
                    <div class="hidden md:block">
                        <div class="esquerda ml-10 flex items-baseline space-x-4">
                            <Link href="/dashboard" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Início</Link>
                            <button class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" type="button" @click="showModalProfile">Perfil</button>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block justify-end">
                <div class="ml-10 flex items-center space-x-4">
                        <div>
                            <Link class="text-gray-300 hover:text-white rounded-md px-3 py-2 text-sm font-medium" href="/logout">Sair</Link>
                        </div>

                </div>
                </div>
                
            </div>
            </div>
        </nav>

        <header class="bg-white border">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex items-center">
              <h1 class="text-3xl font-bold tracking-tight text-gray-900">Olá {{ user.name }}!</h1>

            <button @click="showModalCategory" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 
                                                                    focus:ring-2 focus:ring-[#8c2cc7] focus:outline-0 focus:ring-inset
                                                                    rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 
                                                                    dark:bg-gray-700 dark:text-gray-300 font-semibold dark:border-gray-500 dark:hover:text-white 
                                                                    dark:hover:bg-gray-600 dark:focus:ring-gray-600 ml-auto">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.6" stroke="currentColor" class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 
                00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 
                2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
              </svg>
              Nova categoria
            </button>

   
          </div>
        </header>


        <main class="mb-20">
            <div class="mx-auto max-w-7xl p-4 bg-white sm:p-8"> 
            
              <div class="flex flex-wrap">

                <div v-for="category in categories" :key="category.id" class="w-full sm:w-1/2 md:w-1/3 lg:w-1/3 xl:w-1/3 p-4">
                  <div class="border border-gray-300 p-4 rounded-t-lg">

                    <div class="flex items-center justify-between">
                      <h5 class="text-base font-bold leading-none text-gray-900 dark:text-white">{{ category.name }}</h5>
                      <!-- <a href="#" class="text-xs font-medium text-blue-600 hover:underline dark:text-blue-500">
                          Editar 
                      </a> -->
                      
                      <div class="justify-end">
                        <button @click="showModalDeleteCategory(category)" type="button" class="text-red-600 mr-2 text-xs font-medium text-blue-600 hover:text-red-800 hover:bg-red-200 dark:text-blue-500 p-1 rounded-md">
                          <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke-width="2.0" aria-hidden="true">
                            <path d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"></path>
                          </svg>
                          <!-- deletar -->
                        </button>

                        <button @click="showModalEditCategory(category)" type="button" class="text-gray-500 mr-2 text-xs font-medium text-blue-600 hover:text-gray-800 hover:bg-gray-200 dark:text-blue-500 p-1 rounded-md">
                          <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke-width="2.0" aria-hidden="true">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                          </svg>
                          <!-- editar -->
                        </button>

                        <button @click="toggleDivVisibility(category.id)" type="button" class="text-gray-500 text-xs font-medium text-blue-600 hover:text-gray-800 hover:bg-gray-200 dark:text-blue-500 p-1 rounded-md">
                          <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="2.0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776"></path>
                            <!-- <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z"></path> -->
                          </svg>
                          <!-- abrir -->
                        </button>
                      </div>

                    </div>
                    
                    

                    <div :id="'favorites-' + category.id" class="border-t mt-4 pt-2">
                      <ul>
                        <li>
                          <div v-if="getBookmarksByCategory(category.id).length === 0" class="text-xs text-center text-gray-400 dark:text-white italic ">
                            Ainda não há favoritos.
                          </div>
                        </li>
                      </ul>
                      <ul role="list" v-for="bookmark in getBookmarksByCategory(category.id)" :key="bookmark.id" class="divide-y divide-gray-200 dark:divide-gray-700">
                          <li class="py-3 sm:py-4 hover:bg-gray-100 p-2 rounded-md" 
                              @mouseover="bookmark.showButtons = true"
                              @mouseleave="bookmark.showButtons = false">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1 min-w-0">
                                  <div class="flex items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white h-8 mt-0"> 
                                      <a :href="bookmark.link" target="_blank">{{ bookmark.name }}</a>
                                    </p>
                                    <div class="justify-end -mt-2" v-show="bookmark.showButtons">
                                      <button @click="showModalDeleteBookmark(bookmark)" type="button" class="text-red-600 mr-2 hover:bg-red-200 p-1 rounded-md">
                                        <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke-width="2.0" aria-hidden="true">
                                          <path d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"></path>
                                        </svg>
                                        <!-- deletar -->
                                      </button>

                                      <button @click="showModalEditBookmark(bookmark)" type="button" class="text-gray-500 mr-2 hover:bg-gray-200 p-1 rounded-md">
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke-width="2.0" aria-hidden="true">
                                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        <!-- editar -->
                                      </button>
                                    </div>
                                  </div>
                                    <p v-if="bookmark.note" class="mt-1 truncate text-xs leading-5 text-gray-500">
                                      {{ bookmark.note }}
                                    </p>
                                </div>
                                <!-- <div class="text-xs inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    Vai!
                                </div> -->
                            </div>
                          </li>
                      </ul>

                      <div class="flex items-center justify-between mt-5 border-t pt-2">
                        <button @click="showModalBookmark(category.uuid)" type="button" class="flex text-gray-500 bg-white hover:bg-gray-100 focus:ring-2 focus:ring-[#8c2cc7] focus:outline-0 focus:ring-inset rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 font-semibold dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                          </svg>
                          Novo favorito
                        </button>

                        <div class="text-xs inline-flex items-center text-base font-semibold text-[#af38f9] hover:text-[#8c2cc7] dark:text-white">
                          <Link class="" href="">Ver tudo</Link>
                        </div>
                      </div>
                    </div>
                    

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
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">

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
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  <span v-if="!isEditModalCategory">Criar categoria</span>
                  <span v-if="isEditModalCategory">Editar categoria</span>
                </button>
              </div>
            </template>
          
        </Modal>

        <Modal size="xl" v-if="isShowModalBookmark" @close="closeModalBookmark">
            <template #header>
              <div class="flex items-center text-lg">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                  <span v-if="!isEditModalBookmark">Criar um favorito</span>
                  <span v-if="isEditModalBookmark">Editar este favorito</span>
                </h1>
                
              </div>
            </template>
            
            <template #body>
              <!-- <form id="formBookmark" @submit.prevent="sendBookmark"> -->
              <form id="formBookmark" @submit.prevent="isEditModalBookmark ? sendEditBookmark() : sendBookmark()">
               <input type="hidden" id="uuid_category" name="uuid_category" v-model="formBookmark.uuid_category">
               <input type="hidden" id="uuid_bookmark" name="uuid_bookmark" v-model="formBookmark.uuid_bookmark">
               <div class="grid gap-6 mb-0">
                  <div>
                      <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link:</label>
                      <input id="link" name="link" v-model="formBookmark.link" placeholder="ex. https://nomedosite.com.br"
                      type="text" class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">

                                <div v-if="errors.link && Object.keys(errors).length > 0" class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                  <span>{{ errors.link }}</span>
                                </div>

                  </div>

                  <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome:</label>
                      <input id="name" name="name" v-model="formBookmark.name"
                      type="text" class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">

                                <div v-if="errors.name && Object.keys(errors).length > 0" class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                  <span>{{ errors.name }}</span>
                                </div>

                  </div>

                  <div>
                      <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sua observação (opcional):</label>
                      <textarea id="note" name="note" v-model="formBookmark.note"
                        class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                              ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                              focus:ring-[#8c2cc7] sm:text-sm sm:leading-6"></textarea>
                  </div>

                </div>
              </form>
            </template>
            <template #footer>  
              <div class="flex justify-between">
                <button @click="closeModalBookmark" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-2
                                                                focus:ring-2 focus:ring-[#8c2cc7] focus:outline-0 focus:ring-inset
                                                                rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 
                                                                dark:bg-gray-700 dark:text-gray-300 font-semibold dark:border-gray-500 dark:hover:text-white 
                                                                dark:hover:bg-gray-600 dark:focus:ring-gray-600
                                                                    ">
                  Cancelar
                </button>
                  <button form="formBookmark" type="submit" class="flex  justify-center rounded-md px-3 p-3 text-sm font-semibold 
                                leading-6 text-white shadow-sm text-white bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  <span v-if="!isEditModalBookmark">Criar favorito</span>
                  <span v-if="isEditModalBookmark">Editar favorito</span>
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

  import FooterDashboard from './components/FooterDashboard.vue';
  import Header from './components/Header.vue';

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
    sendBookmark() {
      this.formBookmark.post('/dashboard/create/bookmark', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isShowModalBookmark.value = false
          this.formBookmark.reset('uuid_category')
          this.formBookmark.reset('link');
          this.formBookmark.reset('name');
          this.formBookmark.reset('note');
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
    closeModalBookmark() {
      this.formBookmark.reset('link');
      this.formBookmark.reset('name');
      this.formBookmark.reset('note');
      this.$page.props.errors = {}
      isShowModalBookmark.value = false
    },
    showModalBookmark(uuid_bookmark) {
      this.formBookmark.uuid_category = uuid_bookmark;
      this.formBookmark.reset('link');
      this.formBookmark.reset('name');
      this.formBookmark.reset('note');
      this.$page.props.errors = {}
      isEditModalBookmark.value = false
      isShowModalBookmark.value = true
    },
    showModalEditBookmark(bookmark){
      this.formBookmark.uuid_bookmark = bookmark.uuid
      this.formBookmark.link = bookmark.link
      this.formBookmark.name = bookmark.name
      this.formBookmark.note = bookmark.note
      isEditModalBookmark.value = true
      isShowModalBookmark.value = true
    },
    sendEditBookmark() {
      console.log('sendEditBookmark')
      this.formBookmark.put('/dashboard/bookmark/', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isEditModalBookmark.value = false
          isShowModalBookmark.value = false
          this.formBookmark.reset('uuid_bookmark');
          this.formBookmark.reset('link');
          this.formBookmark.reset('name');
          this.formBookmark.reset('note');
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
    sendDeleteBookmark() {
      console.log('sendDeleteBookmark')
      this.formDeleteBookmark.delete('/dashboard/bookmark/', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isShowDeleteModalBookmark.value = false
          this.formDeleteBookmark.reset('uuid_bookmark');
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
    showModalDeleteBookmark(bookmark){
      console.log(bookmark)
      this.formDeleteBookmark.uuid_bookmark = bookmark.uuid
      isShowDeleteModalBookmark.value = true
    },
    closeModalDeleteBookmark() {
      this.formCat.uuid_bookmark = '';
      isShowDeleteModalBookmark.value = false
    },
    getBookmarksByCategory(category_id) {
      return this.bookmarks.filter(bookmark => bookmark.category_id === category_id);
    },
  }
}

</script>

<style lang="scss" scoped>

</style>