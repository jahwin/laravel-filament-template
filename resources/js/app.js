import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import WebLayout from './layouts/webLayout.vue';
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const toastOptions = {
  position: 'top-right',
  duration: 5000,
  dismissible: true,
  pauseOnHover: true,
  queue: true
};

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./pages/**/*.vue', { eager: true })
    let page = pages[`./pages/${name}.vue`]
    page.default.layout = page.default.layout || WebLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ToastPlugin, toastOptions)
      .mount(el)
  },
  title: (title) => `${title} | Dimension Technologies System`,
  progress: {
    color: '#d6be9d'
  }
})