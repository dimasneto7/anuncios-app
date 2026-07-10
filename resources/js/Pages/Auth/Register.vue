<script setup>
import { useForm } from "@inertiajs/vue3";
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import ErrorMessages from "../../Components/ErrorMessages.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Crie sua conta</Title>
            <p>
                Já tem uma conta?
                <TextLink routeName="home" label="Login" />
            </p>
        </div>

        <!-- Error Messages -->
        <ErrorMessages :errors="form.errors" />

        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Name" icon="id-badge" v-model="form.name" />
            <InputField label="Email" icon="at" v-model="form.email" />
            <InputField
                label="Password"
                type="password"
                icon="key"
                v-model="form.password"
            />
            <InputField
                label="Confirm Password"
                type="password"
                icon="key"
                v-model="form.password_confirmation"
            />

            <p class="text-slate-500 text-sm dark:text-slate-400">
                Fazendo o seu cadastro você concorda com os Termos de Serviço e
                Políticas de Privacidade.
            </p>

            <PrimaryBtn :disabled="form.processing"
                >Finalizar Cadastro</PrimaryBtn
            >
        </form>
    </Container>
</template>
