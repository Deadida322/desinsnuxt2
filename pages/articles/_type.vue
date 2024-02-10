<template>
    <div>
        <callback-form @submit="submitForm" v-model="showForm"></callback-form>
        <v-row class="mt" justify="center" align="center">
            <v-col cols="12" sm="12" md="12">
                <v-img
                    gradient="to top right, rgba(0,0,0,.7), rgba(25,32,72,.8)"
                    :src="require(`/assets/articles/${article.img}`)"
                    height="800"
                    class="rb image-container bg-grey-lighten-2"
                >
                    <div
                        class="head flex-sm-column flex-column flex-md-row justify-center"
                    >
                        <div class="text-info">
                            <h1 class="mt-8 h1 header-title mt-sm-0" dark>
                                {{ article.title }}
                            </h1>
                            <div class="subtitle">
                                Истребим всех вредителей. Эффективно без запаха
                                с гарантией от 1100 рублей.
                            </div>
                        </div>
                        <v-card class="advantages-card" shaped>
                            <v-chip
                                class="ntv-chip"
                                color="secondary"
                                text-color="white"
                            >
                                Работаем 24/7
                            </v-chip>
                            <v-card-title>Наши преимущества</v-card-title>
                            <v-card-text>
                                <v-list>
                                    <v-list-item v-for="item in headerInfo">
                                        <v-list-item-icon>
                                            <v-icon color="indigo">
                                                {{ item.icon }}
                                            </v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-title
                                                class="overflow-list-item"
                                                >{{
                                                    item.title
                                                }}</v-list-item-title
                                            >
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list>
                            </v-card-text>
                            <v-card-actions>
                                <vs-button
                                    @click="showForm = true"
                                    block
                                    gradient
                                    size="large"
                                    >ЗАКАЗАТЬ</vs-button
                                ></v-card-actions
                            >
                        </v-card>
                    </div>
                </v-img>
            </v-col>
        </v-row>
        <v-row class="mt-12" justify="center" align="center">
            <v-col v-if="article" cols="12" sm="12" md="10">
                <div class="text-h4 text-center">
                    {{ article.danger.title }}
                </div>
                <v-card class="ma-2 mt-4">
                    <v-card-text class="text-subtitle-1">
                        {{ article.danger.text }}
                    </v-card-text>
                </v-card>
                <div class="ma-2">
                    <h2 class="text-h4 text-center mt-5 mb-5">
                        Используем 4 основные методики
                    </h2>
                    <div class="d-flex align-center justify-center">
                        <Methods></Methods>
                    </div>
                </div>
                <div class="ma-2">
                    <div class="text-h4 mt-4 text-center">
                        {{ article.methods.title }}
                    </div>
                    <v-card class="mt-4">
                        <v-card-text class="text-subtitle-1">
                            <div v-for="block in article.methods.blocks">
                                <TextBlock
                                    v-if="block.type == 'text'"
                                    :block="block"
                                />
                                <EnumBlock
                                    v-else-if="block.type == 'enum'"
                                    :block="block"
                                />
                            </div>
                        </v-card-text>
                    </v-card>
                </div>
                <div class="d-flex justify-center ma-4">
                    <vs-alert
                        height="125"
                        title="Нужна помощь?"
                        :active="true"
                        color="success"
                    >
                        <div
                            class="d-flex flex-column flex-md-row align-center justify-space-between"
                        >
                            <div>
                                Если у вас возникли вопросы, вы можете связаться
                                с нами или заказать обратный звонок
                            </div>

                            <vs-button @click="showForm = true" flat
                                >Заказать звонок</vs-button
                            >
                        </div>
                    </vs-alert>
                </div>
                <div class="ma-2">
                    <div class="text-h4 mt-4 text-center">
                        {{ article.prepair.title }}
                    </div>
                    <v-card class="mt-4">
                        <v-card-text class="text-subtitle-1">
                            <div v-for="block in article.prepair.blocks">
                                <TextBlock
                                    v-if="block.type == 'text'"
                                    :block="block"
                                />
                                <EnumBlock
                                    v-else-if="block.type == 'enum'"
                                    :block="block"
                                />
                            </div>
                        </v-card-text>
                    </v-card>
                </div>
                <QuizSteps
                    @submit="submitQuiz"
                    class="ma-2 mt-6 mb-6"
                ></QuizSteps>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import TextBlock from "~/components/TextBlock.vue";
    import Swal from "sweetalert2";
    import EnumBlock from "~/components/EnumBlock.vue";
    import articles from "~/helpers/articles.js";
    import QuizSteps from "~/components/QuizSteps.vue";
    import CallbackForm from "~/components/CallbackForm.vue";
    export default {
        data() {
            return {
                article: {},
                showForm: false,
                headerInfo: [
                    {
                        title: "Срочный выезд за 30 минут",
                        icon: "mdi-timer-alert-outline",
                    },
                    {
                        title: "Обработка всего за час",
                        icon: "mdi-clock-time-eleven-outline",
                    },
                    {
                        title: "Гарантия по договору до 5 лет",
                        icon: "mdi-file-sign",
                    },
                    {
                        title: "Вернём деньги, если проблема останется",
                        icon: "mdi-cash-multiple",
                    },
                ],
            };
        },
        components: {
            TextBlock,
            EnumBlock,
            QuizSteps,
            CallbackForm,
        },
        created() {
            this.article = articles[this.$route.params.type];
        },
        methods: {
            submitForm(data) {
                this.$axios
                    .get(
                        `https://parazit24.com/sendForm.php?phone=${data.phone}&name=${data.name}`
                    )
                    .then((res) => {
                        Swal.fire({
                            title: "Отлично",
                            text: "Ваша заявка была отправлена, ожидайте звонка",
                            icon: "success",
                        });
                        ym(93316906, "reachGoal", "send_application");
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: "Ошибка",
                            text: "Произошла ошибка на сервере",
                            icon: "error",
                        });
                    });
            },
            submitQuiz(data) {
                this.$axios
                    .get(
                        `https://parazit24.com/sendQuiz.php?phone=${data.phone}&name=${data.name}&message=${data.text}`
                    )
                    .then((res) => {
                        Swal.fire({
                            title: "Отлично",
                            text: "Ваша заявка была отправлена, ожидайте звонка",
                            icon: "success",
                        });
                        ym(93316906, "reachGoal", "send_quiz");
                    })
                    .catch((err) => {
                        Swal.fire({
                            title: "Ошибка",
                            text: "Произошла ошибка на сервере",
                            icon: "error",
                        });
                    });
            },
        },
    };
</script>

<style lang="scss">
    .rb {
        clip-path: ellipse(100% 52% at 49% 45%);

        @media screen and (max-width: 600px) {
            clip-path: none;
        }
    }

    .image-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        height: 800px;
    }

    .v-responsive__sizer {
        display: none;
    }

    .head {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;

        height: 800px;

        @media screen and (max-width: 600px) {
            width: 100% !important;
            padding: 10px;
        }

        h1 {
            text-transform: uppercase;
            color: rgb(228, 235, 255);
        }
    }

    .v-list-item__title {
        line-height: 1.4 !important;
        white-space: pre-wrap !important;
    }

    .feedback {
        @media screen and (max-width: 600px) {
            height: 320px;
        }
    }

    .certs-100 {
        width: 100%;

        @media screen and (max-width: 960px) {
            width: 100%;
        }
    }

    .certs-40 {
        width: 40%;

        @media screen and (max-width: 960px) {
            width: 100%;
        }
    }

    .w-50-100 {
        width: 49%;

        @media screen and (max-width: 960px) {
            width: 100%;
        }
    }

    .w-70-100 {
        width: 69%;

        @media screen and (max-width: 960px) {
            width: 100%;
        }
    }

    .w-md-100 {
        width: 49%;

        @media screen and (max-width: 960px) {
            width: 100% !important;
        }
    }

    .w-100 {
        width: 100%;
    }

    .text-info {
        width: 35%;
        text-align: center;
        margin-right: 40px;

        .subtitle {
            margin-top: 30px;
            color: aliceblue;
        }

        @media screen and (max-width: 960px) {
            width: 90%;
            margin-right: 0;
            margin-bottom: 30px;
        }
    }

    .advantages-card {
        position: relative;

        .ntv-chip {
            position: absolute;
            top: -10px;
            right: -1px;
        }
    }

    .h2 {
        text-align: center;
    }

    .w-50 {
        width: 49%;
    }

    .cert-info {
        width: 50%;

        h1 {
            font-size: 40px;
            line-height: 44px;
        }

        .subtitle {
            font-size: 24px;
        }
    }

    .contact-img {
        width: 800px;
        display: none;

        @media screen and (max-width: 960px) {
            width: 600px;
        }

        @media screen and (max-width: 830px) {
            width: 500px;
            margin-left: -150px;
        }
    }

    .v-list-item__title {
        @media screen and (max-width: 470px) {
            font-size: 14px;
        }

        @media screen and (max-width: 420px) {
            font-size: 12px;
        }
    }

    .header-title {
        @media screen and (max-width: 500px) {
            font-size: 24px !important;
        }
    }
    .curp {
        cursor: pointer;
    }
    .vs-card-content.type-4 .vs-card {
        max-width: 100% !important;
    }
</style>
