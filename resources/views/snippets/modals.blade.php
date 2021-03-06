<script id="modal-template" type="text/x-handlebars-template">

    <div class="modal fade" id="@{{id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">@{{title}}</h4>
                </div>
                <div class="modal-body">
                    @{{{body}}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <!-- <button type="button" class="btn btn-primary">Salvar mudanças</button> -->
                </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->

</script>
