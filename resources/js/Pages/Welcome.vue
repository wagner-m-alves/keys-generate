<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 underline">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 underline">
                    Register
                </Link>
            </template>
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-6xl text-green-700">CASSINO</h1>
            <jet-button @click="bet" type="button" class="my-4">Apostar</jet-button>
            <jet-button @click="payment" type="button" class="my-4 ml-4">Testar Retorno do Sistema de Pagamento</jet-button>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import JetButton from '@/Jetstream/Button.vue'

    export default defineComponent({
        components: {
            Head,
            Link,
            JetButton,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        },

        methods: {
            bet () {
                this.$inertia.get(this.route('site.bet'))
            },

            payment () {
                this.$inertia.get(this.route('payment.reply'))
            },
        },
    })
</script>
