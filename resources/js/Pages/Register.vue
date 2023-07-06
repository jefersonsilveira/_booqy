<template>
    <div class="min-h-screen font-Red_Hat_Display font-light">

        <Header></Header>

        <main class="flex-grow bg-gray-100 h-[80vh] justify-center items-center dark:bg-gray-900 overflow-y-auto">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                
                <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
                    
                    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">

                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <h2 class="mb-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                                Cadastrar
                            </h2>
                        </div>

                        <form id="form" class="space-y-6" @submit.prevent="handleForm">

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
                      
                            <div>
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-500">Nome</label>
                                <div class="mt-2">
                                    <input id="name" name="name" type="text" autocomplete="name" 
                                    v-model="form.name"
                                    class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                    ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                    focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">
                                </div> 
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-500">E-mail</label>
                                <div class="mt-2">
                                    <input id="email" name="email" autocomplete="email"
                                    v-model="form.email" 
                                    class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                    ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset 
                                    focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-500">Senha</label>
                                
                                </div>
                                <div class="mt-2">
                                <input id="password" name="password" :type="showPassword ? 'text' : 'password'"  autocomplete="current-password" 
                                v-model="form.password"
                                class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">
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
                                v-model="form.password_confirmation"
                                class="font-medium block w-full rounded-md border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset 
                                ring-gray-300 placeholder:text-gray-400 focus:outline-0 focus:ring-2 focus:ring-inset
                                focus:ring-[#8c2cc7] sm:text-sm sm:leading-6">
                                </div>
                                
                            </div>

                            <div>
                                <div class="flex items-center justify-between">
                                <input type="checkbox" id="privacyPolicy" name="privacyPolicy" 
                                v-model="form.privacyPolicy"
                                class="rounded border-0 p-3 ring-1 ring-inset 
                                ring-gray-300 focus:outline-0 focus:ring-2 focus:ring-inset
                                focus:ring-[#8c2cc7] text-[#8c2cc7] focus:ring-offset-0">
                                <label for="privacyPolicy" class="block text-xs font-light leading-6 text-gray-500">
                                    Estou de acordo com os <a href="#" @click="showModalTermsPrivacy" class="underline underline-offset-2">Termos e a Política de Privacidade</a> <span class="font-bold">booqy</span>.
                                </label>
                                </div>
                            </div>

                            <div>
                                <button v-if="!form.processing" type="submit" class="flex w-full justify-center rounded-md px-3 p-3 text-sm font-semibold 
                                leading-6 text-white shadow-sm bg-[#af38f9] hover:bg-[#8c2cc7] focus-visible:outline focus-visible:outline-2 
                                focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>

                                <button v-if="form.processing" type="button" disabled class="button-spinner text-gray-500 bg-white 
                                                                rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 font-semibold ">
                                <svg class="spinner mr-4" viewBox="0 0 50 50">
                                    <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="4"></circle>
                                </svg>
                                Enviando...
                                </button>
                            </div>

                        </form>

                        <p class="mt-10 text-center text-sm text-gray-500">
                        Já faz parte do booqy?
                        <Link href="/login" class="font-semibold leading-6 text-[#af38f9] hover:text-[#8c2cc7]">Acesse agora</Link>!
                        </p>
                    </div>
                </div>

            </div>
        </main>

        <Footer></Footer>

        <Modal size="5xl" v-if="isShowModalTermsPrivacy" @close="closeModalTermsPrivacy">
            <template #header>                
                <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                    Termos de Uso e Política de Privacidade
                </h1>
            </template>
            <template #body>
                <div class="max-h-96 overflow-auto text-sm">
                    <p class="mb-4">Bem-vindo ao <span class="font-bold">booqy</span>!</p>
                    <p class="mb-4">
                        O <span class="font-bold">booqy</span> é um site que permite aos usuários salvar seus favoritos online. 
                        Antes de utilizar nossos serviços, pedimos que você leia atentamente este Termo de Uso e Política de Privacidade. 
                        Ao acessar ou utilizar o <span class="font-bold">booqy</span>, você concorda em cumprir estes termos e políticas.
                    </p>
                    <h1 class="text-xl font-bold mb-4">Termo de Uso</h1>

                    <h2 class="text-lg font-semibold mb-2">Registro de Conta:</h2>
                    <p class="mb-4">1.1 Para utilizar os recursos completos do <span class="font-bold">booqy</span>, você precisará criar uma conta fornecendo seu nome, endereço de e-mail válido e escolhendo uma senha para acesso à plataforma.</p>
                    <p class="mb-4">1.2 Você é responsável por manter a confidencialidade de suas informações de conta, incluindo a senha, e concorda em não compartilhar essas informações com terceiros.</p>
                    <p class="mb-4">1.3 Você deve ter pelo menos 13 anos de idade para criar uma conta no <span class="font-bold">booqy</span>.</p>

                    <h2 class="text-lg font-semibold mb-2">Propriedade Intelectual:</h2>
                    <p class="mb-4">2.1 Todo o conteúdo presente no <span class="font-bold">booqy</span>, incluindo textos, gráficos, logotipos, ícones, imagens, vídeos, áudios e software, é de propriedade exclusiva do <span class="font-bold">booqy</span> ou de seus parceiros e está protegido por leis de direitos autorais e outras leis de propriedade intelectual.</p>
                    <p class="mb-4">2.2 Você concorda em não copiar, modificar, distribuir, transmitir, exibir, vender, licenciar ou explorar qualquer conteúdo do <span class="font-bold">booqy</span> sem a permissão expressa por escrito do <span class="font-bold">booqy</span>.</p>

                    <h2 class="text-lg font-semibold mb-2">Privacidade:</h2>
                    <p class="mb-4">3.1 Coleta de Informações: O <span class="font-bold">booqy</span> coleta e armazena informações fornecidas por você durante o registro, como seu nome, endereço de e-mail e senha.</p>
                    <p class="mb-4">3.2 Uso de Informações: As informações coletadas pelo <span class="font-bold">booqy</span> podem ser utilizadas para fornecer e melhorar nossos serviços, personalizar sua experiência, enviar atualizações, notificações e informações relevantes, além de cumprir com obrigações legais.</p>
                    <p class="mb-4">3.3 Compartilhamento de Informações: O <span class="font-bold">booqy</span> não compartilhará suas informações pessoais com terceiros, exceto quando necessário para fornecer nossos serviços ou quando exigido por lei.</p>

                    <h2 class="text-lg font-semibold mb-2">Segurança:</h2>
                    <p class="mb-4">4.1 O <span class="font-bold">booqy</span> emprega medidas de segurança para proteger suas informações contra acesso não autorizado, uso indevido, alteração ou destruição.</p>
                    <p class="mb-4">4.2 No entanto, lembre-se de que nenhum método de transmissão ou armazenamento eletrônico é 100% seguro, e não podemos garantir a segurança absoluta de suas informações.</p>

                    <h2 class="text-lg font-semibold mb-2">Modificações e Rescisão:</h2>
                    <p class="mb-4">5.1 O <span class="font-bold">booqy</span> reserva-se o direito de modificar ou encerrar o serviço a qualquer momento, por qualquer motivo, sem aviso prévio.</p>
                    <p class="mb-4">5.2 Você pode encerrar sua conta no <span class="font-bold">booqy</span> a qualquer momento, excluindo suas informações pessoais e descontinuando o uso do serviço.</p>

                    <h2 class="text-lg font-semibold mb-2">Disposições Gerais:</h2>
                    <p class="mb-4">6.1 Estes termos serão regidos e interpretados de acordo com as leis do país em que o <span class="font-bold">booqy</span> está sediado.</p>
                    <p class="mb-4">6.2 Se qualquer disposição destes termos for considerada inválida ou inexequível, as demais disposições permanecerão em pleno vigor e efeito.</p>
                    <p class="mb-4">6.3 Qualquer falha do <span class="font-bold">booqy</span> em exercer ou fazer cumprir qualquer direito ou disposição destes termos não constituirá uma renúncia a tal direito ou disposição.</p>

                    <h1 class="text-xl font-bold mt-8 mb-4">Política de Privacidade</h1>
                    <p class="mb-4">Para obter informações detalhadas sobre como o <span class="font-bold">booqy</span> coleta, usa, armazena e protege suas informações pessoais, consulte nossa Política de Privacidade completa.</p>
                    <p class="mb-4">Ao utilizar o <span class="font-bold">booqy</span>, você concorda com a coleta e o uso de suas informações pessoais de acordo com nossa Política de Privacidade.</p>

                    <p class="text-sm text-gray-500 mt-8">Última atualização: 18/06/2023</p>

                    <p class="mt-8">Entre em contato conosco em caso de dúvidas ou preocupações relacionadas a estes termos e políticas.</p>

                    <p class="mt-4">Obrigado por estar conosco no <span class="font-bold">booqy</span>!</p>
                </div>

            </template>
            <template #footer>
                <div class="flex justify-between">
                <button @click="closeModalTermsPrivacy" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Fechar
                </button>
                <button @click="closeModalTermsPrivacy" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Eu aceito
                </button>
                </div>
            </template>
        </Modal>

    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3'
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/vue3'
import { Modal } from 'flowbite-vue'
import { ref } from 'vue'

import Header from './components/Header.vue';
import Footer from './components/Footer.vue';

defineProps({ 
    errors: Object,
    computed: {
        success() {
        return this.$page.props.session.success;
        },
    },
})
</script>

<script>
const isShowModalTermsPrivacy = ref(false)

export default {
  data() {
    return {
      form: {
        _token: null,
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        privacyPolicy:null,
      },
      showPassword: false,
      showConfirmPassword: false,
    };
  },
  methods: {
    handleForm() {
      this.$inertia.post('/register', {
        ...this.form,
        _token: this.$page.props.csrf_token,
      });
    },
    toggleShowPassword() {
        this.showPassword = !this.showPassword;
    },
    showModalTermsPrivacy(){
        isShowModalTermsPrivacy.value = true;
    },
    closeModalTermsPrivacy() {
        isShowModalTermsPrivacy.value = false;
    }
  },
  computed: {
    success() {
      return this.$page.props.session.success;
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