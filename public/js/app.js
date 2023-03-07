


document
    .getElementById("filter_company_id")
    .addEventListener("change", function () {
        let companyId = this.value || this.options[this.selctedIndex].value;
        window.location.href =
            window.location.href.split("?")[0] + "?company_id=" + companyId;
    });

document.querySelectorAll(".btn-delete").forEach((button) =>
    button.addEventListener("click", function (event) {
        console.log(event)
        event.preventDefault();
        if (confirm("You sure you want to delete ?")) {
            let action = this.getAttribute("href");
            let form = document.getElementById("form-delete");
            form.setAttribute("action", action);
            form.submit();
        }
    })
);

document.querySelectorAll(".btn-delete-company").forEach((button) =>{

    button.addEventListener("click", function (event) {
        console.log(event)

        event.preventDefault();
        if (confirm("You sure you want to delete ?")) {
            let action = this.getAttribute("href");
            let form = document.getElementById("form-delete-company");
            form.setAttribute("action", action);
            form.submit();
        }
    }

    )
}
);





document.getElementById("btn-clear").addEventListener("click", () => {
    let input = document.getElementById("search"),
        select = document.getElementById("filter_company_id");

    input.value = "";
    select.selectedIndex = 0;

    window.location.href = window.location.href.split("?")[0];
});


const toggleClearBtn = () => {
    let query = location.search,
        pattern = /[?&]search=/,
        button = document.getElementById("btn-clear");

    if (pattern.test(query)) {
        button.style.display = "block";
    } else {
        button.style.display = "none";
    }
};

toggleClearBtn();


