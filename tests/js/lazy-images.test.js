import test from 'node:test';
import assert from 'node:assert/strict';
import { prepareLazyImage } from '../../public/assets/js/lazy-images.js';

function fakeImage(complete = false) {
  const classes = new Set();
  const listeners = {};

  return {
    complete,
    classList: {
      add(...names) { names.forEach((name) => classes.add(name)); },
      contains(name) { return classes.has(name); },
    },
    addEventListener(name, callback) { listeners[name] = callback; },
    dispatch(name) { listeners[name]?.(); },
  };
}

test('lazy image becomes visible after it loads', () => {
  const image = fakeImage(false);

  prepareLazyImage(image);
  assert.equal(image.classList.contains('lazy-media'), true);
  assert.equal(image.classList.contains('is-loaded'), false);

  image.dispatch('load');
  assert.equal(image.classList.contains('is-loaded'), true);
});

test('cached lazy image is visible immediately', () => {
  const image = fakeImage(true);

  prepareLazyImage(image);
  assert.equal(image.classList.contains('is-loaded'), true);
});
