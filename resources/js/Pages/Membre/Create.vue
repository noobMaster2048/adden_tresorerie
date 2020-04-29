<template>
    <div class="container mx-auto">
        <vs-card class="mb-8">
            <h1 class="font-bold">
                <inertia-link :href="route('membres')" class="text-indigo-400 hover:text-indigo-600">
                    Membres
                </inertia-link>
                <span class="font-medium text-indigo-400">/</span>
                <span>création</span>
            </h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card >
                    <div slot="header">
                        <h1>Formulaire membre</h1>
                    </div>
                    <div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">nom</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.nom"></vs-input>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">prénom</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.prenom"></vs-input>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">type membre</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-select class="w-full sm:w-3/5" v-model="form.type_membre" autocomplete>
                                    <vs-select-item v-for="item in type_membres" :key="item.cle" :text="item.valeur" :value="item.cle" />
                                </vs-select>
                            </div>
                        </div>
                        <div class="vx-row pb-6" v-if="form.type_membre == 'phys'">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">civilité</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-select class="w-full sm:w-3/5" v-model="form.civilite" autocomplete>
                                    <vs-select-item v-for="item in civilites" :key="item.cle" :text="item.valeur" :value="item.cle" />
                                </vs-select>
                            </div>
                        </div>
                        <div class="vx-row pb-6" v-if="form.type_membre == 'phys'">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">date naissance</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.date_naissance" type="date"></vs-input>
                            </div>
                        </div>
                        <div class="vx-row pb-6" v-if="form.type_membre == 'phys'">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">n° pièce d'identité</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.cni"></vs-input>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base font-medium capitalize">téléphone</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.telephone"></vs-input>
                            </div>
                        </div>
                    </div>
                    <div slot="footer">
                        <div class="flex items-center justify-end">
                            <vs-button class="mx-2" :disabled="sending" color="#7886d7" icon="save" @click="save">Enregistrer</vs-button>
                            <vs-button class="mx-2" color="danger" icon="save" @click="$inertia.replace(route('membres'))">Annuler</vs-button>
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
        metaInfo: {title: 'Formulaire membre'},
        layout: Layout,
        props: {
            type_membres: Array,
            civilites: Array,
        },
        data() {
            return {
                sending: false,
                form: {
                    nom: null,
                    prenom: null,
                    date_naissance: null,
                    cni: null,
                    telephone: null,
                    civilite: null,
                    sexe: null,
                    type_membre: null,
                }
            }
        },
        methods: {
            save() {
                this.sending = true;
                this.$inertia.post(this.route('membre.store'), this.form).then(() => {
                    this.sending = false
                });
            }
        }
    }
</script>

<style scoped>

</style>
