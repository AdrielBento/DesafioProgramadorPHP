window.onbeforeunload = function (event) {
    localStorage.clear();
};

$("#efetuaPedido").submit(function (e) {

    e.preventDefault();

    let tamanho = localStorage.length;

    if (tamanho <= 0) {
        return false;
    }

    let total = localStorage.getItem("total");
    let form = Array();

    for (let i = 0; i < tamanho; i++) {

        let chave = localStorage.key(i);
        if (chave != null && chave != "total") {

            let produto = JSON.parse(localStorage.getItem(chave));

            form.push({
                name: "pedido",
                value: {
                    idProduto: chave,
                    quantidade: produto.quantidade
                }
            })
        }
    }

    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $("#token").val()
            },
            url: `pedido/new`,
            data: {
                data: form,
                total
            },
            method: "POST",
            dataType: "json"
        })
        .done(function (res) {
            if (res.status) {
                noty({
                    text: "✔️ Pedido efetuado",
                    type: "success"
                });
            } else {
                noty({
                    text: " ❌ Ops,ocorreu um erro.Tente novamente",
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


$("#addPedido").click(function (e) {

    let produto = $("#produto option:selected").text();
    let idProduto = $("#produto").val();
    let quantidade = $("#quantidade").val();
    let table = $("table tbody").get(0);

    if (produto == "" || quantidade == "" || quantidade <= 0) {
        noty({
            text: `Preencha os campos obrigatorios`,
            type: "warning"
        });

        return false;
    } else if (localStorage.getItem(idProduto) != null) {
        noty({
            text: `Produto já adicionado`,
            type: "warning"
        });
        return false;
    }

    try {


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $("#token").val()
            },
            url: `produtos/getProduto/${idProduto}`,
            method: "GET",
            dataType: "json"
        }).done(function (res) {

            localStorage.setItem(idProduto, JSON.stringify({
                quantidade,
                preco: res.produto.preco
            }));

            let precoPedido = quantidade * res.produto.preco;
            let tr = $("<tr>");
            let acoes = `<td><span class="pedido-remove pointer" data-id="${idProduto}"><i class="icon-red fas fa-trash-alt"></i></span>`;
            acoes += `<span class="pedido-update pointer" data-id="${idProduto}"><i class="fas fa-pen"></i></span></td>`;
            let tdProduto = `<td id="pedido-produto-${idProduto}">${produto}</td>`;
            let tdQuantidade = `<td id="pedido-quantidade-${idProduto}">${quantidade}</td>`;
            let tdPreco = `<td id="pedido-preco-${idProduto}">${precoPedido}</td>`;
            $(table).append($(tr).append(tdProduto, tdQuantidade, tdPreco, acoes));
            $("#efetuaPedido").trigger("reset");
            updateTotal();
        });

    } catch (e) {
        console.error(e);
    }

});

/**
 * @description Abre um dialog para confirmar a exclusao de um cliente
 */
$(document).on("click", ".pedido-remove", function (e) {

    let idProduto = $(this).data("id");
    let tr = $(this).parents("tr");
    localStorage.removeItem(idProduto);
    updateTotal();

    $(tr).addClass("animated fadeOutRight");
    setTimeout(function () {
        $(tr).remove();
    }, 400);

});

$(document).on("click", ".pedido-update", function (e) {

    let idProduto = $(this).data("id");
    let produto = JSON.parse(localStorage.getItem(idProduto));
    $("#quantidade").val(produto.quantidade);
    $(`#produto option[value=${idProduto}]`).prop('selected', true);
    $("#produto").prop('disabled', true);
    $("#addPedido").hide();
    $("#updatePedido").show();

});


$(document).on("click", "#updatePedido", function (e) {

    let idProduto = $("#produto").val();
    let quantidade = $("#quantidade").val();
    let produto = JSON.parse(localStorage.getItem(idProduto));

    localStorage.setItem(idProduto, JSON.stringify({
        quantidade,
        preco: produto.preco
    }));

    $("#produto").prop('disabled', false);
    $(`#pedido-quantidade-${idProduto}`).text(quantidade);
    $(`#pedido-preco-${idProduto}`).text((quantidade * produto.preco));
    $("#updatePedido").hide();
    $("#addPedido").show();
    updateTotal();

});

function updateTotal() {

    let tamanho = localStorage.length;
    let total = 0;

    for (let i = 0; i < tamanho; i++) {

        let chave = localStorage.key(i);
        if (chave != null && chave != "total") {
            let pedido = JSON.parse(localStorage.getItem(chave));
            total += Math.round((parseFloat(pedido.preco) * parseFloat(pedido.quantidade)));
        }
    }

    localStorage.setItem("total", total);
    $("#total").text(total);
}


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
