let dataTable;
let dataTableIsInitialized = false;

const dataTableOptions = {
    lengthMenu: [5, 10, 15, 20, 100, 200, 500],
    columnDefs: [
        { className: "centered", targets: [0, 1, 2, 3, 4] },
        { orderable: false, targets: [4] },
        { searchable: false, targets: [1] }
    ],
    pageLength: 10,
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

    dataTable = $("#datatable_record").DataTable(dataTableOptions);

    dataTableIsInitialized = true;
};

const listUsers = async () => {
    try {
        let content = ``;
        datos.forEach(function (user) {
            content += `
                <tr>
                    <td>${user.idHistorial}</td>
                    <td>${user.fecha}</td>
                    <td>${user.nombre}</td>
                    <td>${user.accion}</td>
                    <td>
                    <a name="btnEditar" id="btnEditar" class="btn btn-primary" href="update.php?codigo=${parseInt(user.idUsuario)}" role="button">Editar</a>
                    <a name="btnElimnar" id="btnElimnar" class="btn btn-danger" href="javascript:borrar(${parseInt(user.idUsuario)});" role="button">Eliminar</a>
                    </td>
                </tr>`;
        });
        tableBody_record.innerHTML = content;
    } catch (ex) {
        alert("error: " + ex);
    }
};

window.addEventListener("load", async () => {
    await initDataTable();
});