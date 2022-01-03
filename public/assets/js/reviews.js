'use strict';
const addReview = async (event) => {
	event.preventDefault();
	try {
		const response = await fetch(event.target.getAttribute('action'), {
			method: 'POST',
			body: new FormData(event.target),
		});
		const res = response.status === 201 ? await response.json() : null;
		if (res) {
			let timezoneData = `${new Date(Date.parse(res['timestamp']['date'])).toLocaleDateString('ru-RU')} ${new Date(Date.parse(res['timestamp']['date'])).toLocaleTimeString('ru-RU')}`;
			event.target.previousElementSibling.insertAdjacentHTML('beforeend',
				`<div class="review__item">
								<div class="review__item-author">${res['author']}</div>
								<div class="review__item-mail">${res['email']}</div>
								<div class="review__item-body">${res['review-body']}</div>
								<div class="review__item-time">${timezoneData}</div>
							</div>`);
		}
	} catch (e) {
		console.log(e);
	}

};
document.querySelector('.add-review').addEventListener('submit', addReview);