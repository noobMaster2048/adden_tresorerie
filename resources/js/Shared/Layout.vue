<template>
    <div>
        <div class="flex flex-col">
            <div class="h-screen flex flex-col">
                <div class="md:flex flex-shrink-0">
                    <div class="bg-indigo-400 md:flex-shrink-0 md:w-64 px-6 py-4 flex items-center justify-between md:justify-center">
                        <inertia-link href="/" class="mt-1 text-white">
                            Trésorerie
                        </inertia-link>
                        <div></div>
                    </div>
                    <div class="bg-white border-b w-full shadow-xl p-4 md:py-0 md:px-12 text-sm md:text-md flex justify-between items-center">
                        <div class="mt-1 mr-4">Admin</div>
                        <div>User Profil</div>
                    </div>
                </div>
                <div class="flex flex-grow overflow-hidden">
                    <side-bar :url="urls()" class="bg-indigo-400 rounded-r-full shadow flex-shrink-0 w-64 p-12 md:block overflow-y-auto shadow-xl" />
                    <div class="flex-1 px-4 py-8 md:p-12 overflow-y-auto">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Sidebar from './Sidebar';
    import TopMenu from './TopMenu';

    export default {
        name: "Layout",
        components: {
            'side-bar': Sidebar,
            'top-nav': TopMenu,
        },
        methods: {
            urls() {
                return location.pathname.substr(1);
            },
            hideDropdownMenu() {

            }
        }
    }
</script>

<style scoped>

</style>
