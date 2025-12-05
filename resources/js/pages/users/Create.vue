<script setup lang="ts">
/* Importa o layout padrão do sistema para envolver a página */
import AppLayout from '@/layouts/AppLayout.vue';

/* Importar os componentes do Inertia */
import { Link, Head, useForm } from '@inertiajs/vue3';

/* Importa o tipo BreadcrumbItem para tipar corretamente os breadcrumbs */
import { type BreadcrumbItem } from '@/types';

// Importar os ícones
import { CirclePlus, List } from 'lucide-vue-next';
import { disable } from '@/routes/two-factor';

/* Define os breadcrumbs que serão exibidos no layout */
const breadcrumbItems: BreadcrumbItem[] = [
    { title: 'Usuários', href: '/users' },
    { title: 'Cadastrar Usuário', href: '' }
];

// Cria o formulário com os campos e valores iniciais
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

// Enviar o formuário para o Backend
const submit = () => {

};

</script>

<template>
    <!-- Usa o layout padrão e enviar os breadcrumbs para exibição -->
    <AppLayout :breadcrumbs="breadcrumbItems">

        <!-- Define o título da página para o <head> -->
        <Head title="Cadastrar Usuário" />

         <!-- Container principal -->
        <div class="content-box">
            <div class="content-box-header">
                <h3 class="content-box-title">Cadastrar o Usuário</h3>
                <div class="content-box-btn">
                    <Link href="/users"
                        class="btn-info align-icon-btn">
                    <List class="w-4 h-4" />
                    <span>Listar</span>
                    </Link>
                </div>
            </div>

            <!-- Formulário -->
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label for="name" class="form-label">Nome *</label>
                    <input type="text" v-model="form.name" id="name" class="form-input" placeholder="Digite o nome" required />

                    <!-- Mensagem de erro -->
                    <div v-if="form.errors.name" class="form-error">{{ form.errors.name }}</div>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">E-mail *</label>
                    <input type="email" v-model="form.email" id="email" class="form-input" placeholder="Digite o e-mail" required />

                    <!-- Mensagem de erro -->
                    <div v-if="form.errors.email" class="form-error">{{ form.errors.email }}</div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Senha *</label>
                    <input type="password" v-model="form.password" id="password" class="form-input" placeholder="Digite a senha" required />

                    <!-- Mensagem de erro -->
                    <div v-if="form.errors.password" class="form-error">{{ form.errors.password }}</div>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirmar a Senha *</label>
                    <input type="password" v-model="form.password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirmar a senha" required />

                    <!-- Mensagem de erro -->
                    <div v-if="form.errors.password_confirmation" class="form-error">{{ form.errors.password_confirmation }}</div>
                </div>

                <div class="mb-4">
                    <span class="required-field">* Campo obrigatório</span>
                </div>

                <button type="submit" class="btn-success align-icon-btn" :disabled="form.processing">
                    <CirclePlus class="w-4 h4" />
                    <span>{{ form.processing ? 'Salvando...' : 'Cadastrar' }}</span>
                </button>

            </form>

        </div>

    </AppLayout>
</template>