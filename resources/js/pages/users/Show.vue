<script setup lang="ts">
// Importa o layout padrão do sistema para envolver a página
import AppLayout from '@/layouts/AppLayout.vue';

// Importar os componentesdo Inertia
import { Link, Head } from '@inertiajs/vue3';

// Importa o tipo BreadcrumbItem para tipar corretamente os breadcrumbs
import { type BreadcrumbItem } from '@/types';
import { List } from 'lucide-vue-next';

// Define a interface do usuário, útil para tipagem TyoeScript
export interface User {
    id: number;
    name: string;
    email: string,
    created_at: string,
    updated_at: string,
}

// Recebe os dados da Controller via props usando Inertia
const props = defineProps<{
    user: {
        user: User
    }
}>();

// Define os breadcrumbs que serão exibidos no layout
const breadcrumbItems: BreadcrumbItem[] = [
    { title: 'Usuários', href: '/users'},
    { title: 'Visualizar Usuário', href: '' }

];

</script>

<template>
    <!-- Usa o layout padrão e enviar os breadcrumbs para exibição -->
    <AppLayout :breadcrumbs="breadcrumbItems">

        <!-- Define o título da página para o <head> -->
        <Head title="Usuário" />

        <!-- Container principal da página -->
        <div class="shadow-lg sm:rounded-b-lg text-gray-900 p-4 dark:text-gray-200">

            <div class="flex justify-between items-center border-b-2 border-gray-100 pb-2 mb-3 dark:border-border">
                <h3 class="text-base font-semibold text-gray-600 dark:text-gray-400">Detalhes do usuário</h3>
                <div class="flex space-x-1">
                    <Link href="/users" class="bg-cyan-500 text-white text-sm px-2 py-1 rounded hover:bg-cyan-600 transiction-colors cursor-pointer flex items-center space-x-1">
                        <List class="w-4 h-4" />
                        <span>Listar</span>
                    </Link>
                </div>
            </div>

            <!-- Card com informações -->
             <div class="text-sm overflow-hidden sm:rounded-lg bg-white shadow-sm dark:bg-primary-foreground p-6 space-y-4">
                <p><strong>ID: </strong>{{ props.user.id }}</p>
                <p><strong>Nome: </strong>{{ props.user.name }}</p>
                <p><strong>E-mail: </strong>{{ props.user.email }}</p>
                <p><strong>Criado em: </strong>{{ new Date(props.user.created_at).toLocaleString() }}</p>
                <p><strong>Atualizado em: </strong>{{ new Date(props.user.updated_at).toLocaleString() }}</p>
             </div>

        </div>


    </AppLayout>

</template>


