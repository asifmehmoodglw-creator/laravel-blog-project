
document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star-rating .star');

    stars.forEach(star => {
        star.addEventListener('click', function() {
            let rating = this.getAttribute('data-value');
            let parentContainer = this.parentElement;
            let cardId = parentContainer.getAttribute('data-card-id');

            // 1. Visual CSS Active Highlight Fix
            let parentStars = parentContainer.querySelectorAll('.star');
            parentStars.forEach(s => s.classList.remove('active'));
            this.classList.add('active');

            console.log('Star clicked:', rating, 'Card ID:', cardId);

            // 2. Pure JavaScript Fetch API (No jQuery needed)
            fetch("{{ route('card.rate') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    card_id: cardId,
                    rating: rating
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Server Response:', data);
                if(data.success) {
                    document.getElementById('rating-status-' + cardId).innerText = 'Rated: ' + rating + '/5';
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
            });
        });
    });
});