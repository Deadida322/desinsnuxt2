<template>
    <div class="d-flex flex-column justify-center">
        <h3 class="text-center">Задать вопрос специалисту</h3>
        <!-- <div class="links d-flex justify-center my-2">
            <v-avatar tile>
                <img :src="require('~/assets/icons/gmail.png')" alt="gmail">
            </v-avatar>
            <v-avatar class="mx-6">
                <img :src="require('~/assets/icons/telegram.png')" alt="telegram">
            </v-avatar>
            <v-avatar>
                <img :src="require('~/assets/icons/whatsapp.png')" alt="whatsapp">
            </v-avatar>
        </div> -->
        <a
            class="text-center success--text text-subtitle-1 my-4"
            href="tel:+7(977)385-11-47"
            >+7(977)385-11-47</a
        >
        <vs-button
            class="d-none d-sm-block"
            @click="submit"
            gradient
            size="large"
            block
        >
            Заказать звонок
        </vs-button>
    </div>
</template>

<script>
    export default {
        methods: {
            submit() {
                this.$emit("submit");
            },
        },
    };
</script>
