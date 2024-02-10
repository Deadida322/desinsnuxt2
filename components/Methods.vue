<template>
    <div class="d-flex flex-wrap justify-space-between">
        <vs-card class="w-50-100 mb-4" v-for="item in methods" type="4">
            <template #title>
                <h3>{{ item.title }}</h3>
            </template>
            <template #img>
                <img :src="item.img" alt="">
            </template>
            <template #text>
                <p>
                    {{ item.description }}
                </p>
            </template>

        </vs-card>
    </div>
</template>

<script>
export default {
    data: () => ({
        methods: [
            {
                title: "Помповая обработка",
                img: require("~/assets/methods/method1.webp"),
                description: "Распыление происходит под давлением, которое создается благодаря помповому механизму"
            },
            {
                title: "Холодный туман",
                img: require("~/assets/methods/method2.webp"),
                description: "Мельчайшие капли пара с инсектицидом намного мельче, чем производимые опрыскивателем. Смесь капелек с воздухом равномерно распространяется, проникая в различные труднодоступные места"
            },
            {
                title: "Горячий туман",
                img: require("~/assets/methods/method3.webp"),
                description: "Распыление в помещении нагретого ядохимиката. Вредители подвергаются двойному воздействию: высокой температурой и инсектицидом. Данный вариант является наиболее эффективным"
            },
            {
                title: "Фумигация",
                img: require("~/assets/methods/method4.webp"),
                description: "Уничтожение вредителей и возбудителей болезней растений путём отравления их ядовитыми парами или газами"
            }
        ]
    })
}
</script>

<style lang="scss">
.vs-card-content.type-4 .vs-card__img {
    max-height: 400px !important;
}

.vs-card__text {
    min-width: 100%;

    p {
        font-size: 12px;
    }
}
</style>