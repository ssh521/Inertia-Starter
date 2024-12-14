import "../css/app.css";
import "./bootstrap";

import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { createApp, h } from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import MainLayout from "./Layouts/MainLayout.vue";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        page.default.layout = page.default.layout || MainLayout;

        return page;
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.component("Head", Head);
        app.component("Link", Link);

        app.use(ZiggyVue);
        app.use(plugin);

        app.mount(el);
    },

    progress: {
        color: "#4B5563",
    },
});
