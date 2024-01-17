'use strict'

const alertElement = document.querySelector("#alert");
const imageInputElement = document.querySelector('#imageInput');
const submitButtonElement = document.querySelector('#submitButton');
const copyClipboardElement = document.querySelector('#copyClipboard');

const MAX_FILE_SIZE = 3000000; // 3 Mb
const MAX_IMG_WIDTH = 1920;
const MAX_IMG_HEIGTH = 1080;
const VALID_FILE_TYPES = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp', 'image/svg+xml'];

const collapse = new bootstrap.Collapse('#collapse', { toggle: false });

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

const checkFileSize = (file) => {
  if (file.size > MAX_FILE_SIZE) {
    submitButtonElement.setAttribute('disabled', true);
    alertElement.innerHTML = `
      <p>Слишком большой размер файла, уменьши размер до 1 мб.</p>
      <hr>
      <p class="mb-0">
        Сначала
        <a class="link-light text-decoration-none" href="https://www.iloveimg.com/ru/resize-image" target="_blank">измени размер</a>
      </p>
    `;
    collapse.show();
    
    return false;
  } else {
    submitButtonElement.removeAttribute('disabled');
    collapse.hide();

    return true;
  }
}

const checkFileType = (file) => {
  if (!VALID_FILE_TYPES.includes(file.type)) {
    alertElement.innerHTML = `Данный тип файла не поддерживается.`;
    collapse.show();

    return false;
  } else {
    collapse.hide();

    return true;
  }
}

const getImageSize = (image) => {
  const imageSize = {
    width: 'auto',
    height: 'auto',
  }

  if (image.width > MAX_IMG_WIDTH || image.height > MAX_IMG_HEIGTH) {
    if (image.height / (image.width / MAX_IMG_WIDTH) > MAX_IMG_HEIGTH) {
      imageSize.height = MAX_IMG_HEIGTH;
    } else {
      imageSize.width = MAX_IMG_WIDTH;
    }
  }

  return imageSize;
}

imageInputElement.addEventListener('change', async function (event) {
  const file = event.target.files[0];
  submitButtonElement.setAttribute('disabled', true);

  if (!file) return;

  if (checkFileType(file)) {
    if (file.type === 'image/svg+xml') {
      checkFileSize(file);
    } else {
      const reader = new FileReader();
  
      reader.addEventListener('load', function() {
        const img = new Image();

        img.addEventListener('load', () => {
          const imageSize = getImageSize(img);
          
          fromBlob(file, 90, imageSize.width, imageSize.height, 'webp').then((blob) => {
            if (checkFileSize(blob)) {
              const list = new DataTransfer();
              const newFile = new File([blob], file.name.substr(0, file.name.lastIndexOf('.')) + '.webp');
              list.items.add(newFile);
              const fileList = list.files;
              imageInputElement.files = fileList;
            }
          });
        });

        img.src = reader.result;
      }, false);
    
      if (file) reader.readAsDataURL(file);
    }
  }
  
});
