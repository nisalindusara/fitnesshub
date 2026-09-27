document.addEventListener('DOMContentLoaded', function () {

    /*
     * Schedule search
     */
    const searchInput =
        document.getElementById('scheduleSearch');

    const events =
        document.querySelectorAll('.ws-event');

    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const query =
                this.value
                    .trim()
                    .toLowerCase();

            events.forEach(function (event) {

                const searchable =
                    event.dataset.search || '';

                if (
                    query === ''
                    || searchable.includes(query)
                ) {
                    event.classList.remove('is-hidden');
                } else {
                    event.classList.add('is-hidden');
                }

            });

        });

    }


    /*
     * Week / Month visual toggle.
     *
     * Month is only a demo state for now.
     * No second month calendar is required yet.
     */

});