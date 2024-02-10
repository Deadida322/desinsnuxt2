<template>
    <footer
        class="footer d-flex align-center align-sm-start justify-space-between w-100"
    >
        <div class="footer-logo">
            <img :src="require('~/assets/footer-logo.png')" alt="" />
            <div class="ogrn_info">
                Юридический адрес 140051, РОССИЯ, МОСКОВСКАЯ ОБЛ, Г ЛЮБЕРЦЫ, ДП
                КРАСКОВО, УЛ ЛОРХА, Д 15/1, КВ 249<br /><br />
                ИНН 772095597750<br /><br />
                ОГРН 323508100325952<br />
            </div>
        </div>
        <div class="d-flex flex-wrap w-80 align-start justify-space-between">
            <div v-for="block in list" class="w-25 d-flex flex-column">
                <h2 class="mb-2">{{ block.title }}</h2>
                <div v-for="item in block.items" class="text-subtitle-2 my-1">
                    <span v-if="!item.to">
                        {{ item }}
                    </span>
                    <nuxt-link
                        v-else
                        class="nuxt-link"
                        :to="'/articles/' + item.to"
                        >{{ item.label }}</nuxt-link
                    >
                </div>
            </div>
        </div>
        <vs-button
            class="d-block h-20 d-sm-none"
            @click="$emit('submit')"
            gradient
            size="small"
            block
        >
            Заказать звонок
        </vs-button>
    </footer>
</template>

<script>
    export default {
        data: () => ({
            list: [
                {
                    title: "Услуги",
                    items: [
                        "Дезинфекция",
                        "Дезинсекция",
                        "Дератизация",
                        "Санобработака авто",
                        "Обработка дачных участков",
                        "Услуги для бизнеса",
                    ],
                },
                {
                    title: "Уничтожаем все виды насекомых",
                    items: [
                        {
                            label: "Клопы",
                            to: "bedbugs",
                        },
                        {
                            label: "Тараканы",
                            to: "cockroaches",
                        },
                        {
                            label: "Муравьи",
                            to: "ants",
                        },
                        {
                            label: "Клещи",
                            to: "ticks",
                        },
                        {
                            label: "Комары",
                            to: "mosquitoes",
                        },
                        {
                            label: "Осы",
                            to: "wasps",
                        },
                    ],
                },
                {
                    title: "Уничтожаем все виды грызунов",
                    items: [
                        {
                            label: "Крысы",
                            to: "rats",
                        },
                        {
                            label: "Мыши",
                            to: "mouses",
                        },
                        {
                            label: "Кроты",
                            to: "moles",
                        },
                    ],
                },
                {
                    title: "Дезинфекция",
                    items: [
                        {
                            label: "Неприятный запах",
                            to: "smells",
                        },
                        {
                            label: "Плесень",
                            to: "fungus",
                        },
                        {
                            label: "Грибок",
                            to: "fungus",
                        },
                    ],
                },
            ],
        }),
    };
</script>

<style lang="scss" scoped>
    .ogrn_info {
        font-size: 12px;
        margin-left: 12px;
    }

    .h-20 {
        max-height: 30px;
        margin-right: 20px;
        width: 400px;
    }

    .w-100 {
        width: 100vw;
    }

    .w-25 {
        width: 19%;

        @media screen and (max-width: 960px) {
            width: 49%;
        }

        @media screen and (max-width: 600px) {
            display: none !important;
        }
    }

    .footer-logo {
        width: 18%;

        img {
            width: 100%;
            min-width: 100px;
            height: fit-content;

            @media screen and (max-width: 600px) {
                max-width: 100px !important;
                max-height: 100px !important;
            }
        }
    }

    .w-80 {
        width: 79%;
    }

    .footer {
        background-color: rgb(231, 231, 231);
        padding-top: 30px;
        padding-bottom: 30px;

        @media screen and (max-width: 600px) {
            padding-top: 10px;
            padding-bottom: 10px;
        }
    }

    .nuxt-link {
        color: black;
        text-decoration: none;

        &:hover {
            text-decoration: underline;
            color: green;
        }
    }
</style>
