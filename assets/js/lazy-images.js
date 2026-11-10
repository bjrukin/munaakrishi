export function prepareLazyImage(image) {
  const reveal = () => image.classList.add('is-loaded');

  image.classList.add('lazy-media');

  if (image.complete) {
    reveal();
    return;
  }

  image.addEventListener('load', reveal, { once: true });
  image.addEventListener('error', reveal, { once: true });
}

export function initLazyImageTransitions(root = document) {
  root.querySelectorAll('img[loading="lazy"]').forEach(prepareLazyImage);
}

if (typeof document !== 'undefined') {
  const initialize = () => initLazyImageTransitions(document);

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialize, { once: true });
  } else {
    initialize();
  }
}
