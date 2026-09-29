(() => {
  const navToggle = document.querySelector('.nav-toggle');
  const navigation = document.querySelector('.primary-nav');

  if (navToggle && navigation) {
    navToggle.addEventListener('click', () => {
      const opened = navToggle.getAttribute('aria-expanded') === 'true';
      navToggle.setAttribute('aria-expanded', String(!opened));
      navToggle.setAttribute('aria-label', opened ? 'باز کردن منوی اصلی' : 'بستن منوی اصلی');
      navigation.classList.toggle('is-open', !opened);
      document.body.classList.toggle('menu-open', !opened);
    });

    navigation.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        if (window.matchMedia('(max-width: 760px)').matches) {
          navToggle.setAttribute('aria-expanded', 'false');
          navToggle.setAttribute('aria-label', 'باز کردن منوی اصلی');
          navigation.classList.remove('is-open');
          document.body.classList.remove('menu-open');
        }
      });
    });
  }

  document.querySelectorAll('[data-pwa-install-link]').forEach((link) => {
    link.addEventListener('click', () => {
      const installHelp = document.querySelector('#pwa-install');
      if (installHelp instanceof HTMLDetailsElement) installHelp.open = true;
    });
  });

  const modal = document.querySelector('[data-video-modal]');
  const dialog = modal?.querySelector('[data-video-dialog]');
  const player = modal?.querySelector('[data-video-player]');
  const closeButton = modal?.querySelector('[data-video-close]');
  let openingButton = null;

  const closeModal = () => {
    if (!modal) return;
    if (player instanceof HTMLVideoElement) {
      player.pause();
      player.currentTime = 0;
    }
    modal.hidden = true;
    modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('modal-open');
    if (openingButton instanceof HTMLElement) openingButton.focus();
    openingButton = null;
  };

  const openModal = (button) => {
    if (!modal || !(player instanceof HTMLVideoElement) || !player.currentSrc) return;
    openingButton = button;
    modal.hidden = false;
    modal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('modal-open');
    closeButton?.focus();
  };

  document.querySelectorAll('[data-video-open]').forEach((button) => {
    button.addEventListener('click', () => openModal(button));
  });

  closeButton?.addEventListener('click', closeModal);
  modal?.addEventListener('click', (event) => {
    if (event.target === modal) closeModal();
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && modal && !modal.hidden) closeModal();
    if (event.key === 'Tab' && modal && !modal.hidden && dialog) {
      const focusable = dialog.querySelectorAll('button, [href], [tabindex]:not([tabindex="-1"])');
      const items = [...focusable].filter((item) => !item.hasAttribute('disabled'));
      if (!items.length) return;
      const first = items[0];
      const last = items[items.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    }
  });
})();
