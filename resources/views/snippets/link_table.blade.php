<table id="{{$table_id}}" class="table table-hover">
    <thead>
        <tr>
            <th>Curto</th>
            <th>Longo</th>
            <th>Cliques</th>
            <th>Data</th>
            @if ($table_id == "admin_links_table")
            {{-- Show action buttons only if admin view --}}
            <th>Criador</th>
            <th>Desabilitar</th>
            <th>Remover</th>
            @endif
        </tr>
    </thead>
</table>