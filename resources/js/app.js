import Vue from 'vue'
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import { InertiaApp } from '@inertiajs/inertia-vue'
import Vuesax from 'vuesax'
import Vue2Filters from 'vue2-filters'
import 'material-icons/iconfont/material-icons.css'


Vue.config.productionTip = false;
Vue.mixin({ methods: { route: window.route } });

Vue.use(InertiaApp);
Vue.use(PortalVue);
Vue.use(VueMeta);
Vue.use(Vuesax);
Vue.use(Vue2Filters);


let app = document.getElementById('app');

new Vue({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - Trésorerie` : 'Trésorerie'
    },
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
        },
    }),
}).$mount(app);
