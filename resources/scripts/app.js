import domReady from '@roots/sage/client/dom-ready';
import { createApp, ref } from 'vue'




/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
  createApp({
    setup() {
      return {
        count: ref(0)
      }
    }
  }).mount('#vue-publikacje')
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);