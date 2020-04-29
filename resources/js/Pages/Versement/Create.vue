<template>
    <div class="container mx-auto">
        <vs-card>
            <h1 class="font-bold">
                <inertia-link :href="route('versements')" class="text-indigo-400 hover:text-indigo-600">
                    Versements
                </inertia-link>
                <span class="font-medium text-indigo-400">/</span>
                <span>création</span>
            </h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <div slot="header">
                        <h1>Formulaire versement</h1>
                    </div>
                    <div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Date versement</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.date_versement" class="w-full sm:w-3/5" type="date" />
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Membre</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-select v-model="form.membre" class="w-full sm:w-3/5" autocomplete>
                                    <vs-select-item v-for="item in membres" :key="item.id" :text="item.nom" :value="item.id" />
                                </vs-select>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Cotisation</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-select v-model="form.cotisation" class="w-full sm:w-3/5" autocomplete :danger="checkCotisation" danger-text="La cotisation est requis">
                                    <vs-select-item v-for="item in cotisations" :key="item.id" :text="item.libelle" :value="item.id" />
                                </vs-select>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">montant</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.montant" class="w-full sm:w-3/5" :danger="checkMontant" danger-text="Le montant est obligatoire" />
                            </div>
                        </div>
                    </div>
                    <div slot="footer">
                        <div class="flex items-center justify-end">
                            <vs-button class="mx-2" :disabled="sending" color="#7886d7" icon="save" @click="save">Enregistrer</vs-button>
                            <vs-button class="mx-2" color="danger" icon="save" @click="$inertia.replace(route('versements'))">Annuler</vs-button>
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
       layout: Layout,
        metaInfo: {title: 'Formulaire versement'},
        props: {
           membres: Array,
            cotisations: Array,
        },
        data() {
           return {
               sending: false,
               form: {
                   date_versement: null,
                   membre: null,
                   montant: null,
                   cotisation: null,
               }
           }
        },
        methods: {
           save() {
               this.sending = true;
               this.$inertia.post(this.route('versement.store'), this.form).then(() => {this.sending = false});
           }
        },
        computed: {
           checkMontant() {
               return this.$page.errors.montant ? true : false;
           },
            checkCotisation() {
               return this.$page.errors.cotisation ? true : false;
            }
        }
    }
</script>

<style scoped>

</style>
