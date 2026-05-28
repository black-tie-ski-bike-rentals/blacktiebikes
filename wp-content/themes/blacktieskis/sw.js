importScripts('//storage.googleapis.com/workbox-cdn/releases/3.3.0/workbox-sw.js') // eslint-disable-line

workbox.setConfig({ // eslint-disable-line
  debug: true
})

workbox.precaching.precacheAndRoute([ // eslint-disable-line
  '//fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700|Poppins:200,300,400,600',
  'stylesheets/app.css',
  'stylesheets/print.css',
  'javascripts/jquery-3.1.0.min.js',
  'javascripts/app.js'
])

// Demonstrates using default cache
// workbox.routing.registerRoute(
//   /.*\.(?:js)/g,
//   new workbox.strategies.NetworkFirst()
// )

// Demonstrates a custom cache name for a route.
workbox.routing.registerRoute( // eslint-disable-line
  /.*\.(?:png|jpg|jpeg|svg|gif)/g,
  workbox.strategies.cacheFirst({ // eslint-disable-line
    cacheName: 'image-cache',
    plugins: [
      new workbox.expiration.Plugin({ // eslint-disable-line
        maxEntries: 3
      })
    ]
  })
)
