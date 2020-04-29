<template>
    <div class="container mx-auto">
        <vs-card>
            <h1 class="text-indigo-400">Liste des versements</h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <vs-table :data="versements" search pagination max-items="15" noDataText="Aucune donnée">
                        <template slot="header">
                            <div>
                                <vs-button icon="add" color="#7886d7" size="small" @click="$inertia.replace(route('versement.create'))">Nouveau versement</vs-button>
                            </div>
                        </template>
                        <template slot="thead">
                            <vs-th>Date versement</vs-th>
                            <vs-th>Membre</vs-th>
                            <vs-th>Montant</vs-th>
                            <vs-th></vs-th>
                        </template>
                        <template slot-scope="{data}">
                            <vs-tr v-for="item in data" :data="item" :key="item.id">
                                <vs-td :data="item.date_versement">{{item.date_versement}}</vs-td>
                                <vs-td :data="item.membre">{{item.membre.nom}}</vs-td>
                                <vs-td :data="item.montant">{{item.montant}}</vs-td>
                                <vs-td>
                                    <div class="flex">
                                        <vs-button size="small" icon="create" color="#7886d7" class="mx-2" @click="$inertia.replace(route('versement.edit', item.id))">Modifier</vs-button>
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

    export default {
       layout: Layout,
        metaInfo: {title: 'Liste des versements'},
        props: {
           versements: Array,
            flash: Object,
        },
        data() {
           return {
               item: null,
               activePrompt: false,
           }
        },
        methods: {
            supprimer() {
                this.$inertia.delete(this.route('versement.supp', this.item))
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
