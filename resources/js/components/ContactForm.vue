<template>
    <section class="pages container">
		<div class="page page-contact">
			<h1 class="text-capitalize">Formulario de contacto</h1>
			<div class="divider-2" style="margin:25px 0;"></div>
			<div class="form-contact">
                <transition name="fade" mode="out-in">
                    <p v-if="sent">Tu mensaje ha sido recibido con exito!</p>
                    <form v-else @submit.prevent="submit()">
                        <div class="input-container container-flex space-between">
                            <input class="input-name" v-model="form.name" placeholder="Nombre">
                            <input class="input-email" v-model="form.email"  placeholder="Email">
                        </div>
                        <div class="input-container">
                            <input class="input-subject" v-model="form.subject"  placeholder="Asunto">
                        </div>
                        <div class="input-container">
                            <textarea cols="30" rows="10" v-model="form.message" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="send-message">
                            <button class="text-uppercase c-green" :disabled="loading">
                                <span v-if="loading">Enviando...</span>
                                <span v-else>Enviar Mensaje</span>
                            </button>
                        </div>
                    </form>
                </transition>
			</div>
		</div>
	</section>
</template>
<script>
export default {
    data(){
        return {
            sent: false,
            loading: false,
            form: {
                name: '',
                email: '',
                subject: '',
                message: ''
            }
        }
    },
    methods: {
        submit() {
            this.loading = true
            axios.post('/api/mensajes', this.form)
                .then(res => {
                    this.sent = true
                    this.loading = false
                })
                .catch(errors => {
                    this.sent = false;
                    this.loading = false;
                })
        }
    },
}
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>
