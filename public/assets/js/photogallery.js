import {Fancybox} from "https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.esm.js";

Fancybox.bind('.fancy-gallery__item');
const handleShows = async (event) => {
	console.log(event.target.parentElement);
	++event.target.parentElement.dataset.openedCount;
	try {
		const response = await fetch(`${location.origin}${document.querySelector('.add-photo-form').getAttribute('action')}`, {
			method: "POST",
			headers: {
				'Content-Type': 'application/json',
			},
			body: JSON.stringify({event: 'opened-image', 'database-id': event.target.parentElement.dataset.dbId, 'opened-count': event.target.parentElement.dataset.openedCount})
		});
		let result = response.status === 200 ? await response.json() : null;
		if (result !== null) {
			event.target.parentElement.dataset.caption = `Просмотров: ${event.target.parentElement.dataset.openedCount}`;
		}
	} catch (e) {
		console.log(e);
	}
}
document.querySelector('.add-photo-form').addEventListener('submit', async (event) => {
	event.preventDefault();
	let $parentEl = document.querySelector('.fancy-gallery');
	try {
		const response = await fetch(`${location.origin}${event.target.getAttribute('action')}`, {
			method: "POST",
			body: new FormData(event.target),
		});
		let result = response.status === 200 ? await response.json() : null;
		let browserAnswer = ``;
		let adjastedHTml = ``;
		result !== null ? result.forEach(image => {
			adjastedHTml += `<a href="${image['imgPath']}" class="fancy-gallery__item" data-db-id="${image['id']}" data-fancybox="gallery" data-opened-count="0"><img src="${image['imgPath']}" alt="#"></a>`;
		}) : browserAnswer = `Не удалось получить ответ от сервера!`;
		$parentEl.insertAdjacentHTML('beforeend', adjastedHTml);
		for (let i = result.length; i > 0; i--) {
			$parentEl.children[$parentEl.childElementCount - i].addEventListener('click', handleShows);
		}
	} catch (error) {
		console.log(error);
	}
});
document.querySelectorAll('.fancy-gallery__item').forEach(galleryItem => galleryItem.addEventListener('click', handleShows));
