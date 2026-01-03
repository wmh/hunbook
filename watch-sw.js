const CACHE_NAME = 'watch-v2';
const urlsToCache = [
  './watch.html',
  './watch-manifest.json',
  './watch-icon.svg'
];

// 安裝 Service Worker
self.addEventListener('install', event => {
  self.skipWaiting();
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('開啟快取');
        return cache.addAll(urlsToCache);
      })
  );
});

// 攔截請求 - 開發時優先使用網路
self.addEventListener('fetch', event => {
  event.respondWith(
    fetch(event.request)
      .then(response => {
        // 網路請求成功，更新快取
        const responseToCache = response.clone();
        caches.open(CACHE_NAME).then(cache => {
          cache.put(event.request, responseToCache);
        });
        return response;
      })
      .catch(() => {
        // 網路失敗才使用快取
        return caches.match(event.request);
      })
  );
});

// 更新 Service Worker
self.addEventListener('activate', event => {
  self.clients.claim();
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
