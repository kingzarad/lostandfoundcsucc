$(document).ready(function () {
    $("#mytable").each(function () {
        var mytable = $(this).DataTable({
            dom: "frtip",
            buttons: [
                {
                    extend: "print",
                    text: "Print",
                    title: "",
                    exportOptions: {
                        columns: ":not(.exclude-print)",
                    },
                },
            ],
            searching: true,
            lengthChange: true,
            info: false,

            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
            responsive: true,
        });
    });
});
