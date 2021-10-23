var modal = {};
modal.hide = function () {
    $('.chatbot-conteiner').fadeOut();
};

modal.close = function () {
    $('.chatbot-conteiner').hide();
}
$(document).ready(function () {
    modal.close();
    // Open appropriate dialog when clicking on anything with class "dialog-open"
    $('.cta').click(function () {
        modal.id = '.chatbot-conteiner' + this.id;
        $('.chatbot-conteiner').fadeIn();
        $(modal.id).fadeIn();
    });
    // Close dialog when clicking on the "ok-dialog"
    $('.cerrar').click(function () {
        modal.hide();
    });
    // Require the user to click OK if the dialog is classed as "modal"
    $('.chatbot-conteiner').click(function () {
        if ($(modal.id).hasClass('modal')) {
            // Do nothing
        } else {
            modal.hide();
        }
    });
    // Prevent dialog closure when clicking the body of the dialog (overrides closing on clicking overlay)
    $('.campo-escritura, .form, .titulo').click(function () {
        event.stopPropagation();
    });
});