<script setup lang="ts">
/* Importa o layout padrão do sistema para envolver a página */
import AppLayout from '@/layouts/AppLayout.vue';

/* Importa o componente Link do Inertia para navegação sem reload */
import { Link, Head } from '@inertiajs/vue3';

/* Importa o tipo BreadcrumbItem para tipar corretamente os breadcrumbs */
import { type BreadcrumbItem } from '@/types';
import { CirclePlus, Eye } from 'lucide-vue-next';

// Importar o componente de paginação
import Pagination from '@/components/Pagination.vue';

/* Define a interface do usuário, útil para tipagem TypeScript */
export interface User {
    id: number;
    name: string;
    email: string,
}

/* Recebe os dados da controller via props usando Inertia */
const props = defineProps<{
    users: {
        data: User[];
        links: { url: string | null; label: string, active: boolean }[];
    }
}>();

/* Define os breadcrumbs que serão exibidos no layout */
const breadcrumbItems: BreadcrumbItem[] = [
    { title: 'Usuários', href: '' },
];

</script>

<template>
    <!-- Usa o layout padrão e enviar os breadcrumbs para exibição -->
    <AppLayout :breadcrumbs="breadcrumbItems">

        <!-- Define o título da página para o <head> -->

        <Head title="Usuários" />

        <!-- Container principal da página -->
        <div class="content-box">

            <!-- Título da seção -->
            <div class="content-box-header">
                <h3 class="content-box-title">Usuários</h3>
                <div class="content-box-btn">
                    <Link href="/users"
                        class="btn-success align-icon-btn">
                    <CirclePlus class="w-4 h-4" />
                    <span>Cadastrar</span>
                    </Link>
                </div>
            </div>

            <!-- Container da tabela com bordas e sombra -->
            <div class="table-container">

                <!-- Tabela de usuários -->
                <table class="table">

                    <thead>
                        <tr class="table-header">
                            <!-- Cabeçalhos da tabela -->
                            <th
                                class="table-row-header">
                                ID</th>
                            <th
                                class="table-row-header">
                                Nome</th>
                            <th
                                class="table-row-header">
                                Email</th>
                            <th
                                class="table-row-header">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Itera sobre os usuários recebidos das props -->
                        <tr v-for="user in props.users.data" :key="user.id"
                            class="table-body">
                            <!-- Colunas da tabela -->
                            <td
                                class="table-row-body">
                                {{ user.id }}</td>
                            <td
                                class="table-row-body">
                                {{ user.name }}</td>
                            <td
                                class="table-row-body">
                                {{ user.email }}</td>
                            <td
                                class="table-actions">
                                <div class="table-actions-align">
                                    <Link :href="`/users/${user.id}`"
                                        class="btn-primary align-icon-btn">
                                    <Eye class="w-4 h-4" />
                                    <span>Visualizar</span>
                                    </Link>
                                </div>
                            </td>

                        </tr>
                    </tbody>

                </table>

                <!-- Paginação -->
                <Pagination :links="props.users.links" />
            </div>

        </div>
    </AppLayout>
</template>