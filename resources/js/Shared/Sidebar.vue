<template>
    <div>
        <div class="mb-4">
            <inertia-link href="/" class="flex items-center py-3 text-base">
                <vs-icon icon="home" color="primary"></vs-icon>
                <div :class="isUrl('') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Acceuil</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link href="/membres" class="flex items-center py-3 text-base">
                <vs-icon icon="perm_identity" color="primary"></vs-icon>
                <div :class="isUrl('membres') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Membres</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link :href="route('cotisations')" class="flex items-center py-3 text-base">
                <vs-icon icon="perm_identity" color="primary"></vs-icon>
                <div :class="isUrl('cotisations') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Cotisations</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link :href="route('plans')" class="flex items-center py-3 text-base">
                <vs-icon icon="perm_identity" color="primary"></vs-icon>
                <div :class="isUrl('plans') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Plans comptables</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link :href="route('versements')" class="flex items-center py-3 text-base">
                <vs-icon icon="credit_card" color="primary"></vs-icon>
                <div :class="isUrl('versements') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Versements</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link href="/" class="flex items-center py-3 text-base">
                <vs-icon icon="local_offer" color="primary"></vs-icon>
                <div :class="isUrl('') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Donation</div>
            </inertia-link>
        </div>
        <div class="mb-4">
            <inertia-link :href="route('users')" class="flex items-center py-3 text-xl">
                <vs-icon icon="local_offer" color="primary"></vs-icon>
                <div :class="isUrl('users') ? 'text-white' : 'text-gray-900 font-medium hover:text-blue-700'">Utilisateurs</div>
            </inertia-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Sidebar",
        props: {
            url: String,
        },
        methods: {
            isUrl(...urls) {
                if (urls[0] === '') {
                    return this.url === ''
                }
                return urls.filter(url => this.url.startsWith(url)).length;
            }
        }
    }
</script>

<style scoped>

</style>
