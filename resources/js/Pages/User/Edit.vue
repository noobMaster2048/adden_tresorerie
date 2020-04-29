<template>
    <div class="container mx-auto">
        <vs-card>
            <h1 class="font-bold">
                <inertia-link :href="route('users')" class="text-indigo-400 hover:text-indigo-600">
                    utilisateurs
                </inertia-link>
                <span class="font-medium text-indigo-400">/</span>
                <span>création</span>
                <span class="font-medium text-indigo-400">/</span>
                <span>{{form.login}}</span>
            </h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <div slot="header">
                        <h1>Formulaire utilisateur</h1>
                    </div>
                    <div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">login</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.login" class="w-full sm:w-3/5" :danger="checkLogin" danger-text="Le login est obligatoire"/>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Mot de passe</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.password" class="w-full sm:w-3/5"/>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Nom</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.nom" class="w-full sm:w-3/5" :danger="checkNom" danger-text="Le nom est obligatoire"/>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Email</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.email" class="w-full sm:w-3/5" :danger="checkEmail" :danger-text="errorEmail"/>
                            </div>
                        </div>
                    </div>
                    <div slot="footer">
                        <div class="flex items-center justify-end">
                            <vs-button class="mx-2" :disabled="sending" color="#7886d7" icon="save" @click="save">Enregistrer</vs-button>
                            <vs-button class="mx-2" color="danger" icon="save" @click="$inertia.replace(route('users'))">Annuler</vs-button>
                        </div>
                    </div>
                </vs-card>
            </div>
        </div>
    </div>
</template>

<script>
    import Layout from '@/Shared/Layout';

    export default {
       metaInfo: {title: 'Formulaire utilisateur'},
        layout: Layout,
        props: {
           user: Object,
        },
        data() {
           return {
               sending: null,
               form: {
                   login: this.user.login,
                   nom: this.user.nom,
                   email: this.user.email,
                   password: this.user.password,
               },
           }
        },
        methods: {
           save() {
               this.sending = true;
                this.$inertia.put(this.route('user.update', this.user.id), this.form).then(() => {this.sending = false});
           }
        },
        computed: {
            checkLogin() {
                return this.$page.errors.login ? true : false;
            },
            checkNom() {
                return this.$page.errors.nom ? true : false;
            },
            checkEmail() {
                return this.$page.errors.email ? true : false;
            },
            errorEmail() {
                if (this.$page.errors.email) {
                    return this.$page.errors.email[0];
                }
            }
        }
    }
</script>

<style scoped>

</style>
