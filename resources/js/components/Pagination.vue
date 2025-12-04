<script setup lang="ts">

/* Importa o componente do Inertia */
import { Link } from '@inertiajs/vue3';

// Importa a função computed do Vue para criar propriedades reativas derivadas
import { computed } from 'vue';

// Definir as props do componente, que são os links de paginação recebidos da controller
const props = defineProps<{
    links: { url: string | null; label: string; active: boolean} []
}>();

// Computed que filtra e limita os links de paginação para exibir anterior e próximo, e alguns do meio
const paginatedLinks = computed(() => {

    // Total de links disponíveis
    const totalLinks = props.links.length;

    // Encontra o índice do link que está ativo (página atual)
    const currentIndex = props.links.findIndex(link => link.active);

    // Se nenhum link estiver ativo, retorna todos os links
    if(currentIndex === -1) return props.links;

    // Calcula o indice inicial (duas paginas antes da atual, mas no mínimo 1)
    const start = Math.max(currentIndex -2, 1);

    // Calcula o indice final (duas paginas apos a atual, mas no máximo penultimo)
    const end = Math.min(currentIndex + 2, totalLinks - 2);

    // Link da pagina anterior
    const previuos = props.links[0];

    // Link da proxima página
    const next = props.links[totalLinks - 1];

    // Links do meio, limitado pelas páginas antes e depois da atual
    const middle = props.links.slice(start, end + 1);

    // Retorna um array combinando anterior, links do meio e o próximo
    return [previuos, ...middle, next];


});


</script>

<template>
    <!-- Container da paginacao -->
     <div class="pagination-container">
        <!--  Itera sobre os links filtrados e renderiza cada um  -->
          <Link v-for="link in paginatedLinks" 
          :key="link.label" :href="link.url ?? ''" class="pagination-link" 
          :class="{
            // Classe quando a página está ativa
            'pagination-link-active': link.active,
            // Classe quando o link não possui URL
            'pagination-link-disabled': !link.url,
          }" v-html="link.label" />
     </div>
</template>

<style>
@reference "../../css/app.css";

/* Container centralizado da paginação com espacamento entre links */
.pagination-container {
    @apply flex gap-2 justify-center my-2;
}

/* Estilo padrão para cada link da paginação */
.pagination-link {
    @apply text-sm px-3 py-1 border rounded transition-colors duration-200;
}

/* Estilo aplicado à página ativa */
.pagination-link-active {
    @apply bg-gray-300 dark:bg-background font-bold;
}

/* Estilo aplicado aos links desativados */
.pagination-link-disabled {
    @apply text-gray-400 pointer-events-none;
}

</style>