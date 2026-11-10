export function noticeDismissalKey(noticeId, noticeVersion) {
  return `munaa-notice-dismissed-${noticeId}-${noticeVersion}`;
}

export function getNoticeStorage(win) {
  return win.sessionStorage;
}

export function setupNoticePopup(doc, storage, schedule = (callback, delay) => setTimeout(callback, delay)) {
  const popup = doc.querySelector('#notice-popup');
  if (!popup?.dataset.noticeId || !popup.dataset.noticeVersion) return;

  const storageKey = noticeDismissalKey(popup.dataset.noticeId, popup.dataset.noticeVersion);
  const closeButton = popup.querySelector('.modal-close-btn');
  const previousFocus = doc.activeElement;
  let dismissed = false;

  try {
    dismissed = storage.getItem(storageKey) === 'true';
  } catch (error) {
    dismissed = false;
  }

  if (dismissed) return;

  const dismiss = () => {
    popup.classList.remove('open');
    doc.body.style.overflow = '';

    try {
      storage.setItem(storageKey, 'true');
    } catch (error) {
      // The notice can still close when browser storage is unavailable.
    }

    previousFocus?.focus?.();
  };

  closeButton?.addEventListener('click', dismiss);
  popup.addEventListener('click', (event) => {
    if (event.target === popup) dismiss();
  });
  doc.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && popup.classList.contains('open')) dismiss();
  });

  schedule(() => {
    popup.classList.add('open');
    doc.body.style.overflow = 'hidden';
    closeButton?.focus();
  }, 800);
}

if (typeof document !== 'undefined') {
  const initialize = () => setupNoticePopup(document, getNoticeStorage(window));

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialize, { once: true });
  } else {
    initialize();
  }
}
