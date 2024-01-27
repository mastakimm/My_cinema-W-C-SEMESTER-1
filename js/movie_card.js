document.addEventListener("DOMContentLoaded", function () {
    const show_add_to_schedule = document.getElementsByClassName("show_add_to_schedule")[0];
    const form_schedule = document.getElementsByClassName("this_movie_to_schedule")[0];
    const card = document.getElementsByClassName("card")[0];

    show_add_to_schedule.addEventListener('click', function (e) {
        if (form_schedule.style.display === "none") {
            form_schedule.style.display = "block";
            if (card.style.display === "block" || card.style.display === "") {
                card.style.display = "none";
            }
        } else {
            form_schedule.style.display = "none";
            card.style.display = "block";
        }
    });
});