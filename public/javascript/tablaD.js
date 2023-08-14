let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    //scrollX: "2000px",
    lengthMenu: [5, 10, 15, 20, 100, 200, 500],
    columnDefs: [
        { className: "centered", targets: [0, 1, 2, 3, 4, 5, 6] },
        { orderable: false, targets: [5, 6] },
        { searchable: false, targets: [1] }
        //{ width: "50%", targets: [0] }
    ],
    pageLength: 3,
    destroy: true,
    language: {
        lengthMenu: "Mostrar _MENU_ registros por página",
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

    dataTable = $("#datatable_users").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
};

const listUsers = async () => {
    try {
        let content = ``;
        var index = 1;
        datos.forEach(function (user) {
            content += `
                <tr>
                    <td>${index++}</td>
                    <td>${user.idUsuario}</td>
                    <td>${user.nombre}</td>
                    <td>${user.apellido}</td>
                    <td>${user.nivel}</td>
                    <td>${user.estado}</td>
                    <td>
                    <a name="btnEditar" id="btnEditar" class="btn btn-primary" href="#" role="button">Editar</a>
                        <a name="btnElimnar" id="btnElimnar" class="btn btn-danger" href="#" role="button">Eliminar</a>
                    </td>
                </tr>`;
        });
        tableBody_users.innerHTML = content;
    } catch (ex) {
        alert("error: " + ex);
    }
};

window.addEventListener("load", async () => {
    await initDataTable();
});