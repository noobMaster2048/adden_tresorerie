<template>
    <div class="container mx-auto">
        <vs-card>
            <h1 class="text-indigo-400">Liste des utilisateurs</h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <div>
                        <vs-table :data="users" search pagination max-items="15" noDataText="Aucune donnée">
                            <template slot="header">
                                <div>
                                    <vs-button icon="add" color="#7886d7" size="small" @click="$inertia.replace(route('user.create'))">Nouvel utilisateur</vs-button>
                                </div>
                            </template>
                            <template slot="thead">
                                <vs-th>Login</vs-th>
                                <vs-th>Nom</vs-th>
                                <vs-th>Email</vs-th>
                                <vs-th></vs-th>
                            </template>
                            <template slot-scope="{data}">
                                <vs-tr v-for="item in data" :key="item.id" :data="item">
                                    <vs-td :data="item.login">{{item.login}}</vs-td>
                                    <vs-td :data="item.nom">{{item.nom}}</vs-td>
                                    <vs-td :data="item.email">{{item.email}}</vs-td>
                                    <vs-td>
                                        <div class="flex">
                                            <vs-button size="small" icon="create" color="#7886d7" class="mx-2" @click="$inertia.replace(route('user.edit', item.id))">Modifier</vs-button>
                                            <vs-button size="small" icon="delete" color="danger" class="mx-2" @click="openDialog(item.id)">Supprimer</vs-button>
                                        </div>
                                    </vs-td>
                                </vs-tr>
                            </template>
                        </vs-table>
                    </div>
                </vs-card>
            </div>
        </div>
        <vs-prompt title="Confirmation de suppression" color="danger" accept-text="Oui" cancel-text="Non" @accept="supprimer" :active.sync="activePrompt">
            <div class="text-center mx-auto">
                Voulez-vous supprimer cet utilisateur : <strong v-if="item">{{item.login}}</strong> ?
            </div>
        </vs-prompt>
    </div>
</template>

<script>
    import Layout from '@/Shared/Layout';

    export default {
       metaInfo: {title: 'Liste des utilisateurs'},
        layout: Layout,
        props: {
           users: Array,
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
                this.$inertia.delete(this.route('user.supp', this.item))
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
