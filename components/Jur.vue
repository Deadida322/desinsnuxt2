<template>
    <div class="d-flex justify-center align-center flex-wrap">
        <vs-card class="card ma-2" v-for="item in items" :key="item.title">
            <template #title>
                <h3>{{ item.title }}</h3>
            </template>
            <template #img>
                <img height="300px" :src="item.img" alt="">
            </template>
            <template #text>
                <p>
                    {{ item.desciption }}
                </p>
            </template>
            <template #interactions>
                <vs-button success icon>
                    <v-icon @click="$emit('callback')">mdi-phone</v-icon>
                </vs-button>
                <vs-button class="btn-chat" success shadow gradient>
                    <span class="span text--h4">
                        {{ item.price }}
                    </span>
                </vs-button>
            </template>
        </vs-card>
    </div>
</template>

<script>
export default {

    data() {
        return {
            items: [
                {
                    title: "Производственное помещение",
                    price: "3500 ₽/100м²",
                    img: require("~/assets/jur/jur1.webp"),
                },
                {
                    title: "Кафе/ресторан",
                    price: "3500 ₽/100м²",
                    img: require("~/assets/jur/jur2.webp"),
                },
                {
                    title: "Общежитие",
                    price: "33 ₽/м²",
                    img: require("~/assets/jur/jur3.webp"),
                },
                {
                    title: "Магазин",
                    price: "3500 ₽/100м²",
                    img: require("~/assets/jur/jur4.webp"),
                },
                {
                    title: "Бытовка",
                    price: "от 600₽",
                    img: require("~/assets/jur/jur5.webp"),
                },
                {
                    title: "Склад",
                    price: "3500 ₽/100м²",
                    img: require("~/assets/jur/jur6.webp"),
                },
                {
                    title: "Отель",
                    price: " 33 ₽/100м²",
                    img: require("~/assets/jur/jur7.webp"),
                }
            ]
        }
    }
}
</script>

<style lang="scss">
.card {
    width: 31% !important;

    @media screen and (max-width: 800px) {
        width: 45% !important;
    }

    @media screen and (max-width: 600px) {
        width: 100% !important;
    }

}

.vs-card__img img {
    height: auto !important;
}

.vs-card {
    max-width: 1000px !important;
}
</style>