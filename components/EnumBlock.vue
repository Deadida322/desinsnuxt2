<template>
    <div>
        <v-card-title>
            {{ block.title }}
        </v-card-title>
        <div>
            <ul>
                <li class="mb-2" v-for="item in block.enums">{{ item }}</li>
            </ul>
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
