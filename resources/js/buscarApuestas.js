$(document).ready(function() {
    $('#juego_id').on('change', function() {
        var juego_id = $(this).val();
        $.ajax({
            url: '{{ route("apuestas.buscar") }}',
            type: 'GET',
            data: {
                juego_id: juego_id
            },
            success: function(data) {
                mostrarResultados(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    function mostrarResultados(apuestas) {
        var html = '';
        $.each(apuestas, function(index, apuesta) {
            html += '<tr>';
            html += '<td>' + apuesta.id + '</td>';
            html += '<td>' + apuesta.juego.nombre + '</td>';
            html += '<td>' + apuesta.fecha + '</td>';
            html += '<td>' + apuesta.monto + '</td>';
            html += '</tr>';
        });
        $('#apuestasResultado tbody').html(html);
    }
});