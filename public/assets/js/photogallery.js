import {Fancybox} from "https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.esm.js";

Fancybox.bind('.fancy-gallery__item');
document.querySelector('.add-photo-form').addEventListener('submit', async (event) => {
	event.preventDefault();
	try {
		const response = await fetch(`${location.origin}${event.target.getAttribute('action')}`, {
			method: "POST",
			body: new FormData(event.target),
		});
		let result = response.status === 200 ? await response.json() : null;
		let browserAnswer = ``;
		let adjastedHTml = ``;
		result !== null ? result.forEach(image => {
			adjastedHTml += `<a href="${image['imgPath']}" class="fancy-gallery__item" data-fancybox="gallery"><img src="${image['imgPath']}" alt="#"></a>`;
		}) : browserAnswer = `Не удалось получить ответ от сервера!`;
		document.querySelector('.fancy-gallery').insertAdjacentHTML('beforeend', adjastedHTml);
	} catch (error) {
		console.log(error);
	}
});