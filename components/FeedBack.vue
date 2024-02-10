<template>
    <v-card elevation="2">
        <v-card-text>
            <v-carousel v-model="index" class="pa-0 pa-sm-4" show-arrows hide-delimiters>
                <v-carousel-item class="m-auto" v-for="item in comments" :key="item">
                    <div class="d-flex justify-center align-center">
                        <img height="fit-content" width="100%" :src="item" />
                    </div>
                </v-carousel-item>
            </v-carousel>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    data() {
        return {
            index: 0,
            comments: [
                require("~/assets/feedback/1.png"),
                require("~/assets/feedback/2.png"),
                require("~/assets/feedback/3.png"),
                require("~/assets/feedback/4.png"),
                require("~/assets/feedback/5.png"),
                require("~/assets/feedback/6.png"),
                require("~/assets/feedback/8.png"),
                require("~/assets/feedback/9.png"),
                require("~/assets/feedback/10.png"),
                require("~/assets/feedback/11.png"),
                require("~/assets/feedback/12.png"),
                require("~/assets/feedback/13.png"),
                require("~/assets/feedback/14.png"),
                require("~/assets/feedback/15.png"),
                require("~/assets/feedback/16.png"),
                require("~/assets/feedback/18.png"),
                require("~/assets/feedback/19.jpg"),
                require("~/assets/feedback/20.jpg"),
                require("~/assets/feedback/21.jpg"),
                require("~/assets/feedback/22.jpg"),
                require("~/assets/feedback/23.jpg"),
                require("~/assets/feedback/24.jpg"),
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

.w-250-150 {
    width: 250px;

    @media screen and (max-width: 600px) {
        width: 150px;
    }
}
</style>