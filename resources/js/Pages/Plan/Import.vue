<template>
    <div class="container mx-auto">
        <vs-card class="mb-8">
            <h1 class="font-bold">
                <inertia-link :href="route('plans')" class="text-indigo-400 hover:text-indigo-600">
                    plans comptables
                </inertia-link>
                <span class="font-medium text-indigo-400">/</span>
                <span>Import de fichier</span>
            </h1>
        </vs-card>
        <div class="vx-row">
            <div class="vx-col w-full">
                <vs-card>
                    <div>
                        <div class="vx-row pb-6">
                            <div class="vx-col w-full sm:w-1/6">
                                <span></span>
                            </div>
                            <div class="vx-col w-full sm:w-5/6">
                                <vs-upload :data="form.file" limit="1" text="Chargement de fichier" :action="route('plan.import')" @on-success="successUpload" v-model="form.file" class="w-full sm:w-3/5"></vs-upload>
                            </div>
                        </div>
                    </div>
                    <div slot="footer">
                        <div class="flex items-center justify-end">
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
        metaInfo: {title: 'Import de plan comptable'},
        layout: Layout,
        data() {
            return {
                sending: false,
                form: {
                    file: null,
                }
            }
        },
        methods: {
            import() {

            },
            successUpload() {

            },
            save() {

            }
        }
    }
</script>

<style scoped>

</style>
