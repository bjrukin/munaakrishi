import test from 'node:test';
import assert from 'node:assert/strict';
import { getNoticeStorage, noticeDismissalKey, setupNoticePopup } from '../../public/assets/js/notice-popup.js';

function fixture() {
  const classes = new Set();
  const popupListeners = {};
  const documentListeners = {};
  const closeListeners = {};
  const closeButton = {
    focusCalled: false,
    focus() { this.focusCalled = true; },
    addEventListener(name, callback) { closeListeners[name] = callback; },
  };
  const popup = {
    dataset: { noticeId: '42', noticeVersion: '1730268000' },
    classList: {
      add(name) { classes.add(name); },
      remove(name) { classes.delete(name); },
      contains(name) { return classes.has(name); },
    },
    querySelector() { return closeButton; },
    addEventListener(name, callback) { popupListeners[name] = callback; },
  };
  const previousFocus = { focusCalled: false, focus() { this.focusCalled = true; } };
  const document = {
    activeElement: previousFocus,
    body: { style: { overflow: '' } },
    querySelector() { return popup; },
    addEventListener(name, callback) { documentListeners[name] = callback; },
  };
  const values = new Map();
  const storage = {
    getItem(key) { return values.get(key) ?? null; },
    setItem(key, value) { values.set(key, value); },
  };

  return { popup, closeButton, closeListeners, popupListeners, documentListeners, document, previousFocus, storage };
}

test('dismissal key uses the featured notice database id', () => {
  assert.equal(noticeDismissalKey('42', '1730268000'), 'munaa-notice-dismissed-42-1730268000');
  assert.notEqual(noticeDismissalKey('42', '1730268000'), noticeDismissalKey('42', '1730269000'));
});

test('popup dismissal storage is scoped to the current tab', () => {
  const sessionStorage = { scope: 'tab' };
  const localStorage = { scope: 'browser' };

  assert.equal(getNoticeStorage({ sessionStorage, localStorage }), sessionStorage);
});

test('popup opens, closes, stores dismissal, and restores focus', () => {
  const ui = fixture();

  setupNoticePopup(ui.document, ui.storage, (callback) => callback());

  assert.equal(ui.popup.classList.contains('open'), true);
  assert.equal(ui.document.body.style.overflow, 'hidden');
  assert.equal(ui.closeButton.focusCalled, true);

  ui.closeListeners.click();

  assert.equal(ui.popup.classList.contains('open'), false);
  assert.equal(ui.document.body.style.overflow, '');
  assert.equal(ui.storage.getItem(noticeDismissalKey('42', '1730268000')), 'true');
  assert.equal(ui.previousFocus.focusCalled, true);
});
