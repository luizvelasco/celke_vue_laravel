<script setup lang="ts">
/* Importa o layout padrão do sistema para envolver a página */
import AppLayout from '@/layouts/AppLayout.vue';

/* Importar os componentes do Inertia */
import { Link, Head } from '@inertiajs/vue3';

/* Importa o tipo BreadcrumbItem para tipar corretamente os breadcrumbs */
import { type BreadcrumbItem } from '@/types';
import { List } from 'lucide-vue-next';

/* Define a interface do usuário, útil para tipagem TypeScript */
export interface User {
    id: number;
    name: string;
    email: string,
    created_at: string,
    updated_at: string,
}

/* Recebe os dados da controller via props usando Inertia */
const props = defineProps<{
    user: User
}>();

/* Define os breadcrumbs que serão exibidos no layout */
const breadcrumbItems: BreadcrumbItem[] = [
    { title: 'Usuários', href: '/users' },
    { title: 'Visualizar Usuário', href: '' }
    // { title: `Visualizar Usuário #${props.user.id}`, href: '' }
];

</script>

<template>
    <!-- Usa o layout padrão e enviar os breadcrumbs para exibição -->
    <AppLayout :breadcrumbs="breadcrumbItems">

        <!-- Define o título da página para o <head> -->
        <!-- <Head :title="`Usuário #${props.user.id}`" /> -->

        <Head title="Usuário" />

        <!-- Container principal -->
        <div class="content-box">

            <div class="content-box-header">
                <h3 class="content-box-title">Detalhes do Usuário</h3>
                <div class="content-box-btn">
                    <Link href="/users"
                        class="btn-info align-icon-btn">
                    <List class="w-4 h-4" />
                    <span>Listar</span>
                    </Link>
                </div>
            </div>

            <!-- Card com informações -->
            <div
                class="detail-box">
                <p><strong class="title-detail-content">ID:</strong> <span class="detail-content">{{ props.user.id }}</span></p>
                <p><strong class="title-detail-content">Nome:</strong> <span class="detail-content">{{ props.user.name }}</span></p>
                <p><strong class="title-detail-content">E-mail:</strong> <span class="detail-content">{{ props.user.email }}</span></p>
                <p><strong class="title-detail-content">Criado em:</strong> <span class="detail-content">{{ new Date(props.user.created_at).toLocaleString() }}</span></p>
                <p><strong class="title-detail-content">Atualizado em:</strong> <span class="detail-content">{{ new Date(props.user.updated_at).toLocaleString() }}</span></p>
            </div>

        </div>

    </AppLayout>
</template>