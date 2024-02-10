<template>
    <v-card elevation="2">
        <v-card-title class="w-100 text-center">*Сертификаты соответствия</v-card-title>
        <v-card-text>
            <v-slide-group v-model="index" class="pa-4" show-arrows>
                <v-slide-item v-for="item in certs" :key="item">
                    <v-sheet class="ma-4" elevation="4">
                        <img class="w-300-150" contain :src="item" />
                    </v-sheet>
                </v-slide-item>
            </v-slide-group>
        </v-card-text>

    </v-card>
</template>

<script>
export default {
    data() {
        return {
            index: 0,
            certs: [
                require("~/assets/certs/1.jpg"),
                require("~/assets/certs/2.jpg"),
                require("~/assets/certs/3.jpg"),
                require("~/assets/certs/4.jpg"),
                require("~/assets/certs/5.jpg"),
                require("~/assets/certs/6.jpg"),
                require("~/assets/certs/7.jpg"),

            ]
        }
    }
}
</script>

<style lang="scss" scoped>
.w-100 {
    width: 100%;
    display: flex;
    justify-content: center;
}

.w-300-150 {
    width: 300px;

    @media screen and (max-width: 600px) {
        width: 150px;
    }
}
</style>