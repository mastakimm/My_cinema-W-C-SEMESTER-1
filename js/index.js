document.addEventListener("DOMContentLoaded", function (e) {
    const showHistory = document.getElementsByClassName("show_movie_form")[0];
    const form_history = document.getElementsByClassName("movie_form")[0];

    showHistory.addEventListener("click", function (e) {
        if (form_history.style.display === "none"){
            form_history.style.display = "block";
            if (add_to_history.style.display === "block" || schedule.style.display === "block") {
                add_to_history.style.display = "none";
                schedule.style.display = "none";
            }
        } else {
            form_history.style.display = "none";
        }
    });

    const show_add_to_history = document.getElementsByClassName("show_user_form")[0];
    const add_to_history = document.getElementsByClassName("form_user")[0];

    show_add_to_history.addEventListener("click", function (e) {
        if (add_to_history.style.display === "none"){
            add_to_history.style.display = "block";
            if (form_history.style.display === "block" || schedule.style.display === "block") {
                form_history.style.display = "none";
                schedule.style.display = "none";
            }
        } else {
            add_to_history.style.display = "none";
        }
    });

    const showSchedule = document.getElementsByClassName("show_schedule")[0];
    const schedule = document.getElementsByClassName("schedule")[0];

    showSchedule.addEventListener("click", function (e) {
        if (schedule.style.display === "none"){
            schedule.style.display = "block";
            if (form_history.style.display === "block" || add_to_history.style.display === "block") {
                form_history.style.display = "none";
                add_to_history.style.display = "none";
            }
        } else {
            schedule.style.display = "none";
        }
    });
});