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
                    title: "Квартира",
                    price: "33 ₽/м²",
                    img: require("~/assets/fiz/fiz1.webp"),
                },
                {
                    title: "Дом",
                    price: "от 1700 ₽",
                    img: require("~/assets/fiz/fiz2.webp"),
                },
                {
                    title: "Участок",
                    price: "от 450 р/сотка",
                    img: require("~/assets/fiz/fiz3.webp"),
                },
                {
                    title: "Гараж",
                    price: "от 700₽",
                    img: require("~/assets/fiz/fiz4.webp"),
                },
                {
                    title: "Места общего пользования",
                    price: "33 ₽/м²",
                    img: require("~/assets/fiz/fiz5.webp"),
                },
                {
                    title: "Другое",
                    price: "33 ₽/м²",
                    img: require("~/assets/fiz/fiz6.webp"),
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