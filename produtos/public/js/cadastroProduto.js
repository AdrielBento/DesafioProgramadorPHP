/**
 *@description Adiciona mascara no campo preco
 */
$('#preco').mask("#.##0,00", {
    reverse: true
});

/**
 * @description Adiciona e atualiza Produtos
 */
$("#addProduto").submit(function (e) {

    e.preventDefault();

    let action = "new";
    let actionMsg = "cadastra";
    let id = "";

    let nome = $("#nome").val();
    let descricao = $("#descricao").val();
    let sku = $("#sku").val();
    let preco = $("#preco").val().replace(".", "").replace(",", ".");


    if ($("#cancel-update-produto").is(":visible")) {
        action = "update";
        actionMsg = "atualiza";
        id = localStorage.getItem("idProduto");
    }


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $("#token").val()
        },
        url: `produtos/${action}`,
        data: {
            nome,
            descricao,
            sku,
            preco,
            id
        },
        method: "POST",
        dataType: "json"
    }).done(function (res) {

        if (id != "" && res.status) {

            noty({
                text: `✔️ Produto atualizado`,
                type: "success"
            });

            let idProduto = localStorage.getItem("idProduto");

            $(`#produto-nome-${idProduto}`).text($("#nome").val());
            $(`#produto-preco-${idProduto}`).text($("#preco").val());
            $(`#produto-sku-${idProduto}`).text($("#sku").val());

            $("#cancel-update-produto").trigger("click");
            $("#addProduto").trigger("reset");

        } else if (res.status) {

            addProdutoTable(res, sku, preco, nome);

            noty({
                text: `✔️ Produto cadastrado`,
                type: "success"
            });

            $("#addProduto").trigger("reset");

        } else {
            noty({
                text: `😕 Erro ao ${actionMsg}r o Produto`,
                type: "error"
            });
        }
    }).fail(function (jqXHR, textStatus) {
        console.error(jqXHR, textStatus);
        noty({
            text: " ❌ Ops,ocorreu um erro.Tente novamente",
            type: "error"
        });
    });
});

/**
 * @description Adiciona um novo produto na tabela
 */
function addProdutoTable(res, sku, preco, nome) {

    try {
        let table = $("table tbody").get(0);
        let tr = $("<tr>");
        let acoes = `<td><span class="produto-remove pointer" data-id="${res.idProduto}"><i class="icon-red fas fa-trash-alt"></i></span>`;
        acoes += `<span class="produto-update pointer" data-id="${res.idProduto}"><i class="fas fa-pen"></i></span></td>`;
        let tdPreco = `<td>${preco}</td>`;
        let tdSku = `<td>${sku}</td>`;
        let tdNome = $("<td>", {
            id: `produto-nome-${res.idProduto}`,
            text: `${nome}`
        });

        $(table).append($(tr).append(tdNome, tdSku, tdPreco, acoes));
        return true;
    } catch (e) {
        console.error("Não foi possivel adicionar na tabela", e);
        return false
    }
}

/**
 * @description Abre um dialog para confirmar a exclusao de um produto
 */
$(document).on("click", ".produto-remove", function (e) {

    let idProduto = $(this).data("id");
    let tr = $(this).parents("tr");

    swal({
            title: "Excluir Produto?",
            icon: "warning",
            buttons: true
        })
        .then(willDelete => {
            if (willDelete) {
                return fetch(`produtos/remove/${idProduto}`);
            }
        })
        .then(results => {
            return results.json();
        })
        .then(json => {
            if (json.status) {
                swal({
                    title: "Produto Excluido!",
                    icon: "success"
                }).then(value => {

                    $(tr).addClass("animated fadeOutRight");
                    setTimeout(function () {
                        $(tr).remove();
                    }, 400);
                });
            } else {
                swal({
                    title: "Ops ocorreu um erro!",
                    text: "Ocorreu um erro ao remove um produto.Tente novamente",
                    icon: "error",
                    button: "Ok"
                });
            }
        });
});

/**
 * @description Busca os dados de um produto e insere no formulario para edicao
 */
$(document).on("click", ".produto-update", function (e) {

    let idProduto = $(this).data("id");

    $.ajax({
        url: `produtos/getProduto/${idProduto}`,
        headers: {
            'X-CSRF-TOKEN': $("#token").val()
        },
        method: "GET",
        dataType: "json"
    }).done(function (res) {

        localStorage.setItem("idProduto", idProduto);

        $("#nome").val(res.produto.nome);
        $("#preco").val(res.produto.preco);
        $("#descricao").val(res.produto.descricao);
        $("#sku").val(res.produto.sku);
        $("#cancel-update-produto").show();

    });
});

/**
 * @description Cancela edicao de produto e limpa os campos do formulario
 */
$(document).on("click", "#cancel-update-produto", function (e) {
    localStorage.clear();
    $("#cancel-update-produto").hide();
    $("#addProduto").trigger("reset");;
});

/**
 * @description Notificão
 * @param {Object} config {text:Mensagem da notificao,type:Tipo de notificacao ex:'success'}
 */
function noty(config) {
    let {
        text,
        type
    } = config;

    new Noty({
        text: config.text,
        type: config.type,
        timeout: 3500,
        progressBar: true,
        theme: "metroui",
        animation: {
            open: "animated bounceInRight",
            close: "animated bounceOutRight"
        }
    }).show();
}
