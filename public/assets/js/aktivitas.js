document.addEventListener("DOMContentLoaded", function () {
    const metaCsrfToken = document.querySelector('meta[name="X-CSRF-TOKEN"]').getAttribute("content");
    const activitiesWrapper = document.getElementById("activitiesWrapper");
    const filterSelect = document.getElementById("filterSelect");
    filterSelect.addEventListener("click", e => {
        const filterBy = e.target.closest("button.filter-option").dataset.filterBy;
        fetch("/dashboard/log-aktivitas?filterBy=" + filterBy, {
            method: "GET",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
                "X-CSRF-TOKEN": metaCsrfToken
            }
        })
            .then(resp => resp.json())
            .then(resp => {
                const { status, message, data_view } = resp;
                if (status !== 200) return alert(message);
                activitiesWrapper.innerHTML = data_view;
            })
            .catch(e => console.error(e.message))
    })
})