<template>
    <div class="container mx-auto">
        <vs-card>
            <h1 class="font-bold">
                <inertia-link :href="route('cotisations')" class="text-indigo-400 hover:text-indigo-600">
                    Cotisations
                </inertia-link>
                <span class="font-medium text-indigo-400">/</span>
                <span>création</span>
            </h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <div slot="header">
                        <h1>Formulaire cotisation</h1>
                    </div>
                    <div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Date cotisation</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.date_cotisation" class="w-full sm:w-3/5" type="date" :danger="checkDate" danger-text="La date est obligatoire" />
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">libellé</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input v-model="form.libelle" class="w-full sm:w-3/5" :danger="checkLibelle" danger-text="Le libellé est obligatoire" />
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Type cotisation</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-select v-model="form.type_cotisation" class="w-full sm:w-3/5">
                                    <vs-select-item v-for="item in type_cotisations" :key="item.cle" :text="item.valeur" :value="item.cle" ></vs-select-item>
                                </vs-select>
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">Periodicité</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-select v-model="form.periode" class="w-full sm:w-3/5" autocomplete :danger="checkPeriode" danger-text="La périodicité est obligatoire">
                                    <vs-select-item v-for="item in periodes" :key="item.cle" :text="item.valeur" :value="item.cle" />
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
                            <vs-button class="mx-2" color="danger" icon="save" @click="$inertia.replace(route('cotisations'))">Annuler</vs-button>
                        </div>
                    </div>
                </vs-card>
            </div>
        </div>
    </div>
</template>

<script>
    import Layout from '@/Shared/Layout';
    import * as moment from 'moment';

    export default {
       layout: Layout,
        metaInfo: {title: 'Formulaire cotisation'},
        props: {
           periodes: Array,
            type_cotisations: Array,
        },
        data() {
           return {
               sending: false,
               form: {
                   date_cotisation: moment().format().slice(0,10),
                   libelle: null,
                   montant: null,
                   type_cotisation: null,
                   periode: null,
               }
           }
        },
        methods: {
           save() {
               this.sending = true;
               this.$inertia.post(this.route('cotisation.store'), this.form).then(() => {this.sending = false});
           }
        },
        computed: {
           checkLibelle() {
               return  this.$page.errors.libelle ? true : false;
           },
            checkMontant() {
                return  this.$page.errors.montant ? true : false;
            },
            checkPeriode() {
                return  this.$page.errors.periode ? true : false;
            },
            checkDate() {
                return  this.$page.errors.date_cotisation ? true : false;
            }
        }
    }
</script>

<style scoped>

</style>
