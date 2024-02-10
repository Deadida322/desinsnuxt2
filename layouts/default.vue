<template>
    <v-app class="overflow-x-hidden center examplex">
        <callback-form @submit="submitForm" v-model="showForm"></callback-form>
        <vs-navbar
            target-scroll="#padding-scroll-content"
            padding-scroll
            center-collapsed
            v-model="active"
        >
            <template #left>
                <b @click="$router.push('/')" class="text-h4 curp">
                    PARAZIT <span class="error--text">24</span>
                </b>
            </template>
            <vs-navbar-item
                to="/#services"
                :active="active == 'guide'"
                id="guide"
            >
                Услуги
            </vs-navbar-item>
            <vs-navbar-item
                to="/#feedback"
                :active="active == 'docs'"
                id="docs"
            >
                Отзывы
            </vs-navbar-item>
            <vs-navbar-item
                to="/#contacts"
                :active="active == 'components'"
                id="components"
            >
                Контакты
            </vs-navbar-item>
            <template #right>
                <a href="tel:89773851147"> +7 (977) 385 11 47 </a>
                <vs-button
                    class="d-none d-sm-block ml-2"
                    @click="showForm = true"
                    flat
                    >Заказать звонок</vs-button
                >
            </template>
        </vs-navbar>
        <v-main id="padding-scroll-content" class="mt-10">
            <v-container>
                <Nuxt />
            </v-container>
        </v-main>
        <Footer @submit="showForm = true"></Footer>
    </v-app>
</template>

<script>
    if (process.browser) {
        (function (m, e, t, r, i, k, a) {
            m[i] =
                m[i] ||
                function () {
                    (m[i].a = m[i].a || []).push(arguments);
                };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            (k = e.createElement(t)),
                (a = e.getElementsByTagName(t)[0]),
                (k.async = 1),
                (k.src = r),
                a.parentNode.insertBefore(k, a);
        })(
            window,
            document,
            "script",
            "https://mc.yandex.ru/metrika/tag.js",
            "ym"
        );
        ym(93316906, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true,
        });
    }

    import CallbackForm from "~/components/CallbackForm.vue";
    import Footer from "~/components/Footer.vue";
    import Swal from "sweetalert2";
    export default {
        name: "DefaultLayout",
        created() {
            if (process.browser) {
                (function (window, document, n, project_ids) {
                    window.GudokData = n;
                    if (typeof project_ids !== "object") {
                        project_ids = [project_ids];
                    }
                    window[n] = {};
                    window[n]["projects"] = project_ids;
                    config_load(project_ids.join(","));
                    function config_load(cId) {
                        var a = document.getElementsByTagName("script")[0],
                            s = document.createElement("script"),
                            i = function () {
                                a.parentNode.insertBefore(s, a);
                            },
                            cMrs = "";
                        s.async = true;
                        if (
                            document.location.search &&
                            document.location.search.indexOf(
                                "?gudok_check="
                            ) === 0
                        )
                            cMrs += document.location.search.replace("?", "&");
                        s.src = "//mod.gudok.tel/script.js?sid=" + cId + cMrs;
                        if (window.opera == "[object Opera]") {
                            document.addEventListener(
                                "DOMContentLoaded",
                                i,
                                false
                            );
                        } else {
                            i();
                        }
                    }
                })(window, document, "gd", "yndblhq50g");
            }
        },
        components: {
            CallbackForm,
            Footer,
        },
        data() {
            return {
                showForm: false,
                active: "guide",
                fixed: false,
                items: [
                    {
                        icon: "mdi-apps",
                        title: "Welcome",
                        to: "/",
                    },
                    {
                        icon: "mdi-chart-bubble",
                        title: "Inspire",
                        to: "/inspire",
                    },
                ],
                miniVariant: false,
                right: true,
                rightDrawer: false,
                title: "Vuetify.js",
            };
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
        },
    };
</script>

<style lang="scss">
    body {
        overflow-x: hidden !important;
    }

    body > footer {
        display: none;
    }

    .col-12 {
        padding: 0 !important;
    }

    .container {
        max-width: 100%;
    }

    .theme--light.v-application {
        background-color: #f0f0f0 !important;
    }

    .v-card__title {
        word-break: keep-all !important;
    }
</style>
