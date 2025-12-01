<script setup lang="ts">
// Importa o layout padrão do sistema para envolver a página
import AppLayout from '@/layouts/AppLayout.vue';

// Importa o tipo BreadcrumbItem para tipar corretamente os breadcrumbs
import { type BreadcrumbItem } from '@/types';

// Define a interface do usuário, útil para tipagem TyoeScript
export interface User {
    id: number;
    name: string;
    email: string,
}

// Recebe os dados da Controller via props usando Inertia
const props = defineProps<{
    users: {
        data: User[];
    }
}>();

// Define os breadcrumbs que serão exibidos no layout
const breadcrumbItems: BreadcrumbItem[] = [
    { title: 'Usuários', href: ''},

];

</script>

<template>
    <!-- Usa o layout padrão e enviar os breadcrumbs para exibição -->
    <AppLayout :breadcrumbs="breadcrumbItems">

        <!-- Define o título da página para o <head> -->

        <Head title="Usuários" />

        <!-- Container principal da página -->
        <div class="bg-white shadow-lg sm:rounded-b-lg text-gray-900 p-4 dark:bg-sidebar dark:text-gray-200">

            <!-- Título da seção -->
            <h1 class="text-xl font-bold mb-4">Usuários</h1>

            <!-- Container da tabela com bordas e sombra -->
            <div class="overflow-hidden sm:rounded-lg bg-white shadow-sm dark:bg-primary-foreground">

                <!-- Tabela de usuários -->
                <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-0 dark:divide-border">

                    <thead>
                        <tr class="bg-gray-50 dark:bg-primary-foreground">
                            <!-- Cabeçalhos da tabela -->
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 tracking-wider border-b border-gray-200 dark:border-border dark:text-gray-300">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 tracking-wider border-b border-gray-200 dark:border-border dark:text-gray-300">Nome</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 tracking-wider border-b border-gray-200 dark:border-border dark:text-gray-300">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Itera sobre os usuários recebidos das props -->
                         <tr v-for="user in props.users.data" :key="user.id" class="hover:bg-gray-50 dark:hover:bg-background">
                            <!-- Colunas da tabela -->
                             <td class="px-6 py-2 text-sm text-gray-950 border-b border-gray-200 dark:text-gray-300 dark:border-border break-all">{{ user.id }}</td>
                             <td class="px-6 py-2 text-sm text-gray-950 border-b border-gray-200 dark:text-gray-300 dark:border-border break-all">{{ user.name }}</td>
                             <td class="px-6 py-2 text-sm text-gray-950 border-b border-gray-200 dark:text-gray-300 dark:border-border break-all">{{ user.email }}</td>

                         </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </AppLayout>
</template>