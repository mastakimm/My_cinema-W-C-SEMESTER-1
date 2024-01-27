document.addEventListener("DOMContentLoaded", function (e) {
    const showHistory = document.getElementsByClassName("showhistory")[0];
    const form_history = document.getElementsByClassName("form_history")[0];
    const card = document.getElementsByClassName("card")[0];

    showHistory.addEventListener("click", function (e) {
        if (form_history.style.display === "none"){
            form_history.style.display = "block";
            if (card.style.display === "block" || card.style.display === "") {
                card.style.display = "none";
            }
        } else {
            form_history.style.display = "none";
            card.style.display = "block";
        }
    });

    const show_add_to_history = document.getElementsByClassName("add_to_history")[0];
    const add_to_history = document.getElementsByClassName("form_add_to_history")[0];
    const gridHistory = document.getElementsByClassName("grid")[0];

    show_add_to_history.addEventListener("click", function (e) {
        if (add_to_history.style.display === "none"){
            add_to_history.style.display = "block";
            if (gridHistory.style.display === "grid" || gridHistory.style.display === "") {
                gridHistory.style.display = "none";
            }
        } else {
            add_to_history.style.display = "none";
            gridHistory.style.display = "grid";
        }
    });
});