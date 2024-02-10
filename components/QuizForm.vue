<template>
    <v-card shaped>
        <v-card-text>
            <div class="quiz-text-block">
                При обращении с сайта действует
                <div class="quiz-sale success--text">скидка -10%</div>
                на любой вид дезинсекции
            </div>
            <vs-input @input="$v.form.phone.$dirty ? $v.form.phone.$touch() : ''" @blur="$v.form.phone.$touch()"
                v-mask="'+7 (9##) ###-##-##'" label="Номер телефона" class="w-100 ml-2 mt-6 mb-2" v-model="form.phone"
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
            <vs-button size="large" class="mr-2" @click="submit" gradient color="success" block>
                Отправить
            </vs-button>
            <div class="text-captio  grey--text text-center mt-3">
                Нажимая "Отправить" вы соглашаетесь с политикой конфиденциальности
            </div>
        </v-card-text>
    </v-card>
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
                swal.fire("Отлично", 'С вами обязательно свяжутся', 'success')
                this.computedValue = false
                this.form = {}
            }
        }
    }
}
</script>

<style lang="scss">
.quiz-text-block {
    font-size: 30px;
    line-height: 60px;
    text-align: center;

    .quiz-sale {
        text-align: center;
        font-weight: 700;

        text-transform: uppercase;
        font-size: 60px;
    }
}

.w-100 {
    input {
        width: 100% !important;

    }
}

.swal2-container {
    font-family: sans-serif;
}
</style>