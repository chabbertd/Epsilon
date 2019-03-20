<a href="{{ $url_edit }}" class="editar btn btn-outline-info btn-sm modal-show edit" title="Editar {{ $model->name }}"><i class="fas fa-pencil-alt btn-abm"></i></a> 
<a href="{{ $url_rol }}" class="btn btn-outline-secondary btn-sm btn-permisos" title="Configurar permisos {{ $model->name }}"><i class="fas fa-unlock-alt btn-abm"></i></a>
<a href="{{ $url_destroy }}" class="btn btn-outline-danger btn-sm btn-delete" title="Eliminar {{ $model->name }}"><i class="fas fa-user-times btn-abm"></i></a>
<a href="#" class="btn btn-outline-warning btn-sm btn-suspender" title="Suspender/habilitar a {{ $model->name }}" data-id={{ $model->id }}><i class="fas fa-thumbs-down btn-abm"></i></a>
<a href="#" class="btn btn-outline-success btn-sm btn-reset" title="Blanquear contraseña a {{ $model->name }}" data-id={{ $model->id }}><i class="fas fa-sync-alt btn-abm"></i></a>


