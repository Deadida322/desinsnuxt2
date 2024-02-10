<template>
    <div class="">
        <v-row class="mt" justify="center" align="center">
            <callback-form
                @submit="submitForm"
                v-model="showModal"
            ></callback-form>
            <v-col cols="12" sm="12" md="12">
                <v-img
                    gradient="to top right, rgba(0,0,0,.7), rgba(25,32,72,.8)"
                    src="https://bigpicture.ru/wp-content/uploads/2022/10/bigpicture_ru_dezinfekciya-ozonom.jpg"
                    height="800"
                    class="rb image-container bg-grey-lighten-2"
                >
                    <div
                        class="head flex-sm-column flex-column flex-md-row justify-center"
                    >
                        <div class="text-info">
                            <h1 class="mt-8 h1 header-title mt-sm-0" dark>
                                Полное истребление насекомых, бактерий, грызунов
                                и запахов
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
                                    @click="showModal = true"
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
        <v-row justify="center" align="center">
            <v-col cols="12" class="pa-2 pa-md-0" sm="12" md="10">
                <h2 id="services" class="h2 my-4">Наши Услуги</h2>
                <v-card class="mb-5">
                    <v-tabs v-model="tab" grow>
                        <v-tab> Физическим лицам </v-tab>
                        <v-tab> Юридическим лицам </v-tab>
                    </v-tabs>
                    <v-tabs-items v-model="tab">
                        <v-tab-item color="transparent">
                            <v-card flat>
                                <v-card-text>
                                    <Fiz @callback="showModal = true"></Fiz>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                        <v-tab-item color="transparent">
                            <v-card flat>
                                <v-card-text>
                                    <Jur @callback="showModal = true"></Jur>
                                </v-card-text>
                            </v-card>
                        </v-tab-item>
                    </v-tabs-items>
                </v-card>
            </v-col>
        </v-row>
        <v-row justify="center" align="center">
            <v-col cols="12" class="pa-2 pa-md-0" sm="12" md="10">
                <div>
                    <div
                        class="d-flex flex-column align-center justify-space-between"
                    >
                        <div class="certs-30 mb-4">
                            <h1 class="cert-title text-center mb-4" dark>
                                Только инновационные сертифицированные
                                препараты!
                            </h1>
                            <vs-alert
                                class="d-none d-md-block"
                                max-height="230px"
                                color="success"
                            >
                                <template #icon>
                                    <v-icon size="44" color="success">
                                        mdi-information
                                    </v-icon>
                                </template>
                                <template #title>
                                    Без запаха, безвредные для людей и животных
                                </template>
                                Часто компании могут экономить на препаратах и
                                использовать дешёвые препараты, мы не экономим
                                на здоровье наших клиентах и используем только
                                сертифицрованные препараты
                            </vs-alert>
                        </div>
                        <div class="certs-100 mt-4 mt-md-0">
                            <CertCarousel></CertCarousel>
                        </div>
                    </div>
                </div>
            </v-col>
        </v-row>
        <v-row justify="center" align="center">
            <v-col cols="12" class="pa-2 pa-md-0" sm="12" md="10">
                <h2 class="h2 mt-5 mb-5">Используем 4 основные методики</h2>
                <div class="">
                    <Methods></Methods>
                </div>
            </v-col>
        </v-row>
        <v-row justify="center" align="center">
            <v-col cols="12" class="pa-2 pa-md-0" sm="12" md="10">
                <h2 id="feedback" class="h2 mt-5 mb-5">
                    Отзывы о нашей работе В 2GIS
                </h2>
                <div class="text--caption text-center mb-5">
                    В течении 2х месяцев после обработки мы поддерживаем связь,
                    и проверяем качество выполненных работ для того чтобы
                    убедиться что паразитов точно не осталось
                </div>
                <div
                    class="d-flex flex-column-reverse flex-md-row align-center justify-space-around"
                >
                    <Sales class="w-50-100"></Sales>
                    <FeedBack
                        class="feedback w-50-100 mb-4 mb-md-0"
                        @submit="showModal = true"
                    />
                </div>
            </v-col>
        </v-row>
        <v-row justify="center" align="center">
            <v-col class="mb-4 pa-md-0 pa-2" cols="12" sm="12" md="10">
                <h2 id="contacts" class="h2 mt-5 mb-5">
                    Опишите проблему, ответив на вопросы
                </h2>
                <div
                    class="d-flex flex-column flex-md-row align-center justify-space-around"
                >
                    <QuizSteps
                        @submit="submitQuiz"
                        class="w-70-100"
                    ></QuizSteps>
                    <Contacts class="ma-md-5 mt-6" @submit="showModal = true" />
                </div>
            </v-col>
        </v-row>
    </div>
</template>

<script>
    import Swal from "sweetalert2";
    import CallbackForm from "~/components/CallbackForm.vue";
    import Jur from "~/components/Jur.vue";
    import Fiz from "~/components/Fiz.vue";
    import QuizForm from "~/components/QuizForm.vue";
    import CertCarousel from "~/components/CertCarousel.vue";
    import Methods from "~/components/Methods.vue";
    import Contacts from "~/components/Contacts.vue";
    import QuizSteps from "~/components/QuizSteps.vue";
    import FeedBack from "~/components/FeedBack.vue";
    import Sales from "~/components/Sales.vue";
    export default {
        data() {
            return {
                tab: 0,
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
                showModal: false,
            };
        },
        components: {
            CallbackForm,
            CertCarousel,
            Jur,
            Fiz,
            QuizForm,
            QuizSteps,
            Methods,
            Contacts,
            FeedBack,
            Sales,
        },
        methods: {
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
        },
        name: "IndexPage",
    };
</script>
