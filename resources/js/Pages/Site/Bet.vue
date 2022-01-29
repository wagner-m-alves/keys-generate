<template>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <jet-validation-errors class="mb-4" />

            <!-- New Estimate Form -->
            <form @submit.prevent="submit" class="p-6">
                <div>
                    <select id="game" v-model="form.game" required>
                        <option value="">Selecione o Jogo</option>
                        <option v-for="(game, index) in games" :key="index" :value="game">{{game}}</option>
                    </select>
                </div>

                <div class="mt-4">
                    <jet-input id="bet" type="text" class="mt-1 block w-full" v-model="form.bet" required placeholder="Digite o número a ser apostado"/>
                </div>

                <div class="mt-4">
                    <jet-input id="value" type="text" class="mt-1 block w-full" v-model="form.value" required placeholder="Valor da Aposta"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Salvar
                    </jet-button>
                </div>
            </form>
            <!-- End New Estimate Form -->
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetDangerButton from '@/Jetstream/DangerButton.vue'

    export default defineComponent({
        components: {
            JetButton,
            JetInput,
            JetLabel,
            JetValidationErrors,
            JetDialogModal,
            JetDangerButton,
        },

        data() {
            return {
                games: ['Roleta'],

                form: this.$inertia.form({
                    game:   '',
                    bet:    '',
                    value:  '',
                }),
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('game.bet.register'));
            },
        },
    })
</script>

<style scoped>

</style>
