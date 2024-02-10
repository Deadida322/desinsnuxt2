<template>
    <div>
        <v-card-title v-if="block.title">
            {{ block.title }}
        </v-card-title>
        <div>
            {{ block.text }}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            block: {
                type: Object,
                required: true,
            },
        },
    };
</script>
