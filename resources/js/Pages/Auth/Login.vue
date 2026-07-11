<script setup>
import { useForm } from "@inertiajs/vue3";
import Container from "../../Components/Container.vue";
import Title from "../../Components/Title.vue";
import TextLink from "../../Components/TextLink.vue";
import InputField from "../../Components/InputField.vue";
import PrimaryBtn from "../../Components/PrimaryBtn.vue";
import ErrorMessages from "../../Components/ErrorMessages.vue";
import Checkbox from "../../Components/Checkbox.vue";

const form = useForm({
    email: "",
    password: "",
    remember: null,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="- Entrar" />
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Entrar</Title>
            <p>
                Ainda não tem uma conta?
                <TextLink routeName="register" label="Cadastrar" />
            </p>
        </div>

        <!-- Error Messages -->
        <ErrorMessages :errors="form.errors" />

        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Email" icon="at" v-model="form.email" />
            <InputField
                label="Password"
                type="password"
                icon="key"
                v-model="form.password"
            />

            <div class="flex items-center justify-between">
                <Checkbox name="remember" v-model="form.remember"
                    >Lemnbrar-me</Checkbox
                >
                <TextLink routeName="home" label="Esqueceu a senha?" />
            </div>

            <PrimaryBtn :disabled="form.processing">Entrar</PrimaryBtn>
        </form>
    </Container>
</template>
