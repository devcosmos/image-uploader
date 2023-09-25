'use strict'

const alertElement = document.querySelector("#alert");
const imageInputElement = document.querySelector('#imageInput');
const submitButtonlement = document.querySelector('#submitButton');
const copyClipboardElement = document.querySelector('#copyClipboard');

const MAX_FILE_SIZE = 1000000; // 1 Mb
const MAX_IMG_WIDTH = 1920;
const MAX_IMG_HEIGTH = 1080;

const collapse = new bootstrap.Collapse('#collapse', { toggle: false});

if (copyClipboardElement) {
  copyClipboardElement.addEventListener('click', (event) => {
    event.preventDefault();
    navigator.clipboard.writeText(event.target.href);
    copyClipboardElement.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
      </svg>
      Скопировано
    `;
  });
}

const checkFile = (file) => {
  if (file.size > MAX_FILE_SIZE) {
    submitButtonlement.setAttribute('disabled', true);
    alertElement.innerHTML = `
      <p>Слишком большой размер файла, уменьши размер до 1 мб.</p>
      <hr>
      <p class="mb-0">
        Сначала
        <a class="link-light text-decoration-none" href="https://www.iloveimg.com/ru/resize-image" target="_blank">измени размер</a>
        , потом
        <a class="link-light text-decoration-none" href="https://tinypng.com/" target="_blank">оптимизируй</a>.
      </p>
    `;
    collapse.show();
    
    return false;
  } else {
    submitButtonlement.removeAttribute('disabled');
    collapse.hide();

    return true;
  }
}

imageInputElement.addEventListener('change', async function (event) {
  const file = event.target.files[0];
  const reader = new FileReader();

  submitButtonlement.setAttribute('disabled', true);

  reader.addEventListener('load', function() {
    const img = new Image();
    img.addEventListener('load', () => {
      file.width = 'auto';
      file.height = 'auto';
    
      if (img.height / (img.width / MAX_IMG_WIDTH) > MAX_IMG_HEIGTH) {
        file.height = MAX_IMG_HEIGTH;
      } else {
        file.width = MAX_IMG_WIDTH;
      }
      
      fromBlob(file, 90, file.width, file.height, 'webp').then((blob) => {
        checkFile(blob);
        
        const list = new DataTransfer();
        const newFile = new File([blob], file.name.substr(0, file.name.lastIndexOf('.')) + '.webp');
        list.items.add(newFile);
        const fileList = list.files;
        imageInputElement.files = fileList;
      });

    });
    img.src = reader.result;
  }, false);

  if (file) reader.readAsDataURL(file);
});