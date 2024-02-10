<template>
    <v-stepper vertical v-model="el">
        <div v-for="(step, index) in steps">
            <v-stepper-step class="py-3 pb-0" :complete="el > index + 1" :step="index + 1">
                {{ step.title }}
            </v-stepper-step>

            <v-stepper-content :step="index + 1">
                <v-card color="transparent" elevation="0" max-height="300px" class="overflow-auto mt-1 mb-3 mx-1 pa-0 px-2">
                    <v-radio-group v-if="!step.type" v-model="answers[index]">
                        <v-radio class="my-2" v-for="v in step.variants" :key="v" :label="v" :value="v"></v-radio>
                    </v-radio-group>
                    <v-text-field class="mt-2" v-model="answers[index]" v-else-if="step.type == 'number'" type="number"
                        :label="step.hint" :hint="step.hint" outlined dense></v-text-field>
                    <template v-else-if="step.type == 'input'">
                        <div v-for="hint in step.hints">
                            <v-text-field v-if="hint == 'Телефон'" v-mask="'+7 (9##) ###-##-##'" class="mt-2"
                                v-model="contacts[hint]" :label="hint" :hint="hint" outlined dense></v-text-field>
                            <v-text-field v-else class="mt-2" v-model="contacts[hint]" :label="hint" :hint="hint" outlined
                                dense></v-text-field>
                        </div>
                    </template>
                </v-card>

                <v-btn v-if="el != steps.length" :disabled="!answers[index]" color="primary" @click="el++">
                    Далее
                </v-btn>
                <v-btn @click="sendData" v-else :disabled="!contacts['Телефон']" color="primary">
                    Отправить
                </v-btn>

            </v-stepper-content>
        </div>

    </v-stepper>
</template>

<script>
import { mask } from 'vue-the-mask'
export default {
    directives: { mask },
    data: () => ({
        el: 1,
        contacts: {},
        steps: [
            {
                title: "От кого избавляемся?",
                variants: [
                    "Клопы",
                    "Клещи",
                    "Тараканы",
                    "Мухи/Мошки",
                    "Осы/Шершни",
                    "Моль",
                    "Блохи",
                    "Вши",
                    "Мыши/Крысы",
                    "Кроты",
                    "Короед/Древоточец/Усач",
                    "Бактерии/Вирусы",
                    "Неприятные запахи",
                    "Плесень/грибок",
                    "Другое"
                ]
            },
            {
                title: "Что обрабатываем?",
                variants: [
                    "Квартиру",
                    "Дом",
                    "Магазин",
                    "Столовая/кафе",
                    "Больница",
                    "Школа/Садик",
                    "Склад",
                    "Гостиница",
                    "Другое"
                ]
            },
            {
                title: "Когда планируете обработку?",
                variants: [
                    "Сегодня",
                    "Завтра",
                    "На выходных",
                    "Через 1 неделю",
                    "Обслуживание по договору для(юр. лиц)",
                    "Ещё думаю (нужно больше информации)"
                ]
            },
            {
                title: "Примерная площадь для обработки?",
                type: "number",
                hint: "м2",
                variants: [
                ]
            },
            {
                title: "Выберите нужный вам бесплатный бонус к расчёту стоимости обработки",
                variants: [
                    "Дезинфекция от вирусов и бактерий (в подарок)",
                    `Барьерная защита (исключает повторное появление вредителей)`,
                    "Особые условия для льготных групп населения",
                    `Акция Соседи" За привлечение соседей к проведению обработки - ваша скидка 20%`
                ]
            },
            {
                title: "Укажите ваши контактные данные",
                type: "input",
                variants: [
                ],
                hints: ["Имя", "Телефон"],
            }
        ],
        answers: [],
    }),
    methods: {
        sendData() {
            const data = {}
            data.text = "Ответы: %0A"
            for (let i in this.answers) {
                data.text += `${this.steps[i].title} %0A - ${this.answers[i]} %0A %0A`
            }
            console.log(this.answers)
            data.name = this.contacts['Имя']
            data.phone = this.contacts['Телефон']
            this.$emit("submit", data)
        }
    }
}
</script>