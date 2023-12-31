let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    // scrollX: "2000px",
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'copy',
            text: 'Copiar',
            className: 'btn btn-primary'
        },
        {
            extend: 'csv',
            text: 'Exportar a CSV',
            title: 'DATOS CLIENTE',
            className: 'btn btn-success'
        },
        {
            extend: 'excel',
            text: 'Exportar a Excel',
            title: 'DATOS CLIENTE',
            className: 'btn btn-info'
        },
        {
            extend: 'pdf',
            text: 'Exportar a PDF',
            title: 'DATOS CLIENTE',
            className: 'btn btn-warning',
            exportOptions: {
                columns: ':not(.excluido)'
            }
        },
        {
            extend: 'print',
            title: 'DATOS CLIENTE',
            text: 'Imprimir',
            className: 'btn btn-secondary',
            exportOptions: {
                columns: ':not(.excluido)'
            }
        }
    ],
    columnDefs: [
        { className: "centered", targets: [0, 1, 2, 3, 4, 5, 6] },
        { orderable: false, targets: [5, 6] },
        { searchable: false, targets: [1] }
    ],
    pageLength: 10,
    destroy: true,
    language: {
        buttons: {
            copy: "Copiar",
            csv: "Exportar a CSV",
            excel: "Exportar a Excel",
            pdf: "Exportar a PDF",
            print: "Imprimir"
        },
        // lengthMenu: "Mostrar _MENU_ registros por página",
        zeroRecords: "Ningún usuario encontrado",
        info: "Mostrando de _START_ a _END_ de un total de _TOTAL_ registros",
        infoEmpty: "Ningún usuario encontrado",
        infoFiltered: "(filtrados desde _MAX_ registros totales)",
        search: "Buscar:",
        loadingRecords: "Cargando...",
        paginate: {
            first: "Primero",
            last: "Último",
            next: "Siguiente",
            previous: "Anterior"
        }
    }
};

const initDataTable = async () => {
    // var 
    if (dataTableIsInitialized) {
        dataTable.destroy();
    }
    await listUsers();

    dataTable = $("#datatable_customers").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
};

const listUsers = async () => {
    try {
        let content = ``;
        dataC.forEach(function (custo) {
            content += `
                <tr>
                    <td>${custo.Domicilio}</td>
                    <td>${custo.Celular}</td>
                    <td>${custo.IdCliente}</td>
                    <td>${custo.Nombre}</td>
                    <td>${custo.Apellido}</td>
                    <td>${custo.Estado}</td>
                    <td>
                    <a name="btnEditar" id="btnEditar" class="btn btn-primary" href="update.php?codigo=${parseInt(custo.IdCliente)}" role="button">Editar</a>
                    <a name="btnElimnar" id="btnElimnar" class="btn btn-danger" href="javascript:borrar(${parseInt(custo.IdCliente)});" role="button">Eliminar</a>
                    </td>
                </tr>`;
        });
        tableBody_customers.innerHTML = content;
    } catch (ex) {
        alert("error: " + ex);
    }
};

window.addEventListener("load", async () => {
    await initDataTable();
});