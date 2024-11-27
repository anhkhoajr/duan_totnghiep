import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import DefaultLayout from './Layouts/layout';
import "../css/style.scss";
import { ShoppingProvider } from "./Hook/useContentShoping"; 

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ).then((module) => {
            const Component = module.default;
            Component.layout = Component.layout || ((page) => <DefaultLayout children={page} />);
            return Component;
        }),
    setup({ el, App, props }) {
        const root = createRoot(el);
        root.render(
                <ShoppingProvider> 
                    <App {...props} />
                </ShoppingProvider>

            );
    },
    progress: {
        color: 'red',
    },
});