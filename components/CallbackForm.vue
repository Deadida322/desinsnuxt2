<template>
    <vs-dialog v-model="computedValue">
        <template #header>
            <h4 class="not-margin">
                Заказать обратный звонок
            </h4>
        </template>
        <div class="con-form">
            <vs-input @input="$v.form.phone.$dirty ? $v.form.phone.$touch() : ''" @blur="$v.form.phone.$touch()"
                v-mask="'+7 (9##) ###-##-##'" label="Номер телефона" class="w-100 mt-6 mb-2" v-model="form.phone"
                placeholder="Как с вами связаться">
                <template #icon>
                    <v-icon>
                        mdi-phone
                    </v-icon>
                </template>
                <template #message-danger>
                    {{ error }}
                </template>
            </vs-input>
            <vs-input label="Ваше имя" class="mt-6 w-100" v-model="form.name" placeholder="Как к вам обращаться">
                <template #icon>
                    <v-icon>
                        mdi-account-outline
                    </v-icon>
                </template>
            </vs-input>
        </div>
        <template #footer>
            <div class="footer-dialog">
                <vs-button @click="submit" gradient color="success" block>
                    Отправить
                </vs-button>
            </div>
        </template>
    </vs-dialog>
</template>

<script>
import { mask } from 'vue-the-mask'
import { validationMixin } from 'vuelidate'
import { required, minLength, email } from 'vuelidate/lib/validators'
import swal from "sweetalert2"
export default {
    data() {
        return {
            form: {}
        }
    },
    validations: {
        form: {
            phone: { required, minLength: minLength(18) }
        }
    },
    directives: { mask },
    mixins: [validationMixin],
    props: {
        value: false
    },
    computed: {
        computedValue: {
            set(val) {
                this.$emit('input', val)
            },
            get() {
                return this.value
            }
        },
        error() {
            const errors = []
            if (!this.$v.form.phone.$dirty) return ''
            !this.$v.form.phone.minLength && errors.push('Введите целиком')
            !this.$v.form.phone.required && errors.push('Укажите номер телефона')
            return errors[0]
        }
    },
    methods: {
        submit() {
            this.$v.form.$touch()
            if (!this.$v.form.$anyError) {
                this.$emit("submit", this.form)
                this.computedValue = false
                this.form = {}
            }
        }
    }
}
</script>

<style lang="scss">
.w-100 {
    input {
        width: 100% !important;

    }
}

.swal2-container {
    font-family: sans-serif;
}
</style>