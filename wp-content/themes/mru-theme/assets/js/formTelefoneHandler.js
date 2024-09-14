document.addEventListener("DOMContentLoaded", function() {
    const telefoneInputs = document.querySelectorAll('input[type="tel"][name*="telefone"]');

    telefoneInputs.forEach(input => {
        input.addEventListener('input', formatPhoneNumber); // Formata enquanto digita
        input.addEventListener('blur', removePhoneFormatBeforeSubmit); // Remove formatação antes de enviar
    });

    function formatPhoneNumber(event) {
        let value = event.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos

        // Aplica a formatação do telefone
        if (value.length >= 2) value = `+55 ${value.substring(0, 2)} ` + value.substring(2);
        if (value.length >= 7) value = value.substring(0, 8) + ' ' + value.substring(8, 12) + '-' + value.substring(12, 16);

        event.target.value = value;
    }

    function removePhoneFormatBeforeSubmit(event) {
        let value = event.target.value.replace(/\D/g, ''); // Remove a formatação
        if (value.length === 11) {
            event.target.value = `+55${value}`; // Adiciona o código do Brasil
        }
    }
});
