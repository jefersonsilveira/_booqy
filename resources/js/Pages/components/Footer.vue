<template>
    <footer class="bg-white">
      <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
          <p class="text-left text-gray-500 text-xs">
            &copy; 2023 booqy. <a href="#" @click="showModalTermsPrivacy" class="underline underline-offset-2">Termos e Política de Privacidade</a> 
          </p>
          <p class="inline-flex text-right text-gray-500 text-xs">
            Feito com 
            <svg fill="none" class="h-4 w-4 text-red-900 mx-1" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
            </svg> em RS VALLEY
          </p>
        </div>
      </div>
    </footer>

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
              </div>
            </template>
        </Modal>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';
    import { Modal } from 'flowbite-vue'
    import { ref } from 'vue'
</script>

<script>
const isShowModalTermsPrivacy = ref(false)

export default {
  methods: {
    showModalTermsPrivacy(){
        isShowModalTermsPrivacy.value = true;
    },
    closeModalTermsPrivacy() {
        isShowModalTermsPrivacy.value = false;
    }
  }
}
</script>

<style lang="scss" scoped>

</style>