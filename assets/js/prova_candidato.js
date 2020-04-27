jQuery(document).ready(function() {

    jQuery("#select-basic, #select-basic-1, #select-basic-2, #select-multi").select2();
    jQuery('#select-search-hide').select2({
        minimumResultsForSearch: -1
    });
    jQuery(".select2").select2();

    $('#example').DataTable();
    // Tags Input
    jQuery('#tags').tagsInput({
        width: 'auto'
    });

    // Input Masks
    jQuery(".date").mask("99/99/9999");
    jQuery(".phone").mask("(99) 99999-9999");
    $(".cpf").mask("999.999.999-99");
    jQuery(".cep").mask("99999-999");

    function format(item) {
        return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined) ? "" : item.element[0].getAttribute('rel')) + ' mr10"></i>' + item.text;
    }

    // This will empty first option in select to enable placeholder
    jQuery('select option:first-child').text('');

    jQuery("#select-templating").select2({
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) {
            return m;
        }
    });


    // Botão para escolher o role do usuário 
    jQuery(".radio_multi_role").click(function() {
        var tipo = $(this).val();
        if (tipo == 1) {
            $(".role_permissao").slideDown("slow");
        } else {
            $(".role_permissao").slideUp("slow");
            $(".roles_permissao_select").prop('selectedIndex', 0);
        }
    });


    function format(item) {
        return '<i class="fa ' + ((item.element[0].getAttribute('rel') === undefined) ? "" : item.element[0].getAttribute('rel')) + ' mr10"></i>' + item.text;
    }

    // This will empty first option in select to enable placeholder
    jQuery('select option:first-child').text('');

    jQuery("#select-templating").select2({
        formatResult: format,
        formatSelection: format,
        escapeMarkup: function(m) {
            return m;
        }
    });


    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });

});