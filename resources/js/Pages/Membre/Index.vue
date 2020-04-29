<template>
    <div class="container mx-auto">
        <vs-card class="my-4">
            <h1 class="font-medium text-indigo-600">Liste des membres</h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <vs-table :data="membres" search pagination max-items="15" noDataText="Aucune donnée">
                        <template slot="header">
                            <div>
                                <vs-button size="small" color="#7886d7" icon="add" @click="$inertia.replace(route('membre.create'))">Nouveau membre</vs-button>
                            </div>
                        </template>
                        <template slot="thead">
                            <vs-th>Civilité</vs-th>
                            <vs-th>Nom et prénoms</vs-th>
                            <vs-th>Téléphone</vs-th>
                            <vs-th>Date de naissance</vs-th>
                            <vs-th>N° de carte identité</vs-th>
                            <vs-th>Type membre</vs-th>
                            <vs-th></vs-th>
                        </template>
                        <template slot-scope="{data}">
                            <vs-tr v-for="item in data" :key="item.id" :data="item">
                                <vs-td :data="item.civilite">{{item.civilite}}</vs-td>
                                <vs-td :data="item.nom">{{item.nom}} {{item.prenom}}</vs-td>
                                <vs-td :data="item.telephone">{{item.telephone}}</vs-td>
                                <vs-td :data="item.date_naissance">{{item.date_naissance}}</vs-td>
                                <vs-td :data="item.cni">{{item.cni}}</vs-td>
                                <vs-td :data="item.type_membre">{{item.type_membre =='phys' ? 'Personne physique' : 'Personne morale'}}</vs-td>
                                <vs-td>
                                    <div class="flex">
                                        <vs-button size="small" icon="create" color="#7886d7" class="mx-2" @click="$inertia.replace(route('membre.edit', item.id))">Modifier</vs-button>
                                        <vs-button size="small" icon="delete" color="danger" class="mx-2" @click="openDialog(item.id)">Supprimer</vs-button>
                                    </div>
                                </vs-td>
                            </vs-tr>
                        </template>
                    </vs-table>
                </vs-card>
            </div>
        </div>
        <vs-prompt title="Confirmation de suppression" color="danger" accept-text="Oui" cancel-text="Non" @accept="supprimer" :active.sync="activePrompt">
            <div class="text-center mx-auto">
                Voulez-vous supprimer ce membre ?
            </div>
        </vs-prompt>
    </div>
</template>

<script>
    import Layout from '@/Shared/Layout';

    export default {
        metaInfo: {title: 'Liste des membres'},
        layout: Layout,
        props: {
            membres: Array,
            flash: Object,
        },
        data() {
            return {
                activePrompt: false,
                item: null,
            }
        },
        methods: {
            supprimer() {
                this.$inertia.delete(this.route('membre.supp', this.item))
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
