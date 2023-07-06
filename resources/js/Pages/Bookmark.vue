<template>
    <div class="min-h-full font-Red_Hat_Display font-light bg-gray-100 flex flex-col min-h-screen">
    
        <nav class="">
            <HeaderDashboard :user="user"></HeaderDashboard>
        </nav>

        <Welcome :user="user"></Welcome>
        
        <main class="mb-20 flex-grow">
          <div class="mx-auto max-w-7xl p-4 sm:px-8"> 

            <div class="ml-4 mr-4 flex items-center justify-between mb-5">
              <!-- <div class="flex items-center">
                <div class="text-2xl font-semibold text-gray-900 pl-4 flex items-center">
                  <Link href="/dashboard" class="text-gray-600" aria-current="page">Categorias</Link>
                  <ChevronRightIcon class="h-5 w-5 text-gray-500 mx-2" /> 
                  {{ category.name }} <span class="font-light text-sm text-gray-400 ml-2"> / Adicione itens a esta categoria.</span>
                </div>
              </div> -->

              <!-- Breadcrumb -->
              <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                  <li class="inline-flex items-center">
                    <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#8c2cc7] dark:text-gray-400 dark:hover:text-white">
                      <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                      Início
                    </a>
                  </li>
                  <li class="inline-flex items-center text-sm font-medium text-gray-700 ">
                    <a href="/dashboard" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                      <svg aria-hidden="true" class="w-6 h-6 text-gray-400 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      Categoria
                    </a>
                  </li>
                  <li aria-current="page" >
                    <div class="flex items-center">
                      
                      <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                      
                      <button id="dropdownDatabase" data-dropdown-toggle="dropdown-database" 
                        class="inline-flex items-center px-3 py-2 text-sm font-bold text-center
                        text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none 
                        focus:ring-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-300 
                        dark:focus:ring-gray-700">
                        {{ category.name }}
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                      </button> 
                      <div id="dropdown-database" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-b-lg shadow-2xl w-44 font-medium">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                          <li v-for="category in categories" :key="category.uuid">
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="goToBookmark(category.uuid)">
                              {{ category.name }}
                            </a>
                          </li>
                        </ul>
                      </div> 
                    </div>
                  </li>
                </ol>
              </nav>

              <div class="flex items-center">

                <button data-tooltip-target="tooltip-list-format" data-tooltip-placement="bottom" @click="toggleAllDivVisibility()"  type="button" 
                  class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-2 rounded-md mr-2">
                  
                  <svg v-if="!favoritesClose" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-.375 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                  </svg>

                  <svg v-if="favoritesClose" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z"></path>
                  </svg>
                </button>
                <div
                  id="tooltip-list-format"
                  role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Visualização
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button data-tooltip-target="tooltip-list-destaque" data-tooltip-placement="bottom" @click="toggleFeaturedFilter"  type="button" 
                  class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-2 rounded-md mr-2"> 
                  <svg v-if="!featuredFilter" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-yellow-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"></path>
                  </svg>

                  <svg v-if="featuredFilter" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-yellow-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"></path>
                  </svg>
                </button>
                <div
                  id="tooltip-list-destaque"
                  role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                    Listar destaques
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <div class="relative mr-2 ">
                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </div>
                  <input type="search" id="search" v-model="searchValue" class="block w-full p-2.2 pl-10 
                                      rounded-md border-0 text-gray-900 ring-1 ring-inset ring-gray-200 
                                      placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset
                                      focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" 
                                      placeholder="Buscar em favoritos">
                </div>

                <button @click="showModalBookmark(category.uuid)" 
                  type="button" class="flex text-gray-500 bg-white hover:text-white hover:bg-[#af38f9] focus:ring-2 focus:ring-[#8c2cc7] focus:outline-0 focus:ring-inset rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 font-semibold dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                  </svg>
                  Novo favorito
                </button>
              </div>
            </div>
            
            <div class="ml-4 mr-4 flex items-center justify-between mt-5"> 
              <ul role="list" class="w-full divide-gray-200 dark:divide-gray-700 border rounded-md p-2 bg-white">
                <li v-if="bookmarks.length === 0" class="text-[14px] mt-5 mb-4 text-center text-gray-400 dark:text-white italic">
                  Ainda não há itens cadastrados.
                </li>

                <li v-if="bookmarks.length > 0 && filteredBookmarks.length === 0" class="text-[14px] mt-5 mb-4 text-center text-gray-400 dark:text-white italic">
                  Nenhum resultado encontrado.
                </li>

                <li v-for="(bookmark, index) in filteredBookmarks" :key="bookmark.id" class="hover:bg-gray-100 p-2 rounded-md py-5" 
                              :class="index % 2 === 0 ? 'bg-gray-50' : ''"
                    @mouseover="bookmark.showButtons = true"
                    @mouseleave="bookmark.showButtons = false">
                  <div class="flex items-center space-x-4">
                      <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                          <p class="text-normal font-medium text-gray-900 truncate dark:text-white h-8 mt-0 flex items-center">
                            <a :href="bookmark.link" target="_blank">
                              <img :src="getFaviconUrl(bookmark.link)" alt="" class="mr-2">
                            </a>
                            <a :href="bookmark.link" target="_blank" class="hover:text-[#af38f9]">
                              {{ bookmark.name.length > 80 ? bookmark.name.substring(0, 80) + '...' : bookmark.name }}
                              <span class="text-sm font-normal text-gray-400"> [ 
                                {{ bookmark.link
                                      .replace(/^(https?:\/\/(www\.)?)?/, '')
                                      .replace(/\/$/, '')
                                      .length > 35
                                      ? bookmark.link
                                          .replace(/^(https?:\/\/(www\.)?)?/, '')
                                          .replace(/\/$/, '')
                                          .substring(0, 35) + '...'
                                      : bookmark.link.replace(/^(https?:\/\/(www\.)?)?/, '').replace(/\/$/, '') }} ]</span>
                            </a>
                          </p>

                        <div class="flex justify-end -mt-2">
                          <div class="justify-end -mt-2" v-show="bookmark.showButtons || bookmark.featured">
                            <button 
                              :data-tooltip-target="'tooltip-destaque-' + bookmark.id"
                              @click="setBookmarkAsFeatured(bookmark)" type="button" class="text-[#af38f9] hover:text-yellow-400 mr-2 hover:bg-gray-200 p-1 rounded-md">
                              <svg :class="{ 'fill-current text-yellow-400': bookmark.featured === 1 }" fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z"></path>
                              </svg>
                              <!-- destacar -->
                            </button>
                            <div
                              :id="'tooltip-destaque-' + bookmark.id" 
                              role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Destacar
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                          </div>

                          <div class="justify-end -mt-2 px-[90px]" v-show="!bookmark.showButtons">
                          </div>

                          <div class="justify-end -mt-2" v-show="bookmark.showButtons">
                            <a :href="bookmark.link" target="_blank" rel="noopener noreferrer">
                              <button 
                                :data-tooltip-target="'tooltip-acessar-' + bookmark.id"
                                type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-1 rounded-md">
                                <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"></path>
                                </svg>
                                <!-- acessar -->
                              </button>
                              <div
                              :id="'tooltip-acessar-' + bookmark.id" 
                              role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Acessar
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            </a>

                            <button 
                              :data-tooltip-target="'tooltip-qr-' + bookmark.id"
                              @click="showModalQrCodeBookmark(bookmark)" type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-1 rounded-md">
                              <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z"></path>
                              </svg>
                              <!-- qr code -->
                            </button>
                            <div
                              :id="'tooltip-qr-' + bookmark.id" 
                              role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                QR Code
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            
                            <button 
                              :data-tooltip-target="'tooltip-copiar-' + bookmark.id"
                              @click="copyToClipboard(bookmark.link)" type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-1 rounded-md">
                              <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"></path>
                              </svg>
                              <!-- copiar -->
                            </button>
                            <div
                              :id="'tooltip-copiar-' + bookmark.id" 
                              role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Copiar
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <!-- <button @click="showModalEditBookmark(bookmark)" type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-1 rounded-md">
                              <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="2.0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z"></path>
                              </svg> -->
                              <!-- compartilhar -->
                            <!-- </button> -->

                            <button 
                              :data-tooltip-target="'tooltip-editar-' + bookmark.id"
                              @click="showModalEditBookmark(bookmark)" type="button" class="text-[#af38f9] hover:text-[#8c2cc7] mr-2 hover:bg-gray-200 p-1 rounded-md">
                              <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" stroke-width="1.5" aria-hidden="true">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                              </svg>
                              <!-- editar -->
                            </button>
                            <div
                              :id="'tooltip-editar-' + bookmark.id" 
                              role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Editar
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                            
                            <button 
                              :data-tooltip-target="'tooltip-deletar-' + bookmark.id"
                              @click="showModalDeleteBookmark(bookmark)" type="button" class="text-[#af38f9] hover:text-red-600 mr-2 hover:bg-red-200 p-1 rounded-md">
                              <svg fill="none" stroke="currentColor" class="w-5 h-5" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                              </svg>
                              <!-- deletar -->
                            </button>
                            <div
                              :id="'tooltip-deletar-' + bookmark.id" 
                              role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-normal text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                Apagar
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                          </div>
                          
                        </div>

                        </div>
                          <div >
                            <p id="favorites" v-if="bookmark.note" class="mt-1 font-light text-sm text-gray-400 hidden">
                              {{ bookmark.note }}
                            </p>
                          </div>
                      </div>
                  </div>
                </li>
              </ul>
            </div>

            <div class="ml-4 mr-4 flex items-center justify-between mt-2"> 
              <ul role="list" class="w-full ounded-md">
                <div @click="showModalBookmark(category.uuid)" class="border-dashed border rounded-lg border-gray-300 h-[80px] flex flex-col justify-center items-center 
                      text-gray-400 hover:cursor-pointer text-sm font-normal
                      hover:bg-gray-200">
                    
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mb-2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                    </svg>
                    <span class="">Novo favorito</span>
                  </div>
              </ul>
            </div>

          </div>
        </main>

        <FooterDashboard  class="fixed bottom-0 left-0 w-full"></FooterDashboard>

        <Toast v-if="showToast" :type="'success'" closable divide
          class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 bg-white divide-x divide-gray-200 rounded-lg border shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800">
          {{ $page.props.flash.success }}
        </Toast>

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
              <form id="formBookmark" @submit.prevent="isEditModalBookmark ? sendEditBookmark() : sendBookmark()">
               <input type="hidden" id="uuid_category" name="uuid_category" v-model="formBookmark.uuid_category">
               <input type="hidden" id="uuid_bookmark" name="uuid_bookmark" v-model="formBookmark.uuid_bookmark">
               <div class="grid gap-6 mb-0">
                  <div>
                      <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link:</label>
                      <input id="link" name="link" v-model="formBookmark.link" placeholder="ex. https://nomedosite.com.br" :disabled="isEditModalBookmark" :class="{ 'bg-gray-200': isEditModalBookmark }"
                      type="text" class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="255">
                                <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formBookmark.link ? formBookmark.link.length : 0 }}/255</span>
                           
                      <div v-if="errors.link && Object.keys(errors).length > 0" class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <span>{{ errors.link }}</span>
                      </div>

                  </div>

                  <div v-if="!isEditModalBookmark && !errors.getLink">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                      <input type="checkbox" v-model="formBookmark.isChecked" class="sr-only peer" 
                      :checked="(formBookmark.isChecked && !errors.notChecked)" @change="handleCheckboxChange">
                      <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-[#8c2cc7] dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-[#af38f9]"></div>
                      <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Buscar dados do site automaticamente<span class="font-light text-sm text-gray-400 ml-2">(Cadastro rápido)</span> </span> 
                    </label>
                  </div>
                 
                  <div>
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome:</label>
                      <input id="name" name="name" v-model="formBookmark.name" :disabled="(formBookmark.isChecked && !errors.notChecked) && !isEditModalBookmark" :class="{ 'bg-gray-200': (formBookmark.isChecked && !errors.notChecked) && !isEditModalBookmark }"
                      type="text" class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="80">
                                <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formBookmark.name ? formBookmark.name.length : 0 }}/80</span>
                                
                                <div v-if="errors.name && Object.keys(errors).length > 0" class="p-4 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                  <span>{{ errors.name }}</span>
                                </div>

                  </div>

                  <div>
                      <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sua observação (opcional):</label>
                      <textarea id="note" name="note" v-model="formBookmark.note" 
                      :disabled="(formBookmark.isChecked && !errors.notChecked) && !isEditModalBookmark" 
                      :class="{ 'bg-gray-200': (formBookmark.isChecked && !errors.notChecked) && !isEditModalBookmark }"
                        class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                              ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                              focus:ring-[#8c2cc7] sm:text-sm sm:leading-6" maxlength="255"></textarea>
                              <span class="text-xs font-light leading-6 text-gray-500 inline-block w-full text-right">{{ formBookmark.note ? formBookmark.note.length : 0 }}/255</span>
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
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600" 
                                v-if="!formBookmark.processing">
                  <span v-if="!isEditModalBookmark">Criar favorito</span>
                  <span v-if="isEditModalBookmark">Editar favorito</span>
                </button>
                <button v-if="formBookmark.processing" type="button" disabled class="button-spinner text-gray-500 bg-white 
                                                                rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 font-semibold ">
                  <svg class="spinner mr-4" viewBox="0 0 50 50">
                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
                  </svg>
                  Enviando...
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
              <button form="formDeleteBookmark" type="submit" class="flex  justify-center rounded-md px-3 p-3 text-sm font-semibold 
                                leading-6 text-white shadow-sm text-white bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sim eu tenho certeza
              </button>
            </div>
          </template>
        </Modal>

        <Modal size="md" v-if="isShowQrCodeBookmark" @close="closeModalQrCodeBookmark">
          <template #header>
            <div class="flex items-center text-lg text-[#8c2cc7] p-2 rounded-md">
              
              <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 rounded-md" stroke-width="1.0" aria-hidden="true">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M3 4.875C3 3.839 3.84 3 4.875 3h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 013 9.375v-4.5zM4.875 4.5a.375.375 0 00-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 00.375-.375v-4.5a.375.375 0 00-.375-.375h-4.5zm7.875.375c0-1.036.84-1.875 1.875-1.875h4.5C20.16 3 21 3.84 21 4.875v4.5c0 1.036-.84 1.875-1.875 1.875h-4.5a1.875 1.875 0 01-1.875-1.875v-4.5zm1.875-.375a.375.375 0 00-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 00.375-.375v-4.5a.375.375 0 00-.375-.375h-4.5zM6 6.75A.75.75 0 016.75 6h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75A.75.75 0 016 7.5v-.75zm9.75 0A.75.75 0 0116.5 6h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75zM3 14.625c0-1.036.84-1.875 1.875-1.875h4.5c1.036 0 1.875.84 1.875 1.875v4.5c0 1.035-.84 1.875-1.875 1.875h-4.5A1.875 1.875 0 013 19.125v-4.5zm1.875-.375a.375.375 0 00-.375.375v4.5c0 .207.168.375.375.375h4.5a.375.375 0 00.375-.375v-4.5a.375.375 0 00-.375-.375h-4.5zm7.875-.75a.75.75 0 01.75-.75h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75zm6 0a.75.75 0 01.75-.75h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75zM6 16.5a.75.75 0 01.75-.75h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75zm9.75 0a.75.75 0 01.75-.75h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75zm-3 3a.75.75 0 01.75-.75h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75zm6 0a.75.75 0 01.75-.75h.75a.75.75 0 01.75.75v.75a.75.75 0 01-.75.75h-.75a.75.75 0 01-.75-.75v-.75z"></path>
              </svg>

              <h1 class="ml-2 text-2xl font-bold tracking-tight text-gray-900">QR Code</h1>
            </div>
          </template>
          <template #body>
            <div class="flex flex-col items-center justify-center">
              <img :src="`https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${qrCodeLink}`" alt="">
              <div class="flex space-x-4 mt-4">
                <p class="text-center text-xs">Escolha o tamanho ou o formato que deseja fazer download</p>
              </div>
              <div class="flex space-x-4 mt-4">
                <button type="button" class="flex items-center justify-center rounded-md px-2 py-2 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?size=64x64&data=${qrCodeLink}`, 'png')">
                  64px
                </button>
                <button type="button" class="flex items-center justify-center rounded-md px-2 py-2 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?size=128x128&data=${qrCodeLink}`, 'png')">
                  128px
                </button>
                <button type="button" class="flex items-center justify-center rounded-md px-2 py-2 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?size=256x256&data=${qrCodeLink}`, 'png')">
                  256px
                </button>
                <button type="button" class="flex items-center justify-center rounded-md px-2 py-2 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?size=512x512&data=${qrCodeLink}`, 'png')">
                  512px
                </button>
              </div>
              <div class="flex space-x-4 mt-4">
                <p class="text-center text-xs">o formato padrão é PNG ou escolha abaixo um disponível</p>
              </div>
              <div class="flex space-x-4 mt-4">
                <button type="button" class="flex items-center justify-center rounded-md px-2 py-2 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?data=${qrCodeLink}&format=svg`, 'svg')">
                  SVG
                </button>
                <button type="button" class="flex items-center justify-center rounded-md px-2 py-2 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?data=${qrCodeLink}&format=eps`, 'eps')">
                  EPS
                </button>
              </div>
            </div>
          </template>
          <template #footer>
            <div class="flex justify-between">
              <button @click="closeModalQrCodeBookmark" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                Fechar
              </button>
              <!-- <button type="button" class="flex items-center justify-center rounded-md px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                      @click.native="downloadQrCode(`https://api.qrserver.com/v1/create-qr-code/?size=400x400&data=${qrCodeLink}`)">
                <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="w-5 h-5 mr-2">
                  <path clip-rule="evenodd" fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v11.69l3.22-3.22a.75.75 0 111.06 1.06l-4.5 4.5a.75.75 0 01-1.06 0l-4.5-4.5a.75.75 0 111.06-1.06l3.22 3.22V3a.75.75 0 01.75-.75zm-9 13.5a.75.75 0 01.75.75v2.25a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5V16.5a.75.75 0 011.5 0v2.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V16.5a.75.75 0 01.75-.75z"></path>
                </svg>
                Baixar
              </button> -->
            </div>
          </template>
        </Modal>

    </div>
</template>

<script setup>
  import { Link } from '@inertiajs/vue3';
  import { defineProps, ref, computed } from 'vue';
  import { Modal } from 'flowbite-vue'
  import { Toast } from 'flowbite-vue'
  import { useForm } from '@inertiajs/vue3'
  import { ChevronRightIcon } from "@heroicons/vue/24/solid";
  import { Input } from 'flowbite-vue'

  import FooterDashboard from './components/FooterDashboard.vue';
  import Welcome from './components/Welcome.vue';
  import HeaderDashboard from './components/HeaderDashboard.vue';

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
    category: Object,
    bookmarks: Object,
    dadosLink: Object,
    computed: {
      success() {
        // console.log(this.$page.props)
        return this.$page.props.session.success;
      }
    },
  })
</script>

<script>
const isShowModalBookmark = ref(false)
const isEditModalBookmark = ref(false)
const isShowDeleteModalBookmark = ref(false)
const isSendingBookmark = ref(false)
const isShowQrCodeBookmark = ref(false)

const showToast = ref(false);

export default {
  data() {
    return {
      formCat: null,
      formBookmark: null,
      isEditModalCategory: false,
      isChecked: true,
      qrCodeLink: '',
      searchValue: '',
      favoritesClose: true,
      featuredFilter:false
    }
  },
  computed: {
    filteredBookmarks() {
      if (this.searchValue === '') {
        // return this.$page.props.bookmarks;

        if (this.featuredFilter) {
          return this.$page.props.bookmarks.filter(bookmark => bookmark.featured);
        } else {
          return this.$page.props.bookmarks;
        }

      }  else {
        const searchTerm = this.searchValue.toLowerCase();
        return this.$page.props.bookmarks.filter(bookmark => {
          const nameMatch = bookmark.name && bookmark.name.toLowerCase().includes(searchTerm);
          const linkMatch = bookmark.link && bookmark.link.toLowerCase().includes(searchTerm);
          const noteMatch = bookmark.note && bookmark.note.toLowerCase().includes(searchTerm);
          // return nameMatch || linkMatch || noteMatch;
          return (nameMatch || linkMatch || noteMatch) && bookmark.featured;
        });
      }
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
      isChecked: true,
      notChecked:false,
      
    });
    this.formDeleteBookmark = useForm({
      _token: null,
      uuid_bookmark: null,
    });
  },
  methods: {
    toggleFeaturedFilter() {
      this.featuredFilter = !this.featuredFilter;
    },
    toggleAllDivVisibility() {
      const favoritesDivs = document.querySelectorAll("#favorites");

      for (let i = 0; i < favoritesDivs.length; i++) {
        const favoritesDiv = favoritesDivs[i];
        if (favoritesDiv.style.display === "block") {
          favoritesDiv.style.display = "none";
        } else {
          favoritesDiv.style.display = "block";
        }
      }
      const isVisible = favoritesDivs[0].style.display !== "none";
      this.favoritesClose = !isVisible;
    },
    toggleDivVisibility(bookmarkId) {
      const favoritesDiv = document.getElementById("favorites-" + bookmarkId);
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
    handleCheckboxChange() {
      if (this.formBookmark.isChecked) {
        this.formBookmark.reset('name');
        this.formBookmark.reset('note');
      }
    },
    sendBookmark() {
      isSendingBookmark.value = true
      console.log(this.formBookmark.name)
      this.formBookmark.post('/dashboard/create/bookmark', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isShowModalBookmark.value = false
          isSendingBookmark.value = false
          this.formBookmark.reset('uuid_category')
          this.formBookmark.reset('link');
          this.formBookmark.reset('name');
          this.formBookmark.reset('note');
          // this.formBookmark.isChecked = true;
          showToast.value = true;
          setTimeout(() => {
            showToast.value = false;
          }, 5000);
          console.log(resp);
        },
        onErrors: (errors) => {
          console.log('Hey! Errors')
          console.log(errors);
          isSendingBookmark.value = false
        }
      });
    },
    closeModalBookmark() {
      this.formBookmark.reset('link');
      this.formBookmark.reset('name');
      this.formBookmark.reset('note');
      this.formBookmark.isChecked = true;
      this.$page.props.errors = {}
      isShowModalBookmark.value = false
      isSendingBookmark.value = false
    },
    showModalBookmark(uuid_bookmark) {
      this.formBookmark.uuid_category = uuid_bookmark;
      // this.formBookmark.reset('link');
      this.formBookmark.link = '';
      // this.formBookmark.reset('name');
      this.formBookmark.name = '';
      // this.formBookmark.reset('note');
      this.formBookmark.note = '';
      this.formBookmark.isChecked = true;
      this.$page.props.errors = {}
      isEditModalBookmark.value = false
      isShowModalBookmark.value = true
      isSendingBookmark.value = false
    },
    showModalEditBookmark(bookmark){
      this.formBookmark.uuid_bookmark = bookmark.uuid
      this.formBookmark.link = bookmark.link
      this.formBookmark.name = bookmark.name
      this.formBookmark.note = bookmark.note
      isEditModalBookmark.value = true
      isShowModalBookmark.value = true
      isSendingBookmark.value = false
    },
    sendEditBookmark() {
      console.log('sendEditBookmark')
      isSendingBookmark.value = true
      this.formBookmark.put('/dashboard/update/bookmark/', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          isEditModalBookmark.value = false
          isShowModalBookmark.value = false
          isSendingBookmark.value = false
          this.formBookmark.reset('uuid_bookmark');
          this.formBookmark.reset('link');
          this.formBookmark.reset('name');
          this.formBookmark.reset('note');
          this.formBookmark.isChecked = true;
          showToast.value = true;
          setTimeout(() => {
            showToast.value = false;
          }, 5000);
          console.log(resp);
        },
        onErrors: (errors) => {
          console.log('Hey! Errors')
          console.log(errors);
          isSendingBookmark.value = false
        }
      });
    },
    async setBookmarkAsFeatured(bookmark) {
      console.log(bookmark.featured)
      try {
        const newFeaturedValue = bookmark.featured === 0 ? 1 : 0;
        await this.$inertia.put(`/dashboard/bookmarks/${bookmark.id}/featured`, {
          featured: newFeaturedValue
        });
        bookmark.featured = newFeaturedValue;
        console.log('Bookmark destacado com sucesso!');
      } catch (error) {
        console.error('Erro ao destacar o bookmark:', error);
      }
    },
    sendDeleteBookmark() {
      console.log('sendDeleteBookmark')
      this.formDeleteBookmark.delete('/dashboard/delete/bookmark/', {
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
    showModalQrCodeBookmark(bookmark){
      this.qrCodeLink = bookmark.link;
      isShowQrCodeBookmark.value = true;
    },
    closeModalQrCodeBookmark() {
      isShowQrCodeBookmark.value = false
    },
    downloadQrCode(url, type) {
      const link = url;
      fetch(link)
        .then((response) => response.blob())
        .then((blob) => {
          const url = window.URL.createObjectURL(new Blob([blob]));
          const a = document.createElement('a');
          a.style.display = 'none';
          a.href = url;

          if (type === 'svg'){
            a.download = 'qr_code.svg';
          } else if (type === 'eps'){
            a.download = 'qr_code.eps';
          } else {
            a.download = 'qr_code.png';
          }
          
          document.body.appendChild(a);
          a.click();
          window.URL.revokeObjectURL(url);
          document.body.removeChild(a);
        })
        .catch((error) => {
          console.error('Erro ao fazer o download do QR Code:', error);
        });
    },
    goToBookmark(uuid) {
      this.$inertia.visit('/dashboard/list/bookmark/' + uuid);
    },
    getFaviconUrl(url) {
      return `https://www.google.com/s2/favicons?domain_url=${encodeURIComponent(url)}`;
    },
    sendLink() {
      this.formBookmark.post('/dashboard/create/bookmark', {
        onSuccess: (resp) => {
          console.log('Hey! Success')
          console.log(resp)
        },
        onErrors: (errors) => {
          console.log('Hey! Errors')
          console.log(errors);
        }
      });
    },
    copyToClipboard(text) {
      const el = document.createElement('textarea');
      el.value = text;
      document.body.appendChild(el);
      el.select();
      document.execCommand('copy');
      document.body.removeChild(el);
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