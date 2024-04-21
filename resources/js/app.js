import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import BaseLayout from "./Pages/layouts/BaseLayout.vue";
import { ZiggyVue} from 'ziggy';
import FlashMessage from "./Pages/components/FlashMessage.vue";
// import 'tailwindcss/tailwind.css';


createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        const page = pages[`./Pages/${name}.vue`]
        if (!page) {
            throw new Error(`Page ${name} not found. Searched in: ${Object.keys(pages)}`)
        }
        page.default.layout = page.default.layout || BaseLayout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('flash-message', FlashMessage)
            .mount(el)
    },
})
