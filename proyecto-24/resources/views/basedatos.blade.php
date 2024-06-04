<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de Datos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial Black', Arial, sans-serif; /* Cambio de la fuente a Arial Black */
            background: linear-gradient(to bottom right, #e788ff, #ff514b); /* Fondo azul claro a verde claro */
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        #container {
            width: 80%;
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td input {
            width: 100%;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .success-msg {
            color: green;
            margin-top: 10px;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 150px; /* Tamaño del logo */
            cursor: pointer;
            transition: transform 0.3s;
        }
        .logo:hover {
            transform: scale(1.1); /* Animación de zoom al pasar el mouse */
        }
    </style>
</head>
<body>

<a href="/">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
</a>

<div id="container">
    <h2>Base de Datos</h2>
    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Buscar...">
    <table id="dataTable">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha de Inventario</th>
                <th>Tag</th>
                <th>Departamento</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se cargarán aquí -->
        </tbody>
    </table>
    <button class="btn" onclick="addRow()">Agregar Fila</button>
    <button class="btn" onclick="saveData()">Guardar Cambios</button>
    <div id="successMsg" class="success-msg" style="display: none;">Guardado correctamente</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>
    var data = [];

    // Ruta del archivo Excel a cargar
    var filePath = "bdint.xlsx";

    // Función para cargar datos desde un archivo Excel
    function loadExcelData() {
        var req = new XMLHttpRequest();
        req.open("GET", filePath, true);
        req.responseType = "arraybuffer";
        req.onload = function(event) {
            var dataBuffer = new Uint8Array(req.response);
            var workbook = XLSX.read(dataBuffer, {type: 'array'});
            var sheet = workbook.Sheets[workbook.SheetNames[0]];
            var json = XLSX.utils.sheet_to_json(sheet, {header: 1, range: 1});
            var tbody = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
            tbody.innerHTML = ""; // Limpiar tbody antes de cargar nuevos datos
            json.forEach(function(row) {
                var tr = document.createElement("tr");
                row.forEach(function(cell) {
                    var td = document.createElement("td");
                    td.innerHTML = "<input type='text' value='" + cell + "'>";
                    tr.appendChild(td);
                });
                // Agregar el botón Eliminar a cada fila
                var deleteBtn = document.createElement("button");
                deleteBtn.innerText = "Eliminar";
                deleteBtn.onclick = function() {
                    deleteRow(this);
                };
                var td = document.createElement("td");
                td.appendChild(deleteBtn);
                tr.appendChild(td);
                tbody.appendChild(tr);
            });
            // Actualizar la variable data
            data = json.map(function(row) {
                return row.slice();
            });
        };
        req.send();
    }

    // Función para agregar una nueva fila a la tabla
    function addRow() {
        var tbody = document.getElementById("dataTable").getElementsByTagName("tbody")[0];
        var tr = document.createElement("tr");
        ["", "", "", "", ""].forEach(function(cell) {
            var td = document.createElement("td");
            td.innerHTML = "<input type='text' value='" + cell + "'>";
            tr.appendChild(td);
        });
        // Agregar el botón Eliminar a la nueva fila
        var deleteBtn = document.createElement("button");
        deleteBtn.innerText = "Eliminar";
        deleteBtn.onclick = function() {
            deleteRow(this);
        };
        var td = document.createElement("td");
        td.appendChild(deleteBtn);
        tr.appendChild(td);
        tbody.appendChild(tr);
    }

    // Función para eliminar una fila
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    // Función para guardar los datos en un archivo Excel
    function saveData() {
        var ws = XLSX.utils.aoa_to_sheet(data);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

        // Convertir datos a Blob
        var blob = new Blob([s2ab(wbout)], { type: "application/octet-stream" });

        // Crear un enlace de descarga
        var url = window.URL.createObjectURL(blob);
        var a = document.createElement("a");
        document.body.appendChild(a);
        a.style = "display: none";
        a.href = url;
        a.download = "bdint.xlsx";

        // Simular un clic en el enlace de descarga
        a.click();

        // Liberar recursos
        window.URL.revokeObjectURL(url);

        document.getElementById("successMsg").style.display = "block";
        setTimeout(function () {
            document.getElementById("successMsg").style.display = "none";
        }, 3000); // Ocultar el mensaje después de 3 segundos
    }

    // Función para convertir cadena a ArrayBuffer
    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }

    // Función para buscar en la tabla
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Cargar datos al cargar la página
    window.onload = function() {
        loadExcelData();
    };
</script>

</body>
</html>



