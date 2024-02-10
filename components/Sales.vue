<template>
    <v-card shaped elevation="0" class="card" color="transparent">
        <vs-button class="date" size="large" gradient color="">
            Только {{ (new Date()).toISOString().split('T')[0].split('-').reverse().join('.') }}!
        </vs-button>
        <v-img class="pa-2" min-width="300px" contain height="350" :src="require('~/assets/sale_img.png')" />

        <v-card-title class=" text-center success--text text-h5 bold mb-4">Сегодня барьерная защита в
            подарок!</v-card-title>
        <v-card-subtitle class="text-center">*Барьерная защита восприпятствует попаданию насекомых в помещение из
            вне</v-card-subtitle>
    </v-card>
</template>

<script>
export default {
    created() {

    },
    data: () => ({
        date: ""
    })
}

</script>

<style scoped>
.card {
    position: relative;
}

.date {
    position: absolute !important;
    top: 10px;
    right: 0px;
}
</style>