<template>
    <div class="container mx-auto">
        <vs-card class="mb-8">
            <h1 class="font-bold">
                <inertia-link :href="route('plans')" class="text-indigo-400 hover:text-indigo-600">
                    plans comptables
                </inertia-link>
                <span class="font-medium text-indigo-400">/</span>
                <span>création</span>
            </h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <div slot="header">
                        <div>
                            <h1>Formulaire plan comptable</h1>
                        </div>
                    </div>
                    <div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">n° de compte</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.compte" :danger="checkNum" danger-text="Le numéro de compte est obligatoire" />
                            </div>
                        </div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span class="text-color-base text-base capitalize">libellé</span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-input class="w-full sm:w-3/5" v-model="form.libelle" :danger="checkLibelle" danger-text="le libelle est obligatoire" />
                            </div>
                        </div>
                    </div>
                    <div slot="footer">
                        <div class="flex justify-end items-center">
                            <vs-button class="mx-2" :disabled="sending" color="#7886d7" icon="save" @click="save">Enregistrer</vs-button>
                            <vs-button class="mx-2" color="danger" icon="save" @click="$inertia.replace(route('plans'))">Annuler</vs-button>
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
       metaInfo: {
           title: 'Formulaire plan comptable'
       },
        layout: Layout,
        data() {
           return {
               sending: false,
               form: {
                   libelle: null,
                   compte: null,
               }
           }
        },
        methods: {
           save() {
               this.sending = true;
               this.$inertia.post(this.route('plan.store'), this.form).then(() => {
                   this.sending = false;
               })
           }
        },
        computed: {
           checkLibelle() {
               return  this.$page.errors.libelle ? true : false;
           },
            checkNum() {
               return this.$page.errors.compte ? true : false;
            }
        }
    }
</script>

<style scoped>

</style>
