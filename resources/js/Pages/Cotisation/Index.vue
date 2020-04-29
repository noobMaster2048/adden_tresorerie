<template>
    <div class="container mx-auto">
        <vs-card>
            <h1 class="text-indigo-400">Liste des cotisations</h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <vs-table :data="cotisations" search pagination max-items="15" noDataText="Aucune donnée">
                        <template slot="header">
                            <div>
                                <vs-button icon="add" color="#7886d7" size="small" @click="$inertia.replace(route('cotisation.create'))">Nouvelle cotisation</vs-button>
                            </div>
                        </template>
                        <template slot="thead">
                            <vs-th>Date cotisation</vs-th>
                            <vs-th>libellé</vs-th>
                            <vs-th>périodicité</vs-th>
                            <vs-th>Montant</vs-th>
                            <vs-th>statut</vs-th>
                            <vs-th></vs-th>
                        </template>
                        <template slot-scope="{data}">
                            <vs-tr v-for="item in data" :data="item" :key="item.id">
                                <vs-td :data="item.date_cotisation">{{moment(item.date_cotisation).format('DD/MM/YYYY')}}</vs-td>
                                <vs-td :data="item.libelle">{{item.libelle}}</vs-td>
                                <vs-td :data="item.periode">{{item.periode}}</vs-td>
                                <vs-td :data="item.montant">{{item.montant |  number('0,0', { thousandsSeparator: ' ' }) }}</vs-td>
                                <vs-td :data="item.statut">{{item.statut}}</vs-td>
                                <vs-td>
                                    <div class="flex">
                                        <vs-button size="small" icon="create" color="#7886d7" class="mx-2" @click="$inertia.replace(route('cotisation.edit', item.id))">Modifier</vs-button>
                                        <vs-button size="small" icon="delete" color="danger" class="mx-2" @click="openDialog(item.id)">Supprimer</vs-button>
                                    </div>
                                </vs-td>
                            </vs-tr>
                        </template>
                    </vs-table>
                </vs-card>
            </div>
        </div>
    </div>
</template>

<script>
    import Layout from '@/Shared/Layout';
    import * as moment from  'moment';

    export default {
       layout: Layout,
        metaInfo: {title: 'Liste des cotisations'},
        props: {
           cotisations: Array,
            flash: Object,
        },
        data() {
           return {
               item: null,
               activePrompt: false,
               moment,
           }
        },
        methods: {
            supprimer() {
                this.$inertia.delete(this.route('cotisation.supp', this.item))
            },
            openDialog(val) {
                this.item = val;
                this.activePrompt = true;
            },
        },
        mounted() {
            if (this.flash.success) {
                this.$vs.notify({title:'Message de succès', text: this.flash.success, color: '#17c964', time: 5000, position: 'top-right', icon: 'mail'})
            }

            if(this.flash.error)  {
                this.$vs.notify({title:'Message de succès', text: this.flash.error, color: '#f2135d', time: 5000, position: 'top-right', icon: 'mail'})
            }

        }
    }
</script>

<style scoped>

</style>
