(() => {
  document.querySelectorAll('[data-vetoapp-media-select]').forEach((button) => {
    button.addEventListener('click', () => {
      const field = button.closest('.vetoapp-media-field');
      const input = field?.querySelector('[data-vetoapp-media-url]');
      const preview = field?.parentElement?.querySelector('[data-vetoapp-media-preview]');
      if (!input || !window.wp?.media) return;

      const mediaType = input.dataset.vetoappMediaType || 'image';
      const title = input.dataset.vetoappMediaTitle || 'انتخاب لوگو';
      const buttonText = input.dataset.vetoappMediaButton || 'استفاده از این تصویر';

      const frame = window.wp.media({
        title,
        button: { text: buttonText },
        multiple: false,
        library: { type: mediaType },
      });

      frame.on('select', () => {
        const attachment = frame.state().get('selection').first().toJSON();
        input.value = attachment.url || '';
        if (preview) {
          preview.src = attachment.url || '';
          preview.hidden = !attachment.url;
        }
      });
      frame.open();
    });
  });

  document.querySelectorAll('[data-vetoapp-media-clear]').forEach((button) => {
    button.addEventListener('click', () => {
      const field = button.closest('.vetoapp-media-field');
      const input = field?.querySelector('[data-vetoapp-media-url]');
      const preview = field?.parentElement?.querySelector('[data-vetoapp-media-preview]');
      if (input) input.value = '';
      if (preview) {
        preview.src = '';
        preview.hidden = true;
      }
    });
  });
})();
