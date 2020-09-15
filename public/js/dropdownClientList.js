$(function () {
    $("#province").on("change", function (event) {
        $.get(
            "/JuanitaHieleraWeb/public/admin/provinces/" +
                event.target.value +
                "",
            function (data) {
                /*

                */
                ///por las dudas que no funcione a la primera ahi dejo un script con el jquery ui que es el que implementa el autocomplete Pag para no olvidarme https://www.geeksforgeeks.org/javascript-auto-complete-suggestion-feature/
                /// <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                $("#locality").autocomplete({
                    source: data
                });
            }
        );
    });
});
